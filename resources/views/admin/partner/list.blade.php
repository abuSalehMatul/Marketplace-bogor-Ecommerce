@extends('admin.layout.app')
@section('title','Partner_list')
@section('content')
<div class="content-page">
  <!-- Start content -->
  <div class="content">
    <div class="container">
      @php
          $message=Session::get('message');
      @endphp
      @if($message)
      <h5 class="text-center text-success">{{$message}}</h5>
      @endif
        <table class="table">
          <tr>
            <td>Image</td>
            <td>Name</td>
            <td>URL</td>
            <td colspan="2">Description</td>
            <td></td>
            <td></td>
          </tr>
            @php
                $partner=App\Models\Partner::all();
            @endphp
           
            @foreach($partner as $partner)
            <tr>
            <td><img src="{{asset('uploads/partner/'.$partner->image)}}" width="50px" height="50px"></td>
            <td><h6>{{$partner->name}}</h6></td>
            <td><h6>{{$partner->url}}</h6></td>
            <td><h6>{{$partner->description}}</h6></td>
            <td><a href="{{url('admin/partner_delete/'.$partner->id)}}"><i class="btn btn-danger">Delete</i></a></td>
            <td><a href="{{url('admin/partner_edit/'.$partner->id)}}"><i class="glyphicon glyphicon-edit"></i></a></td>
            </tr>
            @endforeach
         
            
        </table>
    </div>
    @php
        Session::forget('message');
    @endphp
  </div>
</div>
@endsection