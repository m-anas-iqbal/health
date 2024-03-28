<?php

namespace App\Http\Controllers;

use App\Models\Section2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class Section2Controller extends Controller
{

    public function index()
    {
        $section2s = Section2::all();
        return view('headers.updatesection2', ['section2s' => $section2s]);
    }


    public function edit($id)
    {
        $section2s = Section2::where('id', $id)->first();
        return view('headers.updatesection2', ['section2s' => $section2s]);
    }

    public function update(Request $request, $id)
    {

        if ($request->method() == 'POST') {
            $section2s = Section2::where('id', $id)->first();

            $section2s->heading = $request->input('heading');
            $section2s->description = $request->input('description');
            $section2s->btntext = $request->input('btntext');
            $section2s->btnlink = $request->input('btnlink');

            if ($request->hasfile('image1')) {
                $destination = 'uploads/Section2ImagesSave/' . $section2s->image1;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
                $file = $request->file('image1');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . "." . $extension;
                $file->move('uploads/Section2ImagesSave/', $filename);
                $section2s->image1 = $filename;
            }

            if ($request->hasfile('image2')) {
                $destination = 'uploads/Section2ImagesSave/' . $section2s->image2;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
                $file = $request->file('image2');
                $extension = $file->getClientOriginalExtension();
                $filename = time() .  rand() . "." . $extension;
                $file->move('uploads/Section2ImagesSave/', $filename);
                $section2s->image2 = $filename;
            }

            $section2s->update();
            Session::flash('message', 'Section 2 Updated!!!');
            Session::flash('alert-class', 'alert-success');
            return redirect()->route('admin.header');
        }
    }
}
