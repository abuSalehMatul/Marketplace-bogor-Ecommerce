<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\City;
use Yajra\Datatables\Datatables;
use DB;
class CityController extends Controller
{
    
    public function index()
    {   
        return view('admin.city.index');
    }

    
    public function create()
    {
        return view('admin.city.create');
    }

    
    public function store(Request $request)
    {
        $country_name=$request->country_name;

        foreach ($country_name as $key => $value) {
            $data = new City;
            $data->country_id = $country_name[$key];
            $data->city_name = $request->city_name[$key];
            $data->city_slug = str_slug($request->city_name[$key],'-');
            $data->save();
        }
        return redirect()->route('city.index');
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $row = City::find($id);
        return view('admin.city.edit',compact('row'));
    }

    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'country_name' => 'required',
            'city_name' => 'required',
        ]);

        $data = City::find($id);
        $data->country_id = $request->country_name;
        $data->city_name = $request->city_name;
        
        $data->save();
        return redirect()->route('city.index');
    }

    
    public function destroy($id)
    {
        $row = City::find($id);
        $row->delete();
    }

    public function getData(Request $request){
        DB::statement(DB::raw('set @rownum=0'));
          $query = City::join('countries','countries.id','cities.country_id')
          ->select([
           DB::raw('@rownum  := @rownum  + 1 AS rownum'),
           DB::raw('cities.id as id'),
            'city_name',
            'country_name']);
          return Datatables::of($query)
          ->addColumn('action', function ($datatables) {
            return '<a href="'.route('city.edit',$datatables->id).'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>&nbsp&nbsp
            <button class="btn btn-xs btn-danger" onclick="deleteit('.$datatables->id.')"><i class="glyphicon glyphicon-trash"></i> Delete</button>';
        })
        ->make(true);
    }

    
}
