<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\WebsiteProfile;
class WebsiteProfileController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {   
        $row = WebsiteProfile::first();
        return view('admin.website_profile.index',compact('row'));
    }

   
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'website_name' => 'required',
            'phone_no' => 'required',
            'email_id' => 'required',
            'support_email_id' => 'required',
            'fb_url' => 'required',
            'youtube_url' => 'required',
            'twitter_url' => 'required',
            'inst_url' => 'required',
            'gplus_url' => 'required',
            'business_address' => 'required',
        ]);
        $data = WebsiteProfile::find($id);
        $data->website_name=$request->website_name;
        $data->phone_no=$request->phone_no;
        $data->email_id=$request->email_id;
        $data->support_email_id=$request->support_email_id;
        $data->fb_url=$request->fb_url;
        $data->youtube_url=$request->youtube_url;
        $data->twitter_url=$request->twitter_url;
        $data->inst_url=$request->inst_url;
        $data->gplus_url=$request->gplus_url;
        $data->business_address=$request->business_address;
        if($request->hasFile('logo')) {
            $image = $request->file('logo');
            $filename = $image->getClientOriginalName();
            $destinationPath = public_path('uploads/website_profile');
            $image->move($destinationPath, $filename);
            $data->logo="uploads/website_profile/".$filename;
            $data->save();
        }
        $data->save();
        return redirect()->route('website-profile.index');
    }

    
    public function destroy($id)
    {
        //
    }
}
