<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Yajra\Datatables\Datatables;
use DB;
class CategoryController extends Controller
{

    public function index()
    {
        return view('admin.category.index');
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'category_name' => 'required',
            'thumb_img' => 'mimes:jpeg,bmp,png,svg|nullable',
        ]);
        $data = new ProductCategory;
        $data->category_name=$request->category_name;
        $data->category_slug=str_slug($request->category_name,'-');
        if($request->hasFile('thumb_img')) {
            $image = $request->file('thumb_img');
            $filename = $image->getClientOriginalName();
            $destinationPath = public_path('uploads/category');
            $image->move($destinationPath, $filename);
            $data->thumb_img="uploads/category/".$filename;
        }
        $data->save();
        return redirect()->route('category.index');
    }

    
    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $row = ProductCategory::find($id);
        return view('admin.category.edit',compact('row'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'category_name' => 'required',
        ]);

        $data = ProductCategory::find($id);
        $data->category_name=$request->category_name;
        $data->category_slug=str_slug($request->category_name,'-');
        if($request->hasFile('thumb_img')) {
            $image = $request->file('thumb_img');
            $filename = $image->getClientOriginalName();
            $destinationPath = public_path('uploads/category');
            $image->move($destinationPath, $filename);
            $data->thumb_img="uploads/category/".$filename;
        }
        $data->save();
        return redirect()->route('category.index');
    }

    
    public function destroy($id)
    {
        $row = ProductCategory::find($id);
        $row->delete();
    }

    public function getData(Request $request){
        DB::statement(DB::raw('set @rownum=0'));
          $query = ProductCategory::select([
           DB::raw('@rownum  := @rownum  + 1 AS rownum'),
            'id',
            'category_name']);
          return Datatables::of($query)
          ->addColumn('action', function ($datatables) {
            return '<a href="'.route('category.edit',$datatables->id).'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>&nbsp&nbsp
            <button class="btn btn-xs btn-danger" onclick="deleteit('.$datatables->id.')"><i class="glyphicon glyphicon-trash"></i> Delete</button>';
        })
        ->make(true);
    }
}
