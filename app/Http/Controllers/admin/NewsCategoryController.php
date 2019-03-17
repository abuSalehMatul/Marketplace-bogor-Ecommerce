<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\NewsCategory;
use Yajra\Datatables\Datatables;
use DB;
class NewsCategoryController extends Controller
{
    public function index()
    {
        return view('admin.newscategory.index');
    }

    
    public function create()
    {
        return view('admin.newscategory.create');
    }

   
    public function store(Request $request)
    {
        $category_name=$request->category_name;
        foreach ($category_name as $key => $value) {
            $data = new NewsCategory;
            $data->category_name = $category_name[$key];
            $data->category_slug = str_slug($request->category_name[$key],'-');
            $data->save();
        }
        return redirect()->route('news-category.index');
    }

   
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        $row = NewsCategory::find($id);
        return view('admin.newscategory.edit',compact('row'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'category_name' => 'required',
        ]);

        $data = NewsCategory::find($id);
        $data->category_name = $request->category_name;
        $data->category_slug = str_slug($request->category_name);
        $data->save();
        return redirect()->route('news-category.index');
    }

   
    public function destroy($id)
    {
        $row = NewsCategory::find($id);
        $row->delete();
    }

    public function getData(Request $request){
        DB::statement(DB::raw('set @rownum=0'));
        $query = NewsCategory::select([
           DB::raw('@rownum  := @rownum  + 1 AS rownum'),
           'id',
           'category_name',
       ]);
        return Datatables::of($query)
        ->addColumn('action', function ($datatables) {
            return '<a href="'.route('news-category.edit',$datatables->id).'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>&nbsp&nbsp
            <button class="btn btn-xs btn-danger" onclick="deleteit('.$datatables->id.')"><i class="glyphicon glyphicon-trash"></i> Delete</button>';
        })
        ->make(true);
    }
}
