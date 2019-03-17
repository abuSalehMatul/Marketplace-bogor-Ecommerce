<?php

namespace App\Http\Controllers\admin\seller;

use Illuminate\Http\Request;
use App\Models\SellerSafety;
use Yajra\Datatables\Datatables;
use DB;
use App\Http\Controllers\Controller;

class SafetyController extends Controller
{
    
    public function index()
    {
        return view('admin.seller.safety.index');
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
         $row = SellerSafety::find($id);
       return view('admin.seller.safety.edit',compact('row'));
    }

   
    public function update(Request $request, $id)
    {
      $data = SellerSafety::find($id);
     $data->full_description = $request->full_description;
     $data->save();
     session()->flash('success_msg','New Safety has been Updated successfully');
     return redirect()->route('sellersafety.index');
    }

    
   
    public function destroy($id)
    {
        $data = SellerSafety::find($id);
   $data->delete();
    }
    public function getData(Request $request){

    DB::statement(DB::raw('set @rownum=0'));
    $query = SellerSafety::select([
     DB::raw('@rownum  := @rownum  + 1 AS rownum'),
     'id',
     'full_description'
 ]);

    return Datatables::of($query)    
    ->addColumn('action', function ($datatables) {
        return '<a href="'.route('sellersafety.edit',$datatables->id).'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>&nbsp&nbsp
        <button class="btn btn-xs btn-danger" onclick="deleteit('.$datatables->id.')"><i class="glyphicon glyphicon-trash"></i> Delete</button>';
    })->make(true);

}
}
