<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use DB;

class TestimonialController extends Controller
{

    public function index()
    {
        $testimonials = Testimonial::all();
        return view('testimonial.testimonial', ['testimonials' => $testimonials]);
    }

     public function create()
    {
        return view('testimonial.addtestimonial');
    }

     public function store(Request $request)
    {
        if ($request->method() == 'POST') {
         

            $testimonials = new Testimonial;
            $testimonials->name = $request->input('name');

            $testimonials->status = $request->input('status');
            $testimonials->show_on_hp = $request->input('show_on_hp');

            $testimonials->company= $request->input('company_name');
             $testimonials->testimonial = $request->input('testimonial');
        

            if ($request->hasfile('image')) {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . "." . $extension;
                $file->move('public/uploads/testimonialImage/', $filename);
                $testimonials->image = $filename;
            } else {
                $testimonials->image = '';
            }

            $testimonials->save();

            Session::flash('message', 'Successfully Added!!!');
            Session::flash('alert-class', 'alert-success');
            return redirect()->route('admin.testimonial');
        }
    }

      public function edit($id)
    {
        $testimonials = Testimonial::where('id', $id)->first();
        return view('testimonial.updatetestimonial', ['testimonials' => $testimonials]);
    }




    public function update(Request $request, $id)
    {
        if ($request->method() == 'POST') {
            $testimonialExist = Testimonial::where('id', $id)->get();
            if($testimonialExist){
                $testimonials = $testimonialExist->first();
                $testimonials->name = $request->input('name');

                $testimonials->status = $request->input('status');
                $testimonials->show_on_hp = $request->input('show_on_hp');

                $testimonials->company = $request->input('company_name');
                $testimonials->testimonial = $request->input('testimonial');


                
                if ($request->hasfile('image')) {
                    $destination = 'public/uploads/testimonialImage/' . $testimonials->image;
                    if (File::exists($destination)) {
                        File::delete($destination);
                    }
                    $file = $request->file('image');
                    $extension = $file->getClientOriginalExtension();
                    $filename = time() . "." . $extension;
                    $file->move('public/uploads/testimonialImage/', $filename);
                    $testimonials->image = $filename;
                }
    
                $testimonials->update();
                Session::flash('message', 'Testimonial Updated Successfully');
                Session::flash('alert-class', 'alert-success');
            }else{
                Session::flash('message', 'Testimonial Not Update');
                Session::flash('alert-class', 'alert-danger');
            }
            
            
            return redirect()->route('admin.testimonial');
        }
    }


      public function delete(Request $request)
    {
        if ($request->method() == 'POST') {
            Testimonial::where('id', $request->id)->delete();
            return true;
        }
    }


    

 


}
