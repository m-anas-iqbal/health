<?php

namespace App\Http\Controllers;

use App\Models\Faqs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class FaqController extends Controller
{

    public function index()
    {
        $faq = Faqs::all();
        return view('faq.faq', ['faqs' => $faq]);
    }

     public function create()
    {
        return view('faq.addfaq');
    }

       public function store(Request $request)
    {
        if ($request->method() == 'POST') {
         

            $faqs = new Faqs;
            $faqs->title = $request->input('title');
            $faqs->description = $request->input('description');
            $faqs->sort = $request->input('sort');
            $faqs->status = $request->input('status');

            $faqs->save();

            Session::flash('message', 'Successfully Added!!!');
            Session::flash('alert-class', 'alert-success');
            return redirect()->route('admin.faq');
        }
    }


     public function edit($id)
    {
        $faqs = Faqs::where('id', $id)->first();
        return view('faq.updatefaq', ['faqs' => $faqs]);
    }


      public function update(Request $request, $id)
    {
        if ($request->method() == 'POST') {
            $faqExist = Faqs::where('id', $id)->get();
            if($faqExist){
                $faqs = $faqExist->first();
                $faqs->title = $request->input('title');
                $faqs->description = $request->input('description');
                $faqs->sort = $request->input('sort');
                $faqs->status = $request->input('status');
                $faqs->update();
                Session::flash('message', 'Faq Updated Successfully');
                Session::flash('alert-class', 'alert-success');
            }else{
                Session::flash('message', 'Faq Not Update');
                Session::flash('alert-class', 'alert-danger');
            }
            
            
            return redirect()->route('admin.faq');
        }
    }

    public function delete(Request $request)
    {
        if ($request->method() == 'POST') {
            Faqs::where('id', $request->id)->delete();
            return true;
        }
    }
      public function faqview($id)
    {
        $Faqs = Faqs::where('id', $id)->first();
        return view('Faq.viewfaq', ['faqs' => $faqs]);
    }

 

}
