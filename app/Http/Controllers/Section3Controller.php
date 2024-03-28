<?php

namespace App\Http\Controllers;

use App\Models\Section3;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class Section3Controller extends Controller
{


    public function index()
    {
        $section3s = Section3::all();
        return view('headers.updatesection3', ['section3s' => $section3s]);
    }


    public function edit($id)
    {
        $section3s = Section3::where('id', $id)->first();
        return view('headers.updatesection3', ['section3s' => $section3s]);
    }

    public function update(Request $request, $id)
    {

        if ($request->method() == 'POST') {
            $section3s = Section3::where('id', $id)->first();

            $section3s->heading = $request->input('heading');
            $section3s->description = $request->input('description');
            $section3s->btntext = $request->input('btntext');
            $section3s->btnlink = $request->input('btnlink');

            if ($request->hasfile('image1')) {
                $destination = 'uploads/Section3ImagesSave/' . $section3s->image1;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
                $file = $request->file('image1');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . "." . $extension;
                $file->move('uploads/Section3ImagesSave/', $filename);
                $section3s->image1 = $filename;
            }

            if ($request->hasfile('image2')) {
                $destination = 'uploads/Section3ImagesSave/' . $section3s->image2;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
                $file = $request->file('image2');
                $extension = $file->getClientOriginalExtension();
                $filename = time() .  rand() . "." . $extension;
                $file->move('uploads/Section3ImagesSave/', $filename);
                $section3s->image2 = $filename;
            }

            $section3s->update();
            Session::flash('message', 'Section 2 Updated!!!');
            Session::flash('alert-class', 'alert-success');
            return redirect()->route('admin.header');
        }
    }
}
