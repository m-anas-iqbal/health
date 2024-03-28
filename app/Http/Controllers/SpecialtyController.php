<?php

namespace App\Http\Controllers;

use App\Models\Specialty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SpecialtyController extends Controller
{

    public function index()
    {
        $specialties = Specialty::all();
        return view('specialties.specialties', ['specialties' => $specialties]);
    }


    public function create()
    {
        return view('specialties.addspecialty');
    }


    public function store(Request $request)
    {
        if ($request->method() == 'POST') {
            $data = $request->validate([
                'specialty_name' => 'required|string|max:160'
            ]);
            
            Specialty::create($data);
            Session::flash('message', ' ' . $data['specialty_name'] . ' Successfully Added!!!');
            Session::flash('alert-class', 'alert-success');
            return redirect()->route('admin.specialty');
        }
    }

    public function edit($id)
    {
        $specialties = Specialty::where('id', $id)->first();
        return view('specialties.updatespecialty', ['specialties' => $specialties]);
    }

    public function update(Request $request, $id)
    {
        $specialties = Specialty::where('id', $id)->first();
        if ($request->method() == 'POST') {
            $data = $request->validate([
                'specialty_name' => 'required|string|max:255'
            ]);
            $specialties->update($data);
            Session::flash('message', 'Specialty Updated!!!');
            Session::flash('alert-class', 'alert-success');
            return redirect()->route('admin.specialty');
        }
    }

    public function delete(Request $request)
    {
        if ($request->method() == 'POST') {
            Specialty::where('id', $request->id)->delete();
            return true;
        }
    }
}
