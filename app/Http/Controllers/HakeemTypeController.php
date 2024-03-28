<?php

namespace App\Http\Controllers;

use App\Models\HakeemType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HakeemTypeController extends Controller
{

    public function index()
    {
        $hakeemTypes = HakeemType::all();
        return view('hakeem_types.hakeem_type', ['hakeemTypes' => $hakeemTypes]);
    }


    public function create()
    {
        return view('hakeem_types.addhakeem_type');
    }


    public function store(Request $request)
    {
        if ($request->method() == 'POST') {
            $data = $request->validate([
                'hakeemType_name' => 'required|string|max:160'
            ]);

            HakeemType::create($data);
            Session::flash('message', '' . $data['hakeemType_name'] . ' Successfully Added!!!');
            Session::flash('alert-class', 'alert-success');
            
            return redirect()->route('admin.hakeemtype');
        }
    }


    public function edit($id)
    {
        $hakeemTypes = hakeemType::where('id', $id)->first();
        return view('hakeem_types.updatehakeem_type', ['hakeemTypes' => $hakeemTypes]);
    }



    public function update(Request $request, $id)
    {
        $hakeemTypes = HakeemType::where('id', $id)->first();
        if ($request->method() == 'POST') {
            $data = $request->validate([
                'hakeemType_name' => 'required|string|max:255'

            ]);
            $hakeemTypes->update($data);
            Session::flash('message', 'hakeem Type Updated!!!');
            Session::flash('alert-class', 'alert-success');
            
            return redirect()->route('admin.hakeemtype');
        }
    }


    public function delete(Request $request)
    {
        if ($request->method() == 'POST') {
            HakeemType::where('id', $request->id)->delete();
            return true;
        }
    }
}
