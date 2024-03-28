<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HospitalController extends Controller
{

    function check(Request $request){
        //Validate Inputs
        $request->validate([
           'email'=>'required|email|exists:hospitals,email',
           'password'=>'required|min:5|max:30'
        ],[
            'email.exists'=>'This email is not exists.'
        ]);

        $creds = $request->only('email','password');

        if( Auth::guard('hospital')->attempt($creds) ){
            return redirect()->route('hospital.home');
        }else{
            return redirect()->route('hospital.login')->with('fail','Incorrect credentials');
        }
   }

   function logout(){
       Auth::guard('hospital')->logout();
       return redirect('hospital/login');
   }

    public function index()
    {
        $hospitals = Hospital::all();
        return view('hospitals.hospital', ['hospitals' => $hospitals]);
    }


    public function create()
    {
        return view('hospitals.addhospital');
    }

    public function store(Request $request)
    {
        if ($request->method() == 'POST') {
            $data = DB::table('hospitals')->insert([
                'hospital_name' => $request->hospital_name,
                'hospital_address' => $request->hospital_address,
                'hospital_phone' => $request->hospital_phone,
                'hospital_city' => $request->hospital_city,
                'hospital_zip' => $request->hospital_zip,
                'hospital_province' => $request->hospital_province,
                'hospital_emergencyServices' =>  $request->hospital_emergencyServices,
                'hospital_em_value1' => $request->hospital_em_value1,
                'hospital_em_value2' => $request->hospital_em_value2,
                'hospital_em_value3' => $request->hospital_em_value3,
            ]);

           

            Session::flash('message', 'Hospital Successfully Added!!!');
            Session::flash('alert-class', 'alert-success');
            
            return redirect()->route('admin.hospital');
        }
    }



    public function edit($id)
    {
        $hospitals = Hospital::where('id', $id)->first();
        return view('hospitals.updatehospital', ['hospitals' => $hospitals]);
    }


    public function update(Request $request, $id)
    {
        if ($request->method() == 'POST') {

            $hospitals = Hospital::find($id);
            $hospitals->hospital_name = $request->input('hospital_name');
            $hospitals->hospital_address = $request->input('hospital_address');
            $hospitals->hospital_phone = $request->input('hospital_phone');
            $hospitals->hospital_city = $request->input('hospital_city');
            $hospitals->hospital_zip = $request->input('hospital_zip');
            $hospitals->hospital_province = $request->input('hospital_province');
            $hospitals->hospital_emergencyServices =  $request->input('hospital_emergencyServices');
            if ($hospitals->hospital_emergencyServices == 0) {
                $hospitals->hospital_em_value1 =  '0';
                $hospitals->hospital_em_value2 =  '0';
                $hospitals->hospital_em_value3 =  '0';
            } else {
                $hospitals->hospital_em_value1 =  $request->input('hospital_em_value1');
                $hospitals->hospital_em_value2 =  $request->input('hospital_em_value2');
                $hospitals->hospital_em_value3 =  $request->input('hospital_em_value3');
            }
            $hospitals->update();
            
            return redirect()->route('admin.hospital');
        }
        Session::flash('message', 'Hospital Updated!!!');
        Session::flash('alert-class', 'alert-success');
        
        return redirect()->route('admin.hospital');
    }


    public function delete(Request $request)
    {
        if ($request->method() == 'POST') {
            Hospital::where('id', $request->id)->delete();
            return true;
        }
    }

    public function nurse(){echo 'hospital nurse will comming soon.';}

    public function profile(){ echo 'hospital user profile will comming soon.'; }
}
