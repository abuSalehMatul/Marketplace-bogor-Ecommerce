<?php

namespace App\Http\Controllers\seller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use Auth;
class BottomBannerController extends Controller
{
    public function index()
    {   
        $user=Auth::user()->Seller->id;
        $result = Banner::where('type',2)->where('seller_id',$user)->get();
        return view('seller.bottombanner.index',compact('result'));
    }

  
    public function create()
    {
        return view('seller.bottombanner.create');
    }

  
    public function store(Request $request)
    {   
        $this->validate($request, [
            'banner_image' => 'required|mimes:jpeg,bmp,png,svg',
        ]);
        $user=Auth::user()->seller->id;
        $data = new Banner;
        $data->seller_id = $user;
        $data->status = 0;
        $data->type = 2;
        if($request->hasFile('banner_image')) {
            $image = $request->file('banner_image');
            $filename = $image->getClientOriginalName();
            $destinationPath = public_path('uploads/topbar');
            $image->move($destinationPath, $filename);
            $data->banner_image="uploads/topbar/".$filename;
        }
        $data->save();
        return redirect()->route('bottombanner.index');
    }

  
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $row = Banner::find($id);
        return view('seller.bottombanner.edit',compact('row'));
    }

    public function update(Request $request, $id)
    {
        $data = Banner::find($id);;
        if($request->hasFile('banner_image')) {
            $image = $request->file('banner_image');
            $filename = $image->getClientOriginalName();
            $destinationPath = public_path('uploads/topbar');
            $image->move($destinationPath, $filename);
            $data->banner_image="uploads/topbar/".$filename;
        }
        $data->save();
        return redirect()->route('bottombanner.index');
    }

  
    public function destroy($id)
    {
        $row = Banner::find($id);
        $row->delete();
    }
}
