@extends('layout.app')
@section('title','Blogs')
@push('headerscript')
@endpush
@section('content')
<div class="tp-page-head">
    <!-- page header -->
    <div class="container">
        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <div class="page-header text-center">
                    <h1>Blogs</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section-space80">
    <!-- Feature Blog Start -->
    <div class="container ">
        <div class="row">
            <div class="col-sm-9 content-left">
                @foreach($news as $row)
                <div class="row">
                        <div class="col-md-12 post-holder">
                            <div class="well-box">
                                <div class="sticky-sign"><i class="fa fa-bookmark"></i></div>
                                <!-- blog holder -->
                                <div class="post-image">
                                    <a href="{{ asset("blog-detail/$row->slug/$row->unique_code") }}"><img src="{{ asset($row->featured_image) }}" class="img-responsive" alt=""></a>
                                </div>
                                <h1 class="post-title"><a href="{{ asset("blog-detail/$row->slug/$row->unique_code") }}">{{ $row->title }}</a></h1>
                                <div class="post-meta"> <span class="date-meta">ON <a href="#">{{ date('d F, Y',strtotime($row->created_at)) }}</a> /</span> <span class="admin-meta">BY Admin </span></div>
                                <p>{{ $row->short_description}}</p>
                                <a href="{{ asset("blog-detail/$row->slug/$row->unique_code") }}" class="btn btn-default">Read More</a> </div>
                        </div>
                        <!-- /.blog holder -->
                    </div>
                @endforeach
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

@endsection

@push('footerscript')
<script src="{{ asset('custom/wizard.js') }}"></script>
@endpush