<?php

namespace App\Http\Controllers;

use App\Models\Nurse;
use App\Models\Hospital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class NurseController extends Controller
{

    public function index()
    {
        $nurses = DB::table('hospitals')
            ->join('nurses', 'nurses.nurse_hospitalID', '=', 'hospitals.id')
            ->select('*')
  
            ->get();


        

        // $nurses = Nurse::all();
        return view('nurses.nurse', ['nurses' => $nurses]);
    }


    public function create()
    {
        $hospitals = Hospital::all();
        return view('nurses.addnurse', ['hospitals' => $hospitals]);
    }

    public function store(Request $request)
    {
        if ($request->method() == 'POST') {
            $data = $request->validate([
                'nurse_name' => 'nullable|string|max:255',
                'nurse_gender' => 'nullable|string|max:255',
                'nurse_address' => 'nullable|string|max:255',
                'nurse_phone' => 'nullable|string|max:255',
                'nurse_hospitalID' => 'nullable|string|max:255',
            ]);

            Nurse::create($data);
            Session::flash('message', '' . $data['nurse_name'] . ' Successfully Added!!!');
            Session::flash('alert-class', 'alert-success');
            
            return redirect()->route('admin.nurse');
        }
    }

    public function edit($id)
    {
        $nurses = Nurse::where('id', $id)->first();

        $hospitals = DB::table('nurses')
            ->join('hospitals', 'hospitals.id', '=', 'nurses.nurse_hospitalID')
            ->select('*')
            ->get();


        return view('nurses.updatenurse', ['nurses' => $nurses, 'hospitals' => $hospitals]);
    }

    public function update(Request $request, $id)
    {
        $nurses = Nurse::where('id', $id)->first();
        if ($request->method() == 'POST') {
            $data = $request->validate([
                'nurse_name' => 'nullable|string|max:255',
                'nurse_gender' => 'nullable|string|max:255',
                'nurse_address' => 'nullable|string|max:255',
                'nurse_phone' => 'nullable|string|max:255',
                'nurse_hospitalID' => 'nullable|string|max:255',
            ]);

           // var_dump($data);die();
            $nurses->update($data);
            Session::flash('message', 'Nurse Updated!!!');
            Session::flash('alert-class', 'alert-success');
            
            return redirect()->route('admin.nurse');
        }
    }

    public function delete(Request $request)
    {
        if ($request->method() == 'POST') {
            Nurse::where('id', $request->id)->delete();
            return true;
        }
    }
}
