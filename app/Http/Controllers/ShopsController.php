<?php

namespace App\Http\Controllers;

use App\Models\Shops;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ShopsController extends Controller
{
    
    public function index()
    {
        $shops = Shops::all();
        return view('shops.shop', ['shops' => $shops]);
    }


    public function create()
    {
        return view('shops.addshop');
    }


    public function store(Request $request)
    {
        if ($request->method() == 'POST') {
            $data = $request->validate([
                'address' => 'required|string|max:160',
                'size' => 'required|string|max:160',
                'avaiablity' => 'required|string|max:160',
                'type' => 'required|string|max:160',
            ]);

            Shops::create($data);
            Session::flash('message', '' . $data['shop_name'] . ' Successfully Added!!!');
            Session::flash('alert-class', 'alert-success');
            return redirect()->route('admin.shop');
        }
    }


    public function edit($id)
    {
        $shops = Shops::where('id', $id)->first();
        return view('shops.updateshop', ['shops' => $shops]);
    }



    public function update(Request $request, $id)
    {
        $shops = Shops::where('id', $id)->first();
        if ($request->method() == 'POST') {
            $data = $request->validate([
                'address' => 'required|string|max:160',
                'size' => 'required|string|max:160',
                'avaiablity' => 'required|string|max:160',
                'type' => 'required|string|max:160',

            ]);
            $shops->update($data);
            Session::flash('message', 'Doctor Type Updated!!!');
            Session::flash('alert-class', 'alert-success');

            return redirect()->route('admin.shop');
        }
    }


    public function delete(Request $request)
    {
        if ($request->method() == 'POST') {
            Shops::where('id', $request->id)->delete();
            return true;
        }
    }
}
