@extends('admin.layout.app')
@section('title','Sub Category')
@section('content')

<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">


            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Edit Sub Category</h4>
                        <div class="clearfix"><a href="{{ route('subcategory.create') }}" class="pull-right btn btn-info btn-sm"><i class="fa fa-plus"></i> Add New</a></div>
                    </div>
                </div>
            </div>
            <!-- end row -->
            <div class="row">
                <div class="col-xs-12">
                    <div class="card-box">
                        {{ Form::open(array('route' => array('subcategory.update', $row->id),'class' =>'form-horizontal','method' =>'PATCH')) }}
                        <div class="row">
                            <div class="form-group">

                                <div class="col-md-6">
                                    <label>Category Name</label>
                                    {!! Form::select('category_name',[''=>'-Select Category-']+ CommonClass::CategoryList(), old('category_name',$row->category_id), ['class'=>'form-control','required']) !!}
                                </div>
                                <div class="col-md-6">
                                    <label>Sub Category Name</label>
                                    <input type="text" name="sub_cat_name" value="{{ $row->sub_cat_name }}" placeholder="Enter here..." class="form-control">
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
