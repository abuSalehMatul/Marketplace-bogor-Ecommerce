<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SectorCategory;
use Yajra\Datatables\Datatables;
use DB;
class SectorCategoryController extends Controller
{
    
    public function index()
    {
        return view('admin.listing.index');
    }

   
    public function create()
    {
        return view('admin.listing.create');
    }

    public function store(Request $request)
    {   
        $this->validate($request, [
            'sector_name' => 'required',
            'image' => 'required|mimes:jpeg,bmp,png,svg',
        ]);

        $data = new SectorCategory;
        $data->sector_name = $request->sector_name;
        $data->sector_slug = str_slug($request->sector_name,'-');
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $destinationPath = public_path('uploads/listing');
            $image->move($destinationPath, $filename);
            $data->image="uploads/listing/".$filename;
            $data->save();
        }
        $data->save();
        return redirect()->route('listing.index');
    }

    
    public function show($id)
    {
        //
    }

  
    public function edit($id)
    {
        $row = SectorCategory::find($id);
        return view('admin.listing.edit',compact('row'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'sector_name' => 'required',
        ]);
        $data = SectorCategory::find($id);
        $data->sector_name = $request->sector_name;
        $data->sector_slug = str_slug($request->sector_name,'-');
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $destinationPath = public_path('uploads/listing');
            $image->move($destinationPath, $filename);
            $data->image="uploads/listing/".$filename;
            $data->save();
        }
        $data->save();
        return redirect()->route('listing.index');
    }

   
    public function destroy($id)
    {
        $row = SectorCategory::find($id);
        $row->delete();
    }

    public function getData(Request $request){
        DB::statement(DB::raw('set @rownum=0'));
        $query = SectorCategory::select([
         DB::raw('@rownum  := @rownum  + 1 AS rownum'),
         'id',
         'sector_name',
         'image'
     ]);
        return Datatables::of($query)
        ->addColumn('image', function ($datatables) {
               return '<img src="'. asset($datatables->image).'" width="100">';
          })
        ->addColumn('action', function ($datatables) {
            return '<a href="'.route('listing.edit',$datatables->id).'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>&nbsp&nbsp
            <button class="btn btn-xs btn-danger" onclick="deleteit('.$datatables->id.')"><i class="glyphicon glyphicon-trash"></i> Delete</button>';
        })
        ->rawColumns(['action', 'image'])->make(true);
    }
}
