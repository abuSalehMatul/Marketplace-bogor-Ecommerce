@extends('admin.layout.app')
@section('title','Featured Product')
@section('content')
<div class="content-page">
    <div class="content">
        <div class="container">
           <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">Package</th>
                    <th scope="col">Product Unique Code</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Price</th>
                    <th scope="col" style="">Short Description</th>
                    <th scope="col">Post Type <button class="btn-info" style="float:left">Buy</button> <button class="btn-danger" style="float:right">Sell</button></th>
                    <th scope="col">Product Type <button class="btn-info" style="float:left">New</button> <button class="btn-danger" style="float:right">Old</button></th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $product=App\Models\Product::all();
                        $plan_purchase_all=App\Models\SellerPurchasePlan::all();
                         $color=['#cdf2cd','#a4a9ad','#e2ceed','#fff5a0','#ccfffd','#20c1fc','#007ff7','#f79c00','#eff700','#00f7e2'];
                        $planIds=array();
                        foreach($plan_purchase_all as $plan_purchase_all){
                            array_push($planIds,$plan_purchase_all->plan_id);
                        }
                        sort($planIds);
                        print_r($planIds);

                    @endphp
                    @foreach($product as $product)
                    @php
                        $seller=$product->seller_id;
                        $plan_purchase=App\Models\SellerPurchasePlan::where('seller_id',$seller)->first();
                       
                    @endphp
                    @if($plan_purchase)
                    @php
                        $color_value=$plan_purchase->plan_id % 10;
                       
                        $plan=App\Models\SellerPlan::find($plan_purchase->id);
                    @endphp
                    <tr style="background:<?php echo $color[$color_value] ?>;color:black">

                        @if($plan)
                        <th scope="row"><button>{{$plan->plan_name}}</button></th>
                        <th scope="row">{{$product->unique_code}}</th>
                        <td>{{$product->product_name}}</td>
                        <td>{{$product->product_price}}</td>
                        <td colspan="1" style=""><h6>{{$product->short_description}}</h6></td>
                        @if($product->post_type==1)
                        <td>Buy</td>
                        @else 
                        <td>Sell</td>
                        @endif
                        @if($product->product_type==1)
                        <td>New</td>
                        @else 
                        <td>Old</td>
                         @endif
                         @endif
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection