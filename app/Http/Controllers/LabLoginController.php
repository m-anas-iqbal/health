<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LabLoginController extends Controller
{
    function check(Request $request){
        //Validate Inputs
        $request->validate([
           'email'=>'required|email|exists:lab_logins,email',
           'password'=>'required|min:2|max:30'
        ],[
            'email.exists'=>'This email is not exists.'
        ]);

        $creds = $request->only('email','password');

        if( Auth::guard('lab')->attempt($creds) ){
            $request->session()->put('labRole',  '4');

            return redirect()->route('lab.dashboard');
        }else{
            return redirect()->route('lab.login')->with('fail','Incorrect credentials');
        }
   }

   function logout(){
       Auth::guard('lab')->logout();
       return redirect('/');
   }
}
