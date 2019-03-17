@push('headerscript')
@section('title','News')
<link href="{{ asset('theme/plugins/summernote/summernote.css') }}" rel="stylesheet" />
@endpush
@extends('admin.layout.app')
@section('content')
<div class="content-page">
  <!-- Start content -->
  <div class="content">
    <div class="container">


      <div class="row">
        <div class="col-xs-12">
          <div class="page-title-box">
            <h4 class="page-title">Add News</h4>
            <div class="clearfix"><a href="{{ route('news.index') }}" class="pull-right btn btn-info btn-sm"><i class="fa fa-backward"></i> Back</a></div>
          </div>
        </div>
      </div>
      <!-- end row -->

      <div class="row">
        <div class="col-xs-12">
          <div class="card-box">
            <form action="{{ route('news.store') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
              @csrf
              <div class="row">
               <div class="form-group">
                 <div class="col-sm-4">
                   <label for="">Category</label>
                   {!! Form::select('category_name',[''=>'-Select Category-']+ CommonClass::NewsCategoryList(), old('category_name'), ['class'=>'form-control','required']) !!}
                   <div class="text-danger">{{ $errors->first('category_name') }}</div>
                 </div>
                 <div class="col-sm-8">
                   <label for="">Title</label>
                   <input type="text" name="title" class="form-control" required="" value="{{ old('title') }}">
                   <div class="text-danger">{{ $errors->first('title') }}</div>
                 </div>
              </div>
            </div>
            <div class="row">
             <div class="form-group">
               <div class="col-sm-12">
                <label for="">Short Description</label>
                <textarea class="form-control" maxlength="500" name="short_description" required="">{{ old('short_description') }}</textarea>
                <div class="text-danger">{{ $errors->first('short_description') }}</div>
              </div>
            </div>
          </div>
          <div class="row">
           <div class="form-group">
             <div class="col-sm-12">
              <label for="">Full Description</label>
              <textarea class="summernote" maxlength="2000" name="full_description" required="">{{ old('full_description') }}</textarea>
              <div class="text-danger">{{ $errors->first('full_description') }}</div>
            </div>
          </div>
        </div>

        <div class="row">
           <div class="form-group">
             <div class="col-sm-6">
              <label for="">Featured Image</label>
                  <input type="file" name="featured_image" class="form-control" required="" onchange="loadFile(event, 'logos')" accept="image/*">
                  <span class="text-danger">{{ $errors->first('featured_image') }}</span>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12">
                <img src="" alt="" class="img-thumbnail img-responsive" id="logos" >
              </div>
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
<script src="{{ asset('theme/plugins/summernote/summernote.min.js') }}"></script>
<script>

  jQuery(document).ready(function(){

    $('.summernote').summernote({
        height: 350,                 // set editor height
        minHeight: null,             // set minimum height of editor
        maxHeight: null,             // set maximum height of editor
        focus: false                 // set focus to editable area after initializing summernote
      });
  });
</script>
@endpush