<?php

namespace App\Http\Controllers\COA;

use App\Models\COA;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use DB;
use PDF;
use Response;


class COAController extends Controller
{

    public function index()
    {
        //$blogs = Bolgs::all();
        //return view('blogs.blog', ['blogs' => $blogs]);
    }

    public function create()
    {
        //return view('blogs.addblog');
    }

    //createGeneralEntery
    public function createGeneralEntery(){
        return view('frontend.coa.create_general_entery');
    }//createGeneralEntery

    //editCOA
    public function editCOA(Request $request){
        if($request->method() == 'POST') {
            $coa_name = $request->coa_name;
            $coa_id = $request->coa_id;
            //echo '<pre>';
            //print_r($request->all());
            DB::table('coas')->where('id', $coa_id)->update(['coa_name'=>$coa_name]);
            Session::flash('message', 'COA Name Successfully Updated!');
            Session::flash('alert-class', 'alert-success');
            return redirect('frontpharmacy/COA');
        }    
    }//editCOA

    //getCOAName
    public function getCOAName(Request $request){
        if($request->method() == 'POST') {
            $coa_id = $request->input('id');
            //$coa_name = DB::table('coas')->where('id', $coa_id)->first()->coa_name;

            $coa_arr = explode('_', $coa_id);
            $level = $coa_arr[0];
            if($level == 4){$type='Add';}else{$type='Edit';}

            $id = $coa_arr[1];
            $coa_data = DB::table('coas')->where('id', $id)->first();
            $coa_name = $coa_data->coa_name;
            $coa_obalance = $coa_data->coa_obalance;
            /*$coa_id = '4_'.$coa_data->parent.'_'.$coa_data->family;

            return json_encode(['coa_obalance'=>$coa_obalance, 'status'=>true, 'coa_id'=>$coa_id]);*/

            return json_encode(['coa_name'=>$coa_name,'status'=>true, 'coa_id'=>$coa_id, 'type'=>$type]);
        }    
    }//getCOAName

    //getSelTA
    public function getSelTA(Request $request){
        if($request->method() == 'POST'){
                //echo '<pre>';
                //print_r($request->all());
                $acc_id = $request->input('acc_id');
                $coa_data = DB::table('coas')->where('id', $acc_id)->get();
                if($coa_data){
                    $ta_list = $coa_data->first();
                    $status = true;
                }else{
                    $ta_list = [];
                    $status = false;
                }
                
                return json_encode(['status'=>$status, 'ta_data'=>$ta_list]);
        }
    }//getSelTA

    //getLedger
    public function getLedger(Request $request){
            $ledgers = [];
            if($request->method() == 'POST'){
                    //echo '<pre>';  
                    //print_r($request->all());
                    /*
                    Array
                        (
                            [_token] => bdoBysk6a9IdVER2Aai2JfwmU1Aqa4yI2NNRzGdr
                            [coa_parent] => Array
                                (
                                    [0] => 1_1_1
                                    [1] => 3_4_1
                                    [2] => 4_6_1
                                )

                            [st_date] => 
                            [end_date] => 
                            [submit] => Search
                        )
                    */
                  $coa_parent_arr = $request->input('coa_parent');
                  $st_date = $request->input('st_date');
                  $end_date = $request->input('end_date');


                  foreach($coa_parent_arr as $coa_parent){
                           $coa_arr = explode('_', $coa_parent);
                           $level = $coa_arr[0];
                           $coa_id = $coa_arr[1];
                           $family = $coa_arr[2];
                           
                           switch($level){
                                case '1' :{
                                    $coa1 = DB::table('coas')->where('id', $coa_id)->first();
                                    $coa_name = $coa1->coa_name;
                                    $all_ta = [];
                                    //get all TA of present in parent in fourth level
                                    $coa2 = DB::table('coas')->where('parent', $coa_id)->get();
                                    if($coa2->count() > 0){
                                        foreach($coa2 as $c2){
                                            $coa3 = DB::table('coas')->where('parent', $c2->id)->get();
                                            if($coa3->count() > 0){
                                                foreach($coa3 as $c3){
                                                    $coa4 = DB::table('coas')->where('parent', $c3->id)->get();
                                                    if($coa4->count() > 0){
                                                        foreach($coa4 as $c4){
                                                            $all_ta[] = [$coa1->coa_name.' >> '.$c2->coa_name.' >> '.$c3->coa_name.' >> '.$c4->coa_name => $c4->id.'_'.$c4->coa_obalance];
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                    $ledgers[$coa_name] = $all_ta;
                                }break;
                                case '2' :{
                                    //
                                    $coa2 = DB::table('coas')->where('coa_level','2')->where('id', $coa_id)->first();
                                    $coa2_name = $coa2->coa_name;
                                    $coa2_id = $coa2->id;
                                    $parent = $coa2->parent;

                                    $coa1 = DB::table('coas')->where('coa_level','1')->where('id', $parent)->first();
                                    $coa1_name = $coa1->coa_name;
                                    $coa1_id = $coa1->id;

                                    //echo $coa1_id.$coa1_name.' >> '.$coa2_id.$coa2_name; die;

                                    $all_ta = [];
                                    //get all TA of present in parent in fourth level
                                    //echo '1 - '.$coa1_id.'<br>';
                                    $coa2 = DB::table('coas')->where('parent', $coa1_id)->where('id', $coa_id)->get();
                                    if($coa2->count() > 0){
                                        foreach($coa2 as $c2){
                                            //echo '2 -- '.$coa1_id.'<br>';
                                            $coa3 = DB::table('coas')->where('parent', $c2->id)->get();
                                            if($coa3->count() > 0){
                                                foreach($coa3 as $c3){
                                                    //echo '3 --- '.$c3->id.'<br>';
                                                    $coa4 = DB::table('coas')->where('parent', $c3->id)->get();
                                                    if($coa4->count() > 0){
                                                        foreach($coa4 as $c4){
                                                            $all_ta[] = [$coa1->coa_name.' >> '.$c2->coa_name.' >> '.$c3->coa_name.' >> '.$c4->coa_name => $c4->id.'_'.$c4->coa_obalance];
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                    $ledgers[$coa1_name.' >> '.$coa2_name] = $all_ta;
                                    //die;
                                    //$ledgers[$coa1_name.' >> '.$coa2_name] = 'array to third or not found';
                                }break;
                                case '3' :{
                                    //$coa_name = DB::table('coas')->where('coa_level','3')->where('id', $coa_id)->first()->coa_name;
                                    
                                    $coa3 = DB::table('coas')->where('coa_level','3')->where('id', $coa_id)->first();
                                    $coa3_name = $coa3->coa_name;
                                    $parent2 = $coa3->parent;

                                    $coa2 = DB::table('coas')->where('coa_level','2')->where('id', $parent2)->first();
                                    $coa2_name = $coa2->coa_name;
                                    $parent = $coa2->parent;

                                    $coa1 = DB::table('coas')->where('coa_level','1')->where('id', $parent)->first();
                                    $coa1_name = $coa1->coa_name;
                                    $coa1_id = $coa1->id;

                                    $all_ta = [];
                                    //get all TA of present in parent in fourth level
                                    //echo '1 - '.$coa1_id.'<br>';
                                    $coa2 = DB::table('coas')->where('parent', $coa1_id)->get();
                                    if($coa2->count() > 0){
                                        foreach($coa2 as $c2){
                                            //echo '2 -- '.$coa1_id.'<br>';
                                            $coa3 = DB::table('coas')->where('parent', $c2->id)->where('id', $coa_id)->get();
                                            if($coa3->count() > 0){
                                                foreach($coa3 as $c3){
                                                    //echo '3 --- '.$c3->id.'<br>';
                                                    $coa4 = DB::table('coas')->where('parent', $c3->id)->get();
                                                    if($coa4->count() > 0){
                                                        foreach($coa4 as $c4){
                                                            $all_ta[] = [$coa1->coa_name.' >> '.$c2->coa_name.' >> '.$c3->coa_name.' >> '.$c4->coa_name => $c4->id.'_'.$c4->coa_obalance];
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                    $ledgers[$coa1_name.' >> '.$coa2_name.' >> '.$coa3_name] = $all_ta;



                                    //$ledgers[$coa1_name.' >> '.$coa2_name.' >> '.$coa3_name] = 'array to fourth or not found';
                                    
                                    //$ledgers[$coa_name] = 'array to fourth or not found';
                                }break;
                                case '4' :{
                                   // $coa_name = DB::table('coas')->where('coa_level','4')->where('id', $coa_id)->first()->coa_name;

                                   $coa4 = DB::table('coas')->where('coa_level','4')->where('id', $coa_id)->first();
                                   $coa4_name = $coa4->coa_name;
                                   $coa4_id = $coa4->id;
                                   $parent3 = $coa4->parent;

                                   $coa3 = DB::table('coas')->where('coa_level','3')->where('id', $parent3)->first();
                                   $coa3_name = $coa3->coa_name;
                                   $coa3_id = $coa3->id;
                                   $parent2 = $coa3->parent;

                                   $coa2 = DB::table('coas')->where('coa_level','2')->where('id', $parent2)->first();
                                   $coa2_name = $coa2->coa_name;
                                   $coa2_id = $coa2->id;
                                   $parent = $coa2->parent;

                                   $coa1 = DB::table('coas')->where('coa_level','1')->where('id', $parent)->first();
                                   $coa1_name = $coa1->coa_name;
                                   $coa1_id = $coa1->id;


                                   $all_ta = [];
                                   //get all TA of present in parent in fourth level
                                   //echo '1 - '.$coa1_id.'<br>';
                                   $coa2 = DB::table('coas')->where('parent', $coa1_id)->get();
                                   if($coa2->count() > 0){
                                       foreach($coa2 as $c2){
                                           //echo '2 -- '.$coa1_id.'<br>';
                                           $coa3 = DB::table('coas')->where('parent', $c2->id)->get();
                                           if($coa3->count() > 0){
                                               foreach($coa3 as $c3){
                                                   //echo '3 --- '.$c3->id.'<br>';
                                                   $coa4 = DB::table('coas')->where('parent', $c3->id)->where('id', $coa_id)->get();
                                                   if($coa4->count() > 0){
                                                       foreach($coa4 as $c4){
                                                           $all_ta[] = [$coa1->coa_name.' >> '.$c2->coa_name.' >> '.$c3->coa_name.' >> '.$c4->coa_name => $c4->id.'_'.$c4->coa_obalance];
                                                       }
                                                   }
                                               }
                                           }
                                       }
                                   }
                                   $ledgers[$coa1_name.' >> '.$coa2_name.' >> '.$coa3_name.' >> '.$coa4_name] = $all_ta;




                                   //$ledgers[$coa1_name.' >> '.$coa2_name.' >> '.$coa3_name.' >> '.$coa4_name] = 'Transaction accounts here or not found';


                                    //$ledgers[$coa_name] = 'Transaction accounts here or not found';
                                }break;
                           };

                  }//endforeach              

            //$request->method()
            }else{
                  $coa_parent_arr = [];
                  $st_date = '';
                  $end_date = '';
            }
            


            return view('frontend.coa.ledger', ['ledgers'=>$ledgers, 'coa_parent_arr'=>$coa_parent_arr, 'st_date'=>$st_date, 'end_date'=>$end_date]);
             //return view('blogs.viewblog', ['blogs' => $blogs]);
    }//getLedger


    public function getLedgerPDF9(Request $request){
    $ledgers = [];
    if($request->method() == 'POST'){
        $data = [
            'title' => 'Welcome to ItSolutionStuff.com',
            'date' => date('m/d/Y')
        ];
          
        $pdf = PDF::loadView('frontend.coa.mypdf', $data);
    
        return $pdf->stream('itsolutionstuff.pdf', ['Attachment'=>0]);
        }
    }

    //getLedgerPDF
    public function getLedgerPDF(Request $request){
        $user_id = auth()->user()->id;
        $ledgers = [];
        if($request->method() == 'POST'){
                //echo '<pre>';  
                //print_r($request->all());

                /*
                Array
                    (
                        [_token] => bdoBysk6a9IdVER2Aai2JfwmU1Aqa4yI2NNRzGdr
                        [coa_parent] => Array
                            (
                                [0] => 1_1_1
                                [1] => 3_4_1
                                [2] => 4_6_1
                            )

                        [st_date] => 
                        [end_date] => 
                        [submit] => Search
                    )
                */
              $coa_parent_arr = $request->input('coa_parent');
              $st_date = $request->input('st_date');
              $end_date = $request->input('end_date');


              foreach($coa_parent_arr as $coa_parent){
                       $coa_arr = explode('_', $coa_parent);
                       $level = $coa_arr[0];
                       $coa_id = $coa_arr[1];
                       $family = $coa_arr[2];
                       
                       switch($level){
                            case '1' :{
                                $coa1 = DB::table('coas')->where('id', $coa_id)->where('user_id',$user_id)->first();
                                $coa_name = $coa1->coa_name;
                                $all_ta = [];
                                //get all TA of present in parent in fourth level
                                $coa2 = DB::table('coas')->where('parent', $coa_id)->where('user_id',$user_id)->get();
                                if($coa2->count() > 0){
                                    foreach($coa2 as $c2){
                                        $coa3 = DB::table('coas')->where('parent', $c2->id)->where('user_id',$user_id)->get();
                                        if($coa3->count() > 0){
                                            foreach($coa3 as $c3){
                                                $coa4 = DB::table('coas')->where('parent', $c3->id)->where('user_id',$user_id)->get();
                                                if($coa4->count() > 0){
                                                    foreach($coa4 as $c4){
                                                        $all_ta[] = [$coa1->coa_name.' >> '.$c2->coa_name.' >> '.$c3->coa_name.' >> '.$c4->coa_name => $c4->id.'_'.$c4->coa_obalance];
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                                $ledgers[$coa_name] = $all_ta;
                            }break;
                            case '2' :{
                                //
                                $coa2 = DB::table('coas')->where('coa_level','2')->where('id', $coa_id)->where('user_id',$user_id)->first();
                                $coa2_name = $coa2->coa_name;
                                $coa2_id = $coa2->id;
                                $parent = $coa2->parent;

                                $coa1 = DB::table('coas')->where('coa_level','1')->where('id', $parent)->where('user_id',$user_id)->first();
                                $coa1_name = $coa1->coa_name;
                                $coa1_id = $coa1->id;

                                //echo $coa1_id.$coa1_name.' >> '.$coa2_id.$coa2_name; die;

                                $all_ta = [];
                                //get all TA of present in parent in fourth level
                                //echo '1 - '.$coa1_id.'<br>';
                                $coa2 = DB::table('coas')->where('parent', $coa1_id)->where('id', $coa_id)->where('user_id',$user_id)->get();
                                if($coa2->count() > 0){
                                    foreach($coa2 as $c2){
                                        //echo '2 -- '.$coa1_id.'<br>';
                                        $coa3 = DB::table('coas')->where('parent', $c2->id)->where('user_id',$user_id)->get();
                                        if($coa3->count() > 0){
                                            foreach($coa3 as $c3){
                                                //echo '3 --- '.$c3->id.'<br>';
                                                $coa4 = DB::table('coas')->where('parent', $c3->id)->where('user_id',$user_id)->get();
                                                if($coa4->count() > 0){
                                                    foreach($coa4 as $c4){
                                                        $all_ta[] = [$coa1->coa_name.' >> '.$c2->coa_name.' >> '.$c3->coa_name.' >> '.$c4->coa_name => $c4->id.'_'.$c4->coa_obalance];
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                                $ledgers[$coa1_name.' >> '.$coa2_name] = $all_ta;
                                //die;
                                //$ledgers[$coa1_name.' >> '.$coa2_name] = 'array to third or not found';
                            }break;
                            case '3' :{
                                //$coa_name = DB::table('coas')->where('coa_level','3')->where('id', $coa_id)->first()->coa_name;
                                
                                $coa3 = DB::table('coas')->where('coa_level','3')->where('id', $coa_id)->where('user_id',$user_id)->first();
                                $coa3_name = $coa3->coa_name;
                                $parent2 = $coa3->parent;

                                $coa2 = DB::table('coas')->where('coa_level','2')->where('id', $parent2)->where('user_id',$user_id)->first();
                                $coa2_name = $coa2->coa_name;
                                $parent = $coa2->parent;

                                $coa1 = DB::table('coas')->where('coa_level','1')->where('id', $parent)->where('user_id',$user_id)->first();
                                $coa1_name = $coa1->coa_name;
                                $coa1_id = $coa1->id;

                                $all_ta = [];
                                //get all TA of present in parent in fourth level
                                //echo '1 - '.$coa1_id.'<br>';
                                $coa2 = DB::table('coas')->where('parent', $coa1_id)->get();
                                if($coa2->count() > 0){
                                    foreach($coa2 as $c2){
                                        //echo '2 -- '.$coa1_id.'<br>';
                                        $coa3 = DB::table('coas')->where('parent', $c2->id)->where('id', $coa_id)->where('user_id',$user_id)->get();
                                        if($coa3->count() > 0){
                                            foreach($coa3 as $c3){
                                                //echo '3 --- '.$c3->id.'<br>';
                                                $coa4 = DB::table('coas')->where('parent', $c3->id)->where('user_id',$user_id)->get();
                                                if($coa4->count() > 0){
                                                    foreach($coa4 as $c4){
                                                        $all_ta[] = [$coa1->coa_name.' >> '.$c2->coa_name.' >> '.$c3->coa_name.' >> '.$c4->coa_name => $c4->id.'_'.$c4->coa_obalance];
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                                $ledgers[$coa1_name.' >> '.$coa2_name.' >> '.$coa3_name] = $all_ta;



                                //$ledgers[$coa1_name.' >> '.$coa2_name.' >> '.$coa3_name] = 'array to fourth or not found';
                                
                                //$ledgers[$coa_name] = 'array to fourth or not found';
                            }break;
                            case '4' :{
                               // $coa_name = DB::table('coas')->where('coa_level','4')->where('id', $coa_id)->first()->coa_name;

                               $coa4 = DB::table('coas')->where('coa_level','4')->where('id', $coa_id)->where('user_id',$user_id)->first();
                               $coa4_name = $coa4->coa_name;
                               $coa4_id = $coa4->id;
                               $parent3 = $coa4->parent;

                               $coa3 = DB::table('coas')->where('coa_level','3')->where('id', $parent3)->where('user_id',$user_id)->first();
                               $coa3_name = $coa3->coa_name;
                               $coa3_id = $coa3->id;
                               $parent2 = $coa3->parent;

                               $coa2 = DB::table('coas')->where('coa_level','2')->where('id', $parent2)->where('user_id',$user_id)->first();
                               $coa2_name = $coa2->coa_name;
                               $coa2_id = $coa2->id;
                               $parent = $coa2->parent;

                               $coa1 = DB::table('coas')->where('coa_level','1')->where('id', $parent)->where('user_id',$user_id)->first();
                               $coa1_name = $coa1->coa_name;
                               $coa1_id = $coa1->id;


                               $all_ta = [];
                               //get all TA of present in parent in fourth level
                               //echo '1 - '.$coa1_id.'<br>';
                               $coa2 = DB::table('coas')->where('parent', $coa1_id)->where('user_id',$user_id)->get();
                               if($coa2->count() > 0){
                                   foreach($coa2 as $c2){
                                       //echo '2 -- '.$coa1_id.'<br>';
                                       $coa3 = DB::table('coas')->where('parent', $c2->id)->where('user_id',$user_id)->get();
                                       if($coa3->count() > 0){
                                           foreach($coa3 as $c3){
                                               //echo '3 --- '.$c3->id.'<br>';
                                               $coa4 = DB::table('coas')->where('parent', $c3->id)->where('id', $coa_id)->where('user_id',$user_id)->get();
                                               if($coa4->count() > 0){
                                                   foreach($coa4 as $c4){
                                                       $all_ta[] = [$coa1->coa_name.' >> '.$c2->coa_name.' >> '.$c3->coa_name.' >> '.$c4->coa_name => $c4->id.'_'.$c4->coa_obalance];
                                                   }
                                               }
                                           }
                                       }
                                   }
                               }
                               $ledgers[$coa1_name.' >> '.$coa2_name.' >> '.$coa3_name.' >> '.$coa4_name] = $all_ta;




                               //$ledgers[$coa1_name.' >> '.$coa2_name.' >> '.$coa3_name.' >> '.$coa4_name] = 'Transaction accounts here or not found';


                                //$ledgers[$coa_name] = 'Transaction accounts here or not found';
                            }break;
                       };

              }//endforeach              

        //$request->method()
        }else{
              $coa_parent_arr = [];
              $st_date = '';
              $end_date = '';
        }
        

        $pdf = PDF::loadView('frontend.coa.mypdf', ['ledgers'=>$ledgers, 'coa_parent_arr'=>$coa_parent_arr, 'st_date'=>$st_date, 'end_date'=>$end_date]);
        return $pdf->stream('ledgerpdf.pdf', ['Attachment'=>0]);
        //return view('frontend.coa.mypdf', ['ledgers'=>$ledgers, 'coa_parent_arr'=>$coa_parent_arr, 'st_date'=>$st_date, 'end_date'=>$end_date]);


        //echo json_encode(['ledgers'=>$ledgers, 'coa_parent_arr'=>$coa_parent_arr, 'st_date'=>$st_date, 'end_date'=>$end_date]);

        //return view('frontend.coa.ledger', ['ledgers'=>$ledgers, 'coa_parent_arr'=>$coa_parent_arr, 'st_date'=>$st_date, 'end_date'=>$end_date]);
         //return view('blogs.viewblog', ['blogs' => $blogs]);
}//getLedger

    //storeJV
    public function storeJV(Request $request){
        if($request->method() == 'POST'){
            //echo '<pre>';
            //print_r($request->all());
            
            /*
            Array
            (
                [_token] => 7WgXnCtMajNWi5E5751CqYVBd6jR2gis41BwbvgB
                [coa_id] => Array
                    (
                        [0] => 6
                        [1] => 8
                    )

                [details] => Array
                    (
                        [0] => details 1
                        [1] => details 2
                    )

                [debit] => Array
                    (
                        [0] => 10
                        [1] => 0
                    )

                [credit] => Array
                    (
                        [0] => 0
                        [1] => 10
                    )

                [total_debit] => Array
                    (
                        [0] => 10
                    )

                [total_credit] => Array
                    (
                        [0] => 10
                    )

                [submit] => Create
            )
            */

            $coa_id_arr = $request->input('coa_id');
            $debit_arr = $request->input('debit');
            $credit_arr = $request->input('credit');
            $details_arr = $request->input('details');
            
            
            $total_debit = $request->input('total_debit');
            $total_credit = $request->input('total_credit');

            $jv_data = [
                        'total_debit'=>$total_debit[0], 
                        'total_credit'=>$total_credit[0],
                    ];            

            $id = DB::table('journal_vouchar')->insertGetId($jv_data);

            if(!empty($coa_id_arr)){
                foreach($coa_id_arr as $k => $coaid){
                    $jv_details_data = [
                        'jv_id'=>$id,
                        'coa_id'=>$coaid,
                        'debit'=>$debit_arr[$k], 
                        'credit'=>$credit_arr[$k],
                        'detail'=>$details_arr[$k],
                        'jv_date'=>date('Y-m-d'),
                    ];            
                    DB::table('journal_vouchar_details')->insert($jv_details_data);
                }
            }

            Session::flash('message', 'Jv added Successfully!');
            Session::flash('alert-class', 'alert-success');
            return redirect('frontpharmacy/COA/createGeneralEntery');

        }
    }

    //getCOACode
    public function getCOACode($level, $parent, $coa_lvel_count, $family, $family_code)
    {
        $user_id = auth()->user()->id;
            $coa_code = '';
            $cl1='';$cl2='';$cl3='';$cl4='';
            
            //level 1
            if($level == 1){
                //$cl1_count = DB::table('coas')->where('parent', 0)->where('coa_level', $level)->count();
                $cl1_count =  $coa_lvel_count;
                $cl1_zero =  '00000';
                if($cl1_count){
                    if($cl1_count > 0 && $cl1_count <= 9){
                        $cl1 = $cl1_count.'000000';
                    }elseif($cl1_count > 9 && $cl1_count <= 99){
                        $cl1 = $cl1_count.'00000';
                    }else{
                        $cl1 = $cl1_count.'0000';
                    }
                }else{
                    $cl1 = '1000000'.$cl1_zero;
                }
            }
            
            //level 2
            if($level == 2){
                $cl2_count = DB::table('coas')->where('parent', $parent)->where('coa_level', $level)->where('user_id',$user_id)->count();
                //$cl2_count =  $coa_lvel_count;
                //echo $cl2_count;die;

                $cl2_zero =  '00000';
                $family2 = $family_code.'0';
                if($cl2_count){
                    if($cl2_count > 0 && $cl2_count <= 9){
                        $cl2 = $family2.$cl2_count.'0000';
                    }else{
                        $cl2 = $family2.$cl2_count.'000';
                    }
                }else{
                    $cl2 = $family2.'10000';
                }
                //echo $cl2;die;
            }
            //$cl2 = '00';

            //level 3
            if($level == 3){
                $cl2_count = DB::table('coas')->where('id', $parent)->where('user_id',$user_id)->first()->coa_lvl_count;
                if($cl2_count > 0 && $cl2_count <= 9){
                    $cl2code = $cl2_count.'0';
                }else{
                    $cl2code = $cl2_count;
                }

                $cl3_count =  $coa_lvel_count;
                $cl3_zero =  '00000';
                $family3 = $family_code.'0';
                if($cl3_count){
                    if($cl3_count > 0 && $cl3_count <= 9){
                        $cl3 = $family3.$cl2code.'0'.$cl3_count.'0';
                    }else{
                        $cl3 = $family3.$cl2code.$cl3_count.'0';
                    }
                }else{
                    $cl3 = $family3.$cl2code.'1000';
                }
            }
            //$cl3 = '000';

            //level 4
            if($level == 4){
                $cl3_result = DB::table('coas')->where('id', $parent)->where('user_id',$user_id)->first();
                $cl3_count = $cl3_result->coa_lvl_count;
                $cl3_parent = $cl3_result->parent;

                if($cl3_count > 0 && $cl3_count <= 9){
                    $cl3code = $cl3_count.'0';
                }else{
                    $cl3code = $cl3_count;
                }

                $cl2_count = DB::table('coas')->where('id', $cl3_parent)->where('user_id',$user_id)->first()->coa_lvl_count;
                if($cl2_count > 0 && $cl2_count <= 9){
                    $cl2code = $cl2_count.'0';
                }else{
                    $cl2code = $cl2_count;
                }



                $cl3_count =  $coa_lvel_count;
                $cl3_zero =  '00000';
                $family3 = $family_code.'0';
                if($cl3_count){
                    if($cl3_count > 0 && $cl3_count <= 9){
                       echo  $cl3 = $family3.$cl2code.$cl3code.$cl3_count.'0';
                       //die;
                    }else{
                        $cl3 = $family3.$cl2code.$cl3code.$cl3_count;
                    }
                }else{
                    $cl3 = $family3.$cl2code.$cl3code.'1000';
                }
            }
           


            $coa_code = $cl1.$cl2.$cl3.$cl4;
            return $coa_code;

    }//getCOACode

    public function store(Request $request)
    {
        $user_id = auth()->user()->id;
        if ($request->method() == 'POST') {
         
            $parent = $request->input('coa_parent');
            if($parent == '') {
                $parent = 0; $level = 1; $family = 0;$family_code = 1;   

                //Find Family Code of parent
                $family_code = DB::table('coas')->where('parent', 0)->where('coa_level', 1)->where('user_id',$user_id)->count();
                $family_code = $family_code + 1;

                //Find Level Count
                $coa_lvel_count = DB::table('coas')->where('parent', $parent)->where('family', $family)->where('coa_level', $level)->where('user_id',$user_id)->count();
                $coa_lvel_count = $coa_lvel_count + 1; 
            }else{
                $parent_arr =  explode('_', $parent);
                $level = $parent_arr[0];
                $parent = $parent_arr[1];
                $family = $parent_arr[2];
                $family_code = $parent_arr[3];

                

                //Find Level Count
                $coa_lvel_count = DB::table('coas')->where('parent', $parent)->where('family', $family)->where('coa_level', $level)->where('user_id',$user_id)->count();
                $coa_lvel_count = $coa_lvel_count + 1;
            }

            $user_id = auth()->user()->id;
            
            $coa = new COA; 

            $coa->user_id = $user_id;   
            $coa->parent = $parent;   
            $coa->family = $family;
            $coa->family_code = $family_code;
            $coa->coa_name = $request->input('coa_name');   
            $coa->coa_level = $level;
            $coa->coa_lvl_count = $coa_lvel_count;
            $coa->coa_type = 'ha';
            $coa->coa_code = $this->getCOACode($level, $parent, $coa_lvel_count, $family, $family_code);
            $coa->coa_date = date('Y-m-d');
            

            $coa->save();

            Session::flash('message', 'COA Successfully Added!!!');
            Session::flash('alert-class', 'alert-success');
            return redirect('frontpharmacy/COA/create');
         }
    }

    public function storeTA(Request $request)
    {
        $user_id = auth()->user()->id;
        if ($request->method() == 'POST') {
         
            $parent = $request->input('coa_id');
            //echo $parent;
            //die;
            if($parent == '') {
                $parent = 0; $level = 1; $family = 0;   
                //Find Level Count
                $coa_lvel_count = DB::table('coas')->where('parent', $parent)->where('family', $family)->where('coa_level', $level)->where('user_id',$user_id)->count();
                $coa_lvel_count = $coa_lvel_count + 1; 
            }else{
                $parent_arr =  explode('_', $parent);
                $level = $parent_arr[0];
                $parent = $parent_arr[1];
                $family = $parent_arr[2];

                //Find Level Count
                $coa_lvel_count = DB::table('coas')->where('parent', $parent)->where('family', $family)->where('coa_level', $level)->where('user_id',$user_id)->count();
                $coa_lvel_count = $coa_lvel_count + 1;
            }

            //get parent coa_lvl_code
            $coa_lvel_code = DB::table('coas')->where('id', $parent)->where('family', $family)->where('coa_level', $level-1)->where('user_id',$user_id)->first()->coa_code;
            
            $user_id = auth()->user()->id;
            $coa = new COA; 

            $coa->user_id = $user_id;   
            $coa->parent = $parent;   
            $coa->family = $family;
            $coa->coa_name = $request->input('coa_name');  
            $coa->coa_obalance = $request->input('coa_obalance');   
            $coa->coa_level = $level;
            $coa->coa_lvl_count = $coa_lvel_count;
            $coa->coa_type = 'ta';
            //$coa->coa_code = $this->getCOACode($level, $parent, $coa_lvel_count, $family);
            $coa->coa_code = $coa_lvel_code.'-'.'0000'.$coa_lvel_count;
            $coa->coa_date = date('Y-m-d');

            $coa->save();

            Session::flash('message', 'COA Transaction Account Successfully Added!!!');
            Session::flash('alert-class', 'alert-success');
            return redirect('frontpharmacy/COA');
         }
    }

    //editTA
    public function editTA(){

    }//editTA

    public function edit($id)
    {
        //$blogs = Bolgs::where('id', $id)->first();
        //return view('blogs.updateblog', ['blogs' => $blogs]);
    }

    public function update(Request $request, $id)
    {
       /* if ($request->method() == 'POST') {
            $bolgExist = Bolgs::where('id', $id)->first();
            if($bolgExist){
                $bolgs = $bolgExist->first();
                $bolgs->title = $request->input('title');
                $bolgs->description = $request->input('description');
                
                if ($request->hasfile('image')) {
                    $destination = 'public/uploads/BolgsImages/' . $bolgs->image;
                    if (File::exists($destination)) {
                        File::delete($destination);
                    }
                    $file = $request->file('image');
                    $extension = $file->getClientOriginalExtension();
                    $filename = time() . "." . $extension;
                    $file->move('public/uploads/BolgsImages/', $filename);
                    $bolgs->image = $filename;
                }
    
                $bolgs->update();
                Session::flash('message', 'Blog Updated Successfully');
                Session::flash('alert-class', 'alert-success');
            }else{
                Session::flash('message', 'Blog Not Update');
                Session::flash('alert-class', 'alert-danger');
            }
            
            
            return redirect()->route('admin.blog');
        }*/
    }

    public function delete(Request $request)
    {
        if ($request->method() == 'POST') {
            //Bolgs::where('id', $request->id)->delete();
            //return true;
        }
    }

    public function blogview($id)
    {
        //$blogs = Bolgs::where('id', $id)->first();
        //return view('blogs.viewblog', ['blogs' => $blogs]);
    }

    


}
