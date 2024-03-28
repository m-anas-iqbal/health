<?php

namespace App\Http\Controllers;

use App\Models\HpMainSlider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use DB;

class HpMainSliderController extends Controller
{

    public function index()
    {
        $sliders = HpMainSlider::all();
        return view('homepage.hp_main_sliders.slider', ['sliders' => $sliders]);
    }

    public function create()
    {
        return view('homepage.hp_main_sliders.addslider');
    }

    public function store(Request $request)
    {
        if ($request->method() == 'POST') {
         

            $HpMainSlider = new HpMainSlider;
            $HpMainSlider->name = $request->input('name');
            $HpMainSlider->status = $request->input('status');
            $HpMainSlider->show_on_hp = $request->input('show_on_hp');

            //1-10 headinga
            for($i=1; $i<=10; $i++){
                $headinga = 'heading'.$i.'a';
                $HpMainSlider->$headinga = $request->input('heading'.$i.'a');
            }

            //1-10 headingb
            for($i=1; $i<=10; $i++){
                $headingb = 'heading'.$i.'b';
                $HpMainSlider->$headingb = $request->input('heading'.$i.'b');
            }

            //1-10 link
            for($i=1; $i<=10; $i++){
                $link = 'link'.$i;
                $HpMainSlider->$link = $request->input('link'.$i);
            }

             //1-10 detail
             for($i=1; $i<=10; $i++){
                $detail = 'detail'.$i;
                $HpMainSlider->$detail = $request->input('detail'.$i);
            }

            //1-10 images
            for($i=1; $i<=10; $i++){
                $image = 'image'.$i;
                if ($request->hasfile('image'.$i)) {
                    $file = $request->file('image'.$i);
                    $extension = $file->getClientOriginalExtension();
                    $filename = $i.time() . "." . $extension.$i;
                    $file->move('public/uploads/HpMainSliderImages/', $filename);
                    $HpMainSlider->$image = $filename;
                } else {
                    $HpMainSlider->$image = '';
                }
            }

            //Disable all sliders if this new slider will show on home page    
            if($request->input('show_on_hp') == 1){
                DB::table('hp_main_sliders')->update(['show_on_hp'=>0]);
            }             

            $HpMainSlider->save();

            Session::flash('message', 'Successfully Added!!!');
            Session::flash('alert-class', 'alert-success');
            return redirect()->route('admin.hpmainslider');
        }
    }

    public function edit($id)
    {
        $slider = HpMainSlider::where('id', $id)->first();
        return view('homepage.hp_main_sliders.updateslider', ['slider' => $slider]);
    }

    public function update(Request $request, $id)
    {
        if ($request->method() == 'POST') {
            $sliderExist = HpMainSlider::where('id', $id)->get();
            if($sliderExist){
                $HpMainSlider = $sliderExist->first();
                $HpMainSlider->name = $request->input('name');
                $HpMainSlider->status = $request->input('status');
                $HpMainSlider->show_on_hp = $request->input('show_on_hp');
                
                $destination ='';
                for($i=1;$i<=10;$i++){
                    if ($request->hasfile('image'.$i)) {
                        //$destination =  $destination.$i;
                        switch($i){
                            case 1 : {
                                $destination = 'public/uploads/HpMainSliderImages/' . $HpMainSlider->image1;
                            }break;
                            case 2 : {
                                $destination = 'public/uploads/HpMainSliderImages/' . $HpMainSlider->image2;
                            }break;
                            case 3 : {
                                $destination = 'public/uploads/HpMainSliderImages/' . $HpMainSlider->image3;
                            }break;
                            case 4 : {
                                $destination = 'public/uploads/HpMainSliderImages/' . $HpMainSlider->image4;
                            }break;
                            case 5 : {
                                $destination = 'public/uploads/HpMainSliderImages/' . $HpMainSlider->image5;
                            }break;
                            case 6 : {
                                $destination = 'public/uploads/HpMainSliderImages/' . $HpMainSlider->image6;
                            }break;
                            case 7 : {
                                $destination = 'public/uploads/HpMainSliderImages/' . $HpMainSlider->image7;
                            }break;
                            case 8 : {
                                $destination = 'public/uploads/HpMainSliderImages/' . $HpMainSlider->image8;
                            }break;
                            case 9 : {
                                $destination = 'public/uploads/HpMainSliderImages/' . $HpMainSlider->image9;
                            }break;
                            case 10 : {
                                $destination = 'public/uploads/HpMainSliderImages/' . $HpMainSlider->image10;
                            }break;    
                        }
                        
                        if (File::exists($destination)) {
                            File::delete($destination);
                        }
                        //$file = $file.$i;
                        $file = $request->file('image'.$i);
                        //$extension = $extension.$i;
                        $extension = $file->getClientOriginalExtension();
                        //$filename = $filename.$i;
                        $filename = $i.time() . "." . $extension;
                        if($file){
                            $file->move('public/uploads/HpMainSliderImages/', $filename);
                        }else{
                            $filename = '';
                        }
                        

                        switch($i){
                            case 1 : {
                                $HpMainSlider->image1 = $filename;
                            }break;
                            case 2 : {
                                $HpMainSlider->image2 = $filename;
                            }break;
                            case 3 : {
                                $HpMainSlider->image3 = $filename;
                            }break;
                            case 4 : {
                                $HpMainSlider->image4 = $filename;
                            }break;
                            case 5 : {
                                $HpMainSlider->image5 = $filename;
                            }break;
                            case 6 : {
                                $HpMainSlider->image6 = $filename;
                            }break;
                            case 7 : {
                                $HpMainSlider->image7 = $filename;
                            }break;
                            case 8 : {
                                $HpMainSlider->image8 = $filename;
                            }break;
                            case 9 : {
                                $HpMainSlider->image9 = $filename;
                            }break;
                            case 10 : {
                                $HpMainSlider->image10 = $filename;
                            }break;
                        }    

                        
                    }
                }

                //1-10 headinga
            for($i=1; $i<=10; $i++){
                $headinga = 'heading'.$i.'a';
                $HpMainSlider->$headinga = $request->input('heading'.$i.'a');
            }

            //1-10 headingb
            for($i=1; $i<=10; $i++){
                $headingb = 'heading'.$i.'b';
                $HpMainSlider->$headingb = $request->input('heading'.$i.'b');
            }

            //1-10 link
            for($i=1; $i<=10; $i++){
                $link = 'link'.$i;
                $HpMainSlider->$link = $request->input('link'.$i);
            }

            //1-10 detail
            for($i=1; $i<=10; $i++){
                $detail = 'detail'.$i;
                $HpMainSlider->$detail = $request->input('detail'.$i);
            }

    //echo '<pre>';
//echo $request->input('show_on_hp');
//echo '<br>';
    //print_r($HpMainSlider);
    //die;

                //Disable all sliders if this new slider will show on home page    
                if($request->input('show_on_hp') == 1){
                    DB::table('hp_main_sliders')->update(['show_on_hp'=>0]);
                } 

                //echo '<pre>';
                //echo $request->input('show_on_hp');
                //print_r($HpMainSlider);
                //die;

                $HpMainSlider->update();
                Session::flash('message', 'Home Page Main Slider Updated Successfully');
                Session::flash('alert-class', 'alert-success');
            }else{
                Session::flash('message', 'Home Page Main Slider Not Update');
                Session::flash('alert-class', 'alert-danger');
            }
            
            
            return redirect()->route('admin.hpmainslider');
        }
    }

    public function delete(Request $request)
    {
        if ($request->method() == 'POST') {
            HpMainSlider::where('id', $request->id)->delete();
            return true;
        }
    }

    public function hpmainsliderview($id)
    {
        $slider = HpMainSlider::where('id', $id)->first();
        return view('homepage.hp_main_sliders.viewslider', ['slider' => $slider]);
    }

    public function delimg(Request $request){
        if ($request->method() == 'POST') {
            $id = $request->id;
            $slider_id = $request->slider_id;

            $sliderExist = HpMainSlider::where('id', $request->slider_id)->first();
            if($sliderExist){
                $HpMainSlider = $sliderExist->first();

                switch($id){
                    case 1 : {$imagea = "image1";}break;
                    case 2 : {$imagea = "image2";}break;
                    case 3 : {$imagea = "image3";}break;
                    case 4 : {$imagea = "image4";}break;
                    case 5 : {$imagea = "image5";}break;
                    case 6 : {$imagea = "image6";}break;
                    case 7 : {$imagea = "image7";}break;
                    case 8 : {$imagea = "image8";}break;
                    case 9 : {$imagea = "image9";}break;
                    case 10 : {$imagea = "image10";}break;
                }

                $HpMainSlider->$imagea = '';
            }
            $HpMainSlider->update();
            return true;
        }
    }


}
