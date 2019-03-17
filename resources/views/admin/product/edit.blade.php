@extends('admin.layout.app')
@section('title','Product')
@section('content')

<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Edit Product</h4>
                        <div class="clearfix"><a href="{{ route('sellerlist.index') }}" class="pull-right btn btn-info btn-sm"><i class="fa fa-backward"></i> Back</a></div>
                    </div>
                </div>
            </div>
            <!-- end row -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        {{ Form::open(array('route' => array('product.update', $row->id),'class' =>'form-horizontal','method' =>'PATCH','files'=>true)) }}

                        {{ Form::open(array('route' => array('sell.update', $row->id),'class' =>'form-horizontal','method' =>'PATCH','files' => true)) }}
                        <div class="row">
                            <div class="form-group">
                                <div class="col-sm-8">
                                    <label for="">Product Name</label>
                                    <input type="text" name="product_name" class="form-control" required="" value="{{ old('product_name',$row->product_name) }}">
                                    <div class="text-danger">{{ $errors->first('product_name') }}</div>
                                </div>
                                <div class="col-sm-4">
                                    <label for="">Price</label>
                                    <input type="text" name="product_price" class="form-control" value="{{ old('product_name',$row->product_price) }}">
                                    <div class="text-danger">{{ $errors->first('product_name') }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label for="">Short Description</label>
                                    <textarea name="short_description" maxlength="200" class="form-control">{{ old('short_description',$row->short_description) }}</textarea>
                                    <div class="text-danger">{{ $errors->first('short_description') }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label for="">Full Description</label>
                                    <textarea name="full_description" maxlength="2000" class="form-control">{{ old('full_description',$row->full_description) }}</textarea>
                                    <div class="text-danger">{{ $errors->first('full_description') }}</div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <div class="col-sm-8">
                                    <label for="">Featured Image</label>
                                    <input type="file" name="featured_image" onchange="loadFile(event, 'featured')" class="form-control" accept="image/*">
                                    <div class="text-danger">{{ $errors->first('featured_image') }}</div>
                                </div>
                                <div class="col-sm-4">
                                    <img width="100"  id="featured" src="{{ asset($row->featured_image) }}" alt="">
                                    <div class="text-danger">{{ $errors->first('featured_image') }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label for="">Product Images</label>
                        </div>
                        @foreach($result as $row)
                        <div class="row">
                            <div class="form-group">
                                <div class="col-sm-8">
                                    <input type="hidden" name="pro_image_id[]" value="{{ $row->id }}" placeholder="">
                                    <input type="file" name="product_image[]" class="form-control" onchange="loadFile(event, 'logos{{ $row->id }}')" accept="image/*">
                                    <div class="text-danger">{{ $errors->first('product_image') }}</div>
                                </div>
                                <div class="col-sm-4">
                                    <img width="100" src="{{ asset($row->image) }}" alt="" id="logos{{ $row->id }}">
                                    <div class="text-danger">{{ $errors->first('product_image') }}</div>
                                </div>

                            </div>
                        </div>
                        @endforeach
                        <div class="row">
                            <div class="col-md-12">
                                <button type="button" class="pull-right btn btn-success btn-sm" id="add_row"><i class="fa fa-plus"></i> Add More</button>
                            </div>
                        </div>
                        <div class="row section-space20">
                            <div class="col-md-12">
                                <table class="table table-hover mul ">
                                    <tbody >

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-sm-4">
                                    <label><h2><u>Change satus</u></h2></label><br>
                                    <label><input <?php echo ($row->status == 0) ? 'checked' : '' ?>  name="status" type="radio" value="0">Pending</label>
                                    <label><input <?php echo ($row->status == 1) ? 'checked' : '' ?>  name="status" type="radio" value="1">Approve</label>
                                </div>
                                <div class="col-md-12">
                                    <button class="btn btn-primary btn-sm pull-right" type="submit">Save</button>
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
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
    $('#add_row').on('click', function(){
    var newrow = $("<tr>");
    var col = "";
    col += '<td><input type="file" name="new_image[]" class="form-control" required="" accept="image/*" required=""></td>';
    col += '<td><button class="btn-sm btn btn-danger" id="deletebutton"><i class="fa fa-times"></i></button></td>';
    newrow.append(col); i++;
    $("table.mul").append(newrow);
    });
    $("table.mul").on("click", "#deletebutton", function(event){
    $(this).closest("tr").remove();
    });
    });</script>
<script>
    var loadFile = function (event, imgid) {
    var output = document.getElementById(imgid);
    output.src = URL.createObjectURL(event.target.files[0]);
    };
</script>
@endpush

