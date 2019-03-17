<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use Yajra\Datatables\Datatables;
use DB;
class AdvertisementController extends Controller
{
    public function topbanner()
    {	
        return view('admin.advertisement.topbanner');
    }

 	public function bottombanner()
    {
        return view('admin.advertisement.bottombanner');
    }

    public function sidebarbanner()
    {
        return view('admin.advertisement.sidebarbanner');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {	
    	$row = Banner::find($id);
    	if($row->type==1){
    		$header='Top Banner Edit';
        	$url="admin/advertisement/topbanner";
        }
        elseif($row->type==2){
        	$header='Bottom Banner Edit';
        	$url="admin/advertisement/bottombanner";
        }
        elseif($row->type==3){
        	$header='Side Banner Edit';
        	$url="admin/advertisement/sidebarbanner";
        }
        return view('admin.advertisement.edit',compact('row','url','header'));
    }

    
    public function update(Request $request, $id)
    {
        $data = Banner::find($id);
    	if($data->type==1){
        	$foldername="uploads/topbar";
        	$route="admin/advertisement/topbanner";
        }
        elseif($data->type==2){
        	$foldername="uploads/bottombar";
        	$route="admin/advertisement/bottombanner";
        }
        elseif($data->type==3){
        	$foldername="uploads/sidebar";
        	$route="admin/advertisement/sidebarbanner";
        }
        if($request->hasFile('banner_image')) {
            $image = $request->file('banner_image');
            $filename = $image->getClientOriginalName();
            
            $destinationPath = public_path($foldername);
            $image->move($destinationPath, $filename);
            $data->banner_image="$foldername/".$filename;
        }
        $data->save();
        return redirect($route);
    }

   
    public function destroy($id)
    {
        $row = Banner::find($id);
        $row->delete();
    }

    public function changeStatus($id,$status){
    	 $row = Banner::find($id);
    	 $row->status=$status;
    	 $row->save();
    	 return back();
    }

    public function getData(Request $request){
    	$type=$request->bannertype;
        DB::statement(DB::raw('set @rownum=0'));
          $query = Banner::join('sellers','sellers.id','banners.seller_id')->select([
           DB::raw('@rownum  := @rownum  + 1 AS rownum'),
           DB::raw('banners.id as id'),
            'banner_image',
            'status',
            'first_name',
            'type'
        ])->where('type',$type);
          return Datatables::of($query)
          ->addColumn('banner_image', function ($datatables) {
               return '<img src="'. asset($datatables->banner_image).'" width="100">';
          })
          ->addColumn('status', function ($datatables) {
           	if($datatables->status==0){
           		return '<a href="'.url('admin/advertisement/changeStatus/'.$datatables->id.'/1').'" class="btn btn-success btn-xs" onclick="return statusChange('.$datatables->id.',1)">Not Approved</a>';
           	}
           	elseif ($datatables->status==1) {
           		return '<a href="'.url('admin/advertisement/changeStatus/'.$datatables->id.'/0').'" class="btn btn-info btn-xs"  onclick="return statusChange('.$datatables->id.',2)">Approved</a>';
           	}
            
        })

           ->addColumn('action', function ($datatables) {
            return '<a href="'.route('advertisement.edit',$datatables->id).'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>&nbsp&nbsp
            <button class="btn btn-xs btn-danger" onclick="deleteit('.$datatables->id.')"><i class="glyphicon glyphicon-trash"></i> Delete</button>';
        })
        
        ->rawColumns(['action', 'banner_image','status','type'])->make(true);
    }
}
