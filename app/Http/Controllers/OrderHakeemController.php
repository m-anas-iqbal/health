<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\OrderHakeem;
use App\Models\Hakeem;
use App\Models\CourseForm;
use App\Models\HakeemType;
use App\Models\Hospital;
use App\Models\Specialty;
use App\Models\Departments;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Appointment;
use Illuminate\Http\Request;

class OrderHakeemController extends Controller
{
    /*
    * Front End Appointment
    */
    public function checkAppointment(Request $request){
        if($request->method() == 'POST'){

            $request->validate([
                'patient_phone'=>'required'
            ]);
            
            if(Auth::guard('frontpatient')->user()){
                $patient_id = Auth::guard('frontpatient')->user()->id;
            }else{
                $patient = new Patient();               
                $patient->patient_fullname = $request->p_name;           
                $patient->patient_gender = $request->p_gender;  
                $patient->patient_phone = $request->patient_phone;  
                $patient->password = Hash::make($request->password);  
                
                $patient->save();
                $patient_id = $patient->id;
            }
            
            $orderhakeem = new OrderHakeem();               

            $orderhakeem->hakeem_id = $request->hakeem_id;
            $orderhakeem->patient_id = $patient_id;
            $orderhakeem->speciality_id = $request->speciality_id;
            $orderhakeem->fees = $request->fees;
            $orderhakeem->day = (int) $request->day;
            $orderhakeem->ibft_no = $request->ibft_no;
            $orderhakeem->comments  = $request->p_comments; 
            $orderhakeem->save();

            Session::flash('message', 'Order Hakeem Submitted Successfully!!!');
            Session::flash('alert-class', 'alert-success');

            return redirect('hakeemonline');
        }
    }

    public function getSpecialityOfHakeem(Request $request){
        if($request->method() == 'POST'){
            $hakeem_id = $request->hakeem_id;
           
            //get hakeem fees
            $hakeemExist = DB::table('hakeems')->where('id', $hakeem_id)->get(); 
            if($hakeemExist){
                $fees = $hakeemExist->first()->hakeem_fees;
            }else{
                $fees = '';
            }


            $hakeemTimeExist = DB::table('hakeems_timming')->where('hakeem_id', $hakeem_id)->get();    
            if($hakeemTimeExist){
                $hakeem_time_lists = $hakeemTimeExist;    
            }else{
                $hakeem_time_lists = false;
            }

            return json_encode(['department_lists'=>false, 'hakeem_time_lists'=>$hakeem_time_lists, 'fees'=>$fees]);
        }   
    }

    public function appointmenthakeem_order_details($order_id){
        $orderExist = DB::table('order_hakeems as od')
                                    ->join('patients as p', 'od.patient_id', 'p.id')
                                    ->join('hakeems as d', 'od.hakeem_id', 'd.id')
                                    
                                    ->join('hakeems_timming as dt', 'od.day', 'dt.dt_id')
                                    ->where('od.order_id', $order_id)->get();
        if($orderExist->count() > 0){
            $order = $orderExist->first(); 
            //echo '<pre>';
            //print_r($order);
            //die;
        }else{
            $order = false;    
        }
        return view('frontend.pages.hakeemonline_order_details', ['order' => $order]);
    }

    public function index()
    {
        $orderhakeems = OrderHakeem::all();
        return view('hakeems.hakeem', ['orderhakeems' => $orderhakeems]);
    }

    public function updateHakeemComments(Request $request){
        if($request->method() == 'POST'){
            $order_id  = $request->order_id;
            $dcomments = $request->dcomments;

            DB::table('order_hakeems')->where('order_id', $order_id)->update(['dcomments'=>$dcomments]);   
            return json_encode(true);


            //return response()->json($request->all());
        }
    }
}
