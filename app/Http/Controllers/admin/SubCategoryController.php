<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductSubCategory;
use Yajra\Datatables\Datatables;
use DB;
class SubCategoryController extends Controller
{
    
    public function index()
    {
        return view('admin.subcategory.index');
    }

  
    public function create()
    {
        return view('admin.subcategory.create');
    }

 
    public function store(Request $request)
    {
        $category_name=$request->category_name;
        foreach ($category_name as $key => $value) {
            $data = new ProductSubCategory;
            $data->sub_cat_name = $request->sub_cat_name[$key];
            $data->category_id = $request->category_name[$key];
            $data->sub_cat_slug = str_slug($request->sub_cat_name[$key],'-');
            $data->save();
        }
        return redirect()->route('subcategory.index');
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $row = ProductSubCategory::find($id);
        return view('admin.subcategory.edit',compact('row'));
    }


    public function update(Request $request, $id)
    {
         $this->validate($request, [
            'category_name' => 'required',
            'sub_cat_name' => 'required',
        ]);

        $data = ProductSubCategory::find($id);
        $data->category_id = $request->category_name;
        $data->sub_cat_name = $request->sub_cat_name;
        $data->sub_cat_slug = str_slug($request->sub_cat_name,'-');
        $data->save();
        return redirect()->route('subcategory.index');
    }

    public function destroy($id)
    {
        $row = ProductSubCategory::find($id);
        $row->delete();
    }

    public function getData(Request $request){
        DB::statement(DB::raw('set @rownum=0'));
          $query = ProductSubCategory::join('product_categories','product_categories.id','product_sub_categories.category_id')
          ->select([
           DB::raw('@rownum  := @rownum  + 1 AS rownum'),
           DB::raw('product_sub_categories.id as id'),
            'sub_cat_name',
            'category_name']);
          return Datatables::of($query)
          ->addColumn('action', function ($datatables) {
            return '<a href="'.route('subcategory.edit',$datatables->id).'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>&nbsp&nbsp
            <button class="btn btn-xs btn-danger" onclick="deleteit('.$datatables->id.')"><i class="glyphicon glyphicon-trash"></i> Delete</button>';
        })
        ->make(true);
    }
}
