<?php

namespace App\Http\Controllers;

use App\Models\Lab;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class LabController extends Controller
{
    function check(Request $request){
        //Validate Inputs
        $request->validate([
           'email'=>'required|email|exists:labs,email',
           'password'=>'required|min:5|max:30'
        ],[
            'email.exists'=>'This email is not exists.'
        ]);

        $creds = $request->only('email','password');

        if( Auth::guard('lab')->attempt($creds) ){
            return redirect()->route('lab.home');
        }else{
            return redirect()->route('lab.login')->with('fail','Incorrect credentials');
        }
   }

   function logout(){
       Auth::guard('lab')->logout();
       return redirect('/');
   }

    
    public function index()
    {
        $labs = Lab::all();
        return view('labs.lab', ['labs' => $labs]);
    }


    public function create()
    {
        return view('labs.addlab');
    }

    public function store(Request $request)
    {
        if ($request->method() == 'POST') {
            $data = $request->validate([
                'lab_name' => 'required|string|max:160'
            ]);

            Lab::create($data);
            Session::flash('message', 'Lab  Successfully Added!!!');
            Session::flash('alert-class', 'alert-success');
           
            return redirect()->route('admin.lab');
        }

    }



    public function edit($id)
    {
        $labs = Lab::where('id', $id)->first();
        return view('labs.updatelab', ['labs' => $labs]);
    }


    public function update(Request $request, $id)
    {
        $labs = Lab::where('id', $id)->first();
        if ($request->method() == 'POST') {
            $data = $request->validate([
                'lab_name' => 'required|string|max:255',
            ]);
            $labs->update($data);
            Session::flash('message', 'lab Updated!!!');
            Session::flash('alert-class', 'alert-success');
           
            return redirect()->route('admin.lab');
        }
    }


    public function delete(Request $request)
    {
        if ($request->method() == 'POST') {
            Lab::where('id', $request->id)->delete();
            return true;
        }
    }
}