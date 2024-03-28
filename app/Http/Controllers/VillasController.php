<?php

namespace App\Http\Controllers;

use App\Models\villas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class VillasController extends Controller
{


    public function index()
    {
        $villas = villas::all();
        return view('villas.villa', ['villas' => $villas]);
    }


    public function create()
    {
        return view('villas.addvilla');
    }


    public function store(Request $request)
    {
        if ($request->method() == 'POST') {
            $data = $request->validate([
                'address' => 'required|string|max:160',
                'size' => 'required|string|max:160',
                'avaiablity' => 'required|string|max:160',
                'type' => 'required|string|max:160',
            ]);

            villas::create($data);
            Session::flash('message', '' . $data['villa_name'] . ' Successfully Added!!!');
            Session::flash('alert-class', 'alert-success');

            return redirect()->route('admin.villa');
        }
    }


    public function edit($id)
    {
        $villas = villas::where('id', $id)->first();
        return view('villas.updatevilla', ['villas' => $villas]);
    }



    public function update(Request $request, $id)
    {
        $villas = villas::where('id', $id)->first();
        if ($request->method() == 'POST') {
            $data = $request->validate([
                'address' => 'required|string|max:160',
                'size' => 'required|string|max:160',
                'avaiablity' => 'required|string|max:160',
                'type' => 'required|string|max:160',

            ]);
            $villas->update($data);
            Session::flash('message', 'Doctor Type Updated!!!');
            Session::flash('alert-class', 'alert-success');

            return redirect()->route('admin.villa');
        }
    }


    public function delete(Request $request)
    {
        if ($request->method() == 'POST') {
            villas::where('id', $request->id)->delete();
            return true;
        }
    }
}
