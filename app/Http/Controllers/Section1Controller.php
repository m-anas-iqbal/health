<?php

namespace App\Http\Controllers;

use App\Models\Section1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class Section1Controller extends Controller
{

    public function index()
    {
        $section1s = Section1::all();
        return view('headers.updatesection1', ['section1s' => $section1s]);
    }


    public function edit($id)
    {
        $section1s = Section1::where('id', $id)->first();
        return view('headers.updatesection1', ['section1s' => $section1s]);
    }

    public function update(Request $request,$id)
    {

        if ($request->method() == 'POST') {
            $section1s = Section1::where('id',$id)->first();

            $section1s->heading = $request->input('heading');
            $section1s->description = $request->input('description');
            $section1s->btntext = $request->input('btntext');
            $section1s->btnlink = $request->input('btnlink');

            if ($request->hasfile('image1')) {
                $destination = 'uploads/Section1ImagesSave/' . $section1s->image1;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
                $file = $request->file('image1');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . "." . $extension;
                $file->move('uploads/Section1ImagesSave/', $filename);
                $section1s->image1 = $filename;
            }

            if ($request->hasfile('image2')) {
                $destination = 'uploads/Section1ImagesSave/' . $section1s->image2;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
                $file = $request->file('image2');
                $extension = $file->getClientOriginalExtension();
                $filename = time() .  rand() . "." . $extension;
                $file->move('uploads/Section1ImagesSave/', $filename);
                $section1s->image2 = $filename;
            }

            $section1s->update();
            Session::flash('message', 'Section1 Updated!!!');
            Session::flash('alert-class', 'alert-success');
            return redirect()->route('admin.header');
        }
    }

}
