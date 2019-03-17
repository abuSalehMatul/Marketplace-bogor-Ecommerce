<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Auth;
use Mail;
use App\Models\Send_subscriber_message;
use App\Mail\bogorfashions;
use App\Models\Subscriber;
class subscriptionController extends Controller
{
   public function subscriberlist(){
        $user=Auth::user();
        if($user->hasRole('admin')){
           return view('admin.subscription.index'); 
        }
    }
     public function subscribersendmessage(){
        return view('admin.subscription.sendmessage');
    }
    public function sendmessage(Request $request){
       $message= new Send_subscriber_message;
       $message->message=$request->message;
       $message->save();
       $all_subscriber=Subscriber::all();
       foreach($all_subscriber as $sub){
         Mail::to($sub->email)->send(new bogorfashions($request->message));
       }
       return redirect()->back();

    }
}
