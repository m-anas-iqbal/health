<?php

namespace App\Http\Controllers;

use App\Models\DoctorType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DoctorTypeController extends Controller
{

    public function index()
    {
        $doctorTypes = DoctorType::all();
        return view('doctor_types.doctor_type', ['doctorTypes' => $doctorTypes]);
    }


    public function create()
    {
        return view('doctor_types.adddoctor_type');
    }


    public function store(Request $request)
    {
        if ($request->method() == 'POST') {
            $data = $request->validate([
                'doctorType_name' => 'required|string|max:160'
            ]);

            DoctorType::create($data);
            Session::flash('message', '' . $data['doctorType_name'] . ' Successfully Added!!!');
            Session::flash('alert-class', 'alert-success');
            
            return redirect()->route('admin.doctortype');
        }
    }


    public function edit($id)
    {
        $doctorTypes = DoctorType::where('id', $id)->first();
        return view('doctor_types.updatedoctor_type', ['doctorTypes' => $doctorTypes]);
    }



    public function update(Request $request, $id)
    {
        $doctorTypes = DoctorType::where('id', $id)->first();
        if ($request->method() == 'POST') {
            $data = $request->validate([
                'doctorType_name' => 'required|string|max:255'

            ]);
            $doctorTypes->update($data);
            Session::flash('message', 'Doctor Type Updated!!!');
            Session::flash('alert-class', 'alert-success');
            
            return redirect()->route('admin.doctortype');
        }
    }


    public function delete(Request $request)
    {
        if ($request->method() == 'POST') {
            DoctorType::where('id', $request->id)->delete();
            return true;
        }
    }
}
