<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Register;
use App\User;
use App\Models\Seller;
use App\Models\Buyer;
use App\Models\Product;
use App\Models\ProductImage;
use Hash;
use Auth;
use Mail;
class HomeController extends Controller
{
    public function index()
    {   
        return view('home');
    }

    public function check()
    {
        return view('admin.index');
    }

    public function Login()
    {
        return view('login');
    }

    public function SellerRegister(){
        return view('register.supplier');
    }

    public function BuyerRegister(){
        return view('register.buyer');
    }

    public function SellerStore(Request $request){
        $data = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'username' => 'required',
            'instant_type' => 'required',
            'instant_id' => 'required',
            'password' => 'required',
            // 'business_sector' => 'required',
            // 'company_status' => 'required',
            // 'contact_number' => 'required',
            // 'address1' => 'required',
            // 'address2' => 'required',
            // 'city' => 'required',
            // 'state' => 'required',
            // 'postal' => 'required',
            // 'country' => 'required',
            // 'sell_in' => 'required',
            // 'knownto' => 'required',
            // 'agree_to' => 'required',
        ]);
        $user = $request->validate([
            'username' => 'required|unique:users,email',
        ]);
        $user=new User;
        $user->name=$request->first_name;
        $user->email=$request->username;
        $user->password=bcrypt($request->password);
        $user->status=1;
        $user->save();
        $user->assignRole("seller");
        Auth::guard()->login($user);
        $user_id=$user->id;

        $data = new Seller;
        $data->unique_code=str_random(10);
        $data->first_name=$request->first_name;
        $data->last_name=$request->last_name;
        $data->instant_type=$request->instant_type;
        $data->instant_id=$request->instant_id;
        // $data->company_name=$request->company_name;
        // $data->business_sector=$request->business_sector;
        // $data->company_status=$request->company_status;
        // $data->designation=$request->designation;
        // $data->contact_number=$request->contact_number;
        // $data->website=$request->website;
        // $data->address1=$request->address1;
        // $data->address2=$request->address2;
        // $data->city=$request->city;
        // $data->state=$request->state;
        // $data->postal=$request->postal;
        // $data->country=$request->country;
        // $data->sell_in=$request->sell_in;
        $data->user_id=$user_id;
        $data->save();
        $email=$user->email;
        $mydata=array(
           'first_name' => $data->first_name,
           'last_name' => $data->last_name,
           'email_id' => $email,
           'type' => "Seller",
           'user_id' => $user_id,
        );
       
        // Mail::send('emails.register', $mydata, function ($message) use ($email)
        // {

        //     $message->from('patelprem1992@gmail.com', 'Business Directory');
        //     $message->subject('Thank you for registered');
        //     $message->to($email);

        // });
    //   return redirect('thank-you');
     return redirect(route('sellerprofile'));
    }

    public function BuyerStore(Request $request){
        $data = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'username' => 'required',
            'instant_type' => 'required',
            'instant_id' => 'required',
            'password' => 'required',
            // 'business_sector' => 'required',
            // 'company_status' => 'required',
            // 'contact_number' => 'required',
            // 'address1' => 'required',
            // 'address2' => 'required',
            // 'city' => 'required',
            // 'state' => 'required',
            // 'postal' => 'required',
            // 'country' => 'required',
            // 'sell_in' => 'required',
            // 'knownto' => 'required',
            // 'agree_to' => 'required',
        ]);
        $user = $request->validate([
            'username' => 'required|unique:users,email',
        ]);
        $user=new User;
        $user->name=$request->first_name;
        $user->email=$request->username;
        $user->password=bcrypt($request->password);
        $user->status=1;
        $user->save();
        $user->assignRole("buyer");
        Auth::guard()->login($user);
        $user_id=$user->id;

        $data = new Buyer;
        $data->unique_code=str_random(10);
        $data->first_name=$request->first_name;
        $data->last_name=$request->last_name;
        $data->instant_type=$request->instant_type;
        $data->instant_id=$request->instant_id;
        // $data->company_name=$request->company_name;
        // $data->business_sector=$request->business_sector;
        // $data->company_status=$request->company_status;
        // $data->designation=$request->designation;
        // $data->contact_number=$request->contact_number;
        // $data->website=$request->website;
        // $data->address1=$request->address1;
        // $data->address2=$request->address2;
        // $data->city=$request->city;
        // $data->state=$request->state;
        // $data->postal=$request->postal;
        // $data->country=$request->country;
        // $data->sell_in=$request->sell_in;
        $data->user_id=$user_id;

        $email=$user->email;
        $data->save();
        $mydata=array(
           'first_name' => $data->first_name,
           'last_name' => $data->last_name,
           'email_id' => $user->email,
           'type' => "Buyer",
           'user_id' => $user_id,
        );
       
        // Mail::send('emails.register', $mydata, function ($message) use ($email)
        // {

        //     $message->from('patelprem1992@gmail.com', 'Business Directory');
        //     $message->subject('Thank you for registered');
        //     $message->to($email);

        // });
    //   return redirect('thank-you');
    return redirect(route('buyerprofile'));
    }

    public function ViewDetail($slug,$id){
        $row = Product::find($id);
        $result = $row->ProductStore;
        return view('view-detail',compact('row','result'));
    }

    public function PrivacyPolicy(){
        return view('privacy-policy');
    }

    public function TearmsCondition(){
        return view('terms-conditions');
    }

    public function VerifyAccount($id){
        $user_id=decrypt($id);
        $user=User::find($user_id);
        $user->status=1;
        $user->save();
        session()->flash('success_msg', 'Your account has been verified.');
        return redirect('login');
    }
}
