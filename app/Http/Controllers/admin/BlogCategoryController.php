<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Yajra\Datatables\Datatables;
use DB;
class BlogCategoryController extends Controller
{
    public function index()
    {
        return view('admin.blogcategory.index');
    }

    
    public function create()
    {
        return view('admin.blogcategory.create');
    }

   
    public function store(Request $request)
    {
        $category_name=$request->category_name;
        foreach ($category_name as $key => $value) {
            $data = new BlogCategory;
            $data->category_name = $category_name[$key];
            $data->category_slug = str_slug($request->category_name[$key],'-');
            $data->save();
        }
        return redirect()->route('blogs-category.index');
    }

   
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        $row = BlogCategory::find($id);
        return view('admin.blogcategory.edit',compact('row'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'category_name' => 'required',
        ]);

        $data = BlogCategory::find($id);
        $data->category_name = $request->category_name;
        $data->category_slug = str_slug($request->category_name);
        $data->save();
        return redirect()->route('blogs-category.index');
    }

   
    public function destroy($id)
    {
        $row = BlogCategory::find($id);
        $row->delete();
    }

    public function getData(Request $request){
        DB::statement(DB::raw('set @rownum=0'));
        $query = BlogCategory::select([
           DB::raw('@rownum  := @rownum  + 1 AS rownum'),
           'id',
           'category_name',
       ]);
        return Datatables::of($query)
        ->addColumn('action', function ($datatables) {
            return '<a href="'.route('blogs-category.edit',$datatables->id).'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>&nbsp&nbsp
            <button class="btn btn-xs btn-danger" onclick="deleteit('.$datatables->id.')"><i class="glyphicon glyphicon-trash"></i> Delete</button>';
        })
        ->make(true);
    }
}

