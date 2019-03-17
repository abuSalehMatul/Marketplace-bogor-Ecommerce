<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WebsiteEnquiry;
use App\Models\SellerEnquiry;
use App\Models\BuyerEnquiry;
use Auth;
class ContactUsController extends Controller
{	
	public function index(){
		return view('contact-us');
	}

	public function store(Request $request)
    {
        $this->validate($request, [
            'first' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'message' => 'required|max:500',
        ]);
        $data = new WebsiteEnquiry;
        $data->first = $request->first;
        $data->lastname = $request->lastname;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->message = $request->message;
        $data->save();
        return redirect()->back()->with('success', 'Thank you! we will contact you soon.');
    }

    public function sellerEnquiry(Request $request, $id){
        $this->validate($request, [
            'name'=>'required|max:50',
            'phone'=>'required|max:20',
            'email_id'=>'required|email|max:50',
            'message'=>'required',
        ]);
        $user_id=Auth::user()->id;
        $data=new SellerEnquiry;
        $data->user_id=$user_id;
        $data->seller_id=$id;
        $data->name=$request->name;
        $data->phone=$request->phone;
        $data->email_id=$request->email_id;
        $data->message=$request->message;
        $data->save();
        session()->flash('success_msg',"Thank you for make enquiry, we will contact you soon");
        return back();

    }

    public function buyerEnquiry(Request $request, $id){
        $this->validate($request, [
            'name'=>'required|max:50',
            'phone'=>'required|max:20',
            'email_id'=>'required|email|max:50',
            'message'=>'required',
        ]);
        $user_id=Auth::user()->id;
        $data=new BuyerEnquiry;
        $data->user_id=$user_id;
        $data->buyer_id=$id;
        $data->name=$request->name;
        $data->phone=$request->phone;
        $data->email_id=$request->email_id;
        $data->message=$request->message;
        $data->save();
        session()->flash('success_msg',"Thank you for make enquiry, we will contact you soon");
        return back();

    }
}
