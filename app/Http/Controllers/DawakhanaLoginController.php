<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\DawakhanaLogin;
use Illuminate\Support\Facades\File;

class DawakhanaLoginController extends Controller
{
    function check(Request $request)
    {
        //Validate Inputs 
        $request->validate([
            'email' => 'required|email|exists:dawakhana_logins,email',
            'password' => 'required|min:2|max:30'
        ], [
            'email.exists' => 'This email is not exists.'
        ]);
        //table Name dawakhana_logins 
        $creds = $request->only('email', 'password');

        if (Auth::guard('dawakhana')->attempt($creds)) {
            $request->session()->put('dawakhanaRole',  '5');

            return redirect()->route('dawakhana.dashboard');
        } else {
            return redirect()->route('dawakhana.login')->with('fail', 'Incorrect credentials');
        }
    }

    function logout()
    {
        Auth::guard('dawakhana')->logout();
        return redirect('/');
    }

    public function Dawakhanaprofile()
    {
        $id = Auth::guard()->user()->id;
        $dawakhana = DawakhanaLogin::where('id', $id)->first();
        return view('dashboard.dawakhana.profile', ['dawakhana' => $dawakhana]);
    }

    public function profileEdit($id)
    {
        $dawakhanas = DawakhanaLogin::where('id', $id)->first();
        return view('dashboard.dawakhana.updatedawakhana', ['dawakhanas' => $dawakhanas]);
    }


    public function update(Request $request, $id)
    {
        $dawakhanaProfile = DawakhanaLogin::find($id);
        $dawakhanaProfile->name = $request->input('name');
        $dawakhanaProfile->phone = $request->input('phone');
        $dawakhanaProfile->dob = $request->input('dob');
        $dawakhanaProfile->gender = $request->input('gender');
        $dawakhanaProfile->address = $request->input('address');
        $dawakhanaProfile->country = $request->input('country');
        $dawakhanaProfile->city = $request->input('city');
        $dawakhanaProfile->state = $request->input('state');
        $dawakhanaProfile->profileImage = $request->input('profileImage'); 

       
        $input = $request->all();

        if ($image = $request->file('profileImage')) {
            $destinationPath = 'DawakhanaPeoplesImagesSave/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['profileImage'] = "$profileImage";
        }else{
            unset($input['profileImage']);
        }
          
        $dawakhanaProfile->update($input);


        return redirect()->route('dawakhana.profile');

    }


    public function medicines(){

        return view('dashboard.dawakhana.medicine');
    }

}
