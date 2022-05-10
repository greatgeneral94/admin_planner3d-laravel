<?php

namespace App\Http\Controllers;

use App\Models\BplannerVersion;
use App\Models\Planner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use ZanySoft\Zip\Zip;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
    
        if (Auth::user()->role=="0" || Auth::user()->role=="1") {
            return view('admin.index');
        } elseif(Auth::user()->role=="2") {
            $path = public_path('3DPlanner/'.auth()->user()->company_name);
            if(!File::isDirectory($path)){
                File::makeDirectory($path, 0777, true, true);
                $data   =  Planner::latest()->first();
                $file   =  basename($data->planner);
                File::copy(public_path($data->planner), public_path('3DPlanner/'.auth()->user()->company_name."/".$file));
                $zip = Zip::open(public_path('3DPlanner/'.auth()->user()->company_name."/".$file));
                $zip->extract(public_path('3DPlanner/'.auth()->user()->company_name));
                $verion =  new BplannerVersion();
                $verion->user_id = auth()->user()->id;
                $verion->planner_id = $data->id;
                $verion->save();
            }
            return view('b1.index');
        }
        elseif(Auth::user()->role=="3") 
        {
            return view('b1.index');
        }
        
    }
    public function page($id)
    {
        if(view()->exists("admin.$id")){
            return view("admin.$id");
        }
        else
        {
            return view('404');
        }
    }
    public function page1($id)
    {
        if(view()->exists("b1.$id")){
            return view("b1.$id");
        }
        else
        {
            return view('404');
        }
    }
    public function page2($id)
    {
        if(view()->exists("c1.$id")){
            return view("c1.$id");
        }
        else
        {
            return view('404');
        }
    }
}
