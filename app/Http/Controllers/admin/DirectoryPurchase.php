<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SectorPurchase;
use App\Models\CountryPurchase;
use Yajra\Datatables\Datatables;
use DB;
use Carbon\Carbon;
class DirectoryPurchase extends Controller
{
    public function Sectorlist(){
      return view('admin.purchase.sector-list');
    }

    public function SectorgetData(Request $request){
        DB::statement(DB::raw('set @rownum=0'));
        $query = SectorPurchase::join('sector_listings','sector_listings.id','sector_purchases.sector_id')
        ->select([
           DB::raw('@rownum  := @rownum  + 1 AS rownum'),
           'invoice_no',
           'email_id',
           'title',
           'purchase_price',
           DB::raw('sector_purchases.created_at as created_at')
       ]);
        return Datatables::of($query)
        ->editColumn('created_at', function ($datatables) {
            return $datatables->created_at ? with(new Carbon($datatables->created_at))->format('d-M-Y') : '';
            })
        ->make(true);
    }

    public function Countrylist(){
    	return view('admin.purchase.country-list');
    }

    public function CountrygetData(Request $request){
        DB::statement(DB::raw('set @rownum=0'));
        $query = CountryPurchase::join('country_listings','country_listings.id','country_purchases.country_id')
        ->select([
           DB::raw('@rownum  := @rownum  + 1 AS rownum'),
           'invoice_no',
           'email_id',
           'title',
           'purchase_price',
           DB::raw('country_purchases.created_at as created_at')
       ]);
        return Datatables::of($query)
        ->editColumn('created_at', function ($datatables) {
            return $datatables->created_at ? with(new Carbon($datatables->created_at))->format('d-M-Y') : '';
            })
        ->make(true);
    }
}
