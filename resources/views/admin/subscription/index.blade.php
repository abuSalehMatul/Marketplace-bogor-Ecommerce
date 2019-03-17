@extends('admin.layout.app')
@section('title','Seller List')
@section('content')
<div class="content-page">
  <!-- Start content -->
  <div class="content">
    <div class="container">
        @php
            $subscriber=App\Models\Subscriber::all();
        @endphp
        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">Email</th>
                <th scope="col">Website User</th>
                <th scope="col">Email verified</th>
                <th scope="col">Date/Time of Subscription</th>
                </tr>
            </thead>
            <tbody>
                @foreach($subscriber as $subscriber)
                <tr>
                <th scope="row">{{$subscriber->email}}</th>

                @php
                    $website_user=App\User::where('email',$subscriber->email)->count();
                @endphp
               
                     @if($website_user > 0)
                       <td><i class="fas fa-check-circle"></i></td>
                     @else 
                     <td> <i class="fas fa-times"></i></td>
                     @endif
                 
                @php
                   $str= $subscriber->verified_at;
                   if(strlen($str)>30){
                       $a=0;
                   }else{
                       $a=1;
                   }
                @endphp
               
                    @if($a==0)
                       <td> <i class="fas fa-times"></i></td>
                    @else 
                       <td> <i class="fas fa-check-circle"></i></td>
                    @endif
                 
                
                <td>{{$subscriber->created_at}}</td>
                </tr>
               @endforeach
            </tbody>
        </table>
    </div>
  </div>
</div>
@endsection