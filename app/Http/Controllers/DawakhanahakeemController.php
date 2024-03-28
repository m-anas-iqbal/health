<?php

namespace App\Http\Controllers;

use App\Models\Dawakhanahakeem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\DawakhanaLogin;

class DawakhanahakeemController extends Controller
{

    public function index()
    {
        $dawakhanas = Dawakhanahakeem::all();
        return view('dawakhanashakeem.dawakhana', ['dawakhanas' => $dawakhanas]);
    }

    public function create()
    {
        return view('dawakhanashakeem.adddawakhana');
    }

    public function store(Request $request)
    {
        if ($request->method() == 'POST') {
            $data = $request->validate([
                'dawakhana_name' => 'required|string|max:160'
            ]);

            Dawakhanahakeem::create($data);
            Session::flash('message', 'Dawakhana ' . $data['dawakhana_name'] . ' Successfully Added!!!');
            Session::flash('alert-class', 'alert-success');
            return redirect()->route('admin.dawakhanahakeem');
        }
    }

    public function edit($id)
    {
        $dawakhanas = Dawakhanahakeem::where('id', $id)->first();
        return view('dawakhanashakeem.updatedawakhana', ['dawakhanas' => $dawakhanas]);
    }

    public function update(Request $request, $id)
    {
        $dawakhanas = Dawakhanahakeem::where('id', $id)->first();
        if ($request->method() == 'POST') {
            $data = $request->validate([
                'dawakhana_name' => 'required|string|max:255'
            ]);
            $dawakhanas->update($data);
            Session::flash('message', 'Dawakhana Updated!!!');
            Session::flash('alert-class', 'alert-success');
            return redirect()->route('admin.dawakhanahakeem');
        }
    }

    public function delete(Request $request)
    {
        if ($request->method() == 'POST') {
            Dawakhanahakeem::where('id', $request->id)->delete();
            return true;
        }
    }

   


}
