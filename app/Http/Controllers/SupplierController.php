<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\SellerTraffic;
class SupplierController extends Controller
{
    public function CategoryView($slug,$id){
    	$catrow=ProductCategory::find($id);
    	$supplier=Seller::where('business_sector',$id)->get();
    	return view('supplierpage.categorywise',compact('supplier','catrow'));
    }

    public function SupplierView($slug,$unique_code){
        
    	$supplier=Seller::where('unique_code',$unique_code)->first();
    	$adddata=new SellerTraffic;
        $adddata->seller_id=$supplier->id;
        $adddata->ip_address=\Request::ip();
        $adddata->page_name=url("supplier/$slug/$unique_code");
        $adddata->save();
    	return view('supplierpage.profilepage',compact('supplier'));
    }

     public function sellerProductSingle($slug,$code){
        $sellerproduct=Product::where('products.unique_code',$code)->first();
        $adddata=new SellerTraffic;
        $adddata->seller_id=$sellerproduct->seller->id;
        $adddata->ip_address=\Request::ip();
        $adddata->page_name=url("seller-product/$slug/$code");
        $adddata->save();
        return view('supplierpage.productview-single',compact('sellerproduct'));
    }
}
