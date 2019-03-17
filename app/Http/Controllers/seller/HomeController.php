<?php

namespace App\Http\Controllers\seller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SellerPlan;
use App\Models\SellerPurchasePlan;
use App\Models\SellerEnquiry;
use Srmklive\PayPal\Services\ExpressCheckout;
use Input;
use Auth;
class HomeController extends Controller
{
    
    public function index()
    {
        $result = SellerPlan::all();
        $seller_id=Auth::user()->seller->id;
        $plans = SellerPurchasePlan::where('seller_id',$seller_id)->get();
        
        return view('seller.index',compact('result','plans'));
    }

    public function PurchasePlan(Request $request){
        $this->validate($request, [
            'plantype'=>'required|integer'
        ]);
        $plan_id=$request->plantype;
        $plan=SellerPlan::find($plan_id);

        $provider = new ExpressCheckout;      
        $data = [];
        $data['items'] = [
            [
                'name' => $plan->plan_name."-$plan_id",
                'price' => $plan->charge,
                'qty' => 1,
            ]
        ];

        $data['invoice_id'] = "SP".date('Ymd').rand(100,999);
        $data['custom'] = "myland";
        $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
        $data['return_url'] = url('/seller/payment-success');
        $data['cancel_url'] = url('/seller/plan-purchase-cancel');
        $data['total'] = $plan->charge;

        //give a discount of 10% of the order amount
        $data['shipping_discount'] = 0;
        //$provider->setCurrency('EUR')->setExpressCheckout($data);//Set Cuurency
        $response = $provider->setExpressCheckout($data);
        return redirect($response['paypal_link']);


        /*$data=new SellerPurchasePlan;
        $data->plan_id=$plan_id;
        $data->purchase_price=$plan->charge;
        $data->plan_status=0;*/
    }

    public function PlanSuccess(){
        $provider = new ExpressCheckout;  
        $token=Input::get('token');
        $response = $provider->getExpressCheckoutDetails($token);
        //dd($response);
        $status=$response['ACK'];
        
        if($status){
            $plan=$response['L_NAME0'];
            //echo substr($plan, strpos($plan, '-'));
            $plan_id=substr($plan, strpos($plan, '-') + 1);
            $plan=SellerPlan::find($plan_id);
            $invoice_no=$response['INVNUM'];
            $data=new SellerPurchasePlan;
            $data->plan_id=$plan_id;
            $data->seller_id=Auth::user()->seller->id;
            $data->invoice_no=$invoice_no;
            $data->purchase_price=$plan->charge;
            $data->start_date=date('Y-m-d');
            $data->end_date=date('Y-m-d', strtotime('+1 years'));
            $data->plan_status=1;
            $data->save();
            session()->flash('success_msg',"Your plan has been activated");
            return redirect('seller/home');
        }
        else{
            $status_message=$response['CHECKOUTSTATUS'];
            session()->flash('success_msg',"Payment has been $status_message");
            return redirect('seller/home');
        }
    }

    public function PlanCancel(){
         session()->flash('success_msg','Payment has been cancelled.');
         return redirect('seller/home');
    }

    public function Enquiry(){
        $id=Auth::user()->seller->id;
        $result=SellerEnquiry::where('seller_id',$id)->get();
        return view('seller.enquiry',compact('result'));
    }


}
