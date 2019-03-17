@extends('admin.layout.app')
@section('title','Edit Blog Category')
@section('content')

<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">


            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Edit Blog Category</h4>
                        <div class="clearfix"><a href="{{ route('blogs-category.create') }}" class="pull-right btn btn-info btn-sm"><i class="fa fa-plus"></i> Add New</a></div>
                    </div>
                </div>
            </div>
            <!-- end row -->
            <div class="row">
                <div class="col-xs-12">
                    <div class="card-box">
                        {{ Form::open(array('route' => array('blogs-category.update', $row->id),'class' =>'form-horizontal','method' =>'PATCH')) }}
                        <div class="row">
                            <div class="form-group">

                                <div class="col-md-6">
                                    <label>Category Name</label>
                                    <input type="text" name="category_name" value="{{ old('category_name',$row->category_name) }}" placeholder="Enter here..." class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <button class="pull-right btn btn-primary btn-sm" type="submit">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div> <!-- container -->

</div> <!-- content -->

</div>
@endsection
