<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use Yajra\Datatables\Datatables;
use DB;
class BottomBarController extends Controller
{
    public function index()
    {
        return view('admin.bottombar.index');
    }

   
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        //
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
         return redirect()->route('bottombar.index');
    }

    public function getData(Request $request){
        DB::statement(DB::raw('set @rownum=0'));
          $query = Banner::join('sellers','sellers.id','banners.seller_id')->where('type',2)->select([
           DB::raw('@rownum  := @rownum  + 1 AS rownum'),
           DB::raw('banners.id as id'),
            'banner_image',
            'status',
            'first_name',
            'type',
        ]);
          return Datatables::of($query)
          ->addColumn('banner_image', function ($datatables) {
               return '<img src="'. asset($datatables->banner_image).'" width="100">';
          })
          ->addColumn('status', function ($datatables) {
            if($datatables->status==0){
                return '<a href="'.url('admin/bottombar/changeStatus/'.$datatables->id.'/1').'" class="btn btn-success btn-xs" onclick="return statusChange('.$datatables->id.',1)">Not Approved</a>';
            }
            elseif ($datatables->status==1) {
                return '<a href="'.url('admin/bottombar/changeStatus/'.$datatables->id.'/0').'" class="btn btn-info btn-xs"  onclick="return statusChange('.$datatables->id.',2)">Approved</a>';
            }
            
        })
          ->addColumn('type', function ($datatables) {
            if($datatables->type==2){
                return 'Bottom Bar';
            }
        })
        ->addColumn('action', function ($datatables) {
            return '<a href="'.route('bottombar.edit',$datatables->id).'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>&nbsp&nbsp
            <button class="btn btn-xs btn-danger" onclick="deleteit('.$datatables->id.')"><i class="glyphicon glyphicon-trash"></i> Delete</button>';
        })
        ->rawColumns(['action', 'banner_image','status','type'])->make(true);
    }
}
