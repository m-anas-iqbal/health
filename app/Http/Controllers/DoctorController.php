<?php

namespace App\Http\Controllers;

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
use Illuminate\Support\Str;

use App\Models\Appointment;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    function check(Request $request)
    {
        //Validate Inputs
        $request->validate([
            'email' => 'required|email|exists:doctors,email',
            'password' => 'required|min:2|max:30'
        ], [
            'email.exists' => 'This email is not exists.'
        ]);

        $creds = $request->only('email', 'password');

        if (Auth::guard('doctor')->attempt($creds)) {

            $request->session()->put('doctorRole',  '1');

            //echo 'doctor<pre>';
            //print_r(Auth::guard()->user());
            //die;

            return redirect()->route('doctor.dashboard');
        } else {
            return redirect()->route('doctor.login')->with('fail', 'Incorrect credentials');
        }
    }

    function logout()
    {
        Auth::guard('doctor')->logout();
        return redirect()->route('doctor.login');
    }

    public function index()
    {

        $doctors = Doctor::all();
        $doctorTypes = DoctorType::all();
        $hospitals = Hospital::all();
        $specialties = Specialty::all();
        $courseforms = CourseForm::all();
        return view('doctors.doctor', ['doctors' => $doctors, 'doctorTypes' => $doctorTypes, 'hospitals' => $hospitals, 'specialties' => $specialties, 'courseforms' => $courseforms]);
    }


    public function create()
    {
        $doctors = Doctor::all();
        $doctorTypes = DoctorType::all();
        $hospitals = Hospital::all();
        //$specialties = Specialty::all();
        $departments = Departments::all();
        $courseforms = CourseForm::all();
        return view('doctors.adddoctor', 
        [
            'doctors' => $doctors, 
            'doctorTypes' => $doctorTypes, 
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
            
            
            $doctor = new Doctor;

            $doctor_hospital_id = isset($_POST['doctor_hospital_id']) && is_array($_POST['doctor_hospital_id']) ? $_POST['doctor_hospital_id'] : [];
            $doctor_specialty_id = isset($_POST['doctor_specialty_id']) && is_array($_POST['doctor_specialty_id']) ? $_POST['doctor_specialty_id'] : [];
            $doctor_course_id = isset($_POST['doctor_course_id']) && is_array($_POST['doctor_course_id']) ? $_POST['doctor_course_id'] : [];

            $doctor->doctor_fullname = $request->input('doctor_fullname');
            $doctor->doctor_slug = Str::slug($request->input('doctor_fullname'));
            $doctor->doctor_fees = $request->input('doctor_fees');
            $doctor->email = $request->input('email');
            $doctor->doctor_martialStatus = $request->input('doctor_martialStatus');
            $doctor->doctor_gender = $request->input('doctor_gender');
            $doctor->doctor_phone = $request->input('doctor_phone');
            $doctor->doctor_details = $request->input('doctor_details');
            

            $doctor->doctor_country = $request->input('doctor_country');
            $doctor->doctor_city = $request->input('doctor_city');
            $doctor->doctor_state = $request->input('doctor_state');
            $doctor->doctor_dob = $request->input('doctor_dob');
            $doctor->doctor_degree = $request->input('doctor_degree');
            $doctor->doctor_experience = $request->input('doctor_experience');
            $doctor->doctor_hospital_id =  implode(',', $doctor_hospital_id);
            $doctor->doctor_specialty_id =  implode(',', $doctor_specialty_id);
            $doctor->doctor_course_id =  implode(',', $doctor_course_id);
            $doctor->doctor_doctorType_id = $request->input('doctor_doctorType_id');
            $doctor->password =  Hash::make($request->input('password'));
            $doctor->doctor_status = $request->input('doctor_status');
            $doctor->doctor_address = $request->input('doctor_address');
            

            //echo '<pre>';
            //print_r($doctor);
            //die;

            if ($request->hasfile('doctor_profileImage')) {
                $file = $request->file('doctor_profileImage');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . "." . $extension;
                $file->move('uploads/DoctorImagesSave/', $filename);
                $doctor->doctor_profileImage = $filename;
            } else {
                $doctor->doctor_profileImage = 'default.png';
            }


            if ($request->hasfile('doctor_PMDC')) {
                $file = $request->file('doctor_PMDC');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . "." . $extension;
                $file->move('uploads/DoctorPMDCSave/', $filename);
                $doctor->doctor_PMDC = $filename;
            } else {
                $doctor->doctor_PMDC = '';
            }

            $doctor->save();
            $doctor_id = $doctor->id;
            //$doctor_id = 1;

            $maddress = $request->input('maddress');
            $day = $request->input('day_name');
            $st_time = $request->input('st_time');
            $end_time = $request->input('end_time');
            $time_status = $request->input('time_status');
            
            $time_data = [];            
            if(count($day) > 0){
                foreach($day as $i => $d){
                    $time_data = [
                        'doctor_id'=>$doctor_id,
                        'maddress'=>$maddress[$i],
                        'day'=>$day[$i],
                        'st_time'=>$st_time[$i],
                        'end_time'=>$end_time[$i],
                        'time_status'=>$time_status[$i],
                        'created_at'=>date('Y-m-d h:i:s')
                    ];  
                    DB::table('doctors_timming')->insert($time_data);
                }
            }

            Session::flash('message', 'Doctor Successfully Added!!!');
            Session::flash('alert-class', 'alert-success');

            return redirect()->route('admin.doctor');
        }
    }

    public function storeFrontDoctor(Request $request)
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
            
            
            $doctor = new Doctor;

            $doctor_hospital_id = isset($_POST['doctor_hospital_id']) && is_array($_POST['doctor_hospital_id']) ? $_POST['doctor_hospital_id'] : [];
            $doctor_specialty_id = isset($_POST['doctor_specialty_id']) && is_array($_POST['doctor_specialty_id']) ? $_POST['doctor_specialty_id'] : [];
            $doctor_course_id = isset($_POST['doctor_course_id']) && is_array($_POST['doctor_course_id']) ? $_POST['doctor_course_id'] : [];

            $doctor->doctor_fullname = $request->input('doctor_fullname');
            $doctor->doctor_slug = Str::slug($request->input('doctor_fullname'));
            $doctor->doctor_fees = $request->input('doctor_fees');
            $doctor->email = $request->input('email');
            $doctor->doctor_martialStatus = $request->input('doctor_martialStatus');
            $doctor->doctor_gender = $request->input('doctor_gender');
            $doctor->doctor_phone = $request->input('doctor_phone');
            $doctor->doctor_details = $request->input('doctor_details');
            

            $doctor->doctor_country = $request->input('doctor_country');
            $doctor->doctor_city = $request->input('doctor_city');
            $doctor->doctor_state = $request->input('doctor_state');
            $doctor->doctor_dob = $request->input('doctor_dob');
            $doctor->doctor_degree = $request->input('doctor_degree');
            $doctor->doctor_experience = $request->input('doctor_experience');
            $doctor->doctor_hospital_id =  implode(',', $doctor_hospital_id);
            $doctor->doctor_specialty_id =  implode(',', $doctor_specialty_id);
            $doctor->doctor_course_id =  implode(',', $doctor_course_id);
            $doctor->doctor_doctorType_id = $request->input('doctor_doctorType_id');
            $doctor->password =  Hash::make($request->input('password'));
            $doctor->doctor_status = $request->input('doctor_status');
            $doctor->doctor_address = $request->input('doctor_address');
            

            //echo '<pre>';
            //print_r($doctor);
            //die;

            if ($request->hasfile('doctor_profileImage')) {
                $file = $request->file('doctor_profileImage');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . "." . $extension;
                $file->move('uploads/DoctorImagesSave/', $filename);
                $doctor->doctor_profileImage = $filename;
            } else {
                $doctor->doctor_profileImage = 'default.png';
            }


            if ($request->hasfile('doctor_PMDC')) {
                $file = $request->file('doctor_PMDC');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . "." . $extension;
                $file->move('uploads/DoctorPMDCSave/', $filename);
                $doctor->doctor_PMDC = $filename;
            } else {
                $doctor->doctor_PMDC = '';
            }

            $doctor->save();
            $doctor_id = $doctor->id;
            //$doctor_id = 1;

            $maddress = $request->input('maddress');
            $day = $request->input('day_name');
            $st_time = $request->input('st_time');
            $end_time = $request->input('end_time');
            $time_status = $request->input('time_status');
            
            $time_data = [];            
            if(count($day) > 0){
                foreach($day as $i => $d){
                    $time_data = [
                        'doctor_id'=>$doctor_id,
                        'maddress'=>$maddress[$i],
                        'day'=>$day[$i],
                        'st_time'=>$st_time[$i],
                        'end_time'=>$end_time[$i],
                        'time_status'=>$time_status[$i],
                        'created_at'=>date('Y-m-d h:i:s')
                    ];  
                    DB::table('doctors_timming')->insert($time_data);
                }
            }

            Session::flash('message', 'Doctor Successfully Added!!!');
            Session::flash('alert-class', 'alert-success');

            return redirect('doctorRegistration');
        }
    }

    public function edit($id)
    {

        $doctors = Doctor::where('id', $id)->first();
        $doctorTypes = DoctorType::all();
        $hospitals = Hospital::all();
        //$specialties = Specialty::all();
        $departments = Departments::all();
        $courseforms = CourseForm::all();

        $doctorspecialties = explode(',', $doctors->doctor_specialty_id);
        $doctorhospital = explode(',', $doctors->doctor_hospital_id);
        $doctorcourseForm = explode(',', $doctors->doctor_course_id);

        return view(
            'doctors.updatedoctor',
            [
                'doctors' => $doctors,
                'doctorspecialties' => $doctorspecialties,
                'doctorhospital' => $doctorhospital,
                'doctorcourseForm' => $doctorcourseForm,
                'doctorTypes' => $doctorTypes,
                'hospitals' => $hospitals,
                'departments' => $departments,
                'courseforms' => $courseforms
            ]
        );

        
    }

    public function update(Request $request, $id)
    {

        if ($request->method() == 'POST') {
            $doctor = Doctor::where('id', $id)->first();
            $doctor_hospital_id = isset($_POST['doctor_hospital_id']) && is_array($_POST['doctor_hospital_id']) ? $_POST['doctor_hospital_id'] : [];
            $doctor_specialty_id = isset($_POST['doctor_specialty_id']) && is_array($_POST['doctor_specialty_id']) ? $_POST['doctor_specialty_id'] : [];
            $doctor_course_id = isset($_POST['doctor_course_id']) && is_array($_POST['doctor_course_id']) ? $_POST['doctor_course_id'] : [];

            $doctor->doctor_fullname = $request->input('doctor_fullname');
            $doctor->doctor_slug = Str::slug($request->input('doctor_fullname'));
            $doctor->doctor_fees = $request->input('doctor_fees');
            $doctor->email = $request->input('email');
            $doctor->doctor_martialStatus = $request->input('doctor_martialStatus');
            $doctor->doctor_gender = $request->input('doctor_gender');
            $doctor->doctor_phone = $request->input('doctor_phone');
            $doctor->doctor_details = $request->input('doctor_details');

            $doctor->doctor_country = $request->input('doctor_country');
            $doctor->doctor_city = $request->input('doctor_city');
            $doctor->doctor_state = $request->input('doctor_state');
            $doctor->doctor_dob = $request->input('doctor_dob');
            $doctor->doctor_degree = $request->input('doctor_degree');
            $doctor->doctor_experience = $request->input('doctor_experience');
            $doctor->doctor_hospital_id =  implode(',', $doctor_hospital_id);
            $doctor->doctor_specialty_id =  implode(',', $doctor_specialty_id);
            $doctor->doctor_course_id =  implode(',', $doctor_course_id);
            $doctor->doctor_doctorType_id = $request->input('doctor_doctorType_id');
            $doctor->doctor_status = $request->input('doctor_status');
            $doctor->doctor_address = $request->input('doctor_address');

            //new and old password setting
            $password_new = $request->input('password');
            if($password_new != '' && strlen($password_new) > 2){
                $doctor->password =  Hash::make($request->input('password')); 
            }
            
            if ($request->hasfile('doctor_profileImage')) {
                $destination = 'uploads/DoctorImagesSave/' . $doctor->doctor_profileImage;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
                $file = $request->file('doctor_profileImage');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . "." . $extension;
                $file->move('public/uploads/DoctorImagesSave/', $filename);
                $doctor->doctor_profileImage = $filename;
            }


            if ($request->hasfile('doctor_PMDC')) {
                $destination = 'public/uploads/DoctorPMDCSave/' . $doctor->doctor_PMDC;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
                $file = $request->file('doctor_PMDC');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . "." . $extension;
                $file->move('public/uploads/DoctorPMDCSave/', $filename);
                $doctor->doctor_PMDC = $filename;
            }



            $doctor->update();

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
                    DB::table('doctors_timming')->where('dt_id', $e)->update($etime_data);
                }
            }


            
            $time_data = [];            
            if($day[0] != ''){
                foreach($day as $i => $d){
                    $time_data = [
                        'doctor_id'=>$id,
                        'maddress'=>$maddress[$i],
                        'day'=>$day[$i],
                        'st_time'=>$st_time[$i],
                        'end_time'=>$end_time[$i],
                        'time_status'=>$time_status[$i],
                        'created_at'=>date('Y-m-d h:i:s')
                    ];  
                    DB::table('doctors_timming')->insert($time_data);
                }
            }

            Session::flash('message', 'Doctor Updated!!!');
            Session::flash('alert-class', 'alert-success');

            if (Auth::guard()->user()->role == 12) {
                return redirect()->route('admin.doctorprofile', $id);
            } else if (Auth::guard()->user()->role == 1) {
                return redirect()->route('doctor.profile');
            } else {
                return redirect();
            }
        }
    }

    //editDoctorRegistrationProcess
    public function editDoctorRegistrationProcess(Request $request)
    {

        if ($request->method() == 'POST') {
            //echo '<pre>';
            //print_r($request->all());
            //die;
            $id = isset($_POST['id']) ? $_POST['id'] : 0;
            $doctor = Doctor::where('id', $id)->first();
            $doctor_hospital_id = isset($_POST['doctor_hospital_id']) && is_array($_POST['doctor_hospital_id']) ? $_POST['doctor_hospital_id'] : [];
            $doctor_specialty_id = isset($_POST['doctor_specialty_id']) && is_array($_POST['doctor_specialty_id']) ? $_POST['doctor_specialty_id'] : [];
            $doctor_course_id = isset($_POST['doctor_course_id']) && is_array($_POST['doctor_course_id']) ? $_POST['doctor_course_id'] : [];

            $doctor->doctor_fullname = $request->input('doctor_fullname');
            $doctor->doctor_slug = Str::slug($request->input('doctor_fullname'));
            $doctor->doctor_fees = $request->input('doctor_fees');
            $doctor->email = $request->input('email');
            $doctor->doctor_martialStatus = $request->input('doctor_martialStatus');
            $doctor->doctor_gender = $request->input('doctor_gender');
            $doctor->doctor_phone = $request->input('doctor_phone');
            $doctor->doctor_details = $request->input('doctor_details');

            $doctor->doctor_country = $request->input('doctor_country');
            $doctor->doctor_city = $request->input('doctor_city');
            $doctor->doctor_state = $request->input('doctor_state');
            $doctor->doctor_dob = $request->input('doctor_dob');
            $doctor->doctor_degree = $request->input('doctor_degree');
            $doctor->doctor_experience = $request->input('doctor_experience');
            $doctor->doctor_hospital_id =  implode(',', $doctor_hospital_id);
            $doctor->doctor_specialty_id =  implode(',', $doctor_specialty_id);
            $doctor->doctor_course_id =  implode(',', $doctor_course_id);
            $doctor->doctor_doctorType_id = $request->input('doctor_doctorType_id');
            $doctor->doctor_status = 'Active';
            $doctor->doctor_address = $request->input('doctor_address');

            //new and old password setting
            $password_new = $request->input('password');
            if($password_new != '' && strlen($password_new) > 2){
                $doctor->password =  Hash::make($request->input('password')); 
            }
            
            if ($request->hasfile('doctor_profileImage')) {
                $destination = 'uploads/DoctorImagesSave/' . $doctor->doctor_profileImage;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
                $file = $request->file('doctor_profileImage');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . "." . $extension;
                $file->move('public/uploads/DoctorImagesSave/', $filename);
                $doctor->doctor_profileImage = $filename;
            }


            if ($request->hasfile('doctor_PMDC')) {
                $destination = 'public/uploads/DoctorPMDCSave/' . $doctor->doctor_PMDC;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
                $file = $request->file('doctor_PMDC');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . "." . $extension;
                $file->move('public/uploads/DoctorPMDCSave/', $filename);
                $doctor->doctor_PMDC = $filename;
            }



            $doctor->update();

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
                    DB::table('doctors_timming')->where('dt_id', $e)->update($etime_data);
                }
            }


            
            $time_data = [];            
            if($day[0] != ''){
                foreach($day as $i => $d){
                    $time_data = [
                        'doctor_id'=>$id,
                        'maddress'=>$maddress[$i],
                        'day'=>$day[$i],
                        'st_time'=>$st_time[$i],
                        'end_time'=>$end_time[$i],
                        'time_status'=>$time_status[$i],
                        'created_at'=>date('Y-m-d h:i:s')
                    ];  
                    DB::table('doctors_timming')->insert($time_data);
                }
            }

            Session::flash('message', 'Doctor Updated!!!');
            Session::flash('alert-class', 'alert-success');

            return redirect('frontdoctor/editDoctorRegistration/'.$id);
        }
    }



    public function delete(Request $request)
    {
        if ($request->method() == 'POST') {
            Doctor::where('id', $request->id)->delete();
            return true;
        }
    }

    public function doctorStatus(Request $request)
    {
        if ($request->method() == 'POST') {
            Doctor::where('id', $request->id)->update(['doctor_status' =>  $request->doctor_status]);
            return true;
        }
    }
    public function dashboard()
    {
        $id = Auth::guard()->user()->id;
        // $appointments = DB::table('doctors')
        //     ->join('appointments', 'appointments.appointment_doctorID', '=', 'doctors.id')
        //     ->select('*')
        //     ->get()
        //     ->where('appointment_doctorID', $id)->count();
            $appointments = Appointment::where('appointment_doctorID','=',$id)->count();


        return view('dashboard.doctor.dashboard', ['appointments' => $appointments]);

    }

    public function profile($id)
    {

        // $doctors = Doctor::where('id', $id)->first();
        // $doctorTypes = DoctorType::all();
        // $hospitals = Hospital::all();
        // $specialties = Specialty::all();
        // $courseforms = CourseForm::all();
        // return view('doctors.profile', ['doctors' => $doctors, 'doctorTypes' => $doctorTypes, 'hospitals' => $hospitals, 'specialties' => $specialties, 'courseforms' => $courseforms]);
        $doctors = Doctor::where('id', $id)->first();
        $doctorTypes = DoctorType::all();
        $hospitals = Hospital::all();
        //$specialties = Specialty::all();

        $departments = Departments::all();
        
        
        $courseforms = CourseForm::all();

        $doctorspecialties = explode(',', $doctors->doctor_specialty_id);
        $doctorhospital = explode(',', $doctors->doctor_hospital_id);
        $doctorcourseForm = explode(',', $doctors->doctor_course_id);

        return view(
            'doctors.profile',
            [
                'doctors' => $doctors,
                'doctorspecialties' => $doctorspecialties,
                'doctorhospital' => $doctorhospital,
                'doctorcourseForm' => $doctorcourseForm,
                'doctorTypes' => $doctorTypes,
                'hospitals' => $hospitals,
                'departments' => $departments,
                'courseforms' => $courseforms
            ]
        );
    }

    public function Doctorprofile()
    {
        $id = Auth::guard()->user()->id;
        $doctors = Doctor::where('id', $id)->first();
        $doctorTypes = DoctorType::all();
        $hospitals = Hospital::all();
        $specialties = Specialty::all();
        $courseforms = CourseForm::all();

        $doctorspecialties = explode(',', $doctors->doctor_specialty_id);
        $doctorhospital = explode(',', $doctors->doctor_hospital_id);
        $doctorcourseForm = explode(',', $doctors->doctor_course_id);

        return view(
            'doctors.profile',
            [
                'doctors' => $doctors,
                'doctorspecialties' => $doctorspecialties,
                'doctorhospital' => $doctorhospital,
                'doctorcourseForm' => $doctorcourseForm,
                'doctorTypes' => $doctorTypes,
                'hospitals' => $hospitals,
                'specialties' => $specialties,
                'courseforms' => $courseforms
            ]
        );
    }
    public function appointment()
    {
        $id = Auth::guard()->user()->id;
        $appointments = DB::table('doctors')
            ->join('appointments', 'appointments.appointment_doctorID', '=', 'doctors.id')
            ->select('*')
            ->where('appointment_doctorID', $id)
            ->get();
        return view('dashboard.doctor.doctorappointment', ['appointments' => $appointments]);
    }
}
