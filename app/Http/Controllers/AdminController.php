<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Lab;
use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\Patient;
use App\Models\Appointment;
use App\Models\Dawakhanahakeem;
use App\Models\Nurse;

use Session;
use DB;



class AdminController extends Controller
{
    public function login(){
        if (Auth::guard('admin')) {
            return redirect('admin/dashboard');
        } else {
            //return redirect()->route('admin.login');
            return view('dashboard.admin.login');
        }

    }

    public function index()
    {
       //echo '<pre>';
       //print_r(Session::all());
       //die;

       //echo '<pre>';
       //print_r(Auth::guard()->user());
       //die;
       

        $doctors = Doctor::all();
        $doctorsCount =  count($doctors);

        $patients = Patient::all();
        $patientsCount =  count($patients);

        $appointments = Appointment::all();
        $appointmentsCount =  count($appointments);

        $hospitals = Hospital::all();
        $hospitalsCount =  count($hospitals);

        $labs = Lab::all();
        $labsCount =  count($labs);

        $dawakhanas = Dawakhanahakeem::all();
        $dawakhanasCount =  count($dawakhanas);

        $nurses = Nurse::all();
        $nursesCount =  count($nurses);

        return view(
            'dashboard.admin.dashboard',
            [
                'labsCount' => $labsCount,
                'doctorsCount' =>  $doctorsCount,
                'hospitalsCount' =>  $hospitalsCount,
                'patientsCount' =>  $patientsCount,
                'appointmentsCount' =>  $appointmentsCount,
                'dawakhanasCount' =>  $dawakhanasCount,
                'nursesCount' =>  $nursesCount,
            ]
        );
    }

    function check(Request $request)
    {
        //Validate Inputs
        $request->validate([
            'email' => 'required|email|exists:admins,email',
            'password' => 'required|min:2|max:30'
        ], [
            'email.exists' => 'This email is not exists.'
        ]);

        $creds = $request->only('email', 'password');
        
        if (Auth::guard('admin')->attempt($creds)) {
        /*
        $admin = Auth::guard('admin')->id();
        echo 'Admin details:<pre>';
        print_r($admin);
        die;
        */
        
        //echo 'admin<pre>';
        //print_r(Auth::guard()->user());
        //die;

            return redirect('admin/dashboard');
        } else {
            return redirect()->route('admin.login')->with('fail', 'Incorrect credentials');
        }
    }

    function logout()
    {
        Auth::guard('admin')->logout();

        return redirect()->route('admin.login');
    }

    
}
