@extends('layout.app')
@section('title','Buyer FAQ')
@push('headerscript')
<style>
.nav-tabs a{
    color#000 !important;
}
</style>
@endpush
@section('content')
<div class="tp-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li>Buyer FAQ's</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="main-container">
    <div class="container">
        <div class="row">
            <div class="row">
             <div class="col-md-3 side-nav" id="leftCol">
                <div class="hide-side">
                    <ul class="listnone nav" id="sidebar">
                         <li class="active"><a href="{{ url('faq-for-buyer') }}">FAQ</a></li>
                        <li ><a href="{{ url('help-for-buyer') }}">Help</a></li>                       
                        <li><a href="{{ url('buyersafety') }}">Safety</a>
                        </ul>
                    </div>
                </div>
            <div class="col-sm-9">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    @foreach($row as $r)
                       <div class="panel panel-default">
                            <div class="panel-heading active" role="tab" id="heading1">
                                <h4 class="panel-title"> <a role="button" data-toggle="collapse" data-parent="#accordion" href="#{{$r->id}}" aria-expanded="false" aria-controls="collapse1" class="collapsed"><i class="fa sign fa-angle-double-up"></i> {{$r->questions}}</a> </h4>
                            </div>
                            <div id="{{$r->id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading1" aria-expanded="false" style="height: 0px;">
                                <div class="panel-body">
                                    <p> {{$r->answers}}</p>
                                     
                                </div>
                            </div>
                        </div>
                     @endforeach
                 </div>
            </div>
        </div>
    </div>
</div><br>
@endsection