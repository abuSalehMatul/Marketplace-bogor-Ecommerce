<?php
namespace App\Helpers;
use DB;

class DashClass{

	static function TotalSupplier(){
		return DB::table('sellers')->count();
	}

	static function TotalSupplierthisMonth(){
		$start_date=date('Y-m-01');
		$end_date=date('Y-m-t');
		return DB::table('sellers')->whereBetween('created_at',[$start_date, $end_date])->count();
	}

	static function TotalBuyer(){
		return DB::table('buyers')->count();
	}

	static function TotalBuyerthisMonth(){
		$start_date=date('Y-m-01');
		$end_date=date('Y-m-t');
		return DB::table('buyers')->whereBetween('created_at',[$start_date, $end_date])->count();
	}

	static function TotalProduct(){
		return DB::table('products')->count();
	}

	static function TotalProductthisMonth(){
		$start_date=date('Y-m-01');
		$end_date=date('Y-m-t');
		return DB::table('products')->whereBetween('created_at',[$start_date, $end_date])->count();
	}

	static function TotalPost(){
		return DB::table('buyer_posts')->count();
	}

	static function TotalPostthisMonth(){
		$start_date=date('Y-m-01');
		$end_date=date('Y-m-t');
		return DB::table('buyer_posts')->whereBetween('created_at',[$start_date, $end_date])->count();
	}

	static function SecDirSales(){
		return DB::table('sector_purchases')->sum('purchase_price');
	}

	static function CouDirSales(){
		return DB::table('country_purchases')->sum('purchase_price');
	}

	static function SellerSales(){
		return DB::table('seller_purchase_plans')->sum('purchase_price');
	}

	static function SellerEnquiry($seller_id){
		return DB::table('seller_enquiries')->where('seller_id',$seller_id)->count();
	}

	static function SellerProduct($seller_id){
		return DB::table('products')->where('seller_id',$seller_id)->count();
	}

	static function SellerVisitor($seller_id){
		return DB::table('seller_traffics')->where('seller_id',$seller_id)->count();
	}

	static function SellerEnqMonth($seller_id,$month){
		$year=date('Y');
		return DB::table('seller_enquiries')->where('seller_id',$seller_id)
		->whereYear('created_at', '=', $year)->whereMonth('created_at', '=', $month)->count();
	}

	static function SellerVisitorMonth($seller_id,$month){
		$year=date('Y');
		return DB::table('seller_traffics')->where('seller_id',$seller_id)
		->whereYear('created_at', '=', $year)->whereMonth('created_at', '=', $month)->count();
	}

}

