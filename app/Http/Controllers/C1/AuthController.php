<?php

namespace App\Http\Controllers\C1;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->back()
            ->withSuccess('Signed in');
        }
        return response()->json(['error'=>'Login details are not valid.']);
    }


    public function store(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
        ]);
       $id = User::where('company_name',basename(url()->previous()))->first()->id;
       $data  = new User();
       $data->name  = $request->name;
       $data->email = $request->email;
       $data->role  = "3";
       $data->user_id  = $id;
       $data->password = Hash::make($request->password);
       $data->save();
       Auth::login($data);
        return redirect()->back();
    }

    
    public function audio(Request $request){
        // return $request;
        if (!Auth::check()) {
            return "please Login First";
        }else{

            if ($request->has('audio_blob')) {
                $data = $request->get('audio_blob');
        }
        $filename = rand(10,1000)."."."blueprint3d";
        $destinationPath   = public_path('app-assets/media/project');
        Storage::disk('public_uploads')->put("/app-assets/media/project/".$filename, $data);
        $project  = new Project();
        if ($request->has('image')) {
            $image             = $request->file('image');
            $ext               = time().".". $image->getClientOriginalExtension();
            $name              = $image->getClientOriginalName();
            $destinationPath   = public_path('app-assets/media/project');
            $image->move($destinationPath, $ext);
            $project->image =  "app-assets/media/project/".$ext;
        }
        $project->file =  "app-assets/media/project/".$filename;
        $project->project_title =  $request->project_title;
        $project->price =  $request->price;
        $project->user_id =  auth()->user()->id;
        $project->save();
        return "success";
    }

    }
 
   
}
