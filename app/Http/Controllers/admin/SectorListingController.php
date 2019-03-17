<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SectorListing;
use App\Models\SectorListingFeature;
use Yajra\Datatables\Datatables;
use DB;
class SectorListingController extends Controller
{
    
    public function index()
    {
        return view('admin.sectorwise.index');
    }

    public function create()
    {
        return view('admin.sectorwise.create');
    }

    
    public function store(Request $request)
    {
        $this->validate($request, [
            'sector_name' => 'required',
            'title' => 'required',
            'price' => 'required',
            'description' => 'required',
            'featured_image' => 'required|mimes:jpeg,bmp,png,svg',
        ]);

        $data = new SectorListing;
        $data->sector_id = $request->sector_name;
        $data->title = $request->title;
        $data->price = $request->price;
        $data->description = $request->description;
        $data->slug = str_slug($request->title,'-');
        if($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $filename = $image->getClientOriginalName();
            $destinationPath = public_path('uploads/sectorlisting');
            $image->move($destinationPath, $filename);
            $data->featured_image="uploads/sectorlisting/".$filename;
        }

        if($request->hasFile('file_upload')) {
            $image = $request->file('file_upload');
            $filename = $image->getClientOriginalName();
            $destinationPath = public_path('uploads/sectorlisting_pdf');
            $image->move($destinationPath, $filename);
            $data->upload_file="uploads/sectorlisting_pdf/".$filename;
        }
        $data->save();

        $sector_listing_id=$data->id;
        $feature_name=$request->feature_name;
        foreach ($feature_name as $key => $value) {
            $data = new SectorListingFeature;
            $data->sector_listing_id = $sector_listing_id;
            $data->feature_name = $request->feature_name[$key];
            $data->save();
        }
        return redirect()->route('sectorwise.index');
    }

    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $row = SectorListing::find($id);
        $result=$row->sectorfeature;
        return view('admin.sectorwise.edit',compact('row','result'));
    }

   
    public function update(Request $request, $id)
    {
        {
        $this->validate($request, [
            'sector_name' => 'required',
            'title' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);

        $data = SectorListing::find($id);
        $data->sector_id = $request->sector_name;
        $data->title = $request->title;
        $data->price = $request->price;
        $data->description = $request->description;
        $data->slug = str_slug($request->title,'-');
        if($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $filename = $image->getClientOriginalName();
            $destinationPath = public_path('uploads/sectorlisting');
            $image->move($destinationPath, $filename);
            $data->featured_image="uploads/sectorlisting/".$filename;
        }

        if($request->hasFile('file_upload')) {
            $image = $request->file('file_upload');
            $filename = $image->getClientOriginalName();
            $destinationPath = public_path('uploads/sectorlisting_pdf');
            $image->move($destinationPath, $filename);
            $data->upload_file="uploads/sectorlisting_pdf/".$filename;
        }
        $data->save();
        $update_id=$request->update_id;
        $feature_name=$request->feature_name;
        foreach ($update_id as $key => $value) {
            if($update_id[$key]=="new"){
                $newdata=new SectorListingFeature;
                $newdata->sector_listing_id=$id;
                $newdata->feature_name=$feature_name[$key];
                $newdata->save();
            }
            else{
                $data = SectorListingFeature::find($update_id[$key]);
                $data->feature_name = $request->feature_name[$key];
                $data->save();
            }
        }
        return redirect()->route('sectorwise.index');
    }
    }

    public function destroy($id)
    {
       $row = SectorListing::find($id);
        $row->delete();
    }

     public function deletefeature($id)
    {
        $row = SectorListingFeature::find($id);
        $row->delete();
        return back();
    }

    public function getData(Request $request){
        DB::statement(DB::raw('set @rownum=0'));
        $query = SectorListing::join('sector_categories','sector_categories.id','sector_listings.sector_id')
        ->select([
         DB::raw('@rownum  := @rownum  + 1 AS rownum'),
         DB::raw('sector_listings.id as id'),
         'featured_image',
         'sector_name',
         'title',
         'price'
        ]);

        return Datatables::of($query)
        ->addColumn('featured_image', function ($datatables) {
         return '<img src="'. asset($datatables->featured_image).'" width="100">';
        })

        ->addColumn('action', function ($datatables) {
            return '<a href="'.route('sectorwise.edit',$datatables->id).'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>&nbsp&nbsp
            <button class="btn btn-xs btn-danger" onclick="deleteit('.$datatables->id.')"><i class="glyphicon glyphicon-trash"></i> Delete</button>';
        })
        ->rawColumns(['action', 'featured_image'])->make(true);
    }
}
