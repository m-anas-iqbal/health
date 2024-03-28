<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use App\Models\SocialMedia;
use App\Models\QuickLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class FooterController extends Controller


{

    public function index()
    {
        $footers = Footer::where('id', 1)->first();

        $socialmedias = SocialMedia::all();
        $quicklinks = QuickLink::all();

        return view('footers.footer', ['footers' => $footers, 'socialmedias' => $socialmedias, 'quicklinks' => $quicklinks]);
    }


    public function editlogo($id)
    {
        $footers = Footer::where('id', $id)->first();
        return view('footers.updatefooterlogo', ['footers' => $footers]);
    }

    public function editdescription($id)
    {
        $footers = Footer::where('id', $id)->first();
        return view('footers.updatefooterdescription', ['footers' => $footers]);
    }


    public function updatedescription(Request $request, $id)
    {

        if ($request->method() == 'POST') {
            $footers = Footer::where('id', $id)->first();
            $footers->description = $request->input('description');
            $footers->update();
            Session::flash('message', 'footer Updated!!!');
            Session::flash('alert-class', 'alert-success');
            return redirect()->route('admin.footer');
        }
    }

    public function updatelogo(Request $request, $id)
    {

        if ($request->method() == 'POST') {
            $footers = Footer::where('id', $id)->first();

            if ($request->hasfile('logo')) {
                $destination = 'uploads/FooterImages/' . $footers->logo;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
                $file = $request->file('logo');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . "." . $extension;
                $file->move('uploads/FooterImages/', $filename);
                $footers->logo = $filename;
            }

            $footers->update();
            Session::flash('message', 'footer Updated!!!');
            Session::flash('alert-class', 'alert-success');
            return redirect()->route('admin.footer');
        }
    }

    public function delete(Request $request)
    {
        if ($request->method() == 'POST') {
            Footer::where('id', $request->id)->delete();
            return true;
        }
    }

    public function footerview($id)
    {
        $footers = Footer::where('id', $id)->first();
        return view('footers.viewfooter', ['footers' => $footers]);
    }
}
