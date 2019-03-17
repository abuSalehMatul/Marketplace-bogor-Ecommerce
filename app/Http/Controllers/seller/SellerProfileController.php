<?php

namespace App\Http\Controllers\seller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SellerProfile;
use App\Models\Seller;
use App\User;
use Auth;
use Hash;
class SellerProfileController extends Controller
{

    public function index()
    {
        $data=Auth::user()->seller->SellerProfile;
        if(empty($data)){
            return view('seller.profile.create');
        }
        else{
            return view('seller.profile.edit',compact('data'));
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
     $userid=$user->seller->id;
     $data=new SellerProfile;
     $data->seller_id = $userid;
     $data->profile_description = $request->company_description;
     if($request->hasFile('logo')) {
        $image = $request->file('logo');
        $filename = $image->getClientOriginalName();
        $destinationPath = public_path('uploads/companylogo');
        $image->move($destinationPath, $filename);
        $data->logo="uploads/companylogo/".$filename;
    }
    $data->save();
    return redirect()->route('sellerprofile.index');
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
        $data = SellerProfile::find($id);
        $data->profile_description = $request->company_description;
        if($request->hasFile('logo')) {
            $image = $request->file('logo');
            $filename = $image->getClientOriginalName();
            $destinationPath = public_path('uploads/companylogo');
            $image->move($destinationPath, $filename);
            $data->logo="uploads/companylogo/".$filename;
        }
        $data->save();
        return redirect()->route('sellerprofile.index');
    }

    public function destroy($id)
    {
            //
    }

    public function profile()
    {   
        
        $user=Auth::user();
        $row=$user->seller;
        return view('seller.profile',compact('row','user'));
    }

    public function password()
    {   
        return view('seller.password');
    }

    public function profileupdate(Request $request)
    {
        $id=Auth::user()->id;
        $this->validate($request, [
            'company_name' => 'required',
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

        $data = Seller::find($user->seller->id);
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
        $data->data_status=1;
        $data->save();
        return redirect()->back()->with('success', 'Profile successfully updated!'); 


    }

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
