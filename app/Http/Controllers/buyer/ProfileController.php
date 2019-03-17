<?php

namespace App\Http\Controllers\buyer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Models\Buyer;
use Hash;
class ProfileController extends Controller
{

	public function profile()
    {   
        $user=Auth::user();
        $row=$user->buyer;
        return view('buyer.profile',compact('row','user'));
    }

    public function update(Request $request)
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
            'buy_in' => 'required',
            'username' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
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
        $data->buy_in=$request->buy_in;
        $data->data_status=1;
        $data->save();
        return redirect('buyer/profile');
    }
    function password(){
        return view('buyer.password');
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
