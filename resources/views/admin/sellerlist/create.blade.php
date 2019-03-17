@extends('admin.layout.app')
@section('title','Seller List')
@section('content')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">


            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Add Category</h4>
                        <div class="clearfix"><a href="{{ route('category.index') }}" class="pull-right btn btn-info btn-sm"><i class="fa fa-backward"></i> Back</a></div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-xs-12">
                    <div class="card-box">
                        <form action="{{ route('category.store') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                            <div class="col-sm-6">
                           <div class="row">
                               <div class="form-group">
                                   <div class="col-sm-6">
                                       <label for="">Category Name</label>
                                       <input type="text" name="category_name" class="form-control" required="" value="{{ old('category_name') }}">
                                       <div class="text-danger">{{ $errors->first('category_name') }}</div>
                                   </div>
                               </div>
                           </div>
                           <div class="row">
                               <div class="form-group">
                                   <div class="col-sm-6">
                                       <label for="">Thumb Image</label>
                                       <input type="file" name="thumb_img" class="form-control" required="" onchange="loadFile(event, 'logos')" accept="image/*">
                                       <div class="text-danger">{{ $errors->first('thumb_img') }}</div>
                                   </div>
                                   
                               </div>
                           </div>

                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <button class="btn btn-primary btn-sm" type="submit">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="col-sm-6">
                            <div class="col-sm-6">
                                    <img src="" alt="" id="logos" >
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

@push('footerscript')
<script>
var loadFile = function (event, imgid) {
        var output = document.getElementById(imgid);
        output.src = URL.createObjectURL(event.target.files[0]);
    };
</script>
@endpush