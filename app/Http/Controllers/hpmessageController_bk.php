<?php

namespace App\Http\Controllers;

use App\Models\hpmessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class hpmessageController extends Controller
{
       public function index()
    {

     $hpmessages = hpmessage::all();
    return view('hpmessage.hpmessage', ['hpmessages' => $hpmessages]);

    }

  public function create()
    {
        return view('hpmessage.addhpmessage');
    }


     public function store(Request $request)
    {
        if ($request->method() == 'POST') {
         

            $hpmessages = new hpmessage;
            $hpmessages->main_heading = $request->input('main_heading');
            $hpmessages->description = $request->input('description');
            $hpmessages->heading1 = $request->input('heading_1');
            $hpmessages->description1 = $request->input('description_1');
            $hpmessages->heading2 = $request->input('heading_2');
            $hpmessages->description2 = $request->input('description_2');
            $hpmessages->heading3 = $request->input('heading_3');
            $hpmessages->description3 = $request->input('description_3');

            if ($request->hasfile('image_1')) {
                $file1 = $request->file('image_1');
                $extension = $file1->getClientOriginalExtension();
                $filename1 = rand(1111111, 9999999)  . "." . $extension;
                $file1->move('public/uploads/hpmessageImages/', $filename1);
                $hpmessages->image1 = $filename1;
            } else {
                $hpmessages->image1 = '';
            }

             if ($request->hasfile('image_2')) {
                $file2 = $request->file('image_2');
                $extension = $file2->getClientOriginalExtension();
                $filename2 = rand(1111111, 9999999)  . "." . $extension;
                $file2->move('public/uploads/hpmessageImages/', $filename2);
                $hpmessages->image2 = $filename2;
            } else {
                $hpmessages->image2 = '';
            }


             if ($request->hasfile('image_3')) {
                $file3 = $request->file('image_3');
                $extension = $file3->getClientOriginalExtension();
                $filename3 = rand(1111111, 9999999)  . "." . $extension;
                $file3->move('public/uploads/hpmessageImages/', $filename3);
                $hpmessages->image3 = $filename3;
            } else {
                $hpmessages->image3 = '';
            }

            $hpmessages->save();

            Session::flash('message', 'Successfully Added!!!');
            Session::flash('alert-class', 'alert-success');
             return redirect()->route('admin.hpmessage');
        }
    }


     public function edit($id)
    {
        $hpmessages = hpmessage::where('id', $id)->first();
        return view('hpmessage.updatehpmessage', ['hpmessages' => $hpmessages]);
    }



       public function update(Request $request, $id)
    {
        if ($request->method() == 'POST') {
            $messageExist = hpmessage::where('id', $id)->first();
            if($messageExist){
                $hpmessages = $messageExist->first();
                $hpmessages->main_heading = $request->input('main_heading');
                $hpmessages->description = $request->input('description');
                $hpmessages->heading1 = $request->input('heading_1');
                 $hpmessages->description1 = $request->input('description_1');
                 $hpmessages->heading2 = $request->input('heading_2');
                 $hpmessages->description2 = $request->input('description_2');
                 $hpmessages->heading3 = $request->input('heading_3');
                 $hpmessages->description3 = $request->input('description_3');

               

                
                if ($request->hasfile('image_1')) {
                    $destination1 = 'public/uploads/hpmessageImages/' . $hpmessages->image1;
                    if (File::exists($destination1)) {
                        File::delete($destination1);
                    }
                    $file1 = $request->file('image_1');
                    $extension = $file1->getClientOriginalExtension();
                    $filename1 = rand(1111111, 9999999) . "." . $extension;
                    $upload=$file1->move('public/uploads/hpmessageImages/', $filename1);
                    if($upload)
                    {
                    $hpmessages->image1 = $filename1;
                }
                }
               

                if ($request->hasfile('image_2')) {
                    $destination2 = 'public/uploads/hpmessageImages/' . $hpmessages->image2;
                    if (File::exists($destination2)) {
                        File::delete($destination2);
                    }
                    $file2 = $request->file('image_2');
                    $extension = $file2->getClientOriginalExtension();
                    $filename2 = rand(1111111, 9999999) . "." . $extension;
                    $file2->move('public/uploads/hpmessageImages/', $filename2);
                    $hpmessages->image2 = $filename2;
                }


                 if ($request->hasfile('image_3')) {
                    $destination3 = 'public/uploads/hpmessageImages/' . $hpmessages->image3;
                    if (File::exists($destination3)) {
                        File::delete($destination3);
                    }
                    $file3 = $request->file('image_3');
                    $extension = $file3->getClientOriginalExtension();
                    $filename3 = rand(1111111, 9999999) . "." . $extension;
                   $uploads= $file3->move('public/uploads/hpmessageImages/', $filename3);
                 
                    $hpmessages->image3 = $filename3;
                
                }
                $hpmessages->update();
                 
                Session::flash('message', 'Message Updated Successfully');
                Session::flash('alert-class', 'alert-success');
            }else{
                Session::flash('message', 'Message Not Update');
                Session::flash('alert-class', 'alert-danger');
            }
            
            
            return redirect()->route('admin.hpmessage');
        }
    
}




       public function delete(Request $request)
    {
        if ($request->method() == 'POST') {
            hpmessage::where('id', $request->id)->delete();
            return true;
        }
    }


        public function hpmessageview($id)
    {
        $hpmessages = hpmessage::where('id', $id)->first();
        return view('hpmessage.viewhpmessage', ['hpmessages' => $hpmessages]);
    }

 
}
