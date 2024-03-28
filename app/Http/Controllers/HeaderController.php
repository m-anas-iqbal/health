<?php

namespace App\Http\Controllers;

use App\Models\Header;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class HeaderController extends Controller
{

    public function index()
    {
        $headers = Header::all();
        return view('headers.header', ['headers' => $headers]);
    }

    public function create()
    {
        return view('headers.addheader');
    }

    public function store(Request $request)
    {
        if ($request->method() == 'POST') {


            $headers = new header;
            $headers->name = $request->input('name');
            $headers->link = $request->input('link');

            $headers->save();

            Session::flash('message', 'Successfully Added!!!');
            Session::flash('alert-class', 'alert-success');
            return redirect()->route('admin.header');
        }
    }

    public function edit($id)
    {
        $headers = Header::where('id', $id)->first();
        return view('headers.updateheader', ['headers' => $headers]);
    }

    public function update(Request $request, $id)
    {

        if ($request->method() == 'POST') {
            $headers = Header::where('id', $id)->first();
            $headers->name = $request->input('name');
            $headers->link = $request->input('link');

            $headers->update();
            Session::flash('message', 'header Updated!!!');
            Session::flash('alert-class', 'alert-success');
            return redirect()->route('admin.header');
        }
    }

    public function delete(Request $request)
    {
        if ($request->method() == 'POST') {
            Header::where('id', $request->id)->delete();
            return true;
        }
    }
}
