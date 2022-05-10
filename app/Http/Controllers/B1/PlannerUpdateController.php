<?php

namespace App\Http\Controllers\B1;

use App\Http\Controllers\Controller;
use App\Models\BplannerVersion;
use App\Models\GiftDay;
use App\Models\Planner;
use App\Models\Subscription;
use App\Models\SubscriptionHistory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use ZanySoft\Zip\Zip;
use Vinkla\Hashids\Facades\Hashids;
use Illuminate\Support\Str;
class PlannerUpdateController extends Controller
{
   public function index()
   {
        $dir = "3DPlanner\\".auth()->user()->company_name;
           if (File::exists($dir)) {
               File::deleteDirectory($dir);
               File::makeDirectory($dir);
            }
            $data   =  Planner::latest()->first();
            $file   =  basename($data->planner);
            File::copy(public_path($data->planner), public_path('3DPlanner/'.auth()->user()->company_name."/".$file));
            $zip = Zip::open(public_path('3DPlanner/'.auth()->user()->company_name."/".$file));
            $zip->extract(public_path('3DPlanner/'.auth()->user()->company_name));
            $user_planer = BplannerVersion::where('user_id',auth()->user()->id)->first();
            $user_planer->planner_id = $data->id;
            $user_planer->save();
            return back()->with('message',"Your  are Up to date Now");
   }
   public function version(){
      return view('b1.version.index');
   }
   public function update(Request $request){
      $dir = "3DPlanner\\".auth()->user()->company_name;
           if (File::exists($dir)) {
               File::deleteDirectory($dir);
               File::makeDirectory($dir);
            }
            $data   =  Planner::where('version',$request->version)->first();
            $file   =  basename($data->planner);
            File::copy(public_path($data->planner), public_path('3DPlanner/'.auth()->user()->company_name."/".$file));
            $zip = Zip::open(public_path('3DPlanner/'.auth()->user()->company_name."/".$file));
            $zip->extract(public_path('3DPlanner/'.auth()->user()->company_name));
            $user_planer = BplannerVersion::where('user_id',auth()->user()->id)->first();
            $user_planer->planner_id = $data->id;
            $user_planer->save();
            return back()->with('message',"Your  are Up to date Now");
   }

   public function plan(){
      return view('b1.upgrade.index');
   }
   public function plan_submit(Request $request){

      $code = Str::random(10);
      $data = new Subscription();
      $data->subscription = $request->id;
      $data->code =  $code;
      $data->user_id = auth()->user()->id;
      $data->save();
      $details = [
         'title' => '3D Planner',
         'body' => 'This is Your Subscription Code '.$code
     ];
    
     Mail::to(auth()->user()->email)->send(new \App\Mail\SubscriptionMail($details));
      return   redirect()->route('planner.code');
   }
   public function code(){
     
      return view('b1.upgrade.code');
     
   }
   public function send_code(Request $request){
     $code = Subscription::where('user_id',auth()->user()->id,"AND")->where('code',$request->code,"AND")->where('use_or_not',"0")->first();
     $data =  GiftDay::where('code',$request->code)->first();
     if ($code) {
      if ($request->code ==  $code->code) {
         $day = 0;
         $day = $code->subscription;
       if (auth()->user()->plan_until && now()->diffInDays(auth()->user()->plan_until, false) > 0) {
         $day = $day + now()->diffInDays(auth()->user()->plan_until, false)+1;
 
       }elseif(now()->diffInDays(auth()->user()->trial_until, false) > 0){
          $day = $day + now()->diffInDays(auth()->user()->trial_until, false)+1;
       }
       $user   = User::where('id',auth()->user()->id)->first();
       $user->plan_until =  now()->addDays($day);
       $user->save();
      
       $code->save();
       $data = Subscription::where('user_id',auth()->user()->id)->where('code',$request->code)->first();
       $data->use_or_not = "1";
       $data->save();
       $subscription_histories = new SubscriptionHistory();
       $subscription_histories->days = $code->subscription;
       $subscription_histories->end_date = now()->addDays($day);
       $subscription_histories->user_id = auth()->user()->id;
       $subscription_histories->save();

       return redirect('/')->with('message',"your Got Subscription");
       
      }
   } 
   elseif($data) {
     $check2 = Subscription::where('user_id',auth()->user()->id,"AND")->where('code',$request->code,"AND")->first();
      if (!$check2) {
         $giftday= $data->days;
         $day = 0;
         $day = $day + $data->days;
         if (auth()->user()->plan_until && now()->diffInDays(auth()->user()->plan_until, false) > 0) {
            $day = $day + now()->diffInDays(auth()->user()->plan_until, false)+1;
         }
         elseif(now()->diffInDays(auth()->user()->trial_until, false) > 0){
            $day = $day + now()->diffInDays(auth()->user()->trial_until, false)+1;
           }
           $user   = User::where('id',auth()->user()->id)->first();
         $user->plan_until =  now()->addDays($day);
         $user->save();
         
         $data = new Subscription();
         $data->subscription = $giftday;
         $data->code =  $request->code;
         $data->use_or_not = "1";
         $data->user_id = auth()->user()->id;
         $data->save();
         $subscription_histories = new SubscriptionHistory();
         $subscription_histories->days = $giftday;
         $subscription_histories->end_date = now()->addDays($day);
         $subscription_histories->user_id = auth()->user()->id;
         $subscription_histories->save();
         return redirect('/')->with('message',"your Got Subscription");
      }else{
         return redirect('/')->with('message',"your Already User This Code");
      }
      return 1;
   
   }
   
      return back()->with('message',"Wrong Code");


   }
}
