<?php

namespace App\Http\Controllers;



use App\Models\QuickLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class QuickLinkController extends Controller
{

    public function index()
    {
        $quicklinks = QuickLink::all();
        return view('footers.quicklink', ['quicklinks' => $quicklinks]);
    }

    public function create()
    {
        return view('footers.addquicklink');
    }

    public function store(Request $request)
    {
        if ($request->method() == 'POST') {


            $quicklinks = new quicklink;
            $quicklinks->name = $request->input('name');
            $quicklinks->link = $request->input('link');

            $quicklinks->save();

            Session::flash('message', 'Successfully Added!!!');
            Session::flash('alert-class', 'alert-success');
            return redirect()->route('admin.quicklink');
        }
    }

    public function edit($id)
    {
        $quicklinks = QuickLink::where('id', $id)->first();
        return view('footers.updatequicklink', ['quicklinks' => $quicklinks]);
    }

    public function update(Request $request, $id)
    {

        if ($request->method() == 'POST') {
            $quicklinks = QuickLink::where('id', $id)->first();
            $quicklinks->name = $request->input('name');
            $quicklinks->link = $request->input('link');

            $quicklinks->update();
            Session::flash('message', 'quicklink Updated!!!');
            Session::flash('alert-class', 'alert-success');
            return redirect()->route('admin.quicklink');
        }
    }

    public function delete(Request $request)
    {
        if ($request->method() == 'POST') {
            QuickLink::where('id', $request->id)->delete();
            return true;
        }
    }
}
