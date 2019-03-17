<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\Product;
use App\Models\Seller;
use DB;
class FeatureController extends Controller
{
	public function FeatureProduct(){
    	$result=Product::join('sellers','sellers.id','products.seller_id')->join('seller_purchase_plans','seller_purchase_plans.seller_id','sellers.id')->where('plan_id',3)->select(DB::raw('products.id as id'),'featured_image','product_name','product_slug','products.unique_code')->paginate(15);
    	//dd($result);
    	return view('featured.product',compact('result','prow'));
    }

    public function FeatureProductCategory(Request $request){
    	$cat_slug=$request->get('category');
    	$prow=ProductCategory::where('category_slug',$cat_slug)->first();
    	$result=Product::join('sellers','sellers.id','products.seller_id')->join('seller_purchase_plans','seller_purchase_plans.seller_id','sellers.id')->where('business_sector',$prow->id)->where('plan_id',3)->select(DB::raw('products.id as id'),'featured_image','product_name','product_slug','products.unique_code')->paginate(15);
    	//dd($result);
    	return view('featured.product-category',compact('result','prow'));
    }

    public function FeatureSupplier(){
    	$result=Seller::join('seller_purchase_plans','seller_purchase_plans.seller_id','sellers.id')
    	   ->join('seller_profiles','seller_profiles.seller_id','sellers.id')
    	   ->where('plan_id',3)->select(DB::raw('sellers.id as id'),'company_name','company_slug','sellers.unique_code','logo')->paginate(15);
    	//dd($result);
    	return view('featured.supplier',compact('result','prow'));
    }

    public function FeatureSupplierCategory(){
    	$cat_slug=$request->get('category');
    	$prow=ProductCategory::where('category_slug',$cat_slug)->first();
    	$result=Seller::join('seller_purchase_plans','seller_purchase_plans.seller_id','sellers.id')
    	   ->join('seller_profiles','seller_profiles.seller_id','sellers.id')
    	   ->where('plan_id',3)->where('business_sector',$prow->id)->select(DB::raw('sellers.id as id'),'company_name','company_slug','sellers.unique_code','logo')->paginate(15);
    	//dd($result);
    	return view('featured.supplier-category',compact('result','prow'));
    }
}
