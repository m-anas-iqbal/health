<?php

namespace App\Http\Controllers;

use App\Models\Bolgs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class BolgsController extends Controller
{

    public function index()
    {
        $blogs = Bolgs::all();
        return view('blogs.blog', ['blogs' => $blogs]);
    }

    public function create()
    {
        return view('blogs.addblog');
    }

    public function store(Request $request)
    {
        if ($request->method() == 'POST') {
         

            $bolgs = new Bolgs;
            $bolgs->title = $request->input('title');
            $bolgs->description = $request->input('description');
        

            if ($request->hasfile('image')) {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . "." . $extension;
                $file->move('uploads/BolgsImages/', $filename);
                $bolgs->image = $filename;
            } else {
                $bolgs->image = '';
            }

            $bolgs->save();

            Session::flash('message', 'Successfully Added!!!');
            Session::flash('alert-class', 'alert-success');
            return redirect()->route('admin.blog');
        }
    }

    public function edit($id)
    {
        $blogs = Bolgs::where('id', $id)->first();
        return view('blogs.updateblog', ['blogs' => $blogs]);
    }

    public function update(Request $request, $id)
    {
        if ($request->method() == 'POST') {
            $bolgExist = Bolgs::where('id', $id)->first();
            if($bolgExist){
                $bolgs = $bolgExist->first();
                $bolgs->title = $request->input('title');
                $bolgs->description = $request->input('description');
                
                if ($request->hasfile('image')) {
                    $destination = 'public/uploads/BolgsImages/' . $bolgs->image;
                    if (File::exists($destination)) {
                        File::delete($destination);
                    }
                    $file = $request->file('image');
                    $extension = $file->getClientOriginalExtension();
                    $filename = time() . "." . $extension;
                    $file->move('public/uploads/BolgsImages/', $filename);
                    $bolgs->image = $filename;
                }
    
                $bolgs->update();
                Session::flash('message', 'Blog Updated Successfully');
                Session::flash('alert-class', 'alert-success');
            }else{
                Session::flash('message', 'Blog Not Update');
                Session::flash('alert-class', 'alert-danger');
            }
            
            
            return redirect()->route('admin.blog');
        }
    }

    public function delete(Request $request)
    {
        if ($request->method() == 'POST') {
            Bolgs::where('id', $request->id)->delete();
            return true;
        }
    }

    public function blogview($id)
    {
        $blogs = Bolgs::where('id', $id)->first();
        return view('blogs.viewblog', ['blogs' => $blogs]);
    }

    


}
