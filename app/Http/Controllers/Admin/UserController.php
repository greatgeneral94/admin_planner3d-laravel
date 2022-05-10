<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        $user = User::where('role',"2")->with('childuser')->get();
        return view('admin.user.index',get_defined_vars());
    }
    
    public function edit($id){
        $user = User::where('id',$id)->first();
        return view('admin.user.edit',get_defined_vars());
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'         => 'required',
            'email'        => 'required|email|unique:users,email,'.$id,
            'status'       => 'required',
            'country'      => 'required',
        ]);
    
        $user = User::where('id',$id)->first();
        $user->name         = $request->name;
        $user->email        = $request->email;
        $user->status       = $request->status;
        $user->country      = $request->country;
        $user->save();
    
        return redirect()->route('admin.user-list')
                        ->with('success','User updated successfully');
    }

    public function impersonate($id) {
        $user = User::where("id", $id)->first();
        if($user)
        {
            session()->put('impersonate',$user->id);
        }
        return redirect('/');
    }

    public function stopImpersonate(){
        session()->forget('impersonate');
        return redirect('/');
    }
    public function chatify($id){
        return redirect('chatify/'.$id);
    }
}
