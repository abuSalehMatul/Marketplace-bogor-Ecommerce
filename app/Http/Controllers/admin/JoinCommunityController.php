<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\JoinCommunity;
class JoinCommunityController extends Controller
{
   
    public function index()
    {   
        $row = JoinCommunity::first();
        return view('admin.community.index',compact('row'));
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
        $row = JoinCommunity::find($id);
        return view('admin.community.edit',compact('row'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'fb' => 'required',
            'twitter' => 'required',
            'whatsapp' => 'required',
            'gplus' => 'required',
            'instagram' => 'required'
        ]);
        $data = JoinCommunity::find($id);
        $data->fb = $request->fb;
        $data->twitter = $request->twitter;
        $data->whatsapp = $request->whatsapp;
        $data->gplus = $request->gplus;
        $data->instagram = $request->instagram;
        $data->save();
        return redirect()->route('community.index');
    }

    public function destroy($id)
    {
        //
    }
}
