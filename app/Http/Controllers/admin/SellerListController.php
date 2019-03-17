<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Seller;
use App\Models\SellerPlan;
use App\Models\SellerPurchasePlan;
use App\User;
use Yajra\Datatables\Datatables;
use DB;
class SellerListController extends Controller
{
    
    public function index()
    {
        return view('admin.sellerlist.index');
    }

    
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        //
    }

   
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {   
        $row = Seller::find($id);
        return view('admin.sellerlist.edit',compact('row'));
    }

   
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'instant_type' => 'required',
            'instant_id' => 'required',
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
        ]);
        $data = Seller::find($id);
        $data->first_name=$request->first_name;
        $data->last_name=$request->last_name;
        $data->instant_type=$request->instant_type;
        $data->instant_id=$request->instant_id;
        $data->company_name=$request->company_name;
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
        return redirect()->route('sellerlist.index');
    }

   
    public function destroy($id)
    {
        $row = User::find($id);
        $row->delete();
    }

    public function getData(Request $request){
        DB::statement(DB::raw('set @rownum=0'));
          $query = Seller::leftjoin('countries','countries.id','sellers.country')
          ->select([
           DB::raw('@rownum  := @rownum  + 1 AS rownum'),
           DB::raw('sellers.id as id'),
            'user_id',
            'first_name',
            'last_name',
            'instant_type',
            'company_name',
            'contact_number',
            'city',
            'state',
            'country_name',
        ]);
       
          return Datatables::of($query)
          ->editColumn('instant_type', function ($datatables) {
                if($datatables->instant_type==1)
                    return "WhatsApp";
                elseif($datatables->instant_type==2)
                    return "Skype";
                elseif($datatables->instant_type==3)
                    return "WeChat";
        })
        ->addColumn('action', function ($datatables) {
            return '<a href="'.route('sellerlist.edit',$datatables->id).'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>&nbsp&nbsp
            <button class="btn btn-xs btn-danger" onclick="deleteit('.$datatables->user_id.')"><i class="glyphicon glyphicon-trash"></i> Delete</button>';
        })
        ->make(true);
    }
    public function get_featured_seller2(){
        $plan_id= 3;
       
        //$seller_plan=SellerPlan::find($plan_id);
        $seller=SellerPurchasePlan::where('plan_id',$plan_id)->get();
       // return $seller;
         $output='<tr>'.
                            '<td>Seller Id</td>'.
                            '<td>First Name</td>'.
                            '<td>Last Name</td>'.
                            '<td>Instant Type</td>'.
                            '<td>Conpany</td>'.
                            '<td>Contact No</td>'.
                            '<td>City</td>'.
                            '<td>State</td>'.
                            '<td>Contry</td>'.
                            '<td>Action</td>'
                     .'</tr>';
        foreach ($seller as $seller){
            $user=Seller::where('id',$seller->seller_id)->first();
           // return $user;
          // return $output;
          if($user){
$output.='<tr>'.
                            '<td>'.$user->id.'</td>'.
                            '<td>'.$user->first_name.'</td>'.
                            '<td>'.$user->last_name.'</td>'.
                            '<td>'.$user->instant_type.'</td>'.
                            '<td>'.$user->company_name.'</td>'.
                            '<td>'.$user->contact_number.'</td>'.
                            '<td>'.$user->city.'</td>'.
                            '<td>'.$user->state.'</td>'.
                            '<td>'.$user->country.'</td>'.
                            
                            '<td>..</td>'
                     .'</tr>';
          }
            
         //return $output;
        }
        $output.='<table class="table">'.$output.'</table>';
       


        return $output;
    }
    public function get_featured_seller(Request $request){
        $plan_id= $request->plan_id;
        
        $seller=SellerPurchasePlan::where('plan_id',$plan_id)->get();
      
         $output='<thead>'.
                      '<tr>'.
                            '<th>Seller Id</th>'.
                            '<th>First Name</th>'.
                            '<th>Last Name</th>'.
                            '<th>Instant Type</th>'.
                            '<th>Conpany</th>'.
                            '<th>Contact No</th>'.
                            '<th>City</th>'.
                            '<th>State</th>'.
                            '<th>Contry</th>'.
                            '<th>Action</th>'
                     .'</tr>'.
                  '</thead>' ;
               
        foreach ($seller as $seller){
            $exist_user=User::find($seller->seller_id);
            if($exist_user){
                $user=Seller::where('id',$seller->seller_id)->first();
          
                if($user){
                    $output.='<tr>'.
                                    '<td>'.$user->id.'</td>'.
                                    '<td>'.$user->first_name.'</td>'.
                                    '<td>'.$user->last_name.'</td>'.
                                    '<td>'.$user->instant_type.'</td>'.
                                    '<td>'.$user->company_name.'</td>'.
                                    '<td>'.$user->contact_number.'</td>'.
                                    '<td>'.$user->city.'</td>'.
                                    '<td>'.$user->state.'</td>'.
                                    '<td>'.$user->country.'</td>'.
                                    
                                    '<td>'.'<a href="'.route('sellerlist.edit',$user->id).'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>&nbsp&nbsp
                    <button class="btn btn-xs btn-danger" onclick="deleteit('.$user->user_id.')"><i class="glyphicon glyphicon-trash"></i> Delete</button>'.'</td>'
                            .'</tr>';
                }
            
        
            }
      
        $output.='<table class="table table-striped">'.$output.'</table>';

       }
           

        return $output;
    }
}
