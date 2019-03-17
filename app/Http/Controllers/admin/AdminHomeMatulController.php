<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Seller_plan_priority;
use App\Models\SellerPlan;
use Session;
use Illuminate\Support\Facades\Redirect; 
class AdminHomeMatulController extends Controller
{
    public function list(){
    	return view('admin.userlist');
    }
    public function useractivity(){
        return view('admin.useractivity');
    }
    public function details(){
        return view('admin.frontedControl.details');
    }
    public function set_new_plan_frontend(){
        return view('admin.frontedControl.setplan');
    }
    public function priority_save_to_db(Request $request,$id){
        $plan_id=$id;
       // return $plan_id;
        if($request->array_size!= null && $request->priority!=null){
            $plan_priority=Seller_plan_priority::where('seller_plan_id',$plan_id)->first();
            if($plan_priority){
                $plan_priority->array_size=$request->array_size;
                $plan_priority->priority=$request->priority;
                $plan_priority->save();

            }else{
                $newplan_priortiy= new Seller_plan_priority;
                $newplan_priortiy->array_size=$request->array_size;
                $newplan_priortiy->priority=$request->priority;
                $newplan_priortiy->seller_plan_id=$plan_id;
                $newplan_priortiy->save();
                


            } Session::put('message','Changed');
            return redirect()->back();
        }else{
            Session::put('message','Please Fill All the fields');
            return redirect()->back();
        }
        

    }
    public function style(){
        return view('admin.frontedControl.style');
    }
    
}
