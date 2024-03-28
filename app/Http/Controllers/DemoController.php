<?php

namespace App\Http\Controllers;

use App\Models\Demo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DemoController extends Controller
{
    public function index()
    {
        $Demo = Demo::all();
        return view('Demo.show', ['Demo' => $Demo]);
    }

    public function create()
    {
        return view('Demo.add');
    }

    public function store(Request $request)
    {
        if ($request->method() == 'POST') {
        
            $Demo = new Demo;
            $Demo->title = $request->input('title');
            $Demo->description = $request->input('description');
            $Demo->save();

            Session::flash('message', 'Successfully Added!!!');
            Session::flash('alert-class', 'alert-success');
            return redirect()->route('admin.Demo');
        }
    }

    public function edit($id)
    {
        $Demo = Demo::where('id', $id)->first();
        return view('Demo.update', ['Demo' => $Demo]);
    }

    public function update(Request $request, $id)
    {
       
        if ($request->method() == 'POST') {
            $Demo = Demo::where('id', $id)->first();
            $Demo->title = $request->input('title');
        
            $Demo->update();


            Session::flash('message', 'blog Updated!!!');
            Session::flash('alert-class', 'alert-success');
            return redirect()->route('admin.blog');
        }
    }

    public function delete(Request $request)
    {
        if ($request->method() == 'POST') {
            Demo::where('id', $request->id)->delete();
            return true;
        }
    }

    public function profile($id)
    {
        $Demo = Demo::where('id', $id)->first();
        return view('Demo.profile', ['Demo' => $Demo]);
    }



}
