<?php

namespace App\Http\Controllers\B1;

use App\Http\Controllers\Controller;
use App\Models\SubscriptionHistory;
use Illuminate\Http\Request;

class SubscriptionHistoryController extends Controller
{
    public function index(){
        $data = SubscriptionHistory::where('user_id',auth()->user()->id)->get();
        return view('b1.subscription.index',get_defined_vars());
    }
}
