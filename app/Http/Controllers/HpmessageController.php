<?php

namespace App\Http\Controllers;

use App\Models\Hpmessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use DB;

class HpmessageController extends Controller
{
       public function index()
    {

     $hpmessages = Hpmessage::all();
    
    return view('hpmessage.hpmessage', ['hpmessages' => $hpmessages]);

    }

  public function create()
    {
        return view('hpmessage.addhpmessage');
    }


     public function store(Request $request)
    {
        if ($request->method() == 'POST') {
         

            $hpmessages = new Hpmessage;
            $hpmessages->main_heading = $request->input('main_heading');
            $hpmessages->status = $request->input('status');
            $hpmessages->show_on_hp = $request->input('show_on_hp');

            $hpmessages->description = $request->input('description');
            $hpmessages->heading1 = $request->input('heading_1');

            $hpmessages->description1 = $request->input('description_1');
            $hpmessages->heading2 = $request->input('heading_2');
            $hpmessages->description2 = $request->input('description_2');
            $hpmessages->heading3 = $request->input('heading_3');
            $hpmessages->description3 = $request->input('description_3');

            $hpmessages->sort1 = $request->input('sort_1');
            $hpmessages->sort2 = $request->input('sort_2');
            $hpmessages->sort3 = $request->input('sort_3');
            $slug1 = Str::slug($request->input('heading_1'));
            $slug2 = Str::slug($request->input('heading_2'));
            $slug3 = Str::slug($request->input('heading_3'));
            $hpmessages->slug1 =  $slug1;
            $hpmessages->slug2 = $slug2;
            $hpmessages->slug3 = $slug3;



            if ($request->hasfile('image_1')) {
                $file1 = $request->file('image_1');
                $extension = $file1->getClientOriginalExtension();
                $filename1 = rand(1111111, 9999999)  . "." . $extension;
                $file1->move('public/uploads/hpmessageImages/', $filename1);
                $hpmessages->image1 = $filename1;
            } else {
                $hpmessages->image1 = '';
            }

             if ($request->hasfile('image_2')) {
                $file2 = $request->file('image_2');
                $extension = $file2->getClientOriginalExtension();
                $filename2 = rand(1111111, 9999999)  . "." . $extension;
                $file2->move('public/uploads/hpmessageImages/', $filename2);
                $hpmessages->image2 = $filename2;
            } else {
                $hpmessages->image2 = '';
            }


             if ($request->hasfile('image_3')) {
                $file3 = $request->file('image_3');
                $extension = $file3->getClientOriginalExtension();
                $filename3 = rand(1111111, 9999999)  . "." . $extension;
                $file3->move('public/uploads/hpmessageImages/', $filename3);
                $hpmessages->image3 = $filename3;
            } else {
                $hpmessages->image3 = '';
            }

            //Disable all hpmessages if this new slider will show on home page    
            if($request->input('show_on_hp') == 1){
                //DB::table('hpmessages')->update(['show_on_hp'=>0]);
            }     
            

            $hpmessages->save();

            Session::flash('message', 'Successfully Added!!!');
            Session::flash('alert-class', 'alert-success');
             return redirect()->route('admin.hpmessage');
        }
    }


     public function edit($id)
    {
        $hpmessages = Hpmessage::where('id', $id)->first();
        return view('hpmessage.updatehpmessage', ['hpmessages' => $hpmessages]);
    }



    public function update(Request $request, $id)
    {
        if ($request->method() == 'POST') {
            //dd($request->all());
            $messageExist = Hpmessage::where('id', $id)->get();
            if($messageExist){
                //Disable all hpmessages if this new slider will show on home page    
                 if($request->input('show_on_hp') == 1){
                    //DB::table('hpmessages')->update(['show_on_hp'=>0]);
                } 

                $hpmessages = $messageExist->first();
                $hpmessages->main_heading = $request->input('main_heading');
                $hpmessages->status = $request->input('status');
                $hpmessages->show_on_hp = $request->input('show_on_hp');

                $hpmessages->description = $request->input('description');
                $hpmessages->heading1 = $request->input('heading_1');
                 $hpmessages->description1 = $request->input('description_1');
                 $hpmessages->heading2 = $request->input('heading_2');
                 $hpmessages->description2 = $request->input('description_2');
                 $hpmessages->heading3 = $request->input('heading_3');
                 $hpmessages->description3 = $request->input('description_3');

            $hpmessages->sort1 = $request->input('sort_1');
            $hpmessages->sort2 = $request->input('sort_2');
            $hpmessages->sort3 = $request->input('sort_3');
                
            $slug1 = Str::slug($request->input('heading_1'));
            $slug2 = Str::slug($request->input('heading_2'));
            $slug3 = Str::slug($request->input('heading_3'));
            $hpmessages->slug1 =  $slug1;
            $hpmessages->slug2 = $slug2;
            $hpmessages->slug3 = $slug3;

               

                
                if ($request->hasfile('image_1')) {
                    $destination1 = 'public/uploads/hpmessageImages/' . $hpmessages->image1;
                    if (File::exists($destination1)) {
                        File::delete($destination1);
                    }
                    $file1 = $request->file('image_1');
                    $extension = $file1->getClientOriginalExtension();
                    $filename1 = rand(1111111, 9999999) . "." . $extension;
                    $upload=$file1->move('public/uploads/hpmessageImages/', $filename1);
                    if($upload)
                    {
                    $hpmessages->image1 = $filename1;
                }
                }
               

                if ($request->hasfile('image_2')) {
                    $destination2 = 'public/uploads/hpmessageImages/' . $hpmessages->image2;
                    if (File::exists($destination2)) {
                        File::delete($destination2);
                    }
                    $file2 = $request->file('image_2');
                    $extension = $file2->getClientOriginalExtension();
                    $filename2 = rand(1111111, 9999999) . "." . $extension;
                    $file2->move('public/uploads/hpmessageImages/', $filename2);
                    $hpmessages->image2 = $filename2;
                }


                 if ($request->hasfile('image_3')) {
                    $destination3 = 'public/uploads/hpmessageImages/' . $hpmessages->image3;
                    if (File::exists($destination3)) {
                        File::delete($destination3);
                    }
                    $file3 = $request->file('image_3');
                    $extension = $file3->getClientOriginalExtension();
                    $filename3 = rand(1111111, 9999999) . "." . $extension;
                   $uploads= $file3->move('public/uploads/hpmessageImages/', $filename3);
                 
                    $hpmessages->image3 = $filename3;
                
                }

                

                $hpmessages->update();
                 
                Session::flash('message', 'Message Updated Successfully');
                Session::flash('alert-class', 'alert-success');
            }else{
                Session::flash('message', 'Message Not Update');
                Session::flash('alert-class', 'alert-danger');
            }
            
            
            return redirect()->route('admin.hpmessage');
        }
    
}




       public function delete(Request $request)
    {
        if ($request->method() == 'POST') {
            Hpmessage::where('id', $request->id)->delete();
            return true;
        }
    }


        public function hpmessageview($id)
    {
        $hpmessages = Hpmessage::where('id', $id)->first();
        return view('hpmessage.viewhpmessage', ['hpmessages' => $hpmessages]);
    }

 

 
}
