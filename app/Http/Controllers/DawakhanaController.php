<?php

namespace App\Http\Controllers;

use App\Models\Dawakhana;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\DawakhanaLogin;

class DawakhanaController extends Controller
{

    public function index()
    {
        $dawakhanas = Dawakhana::all();
        return view('dawakhanas.dawakhana', ['dawakhanas' => $dawakhanas]);
    }

    public function create()
    {
        return view('dawakhanas.adddawakhana');
    }

    public function store(Request $request)
    {
        if ($request->method() == 'POST') {
            $data = $request->validate([
                'dawakhana_name' => 'required|string|max:160'
            ]);

            Dawakhana::create($data);
            Session::flash('message', 'Dawakhana ' . $data['dawakhana_name'] . ' Successfully Added!!!');
            Session::flash('alert-class', 'alert-success');
            return redirect()->route('admin.dawakhana');
        }
    }

    public function edit($id)
    {
        $dawakhanas = Dawakhana::where('id', $id)->first();
        return view('dawakhanas.updatedawakhana', ['dawakhanas' => $dawakhanas]);
    }

    public function update(Request $request, $id)
    {
        $dawakhanas = Dawakhana::where('id', $id)->first();
        if ($request->method() == 'POST') {
            $data = $request->validate([
                'dawakhana_name' => 'required|string|max:255'
            ]);
            $dawakhanas->update($data);
            Session::flash('message', 'Dawakhana Updated!!!');
            Session::flash('alert-class', 'alert-success');
            return redirect()->route('admin.dawakhana');
        }
    }

    public function delete(Request $request)
    {
        if ($request->method() == 'POST') {
            Dawakhana::where('id', $request->id)->delete();
            return true;
        }
    }

   


}
