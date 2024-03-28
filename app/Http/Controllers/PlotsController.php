<?php

namespace App\Http\Controllers;

use App\Models\plots;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PlotsController extends Controller
{
    public function index()
    {
        $plots = plots::all();
        return view('plots.plot', ['plots' => $plots]);
    }


    public function create()
    {
        return view('plots.addplot');
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

            plots::create($data);
            Session::flash('message', '' . $data['plot_name'] . ' Successfully Added!!!');
            Session::flash('alert-class', 'alert-success');

            return redirect()->route('admin.plot');
        }
    }


    public function edit($id)
    {
        $plots = plots::where('id', $id)->first();
        return view('plots.updateplot', ['plots' => $plots]);
    }



    public function update(Request $request, $id)
    {
        $plots = plots::where('id', $id)->first();
        if ($request->method() == 'POST') {
            $data = $request->validate([
                'address' => 'required|string|max:160',
                'size' => 'required|string|max:160',
                'avaiablity' => 'required|string|max:160',
                'type' => 'required|string|max:160',

            ]);
            $plots->update($data);
            Session::flash('message', 'Doctor Type Updated!!!');
            Session::flash('alert-class', 'alert-success');

            return redirect()->route('admin.plot');
        }
    }


    public function delete(Request $request)
    {
        if ($request->method() == 'POST') {
            plots::where('id', $request->id)->delete();
            return true;
        }
    }
}
