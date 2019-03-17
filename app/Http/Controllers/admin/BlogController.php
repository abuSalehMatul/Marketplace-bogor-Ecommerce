<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use Yajra\Datatables\Datatables;
use DB;
class BlogController extends Controller
{
    public function index()
    {
        return view('admin.blogs.index');
    }

    public function create()
    {
        return view('admin.blogs.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'category_name' => 'required',
            'title' => 'required',
            'featured_image' => 'required|mimes:jpeg,bmp,png,svg',
            'short_description' => 'required|max:500',
            'full_description' => 'required',
        ]);
        $data = new Blog;
        $data->title = $request->title;
        $data->blog_category_id = $request->category_name;
        $data->short_description = $request->short_description;
        $data->full_description = $request->full_description;
        $data->unique_code = str_random(10);
        $data->slug = str_slug($request->title,'-');
        if($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $filename = $image->getClientOriginalName();
            $destinationPath = public_path('uploads/blogs');
            $image->move($destinationPath, $filename);
            $data->featured_image="uploads/blogs/".$filename;
            $data->save();
        }
        $data->save();
        return redirect()->route('blogs.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $row = Blog::find($id);
        return view('admin.blogs.edit',compact('row'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'category_name' => 'required',
            'title' => 'required',
            'short_description' => 'required|max:500',
            'full_description' => 'required',
        ]);

        $data = Blog::find($id);
        $data->blog_category_id = $request->category_name;
        $data->title = $request->title;
        $data->short_description = $request->short_description;
        $data->full_description = $request->full_description;
        if($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $filename = $image->getClientOriginalName();
            $destinationPath = public_path('uploads/blogs');
            $image->move($destinationPath, $filename);
            $data->featured_image="uploads/blogs/".$filename;
            $data->save();
        }
        $data->save();
        return redirect()->route('blogs.index');
    }

    public function destroy($id)
    {
        $row = Blog::find($id);
        $row->delete();
    }

    public function getData(Request $request){
        DB::statement(DB::raw('set @rownum=0'));
        $query = Blog::join('blog_categories','blog_categories.id','blogs.blog_category_id')
        ->select([
         DB::raw('@rownum  := @rownum  + 1 AS rownum'),
         DB::raw('blogs.id as id'),
         'featured_image',
         'category_name',
         'title',
     ]);
        return Datatables::of($query)
        ->addColumn('featured_image', function ($datatables) {
         return '<img src="'. asset($datatables->featured_image).'" width="100">';
     })
        ->addColumn('action', function ($datatables) {
            return '<a href="'.route('blogs.edit',$datatables->id).'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>&nbsp&nbsp
            <button class="btn btn-xs btn-danger" onclick="deleteit('.$datatables->id.')"><i class="glyphicon glyphicon-trash"></i> Delete</button>';
        })
        ->rawColumns(['action', 'featured_image'])->make(true);
    }
}
