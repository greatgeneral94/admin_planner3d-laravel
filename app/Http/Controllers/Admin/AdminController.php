<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChFavorite;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
class AdminController extends Controller
{
    public function index(){
        $user = User::where('role',"1",'And')->where('id',"!=",auth()->user()->id)->get();
        return view('admin.admin.index',get_defined_vars());
    }
    public function create(){
        $roles = Role::pluck('name','name')->all();
        return view('admin.admin.create',compact('roles'));
    }
    public function store(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'roles' => 'required'
        ]);
        $data = $request->all();
        $check = $this->create1($data);
        $check->assignRole($request->input('roles'));
        return redirect()->route('admin.index')->withSuccess('You have signed-in');
    }

    public function create1(array $data)
    {
      return User::create([
        'name'  => $data['name'],
        'email' => $data['email'],
        'role'  => "1",
        'password' => Hash::make($data['password'])
      ]);
    } 
    public function edit($id){
        $user = User::where('id',$id)->first();
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name')->first();
    
        return view('admin.admin.edit',compact('user','roles','userRole'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'               => 'required',
            'email'              => 'required|email|unique:users,email,'.$id,
            'status'             => 'required',
            'roles'              => 'required',
            'show_in_chat'       => 'required',
            'chat_show_internal' => 'required'
        ]);
    
        $user                     = User::where('id',$id)->first();
        $user->name               = $request->name;
        $user->email              = $request->email;
        $user->status             = $request->status;
        $user->show_in_chat       = $request->show_in_chat;
        $user->chat_show_internal = $request->chat_show_internal;
        $user->save();
        DB::table('model_has_roles')->where('model_id',$id)->delete();
    
        $user->assignRole($request->input('roles'));
    
        return redirect()->route('admin.index')
                        ->with('success','User updated successfully');
    }

    public function delete($id){
        $user = User::where('id',$id)->delete();
        ChFavorite::where('favorite_id',$id)->delete();
        return redirect()->route('b1.user.index')
        ->with('success','User Deleted successfully');
    }
}
