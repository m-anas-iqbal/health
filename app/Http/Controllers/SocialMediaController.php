<?php


namespace App\Http\Controllers;

use App\Models\SocialMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class SocialMediaController extends Controller
{


    public function index()
    {
      

        $socialmedias = SocialMedia::all();
     

        return view('footers.socialmedia', [ 'socialmedias' => $socialmedias]);
    }

    public function create()
    {
        return view('footers.addsocialmedia');
    }

    public function store(Request $request)
    {
        if ($request->method() == 'POST') {
         

            $socialmedias = new SocialMedia;
            $socialmedias->icon = $request->input('icon');
            $socialmedias->link = $request->input('link');
      
            $socialmedias->save();

            Session::flash('message', 'Successfully Added!!!');
            Session::flash('alert-class', 'alert-success');
            return redirect()->route('admin.socialmedia');
        }
    }

    public function edit($id)
    {
        $socialmedias = SocialMedia::where('id', $id)->first();
        return view('footers.updatesocialmedia', ['socialmedias' => $socialmedias]);
    }

    public function update(Request $request, $id)
    {
       
        if ($request->method() == 'POST') {
            $socialmedias = SocialMedia::where('id', $id)->first();
            $socialmedias->icon = $request->input('icon');
            $socialmedias->link = $request->input('link');

            $socialmedias->update();
            Session::flash('message', 'socialmedia Updated!!!');
            Session::flash('alert-class', 'alert-success');
            return redirect()->route('admin.socialmedia');
        }
    }

    public function delete(Request $request)
    {
        if ($request->method() == 'POST') {
            SocialMedia::where('id', $request->id)->delete();
            return true;
        }
    }

}
