<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BuyerPost;
use Yajra\Datatables\Datatables;
use DB;
class BuyerPostController extends Controller
{
    public function index()
    {
        return view('admin.buyerpost.index');
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
        $row = BuyerPost::find($id);
        return view('admin.buyerpost.edit',compact('row'));
    }

   
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);

        $data = BuyerPost::find($id);
        $data->title = $request->title;
        $data->description = $request->description;
        $data->post_slug=str_slug($request->title,'-');
        $data->save();
        return redirect()->route('buyerpost.index');
    }

   
    public function destroy($id)
    {
        $row = BuyerPost::find($id);
        $row->delete();
    }

    public function getData(Request $request){
        DB::statement(DB::raw('set @rownum=0'));
        $query = BuyerPost::select([
           DB::raw('@rownum  := @rownum  + 1 AS rownum'),
           'id',
           'title',
           'description']);
        return Datatables::of($query)
        ->addColumn('action', function ($datatables) {
            return '<a href="'.route('buyerpost.edit',$datatables->id).'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>&nbsp&nbsp
            <button class="btn btn-xs btn-danger" onclick="deleteit('.$datatables->id.')"><i class="glyphicon glyphicon-trash"></i> Delete</button>';
        })
        ->make(true);
    }
}
