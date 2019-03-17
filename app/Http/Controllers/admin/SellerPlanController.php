<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Models\SellerPlan;
use Yajra\Datatables\Datatables;
use DB;
class SellerPlanController extends Controller
{
    public function index()
    {   
        $result = SellerPlan::all();
        return view('admin.plan.index',compact('result'));
    }


    public function create()
    {
      
    }


    public function store(Request $request)
    {
        // return 'hi';
        $plan=new SellerPlan;
        $plan->plan_name=$request->plan_name;
        $plan->charge=$request->plan_price;       
        $plan->plan_month=$request->plan_month;
        $plan->description=$request->description;
        $plan->save();
        return redirect()->route('sellerplan.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
      $row = SellerPlan::find($id);
      return view('admin.plan.edit',compact('row'));
    }

 
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'plan_name' => 'required',
            'charge' => 'required',
            'plan_month' => 'required',
            'description' => 'required|max:255',
        ]);

        $data = SellerPlan::find($id);
        $data->plan_name = $request->plan_name;
        $data->charge = $request->charge;
        $data->plan_month = $request->plan_month;
        $data->description = $request->description;
        
        $data->save();
        return redirect()->route('sellerplan.index');
    }

   
    public function destroy($id)
    {
        //
    }
    public function getData(Request $request){
        DB::statement(DB::raw('set @rownum=0'));
        $query = SellerPlan::select([
         DB::raw('@rownum  := @rownum  + 1 AS rownum'),
         'id',
         'plan_name',
         'charge',
         'plan_month',
         'description',
     ]);
        return Datatables::of($query)
        ->addColumn('action', function ($datatables) {
            return '<a href="'.route('city.edit',$datatables->id).'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
        })
        ->rawColumns(['action', 'country_flag'])->make(true);
    }
    public function newplanform(){
        return view('admin.plan.newplanform');
    }
}
