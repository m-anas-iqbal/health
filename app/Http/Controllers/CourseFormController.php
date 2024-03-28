<?php

namespace App\Http\Controllers;

use App\Models\CourseForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CourseFormController extends Controller
{

    public function index()
    {
        $courseforms = CourseForm::all();
        return view('course_forms.course_form', ['courseforms' => $courseforms]);
    }


    public function create()
    {
        return view('course_forms.addcourse_form');
    }


    public function store(Request $request)
    {
        if ($request->method() == 'POST') {
            $data = $request->validate([
                'course_name' => 'required|string|max:160'
            ]);

            CourseForm::create($data);
            Session::flash('message', '' . $data['course_name'] . ' Successfully Added!!!');
            Session::flash('alert-class', 'alert-success');
            return redirect()->route('admin.courseform');
        }
    }


    public function edit($id)
    {
        $courseforms = CourseForm::where('id', $id)->first();
        return view('course_forms.updatecourse_form', ['courseforms' => $courseforms]);
    }


    public function update(Request $request, $id)
    {
        $courseforms = CourseForm::where('id', $id)->first();
        if ($request->method() == 'POST') {
            $data = $request->validate([
                'course_name' => 'required|string|max:255'
            ]);
            $courseforms->update($data);
            Session::flash('message', 'Course Updated!!!');
            Session::flash('alert-class', 'alert-success');
            return redirect()->route('admin.courseform');
        }
    }

    public function delete(Request $request)
    {
        if ($request->method() == 'POST') {
            CourseForm::where('id', $request->id)->delete();
            return true;
        }
    }
}
