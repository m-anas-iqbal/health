<?php

namespace App\Http\Controllers;

use App\Models\houses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HousesController extends Controller
{
    public function index()
    {
        $houses = houses::all();
        return view('houses.house', ['houses' => $houses]);
    }

    public function create()
    {
        return view('houses.addhouse');
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

            houses::create($data);
            Session::flash('message', '' . $data['house_name'] . ' Successfully Added!!!');
            Session::flash('alert-class', 'alert-success');
            return redirect()->route('admin.house');
        }
    }


    public function edit($id)
    {
        $houses = houses::where('id', $id)->first();
        return view('houses.updatehouse', ['houses' => $houses]);
    }



    public function update(Request $request, $id)
    {
        $houses = houses::where('id', $id)->first();
        if ($request->method() == 'POST') {
            $data = $request->validate([
                'address' => 'required|string|max:160',
                'size' => 'required|string|max:160',
                'avaiablity' => 'required|string|max:160',
                'type' => 'required|string|max:160',

            ]);
            $houses->update($data);
            Session::flash('message', 'Doctor Type Updated!!!');
            Session::flash('alert-class', 'alert-success');

            return redirect()->route('admin.house');
        }
    }


    public function delete(Request $request)
    {
        if ($request->method() == 'POST') {
            houses::where('id', $request->id)->delete();
            return true;
        }
    }
}
