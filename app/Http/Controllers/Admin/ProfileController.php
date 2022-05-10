<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit(){
        if (auth()->user()->role == 0 || auth()->user()->role == 1) {
           $user = User::where('id',auth()->user()->id)->first();
           return view('admin.profile.edit',get_defined_vars());
        } 
        elseif(auth()->user()->role == 2) {
            $user = User::where('id',auth()->user()->id)->first();
            return view('b1.profile.edit',get_defined_vars());
        }
        elseif(auth()->user()->role == 3) {
            $user = User::where('id',auth()->user()->id)->first();
            return view('c1.profile.edit',get_defined_vars());
        }
    }
    public function update(Request $request,$id){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'fileInput' => 'image',
        ]);
        $user = User::where('id',$id)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->has('fileInput')) {
            $fileInput             = $request->file('fileInput');
            $ext               = time().".". $fileInput->getClientOriginalExtension();
            $name              = $fileInput->getClientOriginalName();
            $destinationPath   = public_path('app-assets/images/profile/user-uploads');
            $fileInput->move($destinationPath, $ext);
            $user->image_path =  "app-assets/images/profile/user-uploads/".$ext;
        }
        $user->save();
        return redirect()->route('profile.edit')->with('message',"Profile Updated !");
    }
}