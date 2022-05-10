<?php

namespace App\Http\Controllers\C1;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
   public function index(){
    $data = Project::where("user_id",auth()->user()->id)->get();
    return view("c1.project.index",get_defined_vars());
}
   public function create(){
    return view("c1.project.create");
   }
   public function store(Request $request){
    $request->validate([
        'image' => 'required',
        'file'  => 'required',
        'project_title' => 'required',
        'price' => 'required',
    ]);
    //    return $request;
       $data = new Project();
       if ($request->has('image')) {
        $image             = $request->file('image');
        $ext               = time().".". $image->getClientOriginalExtension();
        $name              = $image->getClientOriginalName();
        $destinationPath   = public_path('app-assets/media/project');
        $image->move($destinationPath, $ext);
        $data->image =  "app-assets/media/project/".$ext;
    }
       if ($request->hasFile('file')) {
        $file             = $request->file('file');
        $ext               = time().".". $file->getClientOriginalExtension();
        $name              = $file->getClientOriginalName();
        $destinationPath   = public_path('app-assets/media/project');
        $file->move($destinationPath, $ext);
        $data->file =  "app-assets/media/project/".$ext;
    }
    $data->project_title =  $request->project_title;
    $data->price =  $request->price;
    $data->user_id =  auth()->user()->id;
    $data->save();
    return redirect()->route('c.project.index')->with('message',"Data Has Been Inserted");
}
public function delete($id){
    Project::where("id",$id)->delete();
    return redirect()->route('c.project.index')->with('message',"Data Has Been Deleted");
   }
}
