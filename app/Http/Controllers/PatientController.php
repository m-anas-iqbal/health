<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class PatientController extends Controller
{

    function check(Request $request){
        //Validate Inputs
        $request->validate([
           'email'=>'required|email|exists:patients,email',
           'password'=>'required|min:5|max:30'
        ],[
            'email.exists'=>'This email is not exists.'
        ]);

        $creds = $request->only('email','password');

        if( Auth::guard('patient')->attempt($creds) ){
            return redirect()->route('patient.home');
        }else{
            return redirect()->route('patient.login')->with('fail','Incorrect credentials');
        }
   }

   function logout(){
       Auth::guard('patient')->logout();
       return redirect('/');
   }

    public function index()
    {
        $patients = Patient::all();
        return view('patients.patient', ['patients' => $patients]);
    }

    public function create()
    {
        return view('patients.addpatient');
    }

    public function store(Request $request)
    {
        if ($request->method() == 'POST') {

            $patient = new Patient;
            $patient->patient_fullname = $request->input('patient_fullname');
            $patient->email = $request->input('email');
            $patient->patient_martialStatus = $request->input('patient_martialStatus');
            $patient->patient_gender = $request->input('patient_gender');
            $patient->patient_weight = $request->input('patient_weight');
            $patient->patient_height_Feet = $request->input('patient_height_Feet');
            $patient->patient_height_Inches = $request->input('patient_height_Inches');
            $patient->patient_bloodGroup = $request->input('patient_bloodGroup');
            $patient->patient_phone = $request->input('patient_phone');
            $patient->patient_address = $request->input('patient_address');
            $patient->patient_country = $request->input('patient_country');
            $patient->patient_city = $request->input('patient_city');
            $patient->patient_state = $request->input('patient_state');
            $patient->patient_dob = $request->input('patient_dob');
            $patient->patient_password =  Hash::make($request->input('patient_password'));
            $patient->patient_InheritedDesease = $request->input('patient_InheritedDesease');
            $patient->patient_status = $request->input('patient_status');;


            if ($request->hasfile('patient_profileImage')) {
                $file = $request->file('patient_profileImage');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . "." . $extension;
                $file->move('uploads/PatientProfileImages/', $filename);
                $patient->patient_profileImage = $filename;
            } else {
                $patient->patient_profileImage = '';
            }

            $patient->save();
            Session::flash('message', 'Patient Successfully Added!!!');
            Session::flash('alert-class', 'alert-success');
            
            return redirect()->route('admin.patient');
        }
    }


    public function edit($id)
    {
        $patients = Patient::where('id', $id)->first();
        return view('patients.updatepatient', ['patients' => $patients]);
    }

    public function update(Request $request, $id)
    {
        $patient = Patient::find($id);
        ///$patients = Patient::where('id', $id)->first();
        $patient->patient_fullname = $request->input('patient_fullname');
        $patient->email = $request->input('email');
        $patient->patient_martialStatus = $request->input('patient_martialStatus');
        $patient->patient_gender = $request->input('patient_gender');
        $patient->patient_weight = $request->input('patient_weight');
        $patient->patient_height_Feet = $request->input('patient_height_Feet');
        $patient->patient_height_Inches = $request->input('patient_height_Inches');
        $patient->patient_bloodGroup = $request->input('patient_bloodGroup');
        $patient->patient_phone = $request->input('patient_phone');
        $patient->patient_address = $request->input('patient_address');
        $patient->patient_country = $request->input('patient_country');
        $patient->patient_city = $request->input('patient_city');
        $patient->patient_state = $request->input('patient_state');
        $patient->patient_dob = $request->input('patient_dob');
        $patient->patient_InheritedDesease = $request->input('patient_InheritedDesease');
        $patient->patient_status = $request->input('patient_status');
        $patient_password = $request->input('patient_password');
        if($patient_password != '' &&  strlen($patient_password) > 0){
            $patient->patient_password =  Hash::make($request->input('patient_password'));
        }
        
        if ($request->hasfile('patient_profileImage')) {
            $destination = 'uploads/PatientProfileImages/' . $patient->patient_profileImage;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('patient_profileImage');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . "." . $extension;
            $file->move('uploads/PatientProfileImages/', $filename);
            $patient->patient_profileImage = $filename;
        }



        $patient->update();
     
        Session::flash('message', 'Patient Updated!!!');
        Session::flash('alert-class', 'alert-success');

        return redirect()->route('admin.patient');
    }



    public function delete(Request $request)
    {
        if ($request->method() == 'POST') {
            Patient::where('id', $request->id)->delete();
            return true;
        }
    }

    public function patientStatus(Request $request)
    {
        if ($request->method() == 'POST') {
            Patient::where('id', $request->id)->update(['patient_status' =>  $request->patient_status]);
            return true;
        }
    }

    public function profile($id)
    {
        $patients = Patient::where('id', $id)->first();
        return view('patients.profile', ['patients' => $patients]);
    }



}
