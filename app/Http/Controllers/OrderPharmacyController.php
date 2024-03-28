<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\OrderPharmacy;
use App\Models\Pharmacy;
use App\Models\CourseForm;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Appointment;
use Illuminate\Http\Request;

class OrderPharmacyController extends Controller
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

            $pharmacy_slug = $request->pharmacy_slug;

            $orderpharmacy = new OrderPharmacy();               
            $orderpharmacy->pharmacy_id = $request->pharmacy_id;
            $orderpharmacy->patient_id = $patient_id;
            $orderpharmacy->speciality_id = $request->speciality_id;
            $orderpharmacy->fees = $request->fees;
            $orderpharmacy->day = (int) $request->day;
            $orderpharmacy->ibft_no = $request->ibft_no;
            $orderpharmacy->pres_details = $request->pres_details;
            $orderpharmacy->comments  = $request->p_comments; 
            $orderpharmacy->save();

            Session::flash('message', 'Order Pharmacy Submitted Successfully!!!');
            Session::flash('alert-class', 'alert-success');

            return redirect('pharmacy/'.$pharmacy_slug);
        }
    }

    public function getSpecialityOfPharmacy(Request $request){
        if($request->method() == 'POST'){
            $pharmacy_id = $request->pharmacy_id;
           
            //get pharmacy fees
            $pharmacyExist = DB::table('pharmacies')->where('id', $pharmacy_id)->get(); 
            if($pharmacyExist){
                $fees = $pharmacyExist->first()->pharmacy_fees;
            }else{
                $fees = '';
            }


            $pharmacyTimeExist = DB::table('pharmacies_timming')->where('pharmacy_id', $pharmacy_id)->get();    
            if($pharmacyTimeExist){
                $pharmacy_time_lists = $pharmacyTimeExist;    
            }else{
                $pharmacy_time_lists = false;
            }

            return json_encode(['department_lists'=>false, 'pharmacy_time_lists'=>$pharmacy_time_lists, 'fees'=>$fees]);
        }   
    }

    public function appointmentpharmacy_order_details($order_id){
        $orderExist = DB::table('order_pharmacies as od')
                                    ->join('patients as p', 'od.patient_id', 'p.id')
                                    ->join('pharmacies as d', 'od.pharmacy_id', 'd.id')
                                    
                                    ->where('od.order_id', $order_id)->get();
                                    //->join('pharmacies_timming as dt', 'od.day', 'dt.dt_id')
        if($orderExist->count() > 0){
            $order = $orderExist->first(); 
            //echo '<pre>';
            //print_r($order);
            //die;
        }else{
            $order = false;    
        }
        return view('frontend.pages.pharmacy_order_details', ['order' => $order]);
    }

    public function index()
    {
        $orderpharmacys = OrderPharmacy::all();
        return view('pharmacys.pharmacy', ['orderpharmacys' => $orderpharmacys]);
    }

    public function updatePharmacyComments(Request $request){
        if($request->method() == 'POST'){
            $order_id  = $request->order_id;
            $dcomments = $request->dcomments;

            DB::table('order_pharmacies')->where('order_id', $order_id)->update(['dcomments'=>$dcomments]);   
            return json_encode(true);


            //return response()->json($request->all());
        }
    }
}
