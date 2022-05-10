<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GiftDay;
use Illuminate\Http\Request;

class GiftDaysController extends Controller
{
    public function index(){
        $data = GiftDay::latest()->get();
        return view('admin.gift_days.index',get_defined_vars());
    }

    public function create(){
        return view('admin.gift_days.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'name'               => 'required',
            'code'               => 'required',
            'email'              => 'required',
            'price'              => 'required',
            'days'               => 'required',
            'commession'         => 'required',
            'commession_type'    => 'required',
            'description'        => 'required',
        ]);
         $data = new GiftDay();
         $data->name             = $request->name;
         $data->code             = $request->code;
         $data->email            = $request->email;
         $data->price            = $request->price;
         $data->days             = $request->days;
         $data->commession       = $request->commession;
         $data->commession_type  = $request->commession_type;
         $data->description      = $request->description;
         $data->save();
         return redirect()->route('admin.gift_days.index')->with('message',"Data Inserted!");
    }

    public function edit($id){
        $data = GiftDay::where('id',$id)->first();
        return view('admin.gift_days.edit',get_defined_vars());
    }

    public function update(Request $request,$id){
        $this->validate($request, [
            'name'               => 'required',
            'code'               => 'required',
            'email'              => 'required',
            'price'              => 'required',
            'days'               => 'required',
            'commession'         => 'required',
            'commession_type'    => 'required',
            'description'        => 'required',
        ]);
         $data                   = GiftDay::where('id',$id)->first();
         $data->name             = $request->name;
         $data->code             = $request->code;
         $data->email            = $request->email;
         $data->price            = $request->price;
         $data->days             = $request->days;
         $data->commession       = $request->commession;
         $data->commession_type  = $request->commession_type;
         $data->description      = $request->description;
         $data->save();
         return redirect()->route('admin.gift_days.index')->with('message',"Data Updated!");
    }

    public function delete($id){
            GiftDay::where('id',$id)->delete();
            return redirect()->route('admin.gift_days.index')->with('message',"Data Deleted!");
    }
}
