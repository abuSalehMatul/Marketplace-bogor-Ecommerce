<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Auth;
use App\Models\Partner;
use Session;;
use Image;

class PartnerController extends Controller
{
    public function index(){
        return view('admin.partner.list');
    }
    public function showpartnerform(){
        $user=Auth::user();
        if($user->hasRole('admin')){
              return view('admin.partner.add_pertner');
        }else{
            Session::flush();
            return ('/');
        }
      
    }
    public function addpartner(Request $request){
         $validatedData = $request->validate([
        'name' => 'required|max:255',
        'image' => 'required',
        'url' => 'required',
        ]);

        $partner= new Partner;
        $image=$request->file('image');
        $filename=time().'.'.$image->getClientOriginalExtension();
        $location=public_path('uploads/partner/'.$filename);
       
        $partner->image=$filename;
        $partner->name=$request->name;
        $partner->url=$request->url;
        $partner->description=$request->description;
        $partner->save();
        Image::make($image)->save($location);
        Session::put('message','The Partner Has been Add');
        return Redirect::to('admin/partnerlist');
        

    }
    public function delete($id){
        $partner=Partner::find($id);
        $partner->delete();
        return Redirect::to('admin/partnerlist');
    }
    public function edit($id){
        $partner=Partner::find($id);
        return view('admin.partner.edit')->with('partner',$partner);

    }
    public function edit_save(Request $request,$id){
         $validatedData = $request->validate([
        'name' => 'required|max:255',
        'image' => 'required',
        'url' => 'required',
        ]);

        $partner= Partner::find($id);
        $image=$request->file('image');
        $filename=time().'.'.$image->getClientOriginalExtension();
        $location=public_path('uploads/partner/'.$filename);
       
        $partner->image=$filename;
        $partner->name=$request->name;
        $partner->url=$request->url;
        $partner->description=$request->description;
        $partner->save();
        Image::make($image)->save($location);
        Session::put('message','The Partner Has been Edited');
        return Redirect::to('admin/partnerlist');
        

    }
}
