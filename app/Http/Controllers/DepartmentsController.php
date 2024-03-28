<?php

namespace App\Http\Controllers;

use App\Models\Departments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class DepartmentsController extends Controller
{

    public function index()
    {
        $departments = Departments::all();
        return view('departments.department', ['departments' => $departments]);
    }

    public function create()
    {
        return view('departments.adddepartment');
    }

    public function store(Request $request)
    {
        if ($request->method() == 'POST') {
         

            $departments = new Departments;
            $departments->title = $request->input('title');
            $departments->description = $request->input('description');
        

            if ($request->hasfile('image')) {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . "." . $extension;
                $file->move('public/uploads/DepartmentsImages/', $filename);
                $departments->image = $filename;
            } else {
                $departments->image = '';
            }

            $departments->save();

            Session::flash('message', 'Successfully Added!!!');
            Session::flash('alert-class', 'alert-success');
            return redirect()->route('admin.department');
        }
    }

    public function edit($id)
    {
        //echo $id;die;
        $departments = Departments::where('id', $id)->first();
        //echo '<pre>';
        //print_r($departments);
        //die;
        return view('departments.updatedepartment', ['departments' => $departments]);
    }

    public function update(Request $request, $id)
    {
        //echo $id;die;
        if ($request->method() == 'POST') {
            $deptExist = Departments::where('id', $id)->get();
            if($deptExist){
                $departments = $deptExist->first();
                $departments->title = $request->input('title');
                $departments->description = $request->input('description');
                
                if ($request->hasfile('image')) {
                    $destination = 'public/uploads/DepartmentsImages/' . $departments->image;
                    if (File::exists($destination)) {
                        File::delete($destination);
                    }
                    $file = $request->file('image');
                    $extension = $file->getClientOriginalExtension();
                    $filename = time() . "." . $extension;
                    $file->move('public/uploads/DepartmentsImages/', $filename);
                    $departments->image = $filename;
                }
    
                $departments->update();
                Session::flash('message', 'department Updated Successfully');
                Session::flash('alert-class', 'alert-success');
            }else{
                Session::flash('message', 'department Not Update');
                Session::flash('alert-class', 'alert-danger');
            }
            
            
            return redirect()->route('admin.department');
        }
    }

    public function delete(Request $request)
    {
        if ($request->method() == 'POST') {
            Departments::where('id', $request->id)->delete();
            return true;
        }
    }

    public function departmentview($id)
    {
        $departments = Departments::where('id', $id)->first();
        return view('departments.viewdepartment', ['departments' => $departments]);
    }

    


}
