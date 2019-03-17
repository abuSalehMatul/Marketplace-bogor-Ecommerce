<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\WebsiteEnquiry;
use Yajra\Datatables\Datatables;
use DB;
class WebsiteEnquiryController extends Controller
{
    
    public function index()
    {
        return view('admin.website-enquiry.index');
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
        //
    }

    public function getData(Request $request){
        DB::statement(DB::raw('set @rownum=0'));
        $query = WebsiteEnquiry::select([
           DB::raw('@rownum  := @rownum  + 1 AS rownum'),
           'id',
           'first',
           'lastname',
           'email',
           'phone',
       ]);
        return Datatables::of($query)
        ->addColumn('action', function ($datatables) {
            return '<button class="btn btn-xs btn-success" onclick="viewmessage('.$datatables->id.')"><i class="fa fa-expand"></i> View Message</button>&nbsp&nbsp
            <button class="btn btn-xs btn-danger" onclick="deleteit('.$datatables->id.')"><i class="glyphicon glyphicon-trash"></i> Delete</button>';
        })
        ->make(true);
    }
}
