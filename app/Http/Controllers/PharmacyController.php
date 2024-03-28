<?php

namespace App\Http\Controllers;


use App\Models\Pharmacy;
use App\Models\CourseForm;

use App\Models\Hospital;

use App\Models\Departments;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use App\Models\Appointment;
use Illuminate\Http\Request;

class PharmacyController extends Controller
{
    function check(Request $request)
    {
        //Validate Inputs
        $request->validate([
            'email' => 'required|email|exists:pharmacys,email',
            'password' => 'required|min:2|max:30'
        ], [
            'email.exists' => 'This email is not exists.'
        ]);

        $creds = $request->only('email', 'password');

        if (Auth::guard('pharmacy')->attempt($creds)) {

            $request->session()->put('pharmacyRole',  '1');

            //echo 'pharmacy<pre>';
            //print_r(Auth::guard()->user());
            //die;

            return redirect()->route('pharmacy.dashboard');
        } else {
            return redirect()->route('pharmacy.login')->with('fail', 'Incorrect credentials');
        }
    }

    function logout()
    {
        Auth::guard('pharmacy')->logout();
        return redirect()->route('pharmacy.login');
    }

    public function index()
    {
        $pharmacys = Pharmacy::all();
        $hospitals = Hospital::all();
        $courseforms = CourseForm::all();
        return view('pharmacies.pharmacy', ['pharmacys' => $pharmacys, 'hospitals' => $hospitals, 'courseforms' => $courseforms]);
    }


    public function create()
    {
        $pharmacys = Pharmacy::all();
        
        $hospitals = Hospital::all();
        
        $departments = Departments::all();
        $courseforms = CourseForm::all();
        return view('pharmacies.addpharmacy', 
        [
            'pharmacys' => $pharmacys, 
            
            'hospitals' => $hospitals, 
            'departments' => $departments, 
            'courseforms' => $courseforms
        ]);
    }



    public function store(Request $request)
    {
        
        if ($request->method() == 'POST') {

            $pharmacy = new Pharmacy;

            $pharmacy_hospital_id = isset($_POST['pharmacy_hospital_id']) && is_array($_POST['pharmacy_hospital_id']) ? $_POST['pharmacy_hospital_id'] : [];
            
            
            $pharmacy->pharmacy_fullname = $request->input('pharmacy_fullname');
            $pharmacy->pharmacy_slug = Str::slug($request->input('pharmacy_fullname'));
            $pharmacy->email = $request->input('email');
            
            $pharmacy->pharmacy_phone = $request->input('pharmacy_phone');
            $pharmacy->pharmacy_details = $request->input('pharmacy_details');
            

            $pharmacy->pharmacy_country = $request->input('pharmacy_country');
            $pharmacy->pharmacy_city = $request->input('pharmacy_city');
            $pharmacy->pharmacy_state = $request->input('pharmacy_state');
           
           

            $pharmacy->password =  Hash::make($request->input('password'));
            $pharmacy->pharmacy_status = $request->input('pharmacy_status');
            $pharmacy->pharmacy_address = $request->input('pharmacy_address');

            if ($request->hasfile('pharmacy_profileImage')) {
                $file = $request->file('pharmacy_profileImage');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . "." . $extension;
                $file->move('uploads/pharmacyImagesSave/', $filename);
                $pharmacy->pharmacy_profileImage = $filename;
            } else {
                $pharmacy->pharmacy_profileImage = 'default.png';
            }


            if ($request->hasfile('pharmacy_PMDC')) {
                $file = $request->file('pharmacy_PMDC');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . "." . $extension;
                $file->move('uploads/pharmacyPMDCSave/', $filename);
                $pharmacy->pharmacy_PMDC = $filename;
            } else {
                $pharmacy->pharmacy_PMDC = '';
            }

            $pharmacy->save();
            $pharmacy_id = $pharmacy->id;
            //$pharmacy_id = 1;

            $maddress = $request->input('maddress');
            $day = $request->input('day_name');
            $st_time = $request->input('st_time');
            $end_time = $request->input('end_time');
            $time_status = $request->input('time_status');
            
            $time_data = [];            
            if(count($day) > 0){
                foreach($day as $i => $d){
                    $time_data = [
                        'pharmacy_id'=>$pharmacy_id,
                        'maddress'=>$maddress[$i],
                        'day'=>$day[$i],
                        'st_time'=>$st_time[$i],
                        'end_time'=>$end_time[$i],
                        'time_status'=>$time_status[$i],
                        'created_at'=>date('Y-m-d h:i:s')
                    ];  
                    DB::table('pharmacies_timming')->insert($time_data);
                }
            }

            Session::flash('message', 'Pharmacy Successfully Added!!!');
            Session::flash('alert-class', 'alert-success');

            return redirect()->route('admin.pharmacy');
        }
    }

    //storeFrontPharmacy
    public function storeFrontPharmacy(Request $request)
    {
        
        if ($request->method() == 'POST') {

            $pharmacy = new Pharmacy;

            $pharmacy_hospital_id = isset($_POST['pharmacy_hospital_id']) && is_array($_POST['pharmacy_hospital_id']) ? $_POST['pharmacy_hospital_id'] : [];
            
            
            $pharmacy->pharmacy_fullname = $request->input('pharmacy_fullname');
            $pharmacy->pharmacy_slug = Str::slug($request->input('pharmacy_fullname'));
            $pharmacy->email = $request->input('email');
            
            $pharmacy->pharmacy_phone = $request->input('pharmacy_phone');
            $pharmacy->pharmacy_details = $request->input('pharmacy_details');
            

            $pharmacy->pharmacy_country = $request->input('pharmacy_country');
            $pharmacy->pharmacy_city = $request->input('pharmacy_city');
            $pharmacy->pharmacy_state = $request->input('pharmacy_state');
           
           

            $pharmacy->password =  Hash::make($request->input('password'));
            $pharmacy->pharmacy_status = $request->input('pharmacy_status');
            $pharmacy->pharmacy_address = $request->input('pharmacy_address');

            if ($request->hasfile('pharmacy_profileImage')) {
                $file = $request->file('pharmacy_profileImage');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . "." . $extension;
                $file->move('uploads/pharmacyImagesSave/', $filename);
                $pharmacy->pharmacy_profileImage = $filename;
            } else {
                $pharmacy->pharmacy_profileImage = 'default.png';
            }


            if ($request->hasfile('pharmacy_PMDC')) {
                $file = $request->file('pharmacy_PMDC');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . "." . $extension;
                $file->move('uploads/pharmacyPMDCSave/', $filename);
                $pharmacy->pharmacy_PMDC = $filename;
            } else {
                $pharmacy->pharmacy_PMDC = '';
            }

            $pharmacy->save();
            $pharmacy_id = $pharmacy->id;
            //$pharmacy_id = 1;

            $maddress = $request->input('maddress');
            $day = $request->input('day_name');
            $st_time = $request->input('st_time');
            $end_time = $request->input('end_time');
            $time_status = $request->input('time_status');
            
            $time_data = [];            
            if(count($day) > 0){
                foreach($day as $i => $d){
                    $time_data = [
                        'pharmacy_id'=>$pharmacy_id,
                        'maddress'=>$maddress[$i],
                        'day'=>$day[$i],
                        'st_time'=>$st_time[$i],
                        'end_time'=>$end_time[$i],
                        'time_status'=>$time_status[$i],
                        'created_at'=>date('Y-m-d h:i:s')
                    ];  
                    DB::table('pharmacies_timming')->insert($time_data);
                }
            }

            Session::flash('message', 'Pharmacy Successfully Added!!!');
            Session::flash('alert-class', 'alert-success');

            return redirect('pharmacyRegistration');
        }
    }


    public function edit($id)
    {

        $pharmacys = Pharmacy::where('id', $id)->first();
        
        $hospitals = Hospital::all();

        return view('pharmacies.updatepharmacy',['pharmacys' => $pharmacys]
        );

        
    }

    public function update(Request $request, $id)
    {

        if ($request->method() == 'POST') {
            $pharmacy = Pharmacy::where('id', $id)->first();
           

            $pharmacy->pharmacy_fullname = $request->input('pharmacy_fullname');
           
            $pharmacy->email = $request->input('email');
            
            $pharmacy->pharmacy_phone = $request->input('pharmacy_phone');
            $pharmacy->pharmacy_details = $request->input('pharmacy_details');

            $pharmacy->pharmacy_country = $request->input('pharmacy_country');
            $pharmacy->pharmacy_city = $request->input('pharmacy_city');
            $pharmacy->pharmacy_state = $request->input('pharmacy_state');
           
     
            $pharmacy->pharmacy_status = $request->input('pharmacy_status');
            $pharmacy->pharmacy_address = $request->input('pharmacy_address');

            //new and old password setting
            $password_new = $request->input('password');
            if($password_new != '' && strlen($password_new) > 2){
                $pharmacy->password =  Hash::make($request->input('password')); 
            }
            
            if ($request->hasfile('pharmacy_profileImage')) {
                $destination = 'uploads/pharmacyImagesSave/' . $pharmacy->pharmacy_profileImage;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
                $file = $request->file('pharmacy_profileImage');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . "." . $extension;
                $file->move('uploads/PharmacyImagesSave/', $filename);
                $pharmacy->pharmacy_profileImage = $filename;
            }


            if ($request->hasfile('pharmacy_PMDC')) {
                $destination = 'uploads/PharmacyPMDCSave/' . $pharmacy->pharmacy_PMDC;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
                $file = $request->file('pharmacy_PMDC');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . "." . $extension;
                $file->move('uploads/pharmacyPMDCSave/', $filename);
                $pharmacy->pharmacy_PMDC = $filename;
            }

            $pharmacy->update();

            $maddress = $request->input('maddress');
            $day = $request->input('day_name');
            $st_time = $request->input('st_time');
            $end_time = $request->input('end_time');
            $time_status = $request->input('time_status');

            $emaddress = isset($_POST['emaddress'])  ? $_POST['emaddress'] : 0;
            $eday = isset($_POST['eday_name'])  ? $_POST['eday_name'] : 0;
            $est_time = isset($_POST['est_time'])  ? $_POST['est_time'] : 0;
            $eend_time = isset($_POST['eend_time'])  ? $_POST['eend_time'] : 0;
            $etime_status = isset($_POST['etime_status'])  ? $_POST['etime_status'] : 0;

            $etime_data = [];            
            if(isset($_POST['eday_name'])){
                foreach($eday as $e => $ed){
                    $etime_data = [
                        'maddress'=>$emaddress[$e],
                        'day'=>$eday[$e],
                        'st_time'=>$est_time[$e],
                        'end_time'=>$eend_time[$e],
                        'time_status'=>$etime_status[$e],
                        'modified_at'=>date('Y-m-d h:i:s')
                    ];  
                    DB::table('pharmacies_timming')->where('dt_id', $e)->update($etime_data);
                }
            }

            $time_data = [];            
            if($day[0] != ''){
                foreach($day as $i => $d){
                    $time_data = [
                        'pharmacy_id'=>$id,
                        'maddress'=>$maddress[$i],
                        'day'=>$day[$i],
                        'st_time'=>$st_time[$i],
                        'end_time'=>$end_time[$i],
                        'time_status'=>$time_status[$i],
                        'created_at'=>date('Y-m-d h:i:s')
                    ];  
                    DB::table('pharmacies_timming')->insert($time_data);
                }
            }

            Session::flash('message', 'Pharmacy Updated!!!');
            Session::flash('alert-class', 'alert-success');

            if (Auth::guard()->user()->role == 12) {
                return redirect()->route('admin.pharmacyprofile', $id);
            } else if (Auth::guard()->user()->role == 1) {
                return redirect()->route('pharmacy.profile');
            } else {
                return redirect();
            }
        }
    }

    //editPharmacyRegistrationProcess
    public function editPharmacyRegistrationProcess(Request $request){
        if ($request->method() == 'POST') {
            $id = $request->input('id');
            $pharmacy = Pharmacy::where('id', $id)->first();
           

            $pharmacy->pharmacy_fullname = $request->input('pharmacy_fullname');
           
            $pharmacy->email = $request->input('email');
            
            $pharmacy->pharmacy_phone = $request->input('pharmacy_phone');
            $pharmacy->pharmacy_details = $request->input('pharmacy_details');

            $pharmacy->pharmacy_country = $request->input('pharmacy_country');
            $pharmacy->pharmacy_city = $request->input('pharmacy_city');
            $pharmacy->pharmacy_state = $request->input('pharmacy_state');
           
     
            $pharmacy->pharmacy_status = $request->input('pharmacy_status');
            $pharmacy->pharmacy_address = $request->input('pharmacy_address');

            //new and old password setting
            $password_new = $request->input('password');
            if($password_new != '' && strlen($password_new) > 2){
                $pharmacy->password =  Hash::make($request->input('password')); 
            }
            
            if ($request->hasfile('pharmacy_profileImage')) {
                $destination = 'uploads/pharmacyImagesSave/' . $pharmacy->pharmacy_profileImage;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
                $file = $request->file('pharmacy_profileImage');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . "." . $extension;
                $file->move('uploads/PharmacyImagesSave/', $filename);
                $pharmacy->pharmacy_profileImage = $filename;
            }


            if ($request->hasfile('pharmacy_PMDC')) {
                $destination = 'uploads/PharmacyPMDCSave/' . $pharmacy->pharmacy_PMDC;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
                $file = $request->file('pharmacy_PMDC');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . "." . $extension;
                $file->move('uploads/pharmacyPMDCSave/', $filename);
                $pharmacy->pharmacy_PMDC = $filename;
            }

            $pharmacy->update();

            $maddress = $request->input('maddress');
            $day = $request->input('day_name');
            $st_time = $request->input('st_time');
            $end_time = $request->input('end_time');
            $time_status = $request->input('time_status');

            $emaddress = isset($_POST['emaddress'])  ? $_POST['emaddress'] : 0;
            $eday = isset($_POST['eday_name'])  ? $_POST['eday_name'] : 0;
            $est_time = isset($_POST['est_time'])  ? $_POST['est_time'] : 0;
            $eend_time = isset($_POST['eend_time'])  ? $_POST['eend_time'] : 0;
            $etime_status = isset($_POST['etime_status'])  ? $_POST['etime_status'] : 0;

            $etime_data = [];            
            if(isset($_POST['eday_name'])){
                foreach($eday as $e => $ed){
                    $etime_data = [
                        'maddress'=>$emaddress[$e],
                        'day'=>$eday[$e],
                        'st_time'=>$est_time[$e],
                        'end_time'=>$eend_time[$e],
                        'time_status'=>$etime_status[$e],
                        'modified_at'=>date('Y-m-d h:i:s')
                    ];  
                    DB::table('pharmacies_timming')->where('dt_id', $e)->update($etime_data);
                }
            }

            $time_data = [];            
            if($day[0] != ''){
                foreach($day as $i => $d){
                    $time_data = [
                        'pharmacy_id'=>$id,
                        'maddress'=>$maddress[$i],
                        'day'=>$day[$i],
                        'st_time'=>$st_time[$i],
                        'end_time'=>$end_time[$i],
                        'time_status'=>$time_status[$i],
                        'created_at'=>date('Y-m-d h:i:s')
                    ];  
                    DB::table('pharmacies_timming')->insert($time_data);
                }
            }

            Session::flash('message', 'Pharmacy Updated!!!');
            Session::flash('alert-class', 'alert-success');

            /*if (Auth::guard()->user()->role == 12) {
                return redirect()->route('admin.pharmacyprofile', $id);
            } else if (Auth::guard()->user()->role == 1) {
                return redirect()->route('pharmacy.profile');
            } else {
                return redirect();
            }*/

            return redirect('frontpharmacy/editPharmacyRegistration/'.$id);
        }
    }

    public function delete(Request $request)
    {
        if ($request->method() == 'POST') {
            Pharmacy::where('id', $request->id)->delete();
            return true;
        }
    }

    public function pharmacyStatus(Request $request)
    {
        if ($request->method() == 'POST') {
            Pharmacy::where('id', $request->id)->update(['pharmacy_status' =>  $request->pharmacy_status]);
            return true;
        }
    }
    public function dashboard()
    {
        $id = Auth::guard()->user()->id;
            $appointments = Appointment::where('appointment_pharmacyID','=',$id)->count();
        return view('dashboard.pharmacy.dashboard', ['appointments' => $appointments]);

    }

    public function profile($id)
    {

        // $pharmacys = pharmacy::where('id', $id)->first();
        // $pharmacyTypes = pharmacyType::all();
        // $hospitals = Hospital::all();
        // $specialties = Specialty::all();
        // $courseforms = CourseForm::all();
        // return view('pharmacies.profile', ['pharmacys' => $pharmacys, 'pharmacyTypes' => $pharmacyTypes, 'hospitals' => $hospitals, 'specialties' => $specialties, 'courseforms' => $courseforms]);
        $pharmacys = Pharmacy::where('id', $id)->first();
        
        $hospitals = Hospital::all();
        //$specialties = Specialty::all();

        return view(
            'pharmacies.profile',
            [
                'pharmacys' => $pharmacys,
                
            ]
        );
    }

    public function Pharmacyprofile()
    {
        $id = Auth::guard()->user()->id;
        $pharmacys = Pharmacy::where('id', $id)->first();
        
        return view(
           'pharmacies.profile',
            [
                'pharmacys' => $pharmacys,
               
            ]
        );
    }
    public function appointment()
    {
        $id = Auth::guard()->user()->id;
        $appointments = DB::table('pharmacys')
            ->join('appointments', 'appointments.appointment_pharmacyID', '=', 'pharmacies.id')
            ->select('*')
            ->where('appointment_pharmacyID', $id)
            ->get();
        return view('dashboard.pharmacy.pharmacyappointment', ['appointments' => $appointments]);
    }

    
}
