<?php

namespace App\Http\Controllers;


use App\Models\Labority;
use App\Models\CourseForm;
use App\Models\LaborityType;
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

class LaborityController extends Controller
{
    function check(Request $request)
    {
        //Validate Inputs
        $request->validate([
            'email' => 'required|email|exists:laboritys,email',
            'password' => 'required|min:2|max:30'
        ], [
            'email.exists' => 'This email is not exists.'
        ]);

        $creds = $request->only('email', 'password');

        if (Auth::guard('labority')->attempt($creds)) {

            $request->session()->put('laborityRole',  '1');

            //echo 'labority<pre>';
            //print_r(Auth::guard()->user());
            //die;

            return redirect()->route('labority.dashboard');
        } else {
            return redirect()->route('labority.login')->with('fail', 'Incorrect credentials');
        }
    }

    function logout()
    {
        Auth::guard('labority')->logout();
        return redirect()->route('labority.login');
    }

    public function index()
    {

        $laboritys = Labority::all();
        $laborityTypes = LaborityType::all();
        $hospitals = Hospital::all();
      
        $courseforms = CourseForm::all();
        return view('laborities.labority', ['laboritys' => $laboritys, 'laborityTypes' => $laborityTypes, 'hospitals' => $hospitals,'courseforms' => $courseforms]);
    }


    public function create()
    {
        $laboritys = Labority::all();
        $laborityTypes = LaborityType::all();
        $hospitals = Hospital::all();
        
        $departments = Departments::all();
        $courseforms = CourseForm::all();
        return view('laborities.addlabority', 
        [
            'laboritys' => $laboritys, 
            'laborityTypes' => $laborityTypes, 
            'hospitals' => $hospitals, 
            'departments' => $departments, 
            'courseforms' => $courseforms
        ]);
    }



    public function store(Request $request)
    {
        
        if ($request->method() == 'POST') {

            $labority = new Labority;

            $labority_hospital_id = isset($_POST['labority_hospital_id']) && is_array($_POST['labority_hospital_id']) ? $_POST['labority_hospital_id'] : [];
            
            
            $labority->labority_fullname = $request->input('labority_fullname');
            $labority->labority_slug = Str::slug($request->input('labority_fullname'));
            $labority->email = $request->input('email');
            
            $labority->labority_phone = $request->input('labority_phone');
            $labority->labority_details = $request->input('labority_details');
            

            $labority->labority_country = $request->input('labority_country');
            $labority->labority_city = $request->input('labority_city');
            $labority->labority_state = $request->input('labority_state');
           
           
            $labority->labority_laborityType_id = $request->input('labority_laborityType_id');
            $labority->password =  Hash::make($request->input('password'));
            $labority->labority_status = $request->input('labority_status');
            $labority->labority_address = $request->input('labority_address');

            if ($request->hasfile('labority_profileImage')) {
                $file = $request->file('labority_profileImage');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . "." . $extension;
                $file->move('uploads/laborityImagesSave/', $filename);
                $labority->labority_profileImage = $filename;
            } else {
                $labority->labority_profileImage = 'default.png';
            }


            if ($request->hasfile('labority_PMDC')) {
                $file = $request->file('labority_PMDC');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . "." . $extension;
                $file->move('uploads/laborityPMDCSave/', $filename);
                $labority->labority_PMDC = $filename;
            } else {
                $labority->labority_PMDC = '';
            }

            $labority->save();
            $labority_id = $labority->id;
            //$labority_id = 1;

            $maddress = $request->input('maddress');
            $day = $request->input('day_name');
            $st_time = $request->input('st_time');
            $end_time = $request->input('end_time');
            $time_status = $request->input('time_status');
            
            $time_data = [];            
            if(count($day) > 0){
                foreach($day as $i => $d){
                    $time_data = [
                        'labority_id'=>$labority_id,
                        'maddress'=>$maddress[$i],
                        'day'=>$day[$i],
                        'st_time'=>$st_time[$i],
                        'end_time'=>$end_time[$i],
                        'time_status'=>$time_status[$i],
                        'created_at'=>date('Y-m-d h:i:s')
                    ];  
                    DB::table('laborities_timming')->insert($time_data);
                }
            }

            Session::flash('message', 'labority Successfully Added!!!');
            Session::flash('alert-class', 'alert-success');

            return redirect()->route('admin.labority');
        }
    }

    //storeFrontLaboratory
    public function storeFrontLaboratory(Request $request)
    {
        
        if ($request->method() == 'POST') {

            $labority = new Labority;

            $labority_hospital_id = isset($_POST['labority_hospital_id']) && is_array($_POST['labority_hospital_id']) ? $_POST['labority_hospital_id'] : [];
            
            
            $labority->labority_fullname = $request->input('labority_fullname');
            $labority->labority_slug = Str::slug($request->input('labority_fullname'));
            $labority->email = $request->input('email');
            
            $labority->labority_phone = $request->input('labority_phone');
            $labority->labority_details = $request->input('labority_details');
            

            $labority->labority_country = $request->input('labority_country');
            $labority->labority_city = $request->input('labority_city');
            $labority->labority_state = $request->input('labority_state');
           
           
            $labority->labority_laborityType_id = $request->input('labority_laborityType_id');
            $labority->password =  Hash::make($request->input('password'));
            $labority->labority_status = $request->input('labority_status');
            $labority->labority_address = $request->input('labority_address');

            if ($request->hasfile('labority_profileImage')) {
                $file = $request->file('labority_profileImage');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . "." . $extension;
                $file->move('uploads/laborityImagesSave/', $filename);
                $labority->labority_profileImage = $filename;
            } else {
                $labority->labority_profileImage = 'default.png';
            }


            if ($request->hasfile('labority_PMDC')) {
                $file = $request->file('labority_PMDC');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . "." . $extension;
                $file->move('uploads/laborityPMDCSave/', $filename);
                $labority->labority_PMDC = $filename;
            } else {
                $labority->labority_PMDC = '';
            }

            $labority->save();
            $labority_id = $labority->id;
            //$labority_id = 1;

            $maddress = $request->input('maddress');
            $day = $request->input('day_name');
            $st_time = $request->input('st_time');
            $end_time = $request->input('end_time');
            $time_status = $request->input('time_status');
            
            $time_data = [];            
            if(count($day) > 0){
                foreach($day as $i => $d){
                    $time_data = [
                        'labority_id'=>$labority_id,
                        'maddress'=>$maddress[$i],
                        'day'=>$day[$i],
                        'st_time'=>$st_time[$i],
                        'end_time'=>$end_time[$i],
                        'time_status'=>$time_status[$i],
                        'created_at'=>date('Y-m-d h:i:s')
                    ];  
                    DB::table('laborities_timming')->insert($time_data);
                }
            }

            Session::flash('message', 'labority Successfully Added!!!');
            Session::flash('alert-class', 'alert-success');

            return redirect('laboratoryRegistration');
        }
    }


    public function edit($id)
    {

        $laboritys = Labority::where('id', $id)->first();
        $laborityTypes = LaborityType::all();
        $hospitals = Hospital::all();

        return view(
            'laborities.updatelabority',
            [
                'laboritys' => $laboritys,
                'laborityTypes' => $laborityTypes
            ]
        );

        
    }

    public function update(Request $request, $id)
    {

        if ($request->method() == 'POST') {
            $labority = Labority::where('id', $id)->first();
           

            $labority->labority_fullname = $request->input('labority_fullname');
           
            $labority->email = $request->input('email');
            
            $labority->labority_phone = $request->input('labority_phone');
            $labority->labority_details = $request->input('labority_details');

            $labority->labority_country = $request->input('labority_country');
            $labority->labority_city = $request->input('labority_city');
            $labority->labority_state = $request->input('labority_state');
           
            $labority->labority_laborityType_id = $request->input('labority_laborityType_id');
            $labority->labority_status = $request->input('labority_status');
            $labority->labority_address = $request->input('labority_address');

            //new and old password setting
            $password_new = $request->input('password');
            if($password_new != '' && strlen($password_new) > 2){
                $labority->password =  Hash::make($request->input('password')); 
            }
            
            if ($request->hasfile('labority_profileImage')) {
                $destination = 'uploads/laborityImagesSave/' . $labority->labority_profileImage;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
                $file = $request->file('labority_profileImage');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . "." . $extension;
                $file->move('uploads/LaborityImagesSave/', $filename);
                $labority->labority_profileImage = $filename;
            }


            if ($request->hasfile('labority_PMDC')) {
                $destination = 'uploads/LaborityPMDCSave/' . $labority->labority_PMDC;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
                $file = $request->file('labority_PMDC');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . "." . $extension;
                $file->move('uploads/laborityPMDCSave/', $filename);
                $labority->labority_PMDC = $filename;
            }

            $labority->update();

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
                    DB::table('laborities_timming')->where('dt_id', $e)->update($etime_data);
                }
            }

            $time_data = [];            
            if($day[0] != ''){
                foreach($day as $i => $d){
                    $time_data = [
                        'labority_id'=>$id,
                        'maddress'=>$maddress[$i],
                        'day'=>$day[$i],
                        'st_time'=>$st_time[$i],
                        'end_time'=>$end_time[$i],
                        'time_status'=>$time_status[$i],
                        'created_at'=>date('Y-m-d h:i:s')
                    ];  
                    DB::table('laborities_timming')->insert($time_data);
                }
            }

            Session::flash('message', 'Labority Updated!!!');
            Session::flash('alert-class', 'alert-success');

            if (Auth::guard()->user()->role == 12) {
                return redirect()->route('admin.laborityprofile', $id);
            } else if (Auth::guard()->user()->role == 1) {
                return redirect()->route('labority.profile');
            } else {
                return redirect();
            }
        }
    }

    //editLaborityRegistrationProcess
    public function editLaborityRegistrationProcess(Request $request)
    {

        if ($request->method() == 'POST') {
            $id = $request->input('id');
            $labority = Labority::where('id', $id)->first();
           

            $labority->labority_fullname = $request->input('labority_fullname');
           
            $labority->email = $request->input('email');
            
            $labority->labority_phone = $request->input('labority_phone');
            $labority->labority_details = $request->input('labority_details');

            $labority->labority_country = $request->input('labority_country');
            $labority->labority_city = $request->input('labority_city');
            $labority->labority_state = $request->input('labority_state');
           
            $labority->labority_laborityType_id = $request->input('labority_laborityType_id');
            $labority->labority_status = 'Active';
            $labority->labority_address = $request->input('labority_address');

            //new and old password setting
            $password_new = $request->input('password');
            if($password_new != '' && strlen($password_new) > 2){
                $labority->password =  Hash::make($request->input('password')); 
            }
            
            if ($request->hasfile('labority_profileImage')) {
                $destination = 'uploads/laborityImagesSave/' . $labority->labority_profileImage;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
                $file = $request->file('labority_profileImage');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . "." . $extension;
                $file->move('uploads/LaborityImagesSave/', $filename);
                $labority->labority_profileImage = $filename;
            }


            if ($request->hasfile('labority_PMDC')) {
                $destination = 'uploads/LaborityPMDCSave/' . $labority->labority_PMDC;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
                $file = $request->file('labority_PMDC');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . "." . $extension;
                $file->move('uploads/laborityPMDCSave/', $filename);
                $labority->labority_PMDC = $filename;
            }

            $labority->update();

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
                    DB::table('laborities_timming')->where('dt_id', $e)->update($etime_data);
                }
            }

            $time_data = [];            
            if($day[0] != ''){
                foreach($day as $i => $d){
                    $time_data = [
                        'labority_id'=>$id,
                        'maddress'=>$maddress[$i],
                        'day'=>$day[$i],
                        'st_time'=>$st_time[$i],
                        'end_time'=>$end_time[$i],
                        'time_status'=>$time_status[$i],
                        'created_at'=>date('Y-m-d h:i:s')
                    ];  
                    DB::table('laborities_timming')->insert($time_data);
                }
            }

            Session::flash('message', 'Labority Updated!!!');
            Session::flash('alert-class', 'alert-success');

            /*if (Auth::guard()->user()->role == 12) {
                return redirect()->route('admin.laborityprofile', $id);
            } else if (Auth::guard()->user()->role == 1) {
                return redirect()->route('labority.profile');
            } else {
                return redirect();
            }*/

            return redirect('/frontlabority/editLaborityRegistration/'.$id);
        }
    }

    public function delete(Request $request)
    {
        if ($request->method() == 'POST') {
            Labority::where('id', $request->id)->delete();
            return true;
        }
    }

    public function laborityStatus(Request $request)
    {
        if ($request->method() == 'POST') {
            labority::where('id', $request->id)->update(['labority_status' =>  $request->labority_status]);
            return true;
        }
    }
    public function dashboard()
    {
        $id = Auth::guard()->user()->id;
            $appointments = Appointment::where('appointment_laborityID','=',$id)->count();
        return view('dashboard.labority.dashboard', ['appointments' => $appointments]);

    }

    public function profile($id)
    {

        // $laboritys = labority::where('id', $id)->first();
        // $laborityTypes = laborityType::all();
        // $hospitals = Hospital::all();
        // $specialties = Specialty::all();
        // $courseforms = CourseForm::all();
        // return view('laborities.profile', ['laboritys' => $laboritys, 'laborityTypes' => $laborityTypes, 'hospitals' => $hospitals, 'specialties' => $specialties, 'courseforms' => $courseforms]);
        $laboritys = Labority::where('id', $id)->first();
        $laborityTypes = LaborityType::all();
        $hospitals = Hospital::all();
        //$specialties = Specialty::all();

        return view(
            'laborities.profile',
            [
                'laboritys' => $laboritys,
                'laborityTypes' => $laborityTypes
            ]
        );
    }


    

    public function Laborityprofile()
    {
        $id = Auth::guard()->user()->id;
        $laboritys = Labority::where('id', $id)->first();
        $laborityTypes = LaborityType::all();
        return view(
           'laborities.profile',
            [
                'laboritys' => $laboritys,
                'laborityTypes' => $laborityTypes
            ]
        );
    }
    public function appointment()
    {
        $id = Auth::guard()->user()->id;
        $appointments = DB::table('laboritys')
            ->join('appointments', 'appointments.appointment_laborityID', '=', 'laborities.id')
            ->select('*')
            ->where('appointment_laborityID', $id)
            ->get();
        return view('dashboard.labority.laborityappointment', ['appointments' => $appointments]);
    }
}
