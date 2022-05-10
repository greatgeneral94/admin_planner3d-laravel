<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Response;
use App\Models\ChMessage as Message;
use App\Models\ChFavorite as Favorite;
use Chatify\Facades\ChatifyMessenger as Chatify;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Str;

class ChatController extends Controller
{
    public function index(){
    
        if (auth()->user()->role == 3) {
           return redirect('/');
        }elseif (auth()->user()->role == 2) {
         
            return redirect('chatify');
        }else{
            return redirect('chatify');
        }
    }
    public function avatar(){
        $user = User::where('id',auth()->user()->id)->first();
        $user->avatar = "avatar.png";
        $user->save();
        return back()->with('message',"remove Avatar");
    }
}
