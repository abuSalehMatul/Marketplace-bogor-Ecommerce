<?php

namespace App\Http\Controllers\seller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Buyer;
use App\Models\BuyerPost;
use Auth;
class BusinessMatchMatchingController extends Controller
{
    
    public function index()
    {   
        $seller=Auth::user()->seller;
        $result = BuyerPost::leftjoin('buyers','buyers.id','buyer_posts.buyer_id')->leftjoin('buyer_profiles','buyer_profiles.buyer_id','buyers.id')->leftjoin('countries','countries.id','buyers.country')->leftjoin('product_categories','product_categories.id','buyers.business_sector')->where('buyers.business_sector', $seller->business_sector)->get();
        return view('seller.matchmatching',compact('result'));
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
        //
    }

    
    public function destroy($id)
    {
        //
    }
}
