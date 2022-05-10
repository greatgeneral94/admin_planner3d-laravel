<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Planner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 
class PlannerController extends Controller
{
    public function index(){
        $data = Planner::latest()->get();
        return view('admin.planner.index',get_defined_vars());
    }
    public function create(){
        session()->forget('file');
        return view('admin.planner.create');
    }
    public function store(Request $request){
        $this->validate($request, [
            'title'         => 'required',
            // 'planner'       => 'required|mimes:zip',
            'version'       => 'required|unique:planners,version',
        ]);
     if (session()->has("file")) {
        $data   = new Planner();
        $data->title     = $request->title;  
        $data->version   = $request->version;
        $data->planner = session()->get("file");
        $data->save();
     }
     else{
         return redirect()->back()->with('message',"Please Insert File!");
     }
      
        return redirect()->route('admin.planner.index')->with('message',"Data Inserted !");
    }
    

    public function edit($id){
        $data = Planner::where('id',$id)->first();
        return view('admin.planner.edit',get_defined_vars());
    }
    public function update(Request $request,$id)
    {
        $this->validate($request, [
        'title'         => 'required',
        // 'planner'       => 'mimes:zip',
        'version'       => 'required|unique:planners,version,'.$id,
        ]);
        $data = Planner::where('id',$id)->first();
        $data->title     = $request->title;  
        $data->version   = $request->version;
        // if ($request->has('planner')) {
        //     $planner             = $request->file('planner');
        //     $ext               = time().".". $planner->getClientOriginalExtension();
        //     $name              = $planner->getClientOriginalName();
        //     $destinationPath   = public_path('app-assets/planner');
        //     $planner->move($destinationPath, $ext);
        //     $data->planner =  "app-assets/planner/".$ext;
        // }
        $data->save();
        return redirect()->route('admin.planner.index')->with('message',"Data Updated !");
    }

    public function delete($id){
        $data =  Planner::where('id',$id)->first();
        File::delete($data->planner);
        $data->delete();
        return redirect()->route('admin.planner.index')->with('message',"Data Deleted !");
    }
}
