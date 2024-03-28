<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class HospitalLoginController extends Controller
{
    public function index()
    {
        //echo '<pre>';
        //$hospital = Auth::guard('hospital')->id();
        //echo 'hospital details:<pre>';
        //print_r($hospital);
       // print_r(session()->put('hospitalRole'));
        //die;

        //echo '<pre>';
        //print_r(session()->get('hospitalRole'));
        //print_r(Auth::guard()->user());
        
        //die;

       //echo 'hospital details are: <pre>';
       //print_r(Auth::guard()->user());
       //die;

        //echo 'dashboard index '; die;
        return view('dashboard/hospital/dashboard');
    }

    function check(Request $request)
    {
        //echo '<pre>';
        //print_r($request->all());
        //die;
        //Validate Inputs
        $request->validate([
            'hospital_phone' => 'required|exists:hospitals,hospital_phone',
            'password' => 'required|min:2|max:30'
        ], [
            'hospital_phone.exists' => 'This Phone Number is not exists.'
        ]);

        $creds = $request->only('hospital_phone', 'password');

        if (Auth::guard('hospital')->attempt($creds)) {
            //echo 'hospital guard auth succes';die;
            $request->session()->put('hospitalRole',  '3');

            
        //echo 'hospital details are: <pre>';
        //print_r(Auth::guard()->user());
        //die;

            return redirect('hospital/dashboard');
        } else {
            return redirect()->route('hospital.login')->with('fail', 'Incorrect hospital credentials');
        }
    }

    function logout()
    {
        Auth::guard('hospital')->logout();
        return redirect('hospital/login');
    }

    function logout2()
    {
        //Auth::guard('hospital')->logout();
        Session::flush();
        return redirect('hospital/login');
    }
}
