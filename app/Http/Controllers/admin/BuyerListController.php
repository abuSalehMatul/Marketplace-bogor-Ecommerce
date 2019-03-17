<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Buyer;
use App\User;
use Yajra\Datatables\Datatables;
use DB;
class BuyerListController extends Controller
{
    public function index()
    {
        return view('admin.buyerlist.index');
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
        $row = Buyer::find($id);
        return view('admin.buyerlist.edit',compact('row'));
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
        $data = Buyer::find($id);
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
        return redirect()->route('buyerlist.index');
    }

    
    public function destroy($id)
    {
        $row = User::find($id);
        $row->delete();
    }

    public function getData(Request $request){
        DB::statement(DB::raw('set @rownum=0'));
          $query = Buyer::join('countries','countries.id','buyers.country')
          ->select([
           DB::raw('@rownum  := @rownum  + 1 AS rownum'),
           DB::raw('buyers.id as id'),
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
            return '<a href="'.route('buyerlist.edit',$datatables->id).'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>&nbsp&nbsp
            <button class="btn btn-xs btn-danger" onclick="deleteit('.$datatables->user_id.')"><i class="glyphicon glyphicon-trash"></i> Delete</button>';
        })
        ->make(true);
    }
}
