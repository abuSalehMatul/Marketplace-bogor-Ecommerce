<?php

namespace App\Http\Controllers\admin\seller;

use Illuminate\Http\Request;
use App\Models\SellerFAQ;
use Yajra\Datatables\Datatables;
use DB;
use App\Http\Controllers\Controller;

class FQAController extends Controller
{
    
    public function index()
    {
       return view('admin.seller.faq.index');
    }

    public function create()
    {
        return view('admin.seller.faq.create');
    }

    
    public function store(Request $request)
    {
       
       $this->validate($request,[
        'questions'=>'required',
        'answers'=>'required'

    ]);
       $data = new SellerFAQ;
       $data->questions= $request->questions;
       $data->answers= $request->answers;
       $data->save();
       session()->flash('success_msg','New FAQ has  been created successfully');
       return redirect()->route('sellerfaq.index');
    }

    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
       $row = SellerFAQ::find($id);
    return view('admin.seller.faq.edit',compact('row'));
    }

   
    public function update(Request $request, $id)
    {
        $data = SellerFAQ::find($id);
    $data->questions= $request->questions;
    $data->answers= $request->answers;
    $data->save();
    session()->flash('success_msg','New FAQ has  been Updated successfully');
    return redirect()->route('sellerfaq.index');
    }

    
    public function destroy($id)
    {
        $row = SellerFAQ::find($id);
  $row->delete();
    }
    public function getData(Request $request){

    DB::statement(DB::raw('set @rownum=0'));
    $query = SellerFAQ::select([
       DB::raw('@rownum  := @rownum  + 1 AS rownum'),
       'id',
       'questions',
       'answers'
   ]);

    return Datatables::of($query)    
    ->addColumn('action', function ($datatables) {
        return '<a href="'.route('sellerfaq.edit',$datatables->id).'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>&nbsp&nbsp
        <button class="btn btn-xs btn-danger" onclick="deleteit('.$datatables->id.')"><i class="glyphicon glyphicon-trash"></i> Delete</button>';
    })->make(true);
    
}
}
