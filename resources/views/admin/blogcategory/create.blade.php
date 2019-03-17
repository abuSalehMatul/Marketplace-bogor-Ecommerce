@extends('admin.layout.app')
@section('title','Add Blog Category')
@section('content')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">


            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Add Blog Category</h4>
                        <div class="clearfix"><a href="{{ route('blogs-category.index') }}" class="pull-right btn btn-info btn-sm"><i class="fa fa-backward"></i> Back</a></div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-xs-12">
                    <div class="card-box">
                        <form action="{{ route('blogs-category.store') }}" method="post" class="form-horizontal" id="newrow">
                            @csrf
                            <table class="table table-striped subcategory">
                                <thead>
                                    <tr>
                                        <th>Category Name</th>
                                        <th><button type="button" class="btn btn-success btn-sm" id="add_row"><i class="fa fa-plus"></i> Add More</button></th>
                                    </tr>
                                </thead>
                                <tbody >
                                    <tr>
                                        <td>
                                            <input type="text" name="category_name[]" value="" placeholder="Enter here..." class="form-control" required="">
                                        </td>
                                        <td>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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

@push('footerscript')
<script>

    $(document).ready(function(){
      var i = 1;
      $('#add_row').on('click',function(){
        var newrow=$("<tr>");
        var col="";
        col += '<td><input type="text" name="category_name[]" value="{{ old('category_name') }}" placeholder="Enter here..." class="form-control" required=""></td>';
        col += '<td><button type="button" class="btn btn-danger btn-sm" id="deletebutton"><i class="fa fa-times"></i> Remove</button></td>';
        newrow.append(col); i++;
        $("table.subcategory").append(newrow);
    });

      $("table.subcategory").on("click", "#deletebutton", function(event){
        $(this).closest("tr").remove();
    });

  });

</script>
@endpush