<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CountryListing;
use App\Models\CountryListingFeature;
use Yajra\Datatables\Datatables;
use DB;
class CountryListingController extends Controller
{

    public function index()
    {
        return view('admin.countrywise.index');
    }


    public function create()
    {
        return view('admin.countrywise.create');
    }


    public function store(Request $request)
    {   
        $this->validate($request, [
            'country_name' => 'required',
            'title' => 'required',
            'price' => 'required',
            'description' => 'required',
            'featured_image' => 'required|mimes:jpeg,bmp,png,svg',
        ]);

        $data = new CountryListing;
        $data->country_id = $request->country_name;
        $data->title = $request->title;
        $data->price = $request->price;
        $data->description = $request->description;
        $data->slug = str_slug($request->title,'-');
        if($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $filename = $image->getClientOriginalName();
            $destinationPath = public_path('uploads/countrylisting');
            $image->move($destinationPath, $filename);
            $data->featured_image="uploads/countrylisting/".$filename;
        }

        if($request->hasFile('file_upload')) {
            $image = $request->file('file_upload');
            $filename = $image->getClientOriginalName();
            $destinationPath = public_path('uploads/countrylisting_pdf');
            $image->move($destinationPath, $filename);
            $data->upload_file="uploads/countrylisting_pdf/".$filename;
        }
        $data->save();

        $country_listing_id=$data->id;
        $feature_name=$request->feature_name;
        foreach ($feature_name as $key => $value) {
            $data = new CountryListingFeature;
            $data->country_listing_id = $country_listing_id;
            $data->feature_name = $request->feature_name[$key];
            $data->save();
        }
        return redirect()->route('countrywise.index');
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $row = CountryListing::find($id);
        $result=$row->countryfeature;
        return view('admin.countrywise.edit',compact('row','result'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'country_name' => 'required',
            'title' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);

        $data = CountryListing::find($id);
        $data->country_id = $request->country_name;
        $data->title = $request->title;
        $data->price = $request->price;
        $data->description = $request->description;
        $data->slug = str_slug($request->title,'-');
        if($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $filename = $image->getClientOriginalName();
            $destinationPath = public_path('uploads/countrylisting');
            $image->move($destinationPath, $filename);
            $data->featured_image="uploads/countrylisting/".$filename;
        }

        if($request->hasFile('file_upload')) {
            $image = $request->file('file_upload');
            $filename = $image->getClientOriginalName();
            $destinationPath = public_path('uploads/countrylisting_pdf');
            $image->move($destinationPath, $filename);
            $data->upload_file="uploads/countrylisting_pdf/".$filename;
        }
        $data->save();
        $update_id=$request->update_id;
        $feature_name=$request->feature_name;
        foreach ($update_id as $key => $value) {
            if($update_id[$key]=="new"){
                $newdata=new CountryListingFeature;
                $newdata->country_listing_id=$id;
                $newdata->feature_name=$feature_name[$key];
                $newdata->save();
            }
            else{
                $data = CountryListingFeature::find($update_id[$key]);
                $data->feature_name = $request->feature_name[$key];
                $data->save();
            }
        }
        return redirect()->route('countrywise.index');
    }


    public function destroy($id)
    {
        $row = CountryListing::find($id);
        $row->delete();
    } 

    public function deletefeature($id)
    {
        $row = CountryListingFeature::find($id);
        $row->delete();
        return back();
    }

    public function getData(Request $request){
        DB::statement(DB::raw('set @rownum=0'));
        $query = CountryListing::join('countries','countries.id','country_listings.country_id')
        ->select([
         DB::raw('@rownum  := @rownum  + 1 AS rownum'),
         DB::raw('country_listings.id as id'),
         'featured_image',
         'country_name',
         'title',
         'price',
        ]);

        return Datatables::of($query)
        ->addColumn('featured_image', function ($datatables) {
         return '<img src="'. asset($datatables->featured_image).'" width="100">';
        })

        ->addColumn('action', function ($datatables) {
            return '<a href="'.route('countrywise.edit',$datatables->id).'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>&nbsp&nbsp
            <button class="btn btn-xs btn-danger" onclick="deleteit('.$datatables->id.')"><i class="glyphicon glyphicon-trash"></i> Delete</button>';
        })
        ->rawColumns(['action', 'featured_image'])->make(true);
    }
}
