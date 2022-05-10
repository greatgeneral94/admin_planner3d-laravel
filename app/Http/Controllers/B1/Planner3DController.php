<?php

namespace App\Http\Controllers\B1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class Planner3DController extends Controller
{
    public function index($id){
         $status = User::where('company_name',$id)->first()->status;
        if ($status == "1") {
            $check = User::where('company_name',$id)->first()->days_left;
             $check1 = User::where('company_name',$id)->first()->FreeTrialDaysLeft;
            if($check1 > 0){
                $path = "3DPlanner/".$id."/planner3d/index.html";
                $data1 =  File::get($path);
                return Blade::render($data1, ['path' =>$id] );
             }
            elseif ($check > 0) {
              
               $path = "3DPlanner/".$id."/planner3d/index.html";
               $data1 =  File::get($path);
               return Blade::render($data1, ['path' =>$id] );
            }
           
            else{
                return back()->with('message','your subscription is expried!');
            }
        }
        else{

            return back()->with('message','your Account is Inactive!');
        }
         
    }
 
}
