<?php
namespace App\Helpers;
use DB;

class CommonClass{

	static function WebsiteProfile(){
		return DB::table('website_profiles')->first();
	}

	static function CountryList(){
		return DB::table('countries')->pluck('country_name','id')->toArray();
	}


	static function SectorList(){
		return DB::table('sector_categories')->pluck('sector_name','id')->toArray();
	}

	static function CategoryList(){
		return DB::table('product_categories')->pluck('category_name','id')->toArray();
	}

	static function NewsCategoryList(){
		return DB::table('news_categories')->pluck('category_name','id')->toArray();
	}

	static function BlogCategoryList(){
		return DB::table('blog_categories')->pluck('category_name','id')->toArray();
	}

	static function CategoryList1(){
		return DB::table('product_categories')->pluck('category_name','category_slug')->toArray();
	}

	static function category(){
		return DB::table('product_categories')->get();
	}

	static function GetCountry(){
		return DB::table('countries')->orderBy('country_name')->get();
	}

	static function GetSector(){
		return DB::table('sector_categories')->orderBy('sector_name')->get();
	}

	static function products(){
		return DB::table('products')->get();
	}

	static function GetCountryName($id){
		return DB::table('countries')->where('id',$id)->value('country_name');
	}

	static function KnownList(){
		return DB::table('knowtos')->pluck('known_name','id')->toArray();
	}

	static function Banner($type){
		return DB::table('banners')->where('type',$type)->where('status',1)->get();
	}

	static function SideBanner($plantype){
		return DB::table('banners')->where('type',3)->where('status',1)->get();
	}

	static function FeaturedProduct(){
		return DB::table('sellers')->join('seller_purchase_plans','sellers.id','seller_purchase_plans.seller_id')->join('product_categories','product_categories.id','sellers.business_sector')->select('category_name','category_slug')->where('plan_id',3)->where('plan_status',1)->get();
	}

	static function FeqaturedSeller(){
		return DB::table('sellers')->join('seller_purchase_plans','sellers.id','seller_purchase_plans.seller_id')
		->join('product_categories','product_categories.id','sellers.business_sector')
		->join('seller_profiles','seller_profiles.seller_id','sellers.id')
		->select('category_name','company_name','company_slug','logo',DB::raw('sellers.unique_code as unique_code'))->where('plan_id',3)->where('plan_status',1)->get();
	}
}

