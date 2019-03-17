<?php

namespace App\Http\Controllers\admin\buyer;

use Illuminate\Http\Request;
use App\Models\BuyerSafety;
use Yajra\Datatables\Datatables;
use DB;
use App\Http\Controllers\Controller;

class SafetyController extends Controller
{

    public function index()
    {
       return view('admin.buyer.safety.index');
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
       $row = BuyerSafety::find($id);
       return view('admin.buyer.safety.edit',compact('row'));
   }


   public function update(Request $request, $id)
   {
     $data = BuyerSafety::find($id);
     $data->full_description = $request->full_description;
     $data->save();
     session()->flash('success_msg','New Safety has been Updated successfully');
     return redirect()->route('buyersafety.index');

 }


 public function destroy($id)
 {
   $data = BuyerSafety::find($id);
   $data->delete();
}
public function getData(Request $request){

    DB::statement(DB::raw('set @rownum=0'));
    $query = BuyerSafety::select([
     DB::raw('@rownum  := @rownum  + 1 AS rownum'),
     'id',
     'full_description'
 ]);

    return Datatables::of($query)    
    ->addColumn('action', function ($datatables) {
        return '<a href="'.route('buyersafety.edit',$datatables->id).'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>&nbsp&nbsp
        <button class="btn btn-xs btn-danger" onclick="deleteit('.$datatables->id.')"><i class="glyphicon glyphicon-trash"></i> Delete</button>';
    })->make(true);

}
}
