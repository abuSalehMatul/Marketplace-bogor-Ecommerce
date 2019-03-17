<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SellerPurchasePlan;
use Yajra\Datatables\Datatables;
use DB;
use Carbon\Carbon;
class SellerPurchase extends Controller
{
    public function list(){
    	return view('admin.purchase.seller-list');
    }

    public function getData(Request $request){
        DB::statement(DB::raw('set @rownum=0'));
        $query = SellerPurchasePlan::join('sellers','sellers.id','seller_purchase_plans.seller_id')->join('seller_plans','seller_plans.id','seller_purchase_plans.plan_id')->select([
           DB::raw('@rownum  := @rownum  + 1 AS rownum'),
           'first_name',
           'company_name',
           'plan_name',
           'purchase_price',
           'start_date',
           'end_date',
           'plan_status',
           'invoice_no'
       ]);
        return Datatables::of($query)
        ->editColumn('start_date', function ($datatables) {
            return $datatables->start_date ? with(new Carbon($datatables->start_date))->format('d-M-Y') : '';
            })
          ->editColumn('end_date', function ($datatables) {
            return $datatables->end_date ? with(new Carbon($datatables->end_date))->format('d-M-Y') : '';
            })
            ->addColumn('action', function ($datatables) {
                if($datatables->plan_status==0){
                    return "<label class='label label-danger'>Inactive</label>";
                }
                else{
                    return "<label class='label label-success'>Active</label>";
                }
           })
        ->make(true);
    }
}
