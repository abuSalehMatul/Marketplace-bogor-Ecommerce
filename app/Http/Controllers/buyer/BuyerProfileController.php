<?php

namespace App\Http\Controllers\buyer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Buyer;
use App\Models\BuyerProfile;
use App\User;
use Auth;
use Hash;
class BuyerProfileController extends Controller
{
    public function index()
    {
        $row=Auth::user()->buyer->BuyerProfile;
        if(empty($row)){
            return view('buyer.profile.create');
        }
        else{
            return view('buyer.profile.edit',compact('row'));
        }
    }

    public function create()
    {   


    }

    public function store(Request $request)
    {
     $this->validate($request, [
        'logo' => 'required',
    ]);
     $user=Auth::user();
     $userid=$user->buyer->id;
     $data=new BuyerProfile;
     $data->buyer_id = $userid;
     $data->profile_description = $request->company_description;
     if($request->hasFile('logo')) {
        $image = $request->file('logo');
        $filename = $image->getClientOriginalName();
        $destinationPath = public_path('uploads/buyercompanylogo');
        $image->move($destinationPath, $filename);
        $data->logo="uploads/buyercompanylogo/".$filename;
    }
    $data->save();
    return redirect()->route('buyerprofile.index');
    }


    public function show($id)
    {
            //
    }

    public function edit($id)
    {
            //
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'logo' => 'required',
        ]);
        $data = BuyerProfile::find($id);
        $data->profile_description = $request->company_description;
        if($request->hasFile('logo')) {
            $image = $request->file('logo');
            $filename = $image->getClientOriginalName();
            $destinationPath = public_path('uploads/buyercompanylogo');
            $image->move($destinationPath, $filename);
            $data->logo="uploads/buyercompanylogo/".$filename;
        }
        $data->save();
        return redirect()->route('buyerprofile.index');
    }

    public function destroy($id)
    {
            //
    }

    public function profile()
    {   
        $user=Auth::user();
        $row=$user->buyer;
        return view('buyer.profile',compact('row','user'));
    }

    public function password()
    {   
        return view('buyer.password');
    }

    /*public function profileupdate(Request $request)
    {
        $id=Auth::user()->id;
        $this->validate($request, [
            'business_sector' => 'required',
            'company_status' => 'required',
            'contact_number' => 'required',
            'address1' => 'required',
            'address2' => 'required',
            'city' => 'required',
            'state' => 'required',
            'postal' => 'required',
            'country' => 'required',
            'sell_in' => 'required',
            'username' => 'required',
        ]);


        $user = User::find($id);
        $user->email=$request->username;
        $user->save();

        $data = Buyer::find($user->buyer->id);
        $data->first_name=$request->first_name;
        $data->last_name=$request->last_name;
        $data->instant_type=$request->instant_type;
        $data->instant_id=$request->instant_id;
        $data->company_name=$request->company_name;
        $data->company_slug=str_slug($request->company_name,'-');
        $data->business_sector=$request->business_sector;
        $data->company_status=$request->company_status;
        $data->designation=$request->designation;
        $data->contact_number=$request->contact_number;
        $data->website=$request->website;
        $data->address1=$request->address1;
        $data->address2=$request->address2;
        $data->city=$request->city;
        $data->state=$request->state;
        $data->postal=$request->postal;
        $data->country=$request->country;
        $data->sell_in=$request->sell_in;
        $data->save();
        return redirect()->back()->with('success', 'Profile successfully updated!'); 


    }*/

    function updatepassword(Request $request){
        $this->validate($request, [
            'old' => 'required',
            'password' => 'required|min:6',
        ]);

        $user = Auth::user();
        $hashedPassword = $user->password;

        if (Hash::check($request->old, $hashedPassword)) {
            $user->fill([
                'password' => bcrypt($request->password)
            ])->save();
 
            session()->flash('success_msg', 'Your password has been changed.');
            return back();
        }
        session()->flash('danger_msg', 'Your password has not been changed.');
        return back();
    }
}
