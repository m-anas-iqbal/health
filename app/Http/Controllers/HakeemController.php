<?php

namespace App\Http\Controllers;

use App\Models\Hakeem;
use App\Models\CourseForm;
use App\Models\HakeemType;
use App\Models\Hospital;

use App\Models\Departments;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Appointment;
use Illuminate\Http\Request;

class HakeemController extends Controller
{
    function check(Request $request)
    {
        //Validate Inputs
        $request->validate([
            'email' => 'required|email|exists:hakeems,email',
            'password' => 'required|min:2|max:30'
        ], [
            'email.exists' => 'This email is not exists.'
        ]);

        $creds = $request->only('email', 'password');

        if (Auth::guard('hakeem')->attempt($creds)) {

            $request->session()->put('hakeemRole',  '1');

            //echo 'hakeem<pre>';
            //print_r(Auth::guard()->user());
            //die;

            return redirect()->route('hakeem.dashboard');
        } else {
            return redirect()->route('hakeem.login')->with('fail', 'Incorrect credentials');
        }
    }

    function logout()
    {
        Auth::guard('hakeem')->logout();
        return redirect()->route('hakeem.login');
    }

    public function index()
    {

        $hakeems = Hakeem::all();
        $hakeemTypes = HakeemType::all();
        $hospitals = Hospital::all();
      
        $courseforms = CourseForm::all();
        return view('hakeems.hakeem', ['hakeems' => $hakeems, 'hakeemTypes' => $hakeemTypes, 'hospitals' => $hospitals,'courseforms' => $courseforms]);
    }


    public function create()
    {
        $hakeems = Hakeem::all();
        $hakeemTypes = HakeemType::all();
        $hospitals = Hospital::all();
        
        $departments = Departments::all();
        $courseforms = CourseForm::all();
        return view('hakeems.addhakeem', 
        [
            'hakeems' => $hakeems, 
            'hakeemTypes' => $hakeemTypes, 
            'hospitals' => $hospitals, 
            'departments' => $departments, 
            'courseforms' => $courseforms
        ]);
    }



    public function store(Request $request)
    {
        
        if ($request->method() == 'POST') {

            
            /*
                [day_name] => Array
                (
                    [0] => 1
                    [1] => 2
                )

                [st_time] => Array
                    (
                        [0] => 12:46
                        [1] => 03:50
                    )

                [end_time] => Array
                    (
                        [0] => 01:47
                        [1] => 05:52
                    )

                [time_status] => Array
                    (
                        [0] => 1
                    )
            */
            
            
            $hakeem = new Hakeem;

            $hakeem_hospital_id = isset($_POST['hakeem_hospital_id']) && is_array($_POST['hakeem_hospital_id']) ? $_POST['hakeem_hospital_id'] : [];
            
            $hakeem_course_id = isset($_POST['hakeem_course_id']) && is_array($_POST['hakeem_course_id']) ? $_POST['hakeem_course_id'] : [];

            $hakeem->hakeem_fullname = $request->input('hakeem_fullname');
            $hakeem->hakeem_fees = $request->input('hakeem_fees');
            $hakeem->email = $request->input('email');
            $hakeem->hakeem_martialStatus = $request->input('hakeem_martialStatus');
            $hakeem->hakeem_gender = $request->input('hakeem_gender');
            $hakeem->hakeem_phone = $request->input('hakeem_phone');
            $hakeem->hakeem_details = $request->input('hakeem_details');
            

            $hakeem->hakeem_country = $request->input('hakeem_country');
            $hakeem->hakeem_city = $request->input('hakeem_city');
            $hakeem->hakeem_state = $request->input('hakeem_state');
            $hakeem->hakeem_dob = $request->input('hakeem_dob');
            $hakeem->hakeem_degree = $request->input('hakeem_degree');
            $hakeem->hakeem_experience = $request->input('hakeem_experience');
            $hakeem->hakeem_hospital_id =  implode(',', $hakeem_hospital_id);
            $hakeem->hakeem_course_id =  implode(',', $hakeem_course_id);
            $hakeem->hakeem_hakeemType_id = $request->input('hakeem_hakeemType_id');
            $hakeem->password =  Hash::make($request->input('password'));
            $hakeem->hakeem_status = $request->input('hakeem_status');
            $hakeem->hakeem_address = $request->input('hakeem_address');
            

            //echo '<pre>';
            //print_r($hakeem);
            //die;

            if ($request->hasfile('hakeem_profileImage')) {
                $file = $request->file('hakeem_profileImage');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . "." . $extension;
                $file->move('uploads/HakeemImagesSave/', $filename);
                $hakeem->hakeem_profileImage = $filename;
            } else {
                $hakeem->hakeem_profileImage = 'default.png';
            }


            if ($request->hasfile('hakeem_PMDC')) {
                $file = $request->file('hakeem_PMDC');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . "." . $extension;
                $file->move('uploads/HakeemPMDCSave/', $filename);
                $hakeem->hakeem_PMDC = $filename;
            } else {
                $hakeem->hakeem_PMDC = '';
            }

            $hakeem->save();
            $hakeem_id = $hakeem->id;
            //$hakeem_id = 1;

            $maddress = $request->input('maddress');
            $day = $request->input('day_name');
            $st_time = $request->input('st_time');
            $end_time = $request->input('end_time');
            $time_status = $request->input('time_status');
            
            $time_data = [];            
            if(count($day) > 0){
                foreach($day as $i => $d){
                    $time_data = [
                        'hakeem_id'=>$hakeem_id,
                        'maddress'=>$maddress[$i],
                        'day'=>$day[$i],
                        'st_time'=>$st_time[$i],
                        'end_time'=>$end_time[$i],
                        'time_status'=>$time_status[$i],
                        'created_at'=>date('Y-m-d h:i:s')
                    ];  
                    DB::table('hakeems_timming')->insert($time_data);
                }
            }

            Session::flash('message', 'hakeem Successfully Added!!!');
            Session::flash('alert-class', 'alert-success');

            return redirect()->route('admin.hakeem');
        }
    }

    //storeFrontHakeem
    public function storeFrontHakeem(Request $request)
    {
        
        if ($request->method() == 'POST') {

            
            /*
                [day_name] => Array
                (
                    [0] => 1
                    [1] => 2
                )

                [st_time] => Array
                    (
                        [0] => 12:46
                        [1] => 03:50
                    )

                [end_time] => Array
                    (
                        [0] => 01:47
                        [1] => 05:52
                    )

                [time_status] => Array
                    (
                        [0] => 1
                    )
            */
            
            
            $hakeem = new Hakeem;

            $hakeem_hospital_id = isset($_POST['hakeem_hospital_id']) && is_array($_POST['hakeem_hospital_id']) ? $_POST['hakeem_hospital_id'] : [];
            
            $hakeem_course_id = isset($_POST['hakeem_course_id']) && is_array($_POST['hakeem_course_id']) ? $_POST['hakeem_course_id'] : [];

            $hakeem->hakeem_fullname = $request->input('hakeem_fullname');
            $hakeem->hakeem_fees = $request->input('hakeem_fees');
            $hakeem->email = $request->input('email');
            $hakeem->hakeem_martialStatus = $request->input('hakeem_martialStatus');
            $hakeem->hakeem_gender = $request->input('hakeem_gender');
            $hakeem->hakeem_phone = $request->input('hakeem_phone');
            $hakeem->hakeem_details = $request->input('hakeem_details');
            

            $hakeem->hakeem_country = $request->input('hakeem_country');
            $hakeem->hakeem_city = $request->input('hakeem_city');
            $hakeem->hakeem_state = $request->input('hakeem_state');
            $hakeem->hakeem_dob = $request->input('hakeem_dob');
            $hakeem->hakeem_degree = $request->input('hakeem_degree');
            $hakeem->hakeem_experience = $request->input('hakeem_experience');
            $hakeem->hakeem_hospital_id =  implode(',', $hakeem_hospital_id);
            $hakeem->hakeem_course_id =  implode(',', $hakeem_course_id);
            $hakeem->hakeem_hakeemType_id = $request->input('hakeem_hakeemType_id');
            $hakeem->password =  Hash::make($request->input('password'));
            $hakeem->hakeem_status = $request->input('hakeem_status');
            $hakeem->hakeem_address = $request->input('hakeem_address');
            

            //echo '<pre>';
            //print_r($hakeem);
            //die;

            if ($request->hasfile('hakeem_profileImage')) {
                $file = $request->file('hakeem_profileImage');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . "." . $extension;
                $file->move('uploads/HakeemImagesSave/', $filename);
                $hakeem->hakeem_profileImage = $filename;
            } else {
                $hakeem->hakeem_profileImage = 'default.png';
            }


            if ($request->hasfile('hakeem_PMDC')) {
                $file = $request->file('hakeem_PMDC');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . "." . $extension;
                $file->move('uploads/HakeemPMDCSave/', $filename);
                $hakeem->hakeem_PMDC = $filename;
            } else {
                $hakeem->hakeem_PMDC = '';
            }

            $hakeem->save();
            $hakeem_id = $hakeem->id;
            //$hakeem_id = 1;

            $maddress = $request->input('maddress');
            $day = $request->input('day_name');
            $st_time = $request->input('st_time');
            $end_time = $request->input('end_time');
            $time_status = $request->input('time_status');
            
            $time_data = [];            
            if(count($day) > 0){
                foreach($day as $i => $d){
                    $time_data = [
                        'hakeem_id'=>$hakeem_id,
                        'maddress'=>$maddress[$i],
                        'day'=>$day[$i],
                        'st_time'=>$st_time[$i],
                        'end_time'=>$end_time[$i],
                        'time_status'=>$time_status[$i],
                        'created_at'=>date('Y-m-d h:i:s')
                    ];  
                    DB::table('hakeems_timming')->insert($time_data);
                }
            }

            Session::flash('message', 'hakeem Successfully Added!!!');
            Session::flash('alert-class', 'alert-success');

            return redirect('hakeemRegistration');
        }
    }


    public function edit($id)
    {

        $hakeems = Hakeem::where('id', $id)->first();
        $hakeemTypes = HakeemType::all();
        $hospitals = Hospital::all();
        //$specialties = Specialty::all();
        $departments = Departments::all();
        $courseforms = CourseForm::all();

        $hakeemhospital = explode(',', $hakeems->hakeem_hospital_id);
        $hakeemcourseForm = explode(',', $hakeems->hakeem_course_id);

        return view(
            'hakeems.updatehakeem',
            [
                'hakeems' => $hakeems,
                'hakeemhospital' => $hakeemhospital,
                'hakeemcourseForm' => $hakeemcourseForm,
                'hakeemTypes' => $hakeemTypes,
                'hospitals' => $hospitals,
                'departments' => $departments,
                'courseforms' => $courseforms
            ]
        );

        
    }

    public function update(Request $request, $id)
    {

        if ($request->method() == 'POST') {
            $hakeem = Hakeem::where('id', $id)->first();
            $hakeem_hospital_id = isset($_POST['hakeem_hospital_id']) && is_array($_POST['hakeem_hospital_id']) ? $_POST['hakeem_hospital_id'] : [];
            $hakeem_course_id = isset($_POST['hakeem_course_id']) && is_array($_POST['hakeem_course_id']) ? $_POST['hakeem_course_id'] : [];

            $hakeem->hakeem_fullname = $request->input('hakeem_fullname');
            $hakeem->hakeem_fees = $request->input('hakeem_fees');
            $hakeem->email = $request->input('email');
            $hakeem->hakeem_martialStatus = $request->input('hakeem_martialStatus');
            $hakeem->hakeem_gender = $request->input('hakeem_gender');
            $hakeem->hakeem_phone = $request->input('hakeem_phone');
            $hakeem->hakeem_details = $request->input('hakeem_details');

            $hakeem->hakeem_country = $request->input('hakeem_country');
            $hakeem->hakeem_city = $request->input('hakeem_city');
            $hakeem->hakeem_state = $request->input('hakeem_state');
            $hakeem->hakeem_dob = $request->input('hakeem_dob');
            $hakeem->hakeem_degree = $request->input('hakeem_degree');
            $hakeem->hakeem_experience = $request->input('hakeem_experience');
            $hakeem->hakeem_hospital_id =  implode(',', $hakeem_hospital_id);
            $hakeem->hakeem_course_id =  implode(',', $hakeem_course_id);
            $hakeem->hakeem_hakeemType_id = $request->input('hakeem_hakeemType_id');
            $hakeem->hakeem_status = $request->input('hakeem_status');
            $hakeem->hakeem_address = $request->input('hakeem_address');

            //new and old password setting
            $password_new = $request->input('password');
            if($password_new != '' && strlen($password_new) > 2){
                $hakeem->password =  Hash::make($request->input('password')); 
            }
            
            if ($request->hasfile('hakeem_profileImage')) {
                $destination = 'uploads/hakeemImagesSave/' . $hakeem->hakeem_profileImage;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
                $file = $request->file('hakeem_profileImage');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . "." . $extension;
                $file->move('uploads/HakeemImagesSave/', $filename);
                $hakeem->hakeem_profileImage = $filename;
            }


            if ($request->hasfile('hakeem_PMDC')) {
                $destination = 'uploads/HakeemPMDCSave/' . $hakeem->hakeem_PMDC;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
                $file = $request->file('hakeem_PMDC');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . "." . $extension;
                $file->move('uploads/HakeemPMDCSave/', $filename);
                $hakeem->hakeem_PMDC = $filename;
            }



            $hakeem->update();

            //$day = isset($_POST['day_name'])  ? $_POST['day_name'] : 0;
            //$st_time = isset($_POST['st_time'])  ? $_POST['st_time'] : 0;
            //$end_time = isset($_POST['end_time'])  ? $_POST['end_time'] : 0;
            //$day = isset($_POST['time_status'])  ? $_POST['time_status'] : 0;
            //$time_status = isset($_POST['time_status'])  ? $_POST['time_status'] : 0;

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

            //$eday = $request->input('eday_name');
            //$est_time = $request->input('est_time');
            //$eend_time = $request->input('eend_time');
            //$etime_status = $request->input('etime_status');

            //echo '<pre>';
            //print_r($_POST);
            //print_r($day);
            //die; 

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
                    DB::table('hakeems_timming')->where('dt_id', $e)->update($etime_data);
                }
            }


            
            $time_data = [];            
            if($day[0] != ''){
                foreach($day as $i => $d){
                    $time_data = [
                        'hakeem_id'=>$id,
                        'maddress'=>$maddress[$i],
                        'day'=>$day[$i],
                        'st_time'=>$st_time[$i],
                        'end_time'=>$end_time[$i],
                        'time_status'=>$time_status[$i],
                        'created_at'=>date('Y-m-d h:i:s')
                    ];  
                    DB::table('hakeems_timming')->insert($time_data);
                }
            }

            Session::flash('message', 'Hakeem Updated!!!');
            Session::flash('alert-class', 'alert-success');

            if (Auth::guard()->user()->role == 12) {
                return redirect()->route('admin.hakeemprofile', $id);
            } else if (Auth::guard()->user()->role == 1) {
                return redirect()->route('hakeem.profile');
            } else {
                return redirect();
            }
        }
    }

    //editHakeemRegistrationProcess
    public function editHakeemRegistrationProcess(Request $request)
    {

        if ($request->method() == 'POST') {
            $id = isset($_POST['id']) ? $_POST['id'] : 0;
            $hakeem = Hakeem::where('id', $id)->first();
            $hakeem_hospital_id = isset($_POST['hakeem_hospital_id']) && is_array($_POST['hakeem_hospital_id']) ? $_POST['hakeem_hospital_id'] : [];
            $hakeem_course_id = isset($_POST['hakeem_course_id']) && is_array($_POST['hakeem_course_id']) ? $_POST['hakeem_course_id'] : [];

            $hakeem->hakeem_fullname = $request->input('hakeem_fullname');
            $hakeem->hakeem_fees = $request->input('hakeem_fees');
            $hakeem->email = $request->input('email');
            $hakeem->hakeem_martialStatus = $request->input('hakeem_martialStatus');
            $hakeem->hakeem_gender = $request->input('hakeem_gender');
            $hakeem->hakeem_phone = $request->input('hakeem_phone');
            $hakeem->hakeem_details = $request->input('hakeem_details');

            $hakeem->hakeem_country = $request->input('hakeem_country');
            $hakeem->hakeem_city = $request->input('hakeem_city');
            $hakeem->hakeem_state = $request->input('hakeem_state');
            $hakeem->hakeem_dob = $request->input('hakeem_dob');
            $hakeem->hakeem_degree = $request->input('hakeem_degree');
            $hakeem->hakeem_experience = $request->input('hakeem_experience');
            $hakeem->hakeem_hospital_id =  implode(',', $hakeem_hospital_id);
            $hakeem->hakeem_course_id =  implode(',', $hakeem_course_id);
            $hakeem->hakeem_hakeemType_id = $request->input('hakeem_hakeemType_id');
            $hakeem->hakeem_status = 'Active';
            $hakeem->hakeem_address = $request->input('hakeem_address');

            //new and old password setting
            $password_new = $request->input('password');
            if($password_new != '' && strlen($password_new) > 2){
                $hakeem->password =  Hash::make($request->input('password')); 
            }
            
            if ($request->hasfile('hakeem_profileImage')) {
                $destination = 'uploads/hakeemImagesSave/' . $hakeem->hakeem_profileImage;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
                $file = $request->file('hakeem_profileImage');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . "." . $extension;
                $file->move('uploads/HakeemImagesSave/', $filename);
                $hakeem->hakeem_profileImage = $filename;
            }


            if ($request->hasfile('hakeem_PMDC')) {
                $destination = 'uploads/HakeemPMDCSave/' . $hakeem->hakeem_PMDC;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
                $file = $request->file('hakeem_PMDC');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . "." . $extension;
                $file->move('uploads/HakeemPMDCSave/', $filename);
                $hakeem->hakeem_PMDC = $filename;
            }



            $hakeem->update();

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
                    DB::table('hakeems_timming')->where('dt_id', $e)->update($etime_data);
                }
            }


            
            $time_data = [];            
            if($day[0] != ''){
                foreach($day as $i => $d){
                    $time_data = [
                        'hakeem_id'=>$id,
                        'maddress'=>$maddress[$i],
                        'day'=>$day[$i],
                        'st_time'=>$st_time[$i],
                        'end_time'=>$end_time[$i],
                        'time_status'=>$time_status[$i],
                        'created_at'=>date('Y-m-d h:i:s')
                    ];  
                    DB::table('hakeems_timming')->insert($time_data);
                }
            }

            Session::flash('message', 'Hakeem Updated!!!');
            Session::flash('alert-class', 'alert-success');

            /*if (Auth::guard()->user()->role == 12) {
                return redirect()->route('admin.hakeemprofile', $id);
            } else if (Auth::guard()->user()->role == 1) {
                return redirect()->route('hakeem.profile');
            } else {
                return redirect();
            }*/

            return redirect('fronthakeem/editHakeemRegistration/'.$id);
        }
    }

    public function delete(Request $request)
    {
        if ($request->method() == 'POST') {
            Hakeem::where('id', $request->id)->delete();
            return true;
        }
    }

    public function hakeemStatus(Request $request)
    {
        if ($request->method() == 'POST') {
            Hakeem::where('id', $request->id)->update(['hakeem_status' =>  $request->hakeem_status]);
            return true;
        }
    }
    public function dashboard()
    {
        $id = Auth::guard()->user()->id;
        // $appointments = DB::table('hakeems')
        //     ->join('appointments', 'appointments.appointment_hakeemID', '=', 'hakeems.id')
        //     ->select('*')
        //     ->get()
        //     ->where('appointment_hakeemID', $id)->count();
            $appointments = Appointment::where('appointment_hakeemID','=',$id)->count();


        return view('dashboard.hakeem.dashboard', ['appointments' => $appointments]);

    }

    public function profile($id)
    {

        // $hakeems = hakeem::where('id', $id)->first();
        // $hakeemTypes = hakeemType::all();
        // $hospitals = Hospital::all();
        // $specialties = Specialty::all();
        // $courseforms = CourseForm::all();
        // return view('hakeems.profile', ['hakeems' => $hakeems, 'hakeemTypes' => $hakeemTypes, 'hospitals' => $hospitals, 'specialties' => $specialties, 'courseforms' => $courseforms]);
        $hakeems = Hakeem::where('id', $id)->first();
        $hakeemTypes = HakeemType::all();
        $hospitals = Hospital::all();
        //$specialties = Specialty::all();

        $departments = Departments::all();
        
        
        $courseforms = CourseForm::all();

        $hakeemhospital = explode(',', $hakeems->hakeem_hospital_id);
        $hakeemcourseForm = explode(',', $hakeems->hakeem_course_id);

        return view(
            'hakeems.profile',
            [
                'hakeems' => $hakeems,
                'hakeemhospital' => $hakeemhospital,
                'hakeemcourseForm' => $hakeemcourseForm,
                'hakeemTypes' => $hakeemTypes,
                'hospitals' => $hospitals,
                'departments' => $departments,
                'courseforms' => $courseforms
            ]
        );
    }

    public function Hakeemprofile()
    {
        $id = Auth::guard()->user()->id;
        $hakeems = Hakeem::where('id', $id)->first();
        $hakeemTypes = HakeemType::all();
        $hospitals = Hospital::all();
        $courseforms = CourseForm::all();

        $hakeemspecialties = explode(',', $hakeems->hakeem_specialty_id);
        $hakeemhospital = explode(',', $hakeems->hakeem_hospital_id);
        $hakeemcourseForm = explode(',', $hakeems->hakeem_course_id);

        return view(
           'hakeems.profile',
            [
                'hakeems' => $hakeems,
                'hakeemspecialties' => $hakeemspecialties,
                'hakeemhospital' => $hakeemhospital,
                'hakeemcourseForm' => $hakeemcourseForm,
                'hakeemTypes' => $hakeemTypes,
                'hospitals' => $hospitals,
                'courseforms' => $courseforms
            ]
        );
    }
    public function appointment()
    {
        $id = Auth::guard()->user()->id;
        $appointments = DB::table('hakeems')
            ->join('appointments', 'appointments.appointment_hakeemID', '=', 'hakeems.id')
            ->select('*')
            ->where('appointment_hakeemID', $id)
            ->get();
        return view('dashboard.hakeem.hakeemappointment', ['appointments' => $appointments]);
    }
}
