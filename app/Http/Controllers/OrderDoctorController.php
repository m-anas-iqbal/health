<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\OrderDoctor;
use App\Models\Doctor;
use App\Models\CourseForm;
use App\Models\DoctorType;
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

class OrderDoctorController extends Controller
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
            
            $orderdoctor = new OrderDoctor();               

            $orderdoctor->doctor_id = $request->doctor_id;
            $orderdoctor->patient_id = $patient_id;
            $orderdoctor->speciality_id = $request->speciality_id;
            $orderdoctor->fees = $request->fees;
            $orderdoctor->day = (int) $request->day;
            $orderdoctor->ibft_no = $request->ibft_no;
            $orderdoctor->comments  = $request->p_comments; 
            $orderdoctor->save();

            Session::flash('message', 'Order Submitted Successfully!!!');
            Session::flash('alert-class', 'alert-success');

            return redirect('appointment');
        }
    }

    public function getSpecialityOfDoctor(Request $request){
        if($request->method() == 'POST'){
            $doctor_id = $request->doctor_id;
            $deptExist = DB::table('doctors as do')
                                ->join('departments as dp', 'dp.id', 'do.doctor_specialty_id')
                                ->where('do.id', $doctor_id)
                                ->select('dp.id', 'dp.title', 'do.doctor_fees')
                                ->get();
            if($deptExist){
                $dept_lists = $deptExist;    
            }else{
                $dept_lists = false;
            }

            $doctorTimeExist = DB::table('doctors_timming')->where('doctor_id', $doctor_id)->get();    
            if($doctorTimeExist){
                $doctor_time_lists = $doctorTimeExist;    
            }else{
                $doctor_time_lists = false;
            }

            return json_encode(['department_lists'=>$dept_lists, 'doctor_time_lists'=>$doctor_time_lists]);
        }   
    }

    public function appointment_order_details($order_id){
        $orderExist = DB::table('order_doctors as od')
                                    ->join('patients as p', 'od.patient_id', 'p.id')
                                    ->join('doctors as d', 'od.doctor_id', 'd.id')
                                    ->join('departments as dp', 'od.speciality_id', 'dp.id')
                                    ->join('doctors_timming as dt', 'od.day', 'dt.dt_id')
                                    ->where('od.order_id', $order_id)->get();
        if($orderExist->count() > 0){
            $order = $orderExist->first(); 
            //echo '<pre>';
            //print_r($order);
            //die;
        }else{
            $order = false;    
        }
        return view('frontend.pages.appointment_order_details', ['order' => $order]);
    }

    public function index()
    {
        $orderdoctors = OrderDoctor::all();
        return view('doctors.doctor', ['orderdoctors' => $orderdoctors]);
    }

    public function updateDoctorComments(Request $request){
        if($request->method() == 'POST'){
            $order_id  = $request->order_id;
            $dcomments = $request->dcomments;

            DB::table('order_doctors')->where('order_id', $order_id)->update(['dcomments'=>$dcomments]);   
            return json_encode(true);


            //return response()->json($request->all());
        }
    }




}
