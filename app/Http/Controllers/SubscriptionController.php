<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Subscription;
use App\Models\Subscriber;
use Mail;
use App\User;
use Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
class SubscriptionController extends Controller
{
    public function index(Request $request){
        if(Auth::user()){
             $user=Auth::user()->id;
            $user=User::find($user);
        }else{
            $user='Guest';
        }
        $ifexist=Subscriber::where('email',$request->subscribed_email)->count();
        if($ifexist == 0){
            $subscriber= new Subscriber;
            $subscriber->email=$request->subscribed_email;
            $subscriber->verified_at=Str::random(40);
            if(Auth::user()){
                $subscriber->who_checked=$user->id;
                $subscriber->save();
                Mail::to($request->subscribed_email)->send(new Subscription($user, $subscriber->verified_at));
            }
            else{
                $subscriber->who_checked='Guest';
            }
        }     
      return redirect()->back();

    }
    public function verified_email($email,$token){
      $user=Subscriber::where(['email'=>$email,'verified_at'=>$token])->first();
      if($user){
      $t=time();
      $date = date("Y-m-d",$t);
      Subscriber::where(['email'=>$email,'verified_at'=>$token])->update(['verified_at'=>$date]);
     
      return Redirect::to('/');
      }else{
        return 'Token is already used... We got your email address once. Thanks';
      }
    }
   
    
}
