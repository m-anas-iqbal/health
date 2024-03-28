<?php

namespace App\Http\Controllers;

use App\Models\Hpservices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class HpServiceController extends Controller
{

    public function index()
    {
        $hpservices = Hpservices::all();
       
        return view('hpservice.hpservice', ['hpservices' => $hpservices]);
    }

      public function create()
    {
        return view('hpservice.addhpservice');
    }


       public function store(Request $request)
    {
        if ($request->method() == 'POST') {
         

            $hpservices = new Hpservices;
            $hpservices->mainheading = $request->input('main_heading');
            $hpservices->description = $request->input('description');
            $hpservices->heading1 = $request->input('heading_1');
            $hpservices->icon1 = $request->input('icon_1');
            $hpservices->slug1 = $request->input('slug_1');
            $hpservices->description1 = $request->input('description_1');
            $hpservices->heading2 = $request->input('heading_2');
            $hpservices->icon2 = $request->input('icon_2');
            $hpservices->slug2 = $request->input('slug_2');


            $hpservices->description2 = $request->input('description_2');
            $hpservices->heading3 = $request->input('heading_3');
            $hpservices->icon3 = $request->input('icon_3');
            $hpservices->slug3 = $request->input('slug_3');


            $hpservices->description3 = $request->input('description_3');
            $hpservices->heading4 = $request->input('heading_4');
            $hpservices->icon4 = $request->input('icon_4');
            $hpservices->slug4 = $request->input('slug_4');


            $hpservices->description4 = $request->input('description_4');
            $hpservices->heading5 = $request->input('heading_5');
            $hpservices->icon5 = $request->input('icon_5');
            $hpservices->slug5 = $request->input('slug_5');


            $hpservices->description5 = $request->input('description_5');
            $hpservices->heading6 = $request->input('heading_6');
            $hpservices->icon6 = $request->input('icon_6');
            $hpservices->slug6 = $request->input('slug_6');


            $hpservices->description6 = $request->input('description_6');

       
            $hpservices->save();

            Session::flash('message', 'Successfully Added!!!');
            Session::flash('alert-class', 'alert-success');
             return redirect()->route('admin.hpservice');
        }
    }


     public function edit($id)
    {
        $hpservices = Hpservices::where('id', $id)->first();
        return view('hpservice.updatehpservice', ['hpservices' => $hpservices]);
    }




       public function update(Request $request, $id)
    {
        if ($request->method() == 'POST') {
            $serviceExist = Hpservices::where('id', $id)->first();
            if($serviceExist){
                 $hpservices = $serviceExist->first();
                 $hpservices->mainheading = $request->input('main_heading');
                 $hpservices->description = $request->input('description');
                 $hpservices->heading1 = $request->input('heading_1');
                 $hpservices->icon1 = $request->input('icon_1');
                 $hpservices->slug1 = $request->input('slug_1');
                 $hpservices->description1 = $request->input('description_1');
                 $hpservices->heading2 = $request->input('heading_2');
                 $hpservices->icon2 = $request->input('icon_2');
                 $hpservices->slug2 = $request->input('slug_2');


                 $hpservices->description2 = $request->input('description_2');
                 $hpservices->heading3 = $request->input('heading_3');
                 $hpservices->icon3 = $request->input('icon_3');
                 $hpservices->slug3 = $request->input('slug_3');

                 $hpservices->description3 = $request->input('description_3');
                 $hpservices->heading4 = $request->input('heading_4');
                 $hpservices->icon4 = $request->input('icon_4');
                 $hpservices->slug4 = $request->input('slug_4');


                 $hpservices->description4 = $request->input('description_4');
                 $hpservices->heading5 = $request->input('heading_5');
                 $hpservices->icon5 = $request->input('icon_5');
                 $hpservices->slug5 = $request->input('slug_5');


                 $hpservices->description5 = $request->input('description_5');
                 $hpservices->heading6 = $request->input('heading_6');
                 $hpservices->icon6 = $request->input('icon_6');
                 $hpservices->slug6 = $request->input('slug_6');


                 $hpservices->description6 = $request->input('description_6');

               

                
                // if ($request->hasfile('image_1')) {
                //     $destination1 = 'public/uploads/hpserviceImages/' . $hpservices->image1;
                //     if (File::exists($destination1)) {
                //         File::delete($destination1);
                //     }
                //     $file1 = $request->file('image_1');
                //     $extension = $file1->getClientOriginalExtension();
                //     $filename1 = rand(1111111, 9999999) . "." . $extension;
                //     $upload=$file1->move('public/uploads/hpserviceImages/', $filename1);
                //     if($upload)
                //     {
                //     $hpservices->image1 = $filename1;
                // }
                // }
               

                // if ($request->hasfile('image_2')) {
                //     $destination2 = 'public/uploads/hpserviceImages/' . $hpservices->image2;
                //     if (File::exists($destination2)) {
                //         File::delete($destination2);
                //     }
                //     $file2 = $request->file('image_2');
                //     $extension = $file2->getClientOriginalExtension();
                //     $filename2 = rand(1111111, 9999999) . "." . $extension;
                //     $file2->move('public/uploads/hpserviceImages/', $filename2);
                //     $hpservices->image2 = $filename2;
                // }


                //  if ($request->hasfile('image_3')) {
                //     $destination3 = 'public/uploads/hpserviceImages/' . $hpservices->image3;
                //     if (File::exists($destination3)) {
                //         File::delete($destination3);
                //     }
                //     $file3 = $request->file('image_3');
                //     $extension = $file3->getClientOriginalExtension();
                //     $filename3 = rand(1111111, 9999999) . "." . $extension;
                //    $uploads= $file3->move('public/uploads/hpserviceImages/', $filename3);
                 
                //     $hpservices->image3 = $filename3;
                
                // }

                //  if ($request->hasfile('image_4')) {
                //     $destination4 = 'public/uploads/hpserviceImages/' . $hpservices->image4;
                //     if (File::exists($destination4)) {
                //         File::delete($destination4);
                //     }
                //     $file4 = $request->file('image_4');
                //     $extension = $file4->getClientOriginalExtension();
                //     $filename4 = rand(1111111, 9999999) . "." . $extension;
                //    $uploads= $file4->move('public/uploads/hpserviceImages/', $filename4);
                 
                //     $hpservices->image4 = $filename4;
                
                // }


                // //  if ($request->hasfile('image_5')) {
                // //     $destination5 = 'public/uploads/hpserviceImages/' . $hpservices->image5;
                // //     if (File::exists($destination5)) {
                // //         File::delete($destination5);
                // //     }
                // //     $file5 = $request->file('image_5');
                // //     $extension = $file5->getClientOriginalExtension();
                // //     $filename5 = rand(1111111, 9999999) . "." . $extension;
                // //    $uploads= $file5->move('public/uploads/hpserviceImages/', $filename5);
                 
                // //     $hpservices->image5 = $filename5;
                
                // // }

                //  if ($request->hasfile('image_6')) {
                //     $destination6 = 'public/uploads/hpserviceImages/' . $hpservices->image6;
                //     if (File::exists($destination6)) {
                //         File::delete($destination6);
                //     }
                //     $file6 = $request->file('image_6');
                //     $extension = $file3->getClientOriginalExtension();
                //     $filename6 = rand(1111111, 9999999) . "." . $extension;
                //    $uploads= $file6->move('public/uploads/hpserviceImages/', $filename6);
                 
                //     $hpservices->image6 = $filename6;
                
                // }

                $hpservices->update();
                 
                Session::flash('message', 'Message Updated Successfully');
                Session::flash('alert-class', 'alert-success');
            }else{
                Session::flash('message', 'Message Not Update');
                Session::flash('alert-class', 'alert-danger');
            }
            
            
            return redirect()->route('admin.hpservice');
        }
    
}







         public function delete(Request $request)
    {
        if ($request->method() == 'POST') {
            Hpservices::where('id', $request->id)->delete();
            return true;
        }
    }


  
    


}
