<?php

namespace App\Http\Controllers\C1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
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
