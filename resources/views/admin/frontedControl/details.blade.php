@extends('admin.layout.app')
@section('title','Fronted_Control')
@section('content')
<div class="content-page">
  <div class="content">
    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">Plan Id</th>
                <th scope="col">Plan name</th>
                <th scope="col">Take Images</th>
                <th scope="col">Priority</th>
               
                </tr>
            </thead>
            @php
                $plan_priority=App\Seller_plan_priority::all();
            @endphp
            @if($plan_priority)
            <tbody>
                @foreach($plan_priority as $plan_priority)
                <tr>
                <th scope="row">{{$plan_priority->seller_plan_id}}</th>
                @php
                    $plan=App\Models\SellerPlan::find($plan_priority->seller_plan_id);
                @endphp
                <th scope="row">{{$plan->plan_name}}</th>
                <td>{{$plan_priority->array_size}}</td>
                <td>{{$plan_priority->priority}}</td>
               
                </tr>
               @endforeach
            </tbody>
            @endif
        </table>
        <a href="{{url('admin/set_new_plan_frontend')}}" class="btn btn-info">Set New Plan</a>
    </div>
  </div>
</div>
@endsection