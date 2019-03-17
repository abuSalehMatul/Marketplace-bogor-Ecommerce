<?php

namespace App\Http\Controllers\buyer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Seller;
use App\Models\Product;
use Auth;
class BusinessMatchMatchingController extends Controller
{
    public function index()
    {   
        $buyer=Auth::user()->buyer;
        $result = Product::join('sellers','sellers.id','products.seller_id')->leftjoin('seller_profiles','seller_profiles.seller_id','sellers.id')->leftjoin('countries','countries.id','sellers.country')->join('product_categories','product_categories.id','sellers.business_sector')->where('sellers.business_sector', $buyer->business_sector)
        ->select('product_name','product_slug','first_name','last_name','company_name','category_name','thumb_img','products.unique_code')
        ->get();
        //dd($result);
        return view('buyer.matchmatching',compact('result'));
    }
}
