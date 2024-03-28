<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class NewsController extends Controller
{

    public function index()
    {
        $news = News::all();
        return view('news.news', ['newss' => $news]);
    }

     public function create()
    {
        return view('news.addnews');
    }

       public function store(Request $request)
    {
        if ($request->method() == 'POST') {
         

            $newss = new News;
            $newss->title = $request->input('title');
            $newss->slug = Str::slug($request->input('title'));
            $newss->description = $request->input('description');
            $newss->sort = $request->input('sort');
            $newss->status = $request->input('status');

            if ($request->hasfile('image')) {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . "." . $extension;
                $file->move('uploads/NewsImages/', $filename);
                $newss->image = $filename;
            } else {
                $newss->image = '';
            }

            $newss->save();

            Session::flash('message', 'Successfully Added!!!');
            Session::flash('alert-class', 'alert-success');
            return redirect()->route('admin.news');
        }
    }


     public function edit($id)
    {
        $newss = News::where('id', $id)->first();
        return view('news.updatenews', ['newss' => $newss]);
    }


      public function update(Request $request, $id)
    {
        if ($request->method() == 'POST') {
            $newsExist = News::where('id', $id)->get();
            if($newsExist){
                $newss = $newsExist->first();
                $newss->title = $request->input('title');
                $newss->slug = Str::slug($request->input('title'));
                $newss->description = $request->input('description');
                $newss->sort = $request->input('sort');
                $newss->status = $request->input('status');

                if ($request->hasfile('image')) {
                    $destination = 'public/uploads/NewsImages/'. $newss->image;
                    if (File::exists($destination)) {
                        File::delete($destination);
                    }
                    $file = $request->file('image');
                    $extension = $file->getClientOriginalExtension();
                    $filename = time().".".$extension;
                    $file->move('public/uploads/NewsImages/', $filename);
                    $newss->image = $filename;
                }else{
                    $newss->image = '';
                }

                $newss->update();
                Session::flash('message', 'news123 Updated Successfully');
                Session::flash('alert-class', 'alert-success');
            }else{
                Session::flash('message', 'news Not Update');
                Session::flash('alert-class', 'alert-danger');
            }
            
            
            return redirect()->route('admin.news');
        }
    }

    public function delete(Request $request)
    {
        if ($request->method() == 'POST') {
            $id = $request->id;
            $newsExist = News::where('id', $id)->get();
            if($newsExist){
                $newss = $newsExist->first();
                $newss->status = 'D';
                $newss->update();
                //Session::flash('message', 'News Deleted Successfully');
                //Session::flash('alert-class', 'alert-success');
                return true;
            }else{
                //Session::flash('message', 'News Not Deleted');
                //Session::flash('alert-class', 'alert-danger');
                return false;
            }
            //news::where('id', $request->id)->delete();
            
        }
    }
      public function newsview($id)
    {
        $newss = News::where('id', $id)->first();
        return view('news.viewnews', ['newss' => $newss]);
    }

 

}
