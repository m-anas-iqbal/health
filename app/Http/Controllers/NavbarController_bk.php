<?php

namespace App\Http\Controllers;

use App\Models\navbar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class NavbarController extends Controller
{

    public function index()
    {
        $navbar = navbar::all();
        return view('navbar.navbar', ['navbars' => $navbar]);
    }

     public function create()
    {
        return view('navbar.addnavbar');
    }

       public function store(Request $request)
    {
        if ($request->method() == 'POST') {
         

            $navbars = new navbar;
            $navbars->title = $request->input('title');
            $navbars->parent = $request->input('parent');
            $navbars->description = $request->input('description');
            $navbars->sort = $request->input('sort');
            $navbars->status = $request->input('status');

            $navbars->save();

            Session::flash('message', 'Successfully Added!!!');
            Session::flash('alert-class', 'alert-success');
            return redirect()->route('admin.navbar');
        }
    }


     public function edit($id)
    {
        $navbars = navbar::where('id', $id)->first();
        return view('navbar.updatenavbar', ['navbars' => $navbars]);
    }


      public function update(Request $request, $id)
    {
        echo '<pre>';
        print_r($request->all());
        die;
        if ($request->method() == 'POST') {
            $navbarExist = navbar::where('id', $id)->get();
            if($navbarExist){
                $navbars = $navbarExist->first();
                $navbars->title = $request->input('title');
                $navbars->parent = $request->input('parent');
                $navbars->description = $request->input('description');
                $navbars->sort = $request->input('sort');
                $navbars->status = $request->input('status');
                $navbars->update();
                Session::flash('message', 'Navbar Updated Successfully');
                Session::flash('alert-class', 'alert-success');
            }else{
                Session::flash('message', 'Navbar Not Update');
                Session::flash('alert-class', 'alert-danger');
            }
            
            
            return redirect()->route('admin.navbar');
        }
    }

    public function delete(Request $request)
    {
        if ($request->method() == 'POST') {
            navbar::where('id', $request->id)->delete();
            return true;
        }
    }
      public function navbarview($id)
    {
        $navbars = navbar::where('id', $id)->first();
        return view('navbar.viewnavbar', ['navbars' => $navbars]);
    }

 

}
