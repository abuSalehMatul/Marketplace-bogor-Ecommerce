<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Hash;
use App\User_image;
use Image;
class HomeController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
    	return view('admin.index');
    }

    public function profile(){
    	return view('admin.profile');
    }

     public function updateprofile(Request $request){
    	$userid=Auth::id();
    	$this->validate($request,[
    		'name'=>'required',
    		'email'=>'required|email|unique:users,email,'.$userid,
    	]);
    	$data=User::find($userid);
    	$data->name=$request->name;
        $data->email=$request->email;
        $data->save();
        if($request->hasFile('image')){
            $image=$request->file('image');
            $filename=time().'.'.$image->getClientOriginalExtension();
            $location=public_path('uploads/admin/'.$filename);
            Image::make($image)->save($location);
            $user_image= new User_image;
            $user_image->image=$filename;
            $user_image->user_id=$data->id;
            $user_image->email=$request->email;
            $user_image->save();
        }
    	session()->flash('success_msg','Your profile has been updated successfully');
    	 return back();
    }

    function changepassword(Request $request){
    	$this->validate($request, [
            'old' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = Auth::user();
        $hashedPassword = $user->password;
       if (Hash::check($request->old, $hashedPassword)) {
            //Change the password
            $user->fill([
                'password' => bcrypt($request->password)
            ])->save();
 
            session()->flash('success_msg', 'Your password has been changed.');
            return back();
        }

         session()->flash('danger_msg', 'Your password has not been changed.');
        return back();
     }
}
