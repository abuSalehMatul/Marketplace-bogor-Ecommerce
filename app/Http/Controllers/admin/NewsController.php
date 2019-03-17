<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News;
use Yajra\Datatables\Datatables;
use DB;
class NewsController extends Controller
{

    public function index()
    {
        return view('admin.news.index');
    }

    public function create()
    {
        return view('admin.news.create');
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
        $data = new News;
        $data->title = $request->title;
        $data->category_id = $request->category_name;
        $data->short_description = $request->short_description;
        $data->full_description = $request->full_description;
        $data->unique_code = str_random(10);
        $data->slug = str_slug($request->title,'-');
        if($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $filename = $image->getClientOriginalName();
            $destinationPath = public_path('uploads/news');
            $image->move($destinationPath, $filename);
            $data->featured_image="uploads/news/".$filename;
            $data->save();
        }
        $data->save();
        return redirect()->route('news.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $row = News::find($id);
        return view('admin.news.edit',compact('row'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'category_name' => 'required',
            'title' => 'required',
            'short_description' => 'required|max:500',
            'full_description' => 'required',
        ]);

        $data = News::find($id);
        $data->category_id = $request->category_name;
        $data->title = $request->title;
        $data->short_description = $request->short_description;
        $data->full_description = $request->full_description;
        if($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $filename = $image->getClientOriginalName();
            $destinationPath = public_path('uploads/news');
            $image->move($destinationPath, $filename);
            $data->featured_image="uploads/news/".$filename;
            $data->save();
        }
        $data->save();
        return redirect()->route('news.index');
    }

    public function destroy($id)
    {
        $row = News::find($id);
        $row->delete();
    }

    public function getData(Request $request){
        DB::statement(DB::raw('set @rownum=0'));
        $query = News::join('news_categories','news_categories.id','news.category_id')
        ->select([
         DB::raw('@rownum  := @rownum  + 1 AS rownum'),
         DB::raw('news.id as id'),
         'featured_image',
         'category_name',
         'title',
     ]);
        return Datatables::of($query)
        ->addColumn('featured_image', function ($datatables) {
         return '<img src="'. asset($datatables->featured_image).'" width="100">';
     })
        ->addColumn('action', function ($datatables) {
            return '<a href="'.route('news.edit',$datatables->id).'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>&nbsp&nbsp
            <button class="btn btn-xs btn-danger" onclick="deleteit('.$datatables->id.')"><i class="glyphicon glyphicon-trash"></i> Delete</button>';
        })
        ->rawColumns(['action', 'featured_image'])->make(true);
    }
}
