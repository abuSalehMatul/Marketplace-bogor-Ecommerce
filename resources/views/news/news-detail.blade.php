@extends('layout.app')
@section('title',"$row->title - Business News")
@push('headerscript')

@endpush
@section('content')
<div class="wide-post-image"> <img src="{{ asset($row->featured_image) }}" alt="" class="img-responsive" style="width: 100%;height: 400px"> </div>
    <div class="container blog-header">
        <div class="row blog-head">
            <div class="col-md-12 title">
                <h1>{{ $row->title }}</h1>
                <div class="post-meta"> <span class="date-meta">ON <a href="#">{{ date('d F, Y',strtotime($row->created_at)) }}</a> /</span> <span class="admin-meta">BY <a href="#">Admin</a> </span> </div>
            </div>
        </div>
    </div>

<div class="section-space80">
    <!-- Feature Blog Start -->
    <div class="container ">
        <div class="row">
            <div class="col-sm-9 content-left">
                <div class="row">
                    {!! $row->full_description !!}   
                </div>
            </div>
            <div class="col-md-3">
                <div class="filter-sidebar">
                    @include('layout.sidebanner')
                </div>
            </div>
        </div>
        @include('layout.bottomad')
    </div>
</div>
<!-- Go to www.addthis.com/dashboard to customize your tools --> <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5c3ca221186af4ba"></script>
@endsection

@push('footerscript')
<script src="{{ asset('custom/wizard.js') }}"></script>
@endpush