@extends('layout.app')
@push('headerscript')
<link rel="stylesheet" type="text/css" href="{{ asset('webtheme/css/sidebar.css') }}">
@endpush
@section('title','Enquiry')
@section('content')
@php 
$user=Auth::user();
$buyer=$user->buyer;
@endphp
<div class="tp-dashboard-head">
    <!-- page header -->
    <div class="container">
        <div class="row">
            <div class="col-md-12 profile-header">
                <div class="profile-pic col-md-2"><img src="images/profile-dashbaord.png" alt=""></div>
                <div class="profile-info col-md-9">
                    <h1 class="profile-title">{{ $buyer->first_name }}<small>Welcome Back memeber</small></h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.page header -->

<div class="main-container">
    <div class="container">
        <div class="row">
            @include('layout.sidebar')
            <div class="col-md-9">
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Manage Enquiry</h4>
                        <table class="table">
                            <thead>
                                <th>SN No</th>
                                <th>Name</th>
                                <th>Email ID</th>
                                <th>Phone No</th>
                                <th>Message</th>
                                <th>User Email</th>
                                <th>Date</th>
                            </thead>
                            <tbody>
                                @foreach($result as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->email_id }}</td>
                                    <td>{{ $row->phone }}</td>
                                    <td>{{ $row->message }}</td>
                                    <td>{{ $row->user->email }}</td>
                                    <td>{{ date('d M, Y', strtotime($row->created_at)) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('headerscript')

@endpush
