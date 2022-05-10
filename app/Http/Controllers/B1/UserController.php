<?php

namespace App\Http\Controllers\B1;

use App\Http\Controllers\Controller;
use App\Models\ChFavorite;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $user = User::where('user_id',auth()->user()->id)->get();
        return view('b1.user.index',get_defined_vars());
    }
    public function create(){
        return view('b1.user.create');
    }
    public function store(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
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
    public function edit($id){
        $user = User::where('id',$id)->first();
        return view('b1.user.edit',get_defined_vars());
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'status' => 'required',
        ]);
    
        $user = User::where('id',$id)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->status = $request->status;
        $user->save();
    
    
        return redirect()->route('b1.user.index')
                        ->with('message','User updated successfully');
    }

    public function delete($id){
        $user = User::where('id',$id)->delete();
        ChFavorite::where('favorite_id',$id)->delete();
        return redirect()->route('b1.user.index')
        ->with('message','User updated successfully');
    }


    public function store1(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
  
       $id = auth()->user()->id;
       $data  = new User();
       $data->name  = $request->name;
       $data->email = $request->email;
       $data->role  = "3";
       $data->user_id  = auth()->user()->id;
       $data->password = Hash::make($request->password);
       $data->save();
        return redirect()->route('b1.user.index')->with("message","user Created");
    }
}
