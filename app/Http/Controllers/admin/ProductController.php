<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use Yajra\Datatables\Datatables;
use DB;
use Auth;
class ProductController extends Controller
{
    public function index()
    {
        return view('admin.product.index');
    }

    
    public function create()
    {
        //
    }

    public function featured(){
        $user=Auth::user();
        if( $user->hasRole('admin')){
           
             return view('admin.product.featured');
        }
       
       
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
        $row = Product::find($id);
        $result=$row->ProductStore;
        return view('admin.product.edit',compact('row','result'));
    }

    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'product_name' => 'required',
            'short_description' => 'required|max:200',
            'full_description' => 'required|max:2000',
        ]);
        $data = Product::find($id);
        $data->product_name = $request->product_name;
        $data->status = $request->status;
        $data->short_description = $request->short_description;
        $data->full_description = $request->full_description;
        $data->product_price = $request->product_price;
        $data->product_slug = str_slug($request->product_name,'-');
        if($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $filename = $image->getClientOriginalName();
            $destinationPath = public_path('uploads/products/featured');
            $image->move($destinationPath, $filename);
            $data->featured_image="uploads/products/featured/".$filename;
        }
        $data->save();

        $picture = '';
        $productgall=[];
        if ($request->hasFile('new_image')) {
            $files = $request->file('new_image');
            foreach($files as $file){
                $picture = $file->getClientOriginalName();
                // $picture = $slug.$picture;
                $destinationPath = public_path('/uploads/products');
                $file->move($destinationPath, $picture);
                $gldata=new ProductImage;
                $gldata->image="uploads/products/".$picture;
                $gldata->products_id=$id;
                $gldata->save();

            }
        }
            //Update Gallary
        $gallupid=$request->pro_image_id;
        if ($request->hasFile('product_image')) {
            $files = $request->file('product_image');
            foreach ($files as $key => $file) {
                $updateid=$gallupid[$key];
                $picture = $file->getClientOriginalName();
                // $picture = $slug.$picture;
                $destinationPath = public_path('/uploads/products');
                $file->move($destinationPath, $picture);
                $updata=ProductImage::find($updateid);
                $updata->image="uploads/products/".$picture;
                $updata->save();
            }
        }

        return redirect()->route('product.index');
    }

   
    public function destroy($id)
    {
        //
    }

    public function getData(Request $request){
        DB::statement(DB::raw('set @rownum=0'));
        $query = Product::select([
         DB::raw('@rownum  := @rownum  + 1 AS rownum'),
         'id',
         'product_name',
         'featured_image',
         'product_price',
         'status',
         'short_description']);
        return Datatables::of($query)
        ->addColumn('featured_image', function ($datatables) {
         return '<img src="'. asset($datatables->featured_image).'" width="100">';
     })
        ->addColumn('action', function ($datatables) {
            return '<a href="'.route('product.edit',$datatables->id).'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>&nbsp&nbsp
            <button class="btn btn-xs btn-danger" onclick="deleteit('.$datatables->id.')"><i class="glyphicon glyphicon-trash"></i> Delete</button>';
        })
        ->addColumn('status', function ($datatables) {
            if($datatables->status=='0'){
            return '<button class="btn btn-xs btn-danger"> Pending</button>';
            }
            else{   
            return '<button class="btn btn-xs btn-success"> Approve</button>';
            }
        })
        ->rawColumns(['action', 'featured_image', 'status'])->make(true);
    }
}
