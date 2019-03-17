<?php

namespace App\Http\Controllers\buyer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\BuyerEnquiry;
use App\Models\Buyer;
use App\User;
class HomeController extends Controller
{
    public function index()
    {
        return view('buyer.index');
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

    public function Enquiry(){
        $id=Auth::user()->buyer->id;
        $result=BuyerEnquiry::where('buyer_id',$id)->get();
        return view('buyer.enquiry',compact('result'));
    }

    
}
