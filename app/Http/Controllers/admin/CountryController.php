<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Country;
use Yajra\Datatables\Datatables;
use DB;
class CountryController extends Controller
{
    public function index()
    {   
        return view('admin.country.index');
    }

    public function create()
    {
        return view('admin.country.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'country_name' => 'required|unique:countries',
            'country_flag' => 'required|mimes:jpeg,bmp,png,svg',
        ]);
        $data = new Country;
        $data->country_name = $request->country_name;
        $data->country_slug = str_slug($request->country_name,'-');
        if($request->hasFile('country_flag')) {
            $image = $request->file('country_flag');
            $filename = $image->getClientOriginalName();
            $destinationPath = public_path('uploads/country');
            $image->move($destinationPath, $filename);
            $data->country_flag="uploads/country/".$filename;
            $data->save();
        }
        $data->save();
        return redirect()->route('country.index');
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $row = Country::find($id);
        return view('admin.country.edit',compact('row'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'country_name' => 'required',
        ]);

        $data = Country::find($id);
        $data->country_name = $request->country_name;
        if($request->hasFile('country_flag')) {
            $image = $request->file('country_flag');
            $filename = $image->getClientOriginalName();
            $destinationPath = public_path('uploads/country');
            $image->move($destinationPath, $filename);
            $data->country_flag="uploads/country/".$filename;
            $data->save();
        }
        $data->country_slug = str_slug($request->country_name,'-');
        
        $data->save();
        return redirect()->route('country.index');
    }

    
    public function destroy($id)
    {
        $row = Country::find($id);
        $row->delete();
    }

    public function getData(Request $request){
        DB::statement(DB::raw('set @rownum=0'));
          $query = Country::select([
           DB::raw('@rownum  := @rownum  + 1 AS rownum'),
            'id',
            'country_name',
            'country_flag',
        ]);
          return Datatables::of($query)
          ->addColumn('country_flag', function ($datatables) {
               return '<img src="'. asset($datatables->country_flag).'" width="28" height="28">';
          })
          ->addColumn('action', function ($datatables) {
            return '<a href="'.route('country.edit',$datatables->id).'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>&nbsp&nbsp
            <button class="btn btn-xs btn-danger" onclick="deleteit('.$datatables->id.')"><i class="glyphicon glyphicon-trash"></i> Delete</button>';
        })
        ->rawColumns(['action', 'country_flag'])->make(true);
    }
}
