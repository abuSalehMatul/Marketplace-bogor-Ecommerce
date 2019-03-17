@push('headerscript')
@section('title','Country Wise')
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
            <h4 class="page-title">Add Country Listing</h4>
            <div class="clearfix"><a href="{{ route('countrywise.index') }}" class="pull-right btn btn-info btn-sm"><i class="fa fa-backward"></i> Back</a></div>
          </div>
        </div>
      </div>
      <!-- end row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="card-box">
            <form action="{{ route('countrywise.store') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="form-group">
                  <div class="col-sm-6">
                    <label for="">Name</label>
                    {!! Form::select('country_name',[''=>'-Select Country-']+ CommonClass::CountryList(), old('country_name'), ['class'=>'form-control','required']) !!}
                    <div class="text-danger">{{ $errors->first('country_name') }}</div>
                  </div>
                  <div class="col-sm-4">
                    <label for="">Featured Image</label>
                    <input type="file" name="featured_image" class="form-control" required="" onchange="loadFile(event, 'listing')" accept="image/*">
                    <div class="text-danger">{{ $errors->first('featured_image') }}</div>
                  </div>
                  <div class="col-sm-2">
                    <img src="" alt="" class="" width="100" id="listing" >
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="form-group">
                  <div class="col-sm-6">
                    <label for="">Title</label>
                    <input type="text" name="title" value="" class="form-control" required="" placeholder="Enter Title...">
                    <div class="text-danger">{{ $errors->first('country_name') }}</div>
                  </div>
                  <div class="col-sm-4">
                   <label for="">Upload File</label>
                   <input type="file" name="file_upload" class="form-control" required="" accept="">
                   <div class="text-danger">{{ $errors->first('file_upload') }}</div>
                 </div>
                 <div class="col-sm-2">
                   <label for="">Price</label>
                   <input type="number" name="price" value="" class="form-control" placeholder="Enter Price..." required="">
                   <div class="text-danger">{{ $errors->first('price') }}</div>
                 </div>
               </div>
             </div>
             <div class="row">
              <table class="table table-striped city">
                <thead>
                  <tr>
                    <th>Feature Name</th>
                    <th><button type="button" class="btn btn-success btn-sm" id="add_row"><i class="fa fa-plus"></i> Add More</button></th>
                  </tr>
                </thead>
                <tbody >
                  <tr>
                    <td>
                      <input type="text" name="feature_name[]" value="" placeholder="Enter here..." class="form-control">
                    </td>
                    <td>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="row">
             <div class="form-group">
               <div class="col-sm-12">
                 <label for="">Description</label>
                 <textarea class="summernote" name="description" required="">
                 </textarea>
                 <div class="text-danger">{{ $errors->first('description') }}</div>
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

  $(document).ready(function(){
    var i = 1;
    $('#add_row').on('click',function(){
      var newrow=$("<tr>");
      var col="";
      col += '<td><input type="text" name="feature_name[]" value="" placeholder="Enter here..." class="form-control"></td>';
      col += '<td><button class="btn btn-danger  btn-sm" id="deletebutton"><i class="fa fa-times"></i> Remove</button></td>';
      newrow.append(col); i++;
      $("table.city").append(newrow);
    });

    $("table.city").on("click", "#deletebutton", function(event){
      $(this).closest("tr").remove();
    });

  });

</script>
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