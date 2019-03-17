<?php

namespace App\Http\Controllers\admin\seller;

use Illuminate\Http\Request;
use App\Models\SellerHelp;
use Yajra\Datatables\Datatables;
use DB;
use App\Http\Controllers\Controller;

class HelpController extends Controller
{
    
    public function index()
    {
        return view('admin.seller.help.index');
    }

    public function create()
    {
        return view('admin.seller.help.create');
    }

    
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=> 'required',
            'icon_class'=> 'required',
            'full_description'=> 'required',
            'short_description'=> 'required',
        ]);

        $data = new SellerHelp;

        $data->title = $request->title;
        $data->icon_class = $request->icon_class;
        $data->short_description = $request->short_description;
        $data->full_description = $request->full_description;
        $data->save();
        session()->flash('success_msg','New Help  has been created successfully');
        return redirect()->route('sellerhelp.index');
    }

    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $row = SellerHelp::find($id);
        return view('admin.seller.help.edit',compact('row'));
    }

    
    public function update(Request $request, $id)
    {
        $data = SellerHelp::find($id);
        $data->title = $request->title;
        $data->icon_class = $request->icon_class;
        $data->short_description = $request->short_description;
        $data->full_description = $request->full_description;
        $data->save();
        session()->flash('success_msg','New Help  has been Updated successfully');
        return redirect()->route('sellerhelp.index');
    }

    
    public function destroy($id)
    {
     $row = SellerHelp::find($id);
     $row->delete();
 }
 public function getData(Request $request){

    DB::statement(DB::raw('set @rownum=0'));
    $query = SellerHelp::select([
       DB::raw('@rownum  := @rownum  + 1 AS rownum'),
       'id',
       'title',
       'short_description'
   ]);

    return Datatables::of($query)    
    ->addColumn('action', function ($datatables) {
        return '<a href="'.route('sellerhelp.edit',$datatables->id).'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>&nbsp&nbsp
        <button class="btn btn-xs btn-danger" onclick="deleteit('.$datatables->id.')"><i class="glyphicon glyphicon-trash"></i> Delete</button>';
    })->make(true);
    
}
}
