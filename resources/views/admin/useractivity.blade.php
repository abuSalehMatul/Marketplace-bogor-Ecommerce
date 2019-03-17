@extends('admin.layout.app')
@section('title','User Activity List')
@section('content')
<div class="content-page">
	<div class="content">
        @php
            $buyer_trafic=App\Models\BuyerTraffic::all()->sortByDesc('created_at');
        @endphp
        <div class="card">
        <h5 class="card-header text-center text-info">Buyer Activity</h5>
        </div>
        <div class="card-body"  style="height:400px;overflow-y:scroll">
           <table class="table table-striped" >
                <thead>
                    <tr>
                    <th scope="col">Name of the Buyer</th>
                    <th scope="col">Visited</th>
                    <th scope="col">Date/Time</th>
                   
                    </tr>
                </thead>
                <tbody>
                    @foreach($buyer_trafic as $buyer_trafic)
                    @php
                        $user_id=$buyer_trafic->buyer_id;
                        $user=App\User::find($user_id);
                    @endphp
                    @if($user)
                    <tr>
                    <th scope="row">{{$user->name}}</th>
                    <td>{{$buyer_trafic->page_name}}</td>
                    <td>{{$buyer_trafic->created_at}}</td>
                   
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
	<div class="content">
        @php
            $seller_trafic=App\Models\SellerTraffic::all()->sortByDesc('created_at');
        @endphp
        <div class="card">
        <h5 class="card-header text-center text-info">Seller Activity</h5>
        </div>
        <div class="card-body"  style="height:400px;overflow-y:scroll">
           <table class="table table-striped" >
                <thead>
                    <tr>
                    <th scope="col">Name of the Seller</th>
                    <th scope="col">Visited</th>
                    <th scope="col">Date/Time</th>
                   
                    </tr>
                </thead>
                <tbody>
                    @foreach($seller_trafic as $seller_trafic)
                    @php
                        $user_id=$seller_trafic->seller_id;
                        $user=App\User::find($user_id);
                    @endphp
                    @if($user)
                    <tr>
                    <th scope="row">{{$user->name}}</th>
                    <td>{{$seller_trafic->page_name}}</td>
                    <td>{{$seller_trafic->created_at}}</td>
                   
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
	


</div>
@endsection