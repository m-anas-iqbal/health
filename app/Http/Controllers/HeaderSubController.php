<?php

namespace App\Http\Controllers;

use App\Models\HeaderSub;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Header;

class HeaderSubController extends Controller
{
    public function index($id)
    {
        $subheaders = HeaderSub::all();
        $headers = Header::where('id', $id)->first();
        return view('headers.subheader', ['subheaders' => $subheaders, 'headers' => $headers]);
    }

    public function create($id)
    {
        $headers = Header::where('id', $id)->first();
        return view('headers.addsubheader', ['headers' => $headers]);
 
    }

    public function store(Request $request,$id)
    {
        if ($request->method() == 'POST') {


            $subheaders = new HeaderSub;
            $subheaders->name = $request->input('name');
            $subheaders->link = $request->input('link');
            $subheaders->headerId = $id;
            $subheaders->save();

            Session::flash('message', 'Successfully Added!!!');
            Session::flash('alert-class', 'alert-success');
            return redirect()->route('admin.subheader',$id);
        }
    }

    public function edit($id)
    {
        $subheaders = HeaderSub::where('id', $id)->first();
        return view('headers.updatesubheader', ['subheaders' => $subheaders]);
    }

    public function update(Request $request, $id)
    {

        if ($request->method() == 'POST') {
            $headers = HeaderSub::where('id', $id)->first();
            $headers->name = $request->input('name');
            $headers->link = $request->input('link');
            $headerID = $headers->headerID = $request->input('headerID');
            
            $headers->update();
            Session::flash('message', 'header Updated!!!');
            Session::flash('alert-class', 'alert-success');
            return redirect()->route('admin.subheader',$headerID);
        }
    }

    public function delete(Request $request)
    {
        if ($request->method() == 'POST') {
            HeaderSub::where('id', $request->id)->delete();
            return true;
        }
    }
}
