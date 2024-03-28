<?php

namespace App\Http\Controllers;

use App\Models\Hpgalleries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use DB;

class HpgalleryController extends Controller
{

    public function index()
    {
        $gallerys = Hpgalleries::all();
        return view('homepage.hp_gallery.gallery', ['gallerys' => $gallerys]);
    }

    public function create()
    {
        return view('homepage.hp_gallery.addgallery');
    }

    public function store(Request $request)
    {
        if ($request->method() == 'POST') {
         

            $Hpgalleries = new Hpgalleries;
            $Hpgalleries->name = $request->input('name');
            $Hpgalleries->status = $request->input('status');
            $Hpgalleries->show_on_hp = $request->input('show_on_hp');

            //1-10 headinga
            for($i=1; $i<=12; $i++){
                $headinga = 'heading'.$i.'a';
                $Hpgalleries->$headinga = $request->input('heading'.$i.'a');
            }

            //1-10 headingb
            for($i=1; $i<=12; $i++){
                $headingb = 'heading'.$i.'b';
                $Hpgalleries->$headingb = $request->input('heading'.$i.'b');
            }

            //1-10 link
            for($i=1; $i<=12; $i++){
                $link = 'link'.$i;
                $Hpgalleries->$link = $request->input('link'.$i);
            }

             //1-10 detail
             for($i=1; $i<=12; $i++){
                $detail = 'detail'.$i;
                $Hpgalleries->$detail = $request->input('detail'.$i);
            }

            //1-10 images
            for($i=1; $i<=12; $i++){
                $image = 'image'.$i;
                if ($request->hasfile('image'.$i)) {
                    $file = $request->file('image'.$i);
                    $extension = $file->getClientOriginalExtension();
                    $filename = $i.time() . "." . $extension.$i;
                    $file->move('public/uploads/HpGalleriesImages/', $filename);
                    $Hpgalleries->$image = $filename;
                } else {
                    $Hpgalleries->$image = '';
                }
            }

            //Disable all gallerys if this new gallery will show on home page    
            if($request->input('show_on_hp') == 1){
                //DB::table('hp_gallery')->update(['show_on_hp'=>0]);
            }             

            $Hpgalleries->save();

            Session::flash('message', 'Successfully Added!!!');
            Session::flash('alert-class', 'alert-success');
            return redirect()->route('admin.gallery');
        }
    }

    public function edit($id)
    {
        $gallery = Hpgalleries::where('id', $id)->first();
        return view('homepage.hp_gallery.updategallery', ['gallery' => $gallery]);
    }

    public function update(Request $request, $id)
    {
        if ($request->method() == 'POST') {
            $galleryExist = Hpgalleries::where('id', $id)->get();
            if($galleryExist){
                $Hpgalleries = $galleryExist->first();
                $Hpgalleries->name = $request->input('name');
                $Hpgalleries->status = $request->input('status');
                $Hpgalleries->show_on_hp = $request->input('show_on_hp');
                
                $destination ='';
                for($i=1;$i<=12;$i++){
                    if ($request->hasfile('image'.$i)) {
                        //$destination =  $destination.$i;
                        switch($i){
                            case 1 : {
                                $destination = 'public/uploads/HpgalleriesImages/' . $Hpgalleries->image1;
                            }break;
                            case 2 : {
                                $destination = 'public/uploads/HpgalleriesImages/' . $Hpgalleries->image2;
                            }break;
                            case 3 : {
                                $destination = 'public/uploads/HpGalleriesImages/' . $Hpgalleries->image3;
                            }break;
                            case 4 : {
                                $destination = 'public/uploads/HpGalleriesImages/' . $Hpgalleries->image4;
                            }break;
                            case 5 : {
                                $destination = 'public/uploads/HpGalleriesImages/' . $Hpgalleries->image5;
                            }break;
                            case 6 : {
                                $destination = 'public/uploads/HpGalleriesImages/' . $Hpgalleries->image6;
                            }break;
                            case 7 : {
                                $destination = 'public/uploads/HpGalleriesImages/' . $Hpgalleries->image7;
                            }break;
                            case 8 : {
                                $destination = 'public/uploads/HpGalleriesImages/' . $Hpgalleries->image8;
                            }break;
                            case 9 : {
                                $destination = 'public/uploads/HpGalleriesImages/' . $Hpgalleries->image9;
                            }break;
                            case 10 : {
                                $destination = 'public/uploads/HpGalleriesImages/' . $Hpgalleries->image10;
                            }break; 
                            case 11 : {
                                $destination = 'public/uploads/HpGalleriesImages/' . $Hpgalleries->image11;
                            }break;
                            case 12 : {
                                $destination = 'public/uploads/HpgalleriesImages/' . $Hpgalleries->image12;
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
                            $file->move('public/uploads/HpGalleriesImages/', $filename);
                        }else{
                            $filename = '';
                        }
                        

                        switch($i){
                            case 1 : {
                                $Hpgalleries->image1 = $filename;
                            }break;
                            case 2 : {
                                $Hpgalleries->image2 = $filename;
                            }break;
                            case 3 : {
                                $Hpgalleries->image3 = $filename;
                            }break;
                            case 4 : {
                                $Hpgalleries->image4 = $filename;
                            }break;
                            case 5 : {
                                $Hpgalleries->image5 = $filename;
                            }break;
                            case 6 : {
                                $Hpgalleries->image6 = $filename;
                            }break;
                            case 7 : {
                                $Hpgalleries->image7 = $filename;
                            }break;
                            case 8 : {
                                $Hpgalleries->image8 = $filename;
                            }break;
                            case 9 : {
                                $Hpgalleries->image9 = $filename;
                            }break;
                            case 10 : {
                                $Hpgalleries->image10 = $filename;
                            }break;
                            case 11 : {
                                $Hpgalleries->image11 = $filename;
                            }break;
                            case 12 : {
                                $Hpgalleries->image12 = $filename;
                            }break;
                        }    

                        
                    }
                }

                //1-10 headinga
            for($i=1; $i<=12; $i++){
                $headinga = 'heading'.$i.'a';
                $Hpgalleries->$headinga = $request->input('heading'.$i.'a');
            }

            //1-10 headingb
            for($i=1; $i<=12; $i++){
                $headingb = 'heading'.$i.'b';
                $Hpgalleries->$headingb = $request->input('heading'.$i.'b');
            }

            //1-10 link
            for($i=1; $i<=12; $i++){
                $link = 'link'.$i;
                $Hpgalleries->$link = $request->input('link'.$i);
            }

            //1-10 detail
            for($i=1; $i<=12; $i++){
                $detail = 'detail'.$i;
                $Hpgalleries->$detail = $request->input('detail'.$i);
            }

    //echo '<pre>';
//echo $request->input('show_on_hp');
//echo '<br>';
    //print_r($Hpgalleries);
    //die;

                //Disable all gallerys if this new gallery will show on home page    
                //if($request->input('show_on_hp') == 1){
                   //DB::table('hpgalleries')->update(['show_on_hp'=>0]);
                //} 

                //echo '<pre>';
                //echo $request->input('show_on_hp');
                //print_r($Hpgalleries);
                //die;

                $Hpgalleries->update();
                Session::flash('message', 'Home Page Main gallery Updated Successfully');
                Session::flash('alert-class', 'alert-success');
            }else{
                Session::flash('message', 'Home Page Main gallery Not Update');
                Session::flash('alert-class', 'alert-danger');
            }
            
            
            return redirect()->route('admin.gallery');
        }
    }

    public function delete(Request $request)
    {
        if ($request->method() == 'POST') {
            Hpgalleries::where('id', $request->id)->delete();
            return true;
        }
    }

    public function Hpgalleriesview($id)
    {
        $gallery = Hpgalleries::where('id', $id)->first();
        return view('homepage.hp_main_gallerys.viewgallery', ['gallery' => $gallery]);
    }

    


}
