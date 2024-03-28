<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\OrderLabority;
use App\Models\Labority;
use App\Models\CourseForm;
use App\Models\LaborityType;
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

class OrderLaborityController extends Controller
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
                //check patient phone no that it is already exist then get id else add new patient
                $checkPatientPhone = DB::table('patients')->where('patient_phone', $request->patient_phone)->get();
                if($checkPatientPhone->count() > 0){
                    $patient_id = $checkPatientPhone->first()->id;
                }else{
                    //Add new patient
                    $patient = new Patient();               
                    $patient->patient_fullname = $request->p_name;           
                    $patient->patient_gender = $request->p_gender;  
                    $patient->patient_phone = $request->patient_phone;  
                    $patient->password = Hash::make($request->password);  
                        
                    $patient->save();
                    $patient_id = $patient->id;
                }
            }

            $labority_slug = $request->laboratory_slug;

            $orderlabority = new OrderLabority();               
            $orderlabority->labority_id = $request->labority_id;
            $orderlabority->patient_id = $patient_id;
            $orderlabority->speciality_id = $request->speciality_id;
            $orderlabority->fees = $request->fees;
            $orderlabority->day = (int) $request->day;
            $orderlabority->ibft_no = $request->ibft_no;
            $orderlabority->comments  = $request->p_comments; 
            $orderlabority->save();

            Session::flash('message', 'Order Labority Submitted Successfully!!!');
            Session::flash('alert-class', 'alert-success');

            return redirect('laboratory/'.$labority_slug);
            //laboratory/dow-lab
        }
    }

    public function getSpecialityOfLabority(Request $request){
        if($request->method() == 'POST'){
            $labority_id = $request->labority_id;
           
            //get labority fees
            $laborityExist = DB::table('laborities')->where('id', $labority_id)->get(); 
            if($laborityExist){
                $fees = $laborityExist->first()->labority_fees;
            }else{
                $fees = '';
            }


            $laborityTimeExist = DB::table('laborities_timming')->where('labority_id', $labority_id)->get();    
            if($laborityTimeExist){
                $labority_time_lists = $laborityTimeExist;    
            }else{
                $labority_time_lists = false;
            }

            return json_encode(['department_lists'=>false, 'labority_time_lists'=>$labority_time_lists, 'fees'=>$fees]);
        }   
    }

    public function appointmentlabority_order_details($order_id){
        $orderExist = DB::table('order_laborities as od')
                                    ->join('patients as p', 'od.patient_id', 'p.id')
                                    ->join('laborities as d', 'od.labority_id', 'd.id')
                                    ->join('laborities_timming as dt', 'od.day', 'dt.dt_id')
                                    ->where('od.order_id', $order_id)->get();
        if($orderExist->count() > 0){
            $order = $orderExist->first(); 
            //echo '<pre>';
            //print_r($order);
            //die;
        }else{
            $order = false;    
        }
        return view('frontend.pages.labority_order_details', ['order' => $order]);
    }

    public function index()
    {
        $orderlaboritys = OrderLabority::all();
        return view('laboritys.labority', ['orderlaboritys' => $orderlaboritys]);
    }

    public function updateLaborityComments(Request $request){
        if($request->method() == 'POST'){
            $order_id  = $request->order_id;
            $dcomments = $request->dcomments;

            DB::table('order_laborities')->where('order_id', $order_id)->update(['dcomments'=>$dcomments]);   
            return json_encode(true);


            //return response()->json($request->all());
        }
    }
}
