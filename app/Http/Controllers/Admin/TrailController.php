<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Trail;
use Illuminate\Http\Request;

class TrailController extends Controller
{
    public function index(){
        $data =  Trail::first();
        return view('admin.trail.index',get_defined_vars());
    }
    public function store(Request $request){
        $this->validate($request, [
            'trail_days'         => 'required',
        ]);
        Trail::query()->delete();
        $data = new Trail();
        $data->trail_days = $request->trail_days;
        $data->save();
        return redirect()->route('admin.trail.index')->with('message',"Trail Days Updated Successfully!😊");
    }
}
