@push('headerscript')
@section('title','Sector Wise')
<link href="{{ asset('theme/plugins/summernote/summernote.css') }}" rel="stylesheet" />
@endpush
@extends('admin.layout.app')
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
            <div class="clearfix"><a href="{{ route('countrywise.index') }}" class="pull-right btn btn-info btn-sm"><i class="fa fa-backward"></i> Back</a></div>
          </div>
        </div>
      </div>
      <!-- end row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="card-box">
            {{ Form::open(array('route' => array('sectorwise.update', $row->id),'class' =>'form-horizontal','method' =>'PATCH','files'=>true)) }}

            <div class="row">
              <div class="form-group">
                <div class="col-sm-6">
                  <label for="">Name</label>
                  {!! Form::select('sector_name',[''=>'-Select Sector-']+ CommonClass::SectorList(), old('sector_name',$row->sector_id), ['class'=>'form-control','required']) !!}
                  <div class="text-danger">{{ $errors->first('country_name') }}</div>
                </div>
                <div class="col-sm-4">
                  <label for="">Featured Image</label>
                  <input type="file" name="featured_image" class="form-control" onchange="loadFile(event, 'listing')" accept="image/*">
                  <div class="text-danger">{{ $errors->first('featured_image') }}</div>
                </div>
                <div class="col-sm-2">
                  <img src="{{ asset($row->featured_image) }}" alt="" class="" width="100" id="listing" >
                </div>
              </div>
            </div>
            <div class="row">
              <div class="form-group">
                <div class="col-sm-6">
                  <label for="">Title</label>
                  <input type="text" name="title" value="{{ $row->title }}" class="form-control" required="" placeholder="Enter Title...">
                  <div class="text-danger">{{ $errors->first('country_name') }}</div>
                </div>
                <div class="col-sm-4">
                 <label for="">Upload File</label>
                 <input type="file" name="file_upload" class="form-control" accept="">
                 <div class="text-danger">{{ $errors->first('file_upload') }}</div>
               </div>
               <div class="col-sm-2">
                 <label for="">Price</label>
                 <input type="number" name="price" value="{{ $row->price }}" class="form-control" placeholder="Enter Price..." required="">
                 <div class="text-danger">{{ $errors->first('price') }}</div>
               </div>
             </div>
           </div>
           <div class="row">
             <div class="form-group">
               <div class="col-sm-6">
                 <label for="">Upload File</label>
                 <input type="file" name="file_upload" class="form-control" accept="">
                 <div class="text-danger">{{ $errors->first('file_upload') }}</div>
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
              <tbody>
                @foreach ($result as $rows)
                <input type="hidden" name="update_id[]" value="{{ $rows->id}}">
                <tr>
                  <td><input type="text" name="feature_name[]" class="form-control" value="{{ $rows->feature_name }}" placeholder=""></td>
                  <td>
                    <a href="{{ url("admin/sectorwise/deletefeature/$rows->id") }}" class="btn btn-danger  btn-sm" onclick="return confirm('Are you sure want to delete it?')"><i class="fa fa-times"></i> Remove</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="row">
           <div class="form-group">
             <div class="col-sm-12">
               <label for="">Description</label>
               <textarea class="summernote" name="description" required="">{{ $row->description }}</textarea>
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
<script src="{{ asset('theme/plugins/summernote/summernote.min.js') }}"></script>
<script>

  $(document).ready(function(){
    var i = 1;
    $('#add_row').on('click',function(){
      var newrow=$("<tr>");
      var col="";
      col += '<td><input type="text" name="feature_name[]" value="" placeholder="Enter here..." class="form-control"></td>';
      col += '<td><button class="btn btn-danger  btn-sm" id="deletebutton"><i class="fa fa-times"></i> Remove</button><input type="hidden" name="update_id[]" value="new"></td>';
      newrow.append(col); i++;
      $("table.city").append(newrow);
    });

    $("table.city").on("click", "#deletebutton", function(event){
      $(this).closest("tr").remove();
    });

  });

</script>
<script>

  jQuery(document).ready(function(){

    $('.summernote').summernote({
        height: 350,                 // set editor height
        minHeight: null,             // set minimum height of editor
        maxHeight: null,             // set maximum height of editor
        focus: false                 // set focus to editable area after initializing summernote
      });

    $('.inline-editor').summernote({
      airMode: true
    });

  });
</script>
@endpush
