@extends('admin.layout.app')
@section('title','Listing')
@section('content')
<link href="{{ asset('theme/default/plugins/bootstrap-sweetalert/sweet-alert.css') }}" rel="stylesheet" type="text/css">
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">


            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Edit Sector Category</h4>
                        <div class="clearfix"><a href="{{ route('city.index') }}" class="pull-right btn btn-info btn-sm"><i class="fa fa-backward"></i> Back</a></div>
                    </div>
                </div>
            </div>
            <!-- end row -->
            <div class="row">
                <div class="col-xs-12">
                    <div class="card-box">
                        {{ Form::open(array('route' => array('listing.update', $row->id),'class' =>'form-horizontal','method' =>'PATCH','files'=>true)) }}
                        <div class="row">
                         <div class="form-group">
                             <div class="col-sm-6">
                                 <label for="">Sector Category Name</label>
                                 <input type="text" name="sector_name" class="form-control" required="" value="{{ old('sector_name',$row->sector_name) }}">
                                 <div class="text-danger">{{ $errors->first('sector_name') }}</div>
                             </div>
                         </div>
                     </div>
                     <div class="row">
                         <div class="form-group">
                             <div class="col-sm-6">
                                 <label for="">Image</label>
                                 <input type="file" name="image" class="form-control" onchange="loadFile(event, 'listing')" accept="image/*">
                                 <div class="text-danger">{{ $errors->first('image') }}</div>
                             </div>
                             <div class="col-sm-6">
                                <img src="{{ asset($row->image) }}" alt="" class="img-thumbnail" id="listing" >
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
                    {!! Form::close() !!}
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
