<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\Product;
use App\Models\Seller;
use App\Models\BuyerHelp;
use App\Models\SellerHelp;
use App\Models\SellerFAQ;
use App\Models\BuyerFAQ;
use App\Models\BuyerSafety;
use App\Models\SellerSafety;
use App\Models\Buyer;
use App\Models\BuyerPost;
use App\Models\BuyerTraffic;
class CommonController extends Controller
{
    public function search(Request $request){
    	$type=$request->search;
        $category=$request->category;
        $for=($request->for)?$request->for:"products";
        $search=array(
            'type'=>$type,
            'for'=>$for
        );
        $catrow=ProductCategory::where('category_slug',$category)->first();
        if (strpos($type, 'seller') !== false) {
          $sell_in=($type=="seller-in-africa")?1:2;
          if($for=='companies'){
            $supplier=Seller::where('business_sector',$catrow->id)->join('seller_profiles','seller_profiles.seller_id','sellers.id')->where('sell_in',$sell_in)->get();
            return view('supplierpage.categorywise',compact('supplier','catrow','sell_in','search'));
        }
        else{
            $products=Product::join('sellers','sellers.id','products.seller_id')->where('business_sector',$catrow->id)->where('sell_in',$sell_in)->where('status',1)
            ->select('featured_image','product_name','short_description','product_slug','products.unique_code','product_type','post_type','status')->get();
            return view('supplierpage.productwise',compact('products','catrow','sell_in','search'));
        }

    }
    else{
      $sell_in=($type=="buyer-in-africa")?1:2;
      if($for=='companies'){
        $buyer=Buyer::where('business_sector',$catrow->id)->where('buy_in',$sell_in)->get();
        return view('buyerpage.categorywise',compact('buyer','catrow','search'));
    }
    else{
        $buyer=BuyerPost::join('buyers','buyers.id','buyer_posts.buyer_id')->where('business_sector',$catrow->id)->where('buy_in',$sell_in)
        ->select('title','product_type','post_slug','buyer_posts.unique_code','state','country')->get();
        return view('buyerpage.productwise',compact('buyer','catrow','search'));
    }
}
}

public function searchfor(Request $request){
    $type=$request->listof;
    if (strpos($type, 'seller') !== false) {
        $sell_in=($type=="seller-in-africa")?1:2;
        $supplier=Seller::where('sell_in',$sell_in)->get();
        return view('supplierpage.categorywise-list',compact('supplier','type','sell_in'));
    }
    else{
        $sell_in=($type=="buyer-in-africa")?1:2;
        $buyer=Buyer::where('buy_in',$sell_in)->get();
        return view('buyerpage.categorywise-list',compact('buyer','type','sell_in'));
    }
}

public function buyerPostSingle($slug,$code){
    $buyerpost=BuyerPost::join('buyers','buyers.id','buyer_posts.buyer_id')->join('countries','countries.id','buyers.country')->where('buyer_posts.unique_code',$code)->select('buyers.id','title','post_type','buyer_posts.created_at','first_name','state','country_name','description')->first();

    $adddata=new BuyerTraffic;
    $adddata->buyer_id=$buyerpost->id;
    $adddata->ip_address=\Request::ip();
    $adddata->page_name=url("buyer-post/$slug/$code");
    $adddata->save();
    return view('buyerpage.postview-single',compact('buyerpost'));
}


public function buyerProfile($slug,$code){
    $buyer=Buyer::where('unique_code',$code)->first();
    $adddata=new BuyerTraffic;
    $adddata->buyer_id=$buyer->id;
    $adddata->ip_address=\Request::ip();
    $adddata->page_name=url("buyer/$slug/$code");
    $adddata->save();
    return view('buyerpage.buyer-profile',compact('buyer'));
}


public function helpforbuyer(){
    $row = BuyerHelp::all();
    return view('help-for-buyer',compact('row'));
}
public function faqforbuyer(){
    $row = BuyerFAQ::all();
    return view('faq-for-buyer',compact('row'));
}
public function faqforseller(){
    $row = SellerFAQ::all();
    return view('faq-for-seller',compact('row'));
}
public function helpforseller(){
    $row = SellerHelp::all();
    return view('help-for-seller',compact('row'));
}
public function seller_single_page(){
    $row = SellerHelp::all();

    return view('seller_single_page',compact('row'));
}
public function buyer_single_page(){

 $row = BuyerHelp::all();
 return view('buyer_single_page',compact('row'));
}
public function sallersafety(){

 $row = SellerSafety::all();
 return view('seller_safety',compact('row'));
}
public function buyersafety(){

 $row = BuyerSafety::all();
 return view('buyer_safety',compact('row'));
}
}
