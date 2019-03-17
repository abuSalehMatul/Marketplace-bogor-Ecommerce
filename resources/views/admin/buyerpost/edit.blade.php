@extends('admin.layout.app')
@section('title','Buyer Post')
@section('content')

<div class="content-page">
  <!-- Start content -->
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <div class="page-title-box">
            <h4 class="page-title">Edit Product</h4>
            <div class="clearfix"><a href="{{ route('buyerpost.index') }}" class="pull-right btn btn-info btn-sm"><i class="fa fa-backward"></i> Back</a></div>
          </div>
        </div>
      </div>
      <!-- end row -->
      <div class="row">
        <div class="col-sm-12">
          <div class="card-box">
            {{ Form::open(array('route' => array('buyerpost.update', $row->id),'class' =>'form-horizontal','method' =>'PATCH','files' => true)) }}
            <div class="row">
             <div class="form-group">
               <div class="col-sm-12">
                <label for="">Title</label>
                <input type="text" name="title" class="form-control" required="" value="{{ old('title',$row->title) }}">
                <div class="text-danger">{{ $errors->first('title') }}</div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="form-group">
              <div class="col-sm-12">
                <label for="">Description</label>
                <textarea maxlength="2000" name="description" class="form-control">{{ old('description',$row->description) }}</textarea>
                <div class="text-danger">{{ $errors->first('description') }}</div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="form-group">
            <div class="col-md-12">
              <button class="btn btn-primary btn-sm pull-right" type="submit">Save</button>
            </div>
          </div>
        </div>
      </div>

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
      col += '<td><input type="file" name="new_image[]" class="form-control" required="" accept="image/*" required=""></td>';
      col += '<td><button class="btn-sm btn btn-danger" id="deletebutton"><i class="fa fa-times"></i></button></td>';
      newrow.append(col); i++;
      $("table.mul").append(newrow);
    });

    $("table.mul").on("click", "#deletebutton", function(event){
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
@endpush

