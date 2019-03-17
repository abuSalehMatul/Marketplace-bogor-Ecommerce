<?php

namespace App\Http\Controllers\buyer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BuyerPost;
use Auth;
use Yajra\Datatables\Datatables;
use DB;
class BuyerPostController extends Controller
{
    public function index()
    {
        return view('buyer.post.index');
    }

    public function create()
    {
        return view('buyer.post.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'post_type' => 'required',
            'product_type' => 'required',
            'description' => 'required|max:2000',
        ]);
        $user=Auth::user();
        $data = new BuyerPost;
        $data->unique_code = str_random(10);
        $data->title = $request->title;
        $data->description = $request->description;
        $data->post_type = $request->post_type;
        $data->product_type = $request->product_type;
        $data->buyer_id = $user->buyer->id;
        $data->post_slug=str_slug($request->title,'-');
        $data->save();
        return redirect()->route('post.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
       $row = BuyerPost::find($id);
        return view('buyer.post.edit',compact('row'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'post_type' => 'required',
            'description' => 'required',
            'product_type' => 'required',
        ]);

        $data = BuyerPost::find($id);
        $data->title = $request->title;
        $data->post_type = $request->post_type;
        $data->product_type = $request->product_type;
        $data->description = $request->description;
        $data->post_slug=str_slug($request->title,'-');
        $data->save();
        return redirect()->route('post.index');
    }

    public function destroy($id)
    {
        $row = BuyerPost::find($id);
        $row->delete();
    }

    public function getData(Request $request){
        $user=Auth::user()->Buyer->id;
        DB::statement(DB::raw('set @rownum=0'));
        $query = BuyerPost::select([
           DB::raw('@rownum  := @rownum  + 1 AS rownum'),
           'id',
           'title',
           // 'description'
       ])->where('buyer_id',$user);
        return Datatables::of($query)
        ->addColumn('action', function ($datatables) {
            return '<a href="'.route('post.edit',$datatables->id).'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>&nbsp&nbsp
            <button class="btn btn-xs btn-danger" onclick="deleteit('.$datatables->id.')"><i class="glyphicon glyphicon-trash"></i> Delete</button>';
        })
        ->make(true);
    }
}
