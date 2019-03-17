<?php

namespace App\Http\Controllers\seller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Seller;
use Auth;
use Yajra\Datatables\Datatables;
use DB;
class ProductController extends Controller
{

    public function index()
    {
        return view('seller.products.index');
    }

    
    public function create()
    {
        return view('seller.products.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'product_name' => 'required',
            'short_description' => 'required|max:500',
            'full_description' => 'required',
            'product_type' => 'required',
            'post_type' => 'required',
            // 'country_flag' => 'required|mimes:jpeg,bmp,png,svg',
        ]);
        $user=Auth::user();
        $category_id =$user->seller->business_sector;
        $data = new Product;
        $data->unique_code = str_random(10);
        $data->product_name = $request->product_name;
        $data->seller_id = $user->seller->id;
        $data->short_description = $request->short_description;
        $data->full_description = $request->full_description;
        $data->product_price = $request->product_price;
        $data->product_type = $request->product_type;
        $data->post_type = $request->post_type;
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
        if ($request->hasFile('product_image')) {
            $files = $request->file('product_image');
            foreach($files as $file){
                $picture = $file->getClientOriginalName();
                // $picture = $slug.$picture;
                $destinationPath = public_path("/uploads/products");
                $file->move($destinationPath, $picture);

                $productgall[]=new ProductImage([
                    'image'=>"uploads/products/$picture",
                ]);
            //$productgall->save();                
            }
        }
        $data->ProductStore()->saveMany($productgall);

        return redirect()->route('sell.index');
    }


    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $row = Product::find($id);
        $result=$row->ProductStore;
        return view('seller.products.edit',compact('row','result'));
    }

    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'product_name' => 'required',
            'short_description' => 'required|max:500',
            'full_description' => 'required',
            'product_type' => 'required',
            'post_type' => 'required',
        ]);

        $data = Product::find($id);
        $data->product_name = $request->product_name;
        $data->short_description = $request->short_description;
        $data->full_description = $request->full_description;
        $data->product_price = $request->product_price;
        $data->product_type = $request->product_type;
        $data->post_type = $request->post_type;
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
        return redirect()->route('sell.index');
    }

    public function destroy($id)
    {
        $row = Product::find($id);
        $row->delete();
    }

    public function getData(Request $request){
        $user=Auth::user()->Seller->id;
        DB::statement(DB::raw('set @rownum=0'));
        $query = Product::select([
         DB::raw('@rownum  := @rownum  + 1 AS rownum'),
         'id',
         'product_name',
         'featured_image',
         'product_price',
         'short_description'])->where('seller_id',$user);
        return Datatables::of($query)
        ->addColumn('featured_image', function ($datatables) {
         return '<img src="'. asset($datatables->featured_image).'" width="100">';
     })
        ->addColumn('action', function ($datatables) {
            return '<a href="'.route('sell.edit',$datatables->id).'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>&nbsp&nbsp
            <button class="btn btn-xs btn-danger" onclick="deleteit('.$datatables->id.')"><i class="glyphicon glyphicon-trash"></i> Delete</button>';
        })
        ->rawColumns(['action', 'featured_image'])->make(true);
    }
}
