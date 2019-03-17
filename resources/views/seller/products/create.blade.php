@extends('layout.app')
@section('title','Add New Product')
@push('headerscript')
<link rel="stylesheet" type="text/css" href="{{ asset('webtheme/css/sidebar.css') }}">
<link href="{{ asset('theme/plugins/summernote/summernote.css') }}" rel="stylesheet" />

@endpush
@section('content')
@php 
$user=Auth::user();
$seller=$user->seller;
@endphp
<div class="tp-dashboard-head">
  <!-- page header -->
  <div class="container">
    <div class="row">
      <div class="col-md-12 profile-header">
        <div class="profile-pic col-md-2"><img src="images/profile-dashbaord.png" alt=""></div>
        <div class="profile-info col-md-9">
          <h1 class="profile-title">{{ $seller->first_name }}<small>Welcome Back memeber</small></h1>
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
        <div class="row well-box">
          <div class="col-xs-12 ">
            <div class="page-title-box">
              <h4 class="page-title pull-left">Products</h4>
              <div class="clearfix"><a href="{{ route('sell.index') }}" class="pull-right btn btn-info btn-sm"><i class="fa fa-backward"></i> Back</a></div>
            </div>
          </div>
          <div class="col-xs-12 section-space20">
            <form action="{{ route('sell.store') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
              @csrf
              <div class="row">
               <div class="form-group">
                 <div class="col-sm-8">
                   <label for="">Product Name</label>
                   <input type="text" name="product_name" class="form-control" required="" value="{{ old('product_name') }}">
                   <div class="text-danger">{{ $errors->first('product_name') }}</div>
                 </div>
                 <div class="col-sm-4">
                   <label for="">Price</label>
                   <input type="text" name="product_price" class="form-control" value="{{ old('product_name') }}">
                   <div class="text-danger">{{ $errors->first('product_name') }}</div>
                 </div>
               </div>
             </div>
             <div class="row">
              <div class="form-group">
                <div class="col-sm-12">
                  <label for="">Short Description</label>
                  <textarea name="short_description" class="form-control">{{ old('short_description') }}</textarea>
                  <div class="text-danger">{{ $errors->first('short_description') }}</div>
                </div>
              </div>
            </div>
            <div class="row">
             <div class="form-group">
               <div class="col-sm-12">
                 <label for="">Full Description</label>
                 <textarea class="summernote" name="full_description" required="">
                  {{ old('full_description') }}</textarea>
                 <div class="text-danger">{{ $errors->first('full_description') }}</div>
               </div>
             </div>
           </div>

            <div class="row">
              <div class="form-group">
                <div class="col-md-2">
                  <label>Product Type:</label>
                </div>
                <div class="col-md-4">
                  <label class="radio-inline"><input type="radio" value="1" name="product_type" checked>New</label>
                  <label class="radio-inline"><input type="radio" value="2" name="product_type">Used</label>
                </div>
                <div class="col-md-2">
                  <label>Product You want to:</label>
                </div>
                <div class="col-md-4">
                  <label class="radio-inline"><input type="radio" value="1" name="post_type" checked>Buy</label>
                  <label class="radio-inline"><input type="radio" value="2" name="post_type">Sell</label>
                </div>
              </div>
            </div>
           <div class="row">
             <div class="form-group">
               <div class="col-sm-12">
                 <label for="">Featured Image</label>
                 <input type="file" name="featured_image" class="form-control" required="" accept="image/*" required="">
                 <div class="text-danger">{{ $errors->first('featured_image') }}</div>
               </div>
             </div>
           </div>
           <div class="row">
             <table class="table table-hover mul">
              <thead>
                <tr>
                  <th>Product Images</th>
                  <th><button type="button" class="btn btn-success btn-sm" id="add_row"><i class="fa fa-plus"></i> Add More</button></th>
                </tr>
              </thead>
              <tbody >
                <tr>
                  <td>
                    <input type="file" name="product_image[]" class="form-control" required="" accept="image/*" required="">
                    <div class="text-danger">{{ $errors->first('product_image') }}</div>
                  </td>
                  <td>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="row">
            <div class="form-group">
              <div class="col-md-12">
                <button class="btn btn-primary btn-sm pull-right" type="submit">Save</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
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
<script>
  
  $(document).ready(function(){
    var i = 1;
    $('#add_row').on('click',function(){
      var newrow=$("<tr>");
      var col="";
      col += '<td><input type="file" name="product_image[]" class="form-control" required="" accept="image/*" required=""></td>';
      col += '<td><button class="btn btn-danger" id="deletebutton"><i class="fa fa-times"></i></button></td>';
      newrow.append(col); i++;
      $("table.mul").append(newrow);
    });

    $("table.mul").on("click", "#deletebutton", function(event){
      $(this).closest("tr").remove();
    });

  });

</script>

@endpush