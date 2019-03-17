@push('headerscript')
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<link rel="stylesheet" type="text/css" href="{{ asset('custom/style.css') }}">
@endpush

@extends('layout.app')
@section('content')

<div class="section-space80">
    <!-- Feature Blog Start -->
    <div class="container ">
        @if(Session::has('success_msg'))
        <p class="alert alert-info">{{ Session::get('success_msg') }}</p>
        @endif
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h2 class="text-center">Login Now</h2>
                <form action="{{ route('login') }}" method="post" >
                    @csrf
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="text" name="email" value="" placeholder="Email Id" class="form-control"> 
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="password" name="password" value="" placeholder="Password" class="form-control"> 
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form> 
            </div>
        </div>
    </div>
</div>

@endsection

@push('footerscript')
<script src="{{ asset('custom/wizard.js') }}"></script>
@endpush