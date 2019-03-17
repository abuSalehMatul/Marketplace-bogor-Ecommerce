@extends('admin.layout.app')
@section('title','Community')
@section('content')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">


            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Add City</h4>
                        <div class="clearfix"><a href="{{ route('city.index') }}" class="pull-right btn btn-info btn-sm"><i class="fa fa-backward"></i> Back</a></div>
                    </div>
                </div>
            </div>
            <!-- end row -->
            <div class="row">
                <div class="col-xs-12">
                    <div class="card-box">
                        <form action="{{ route('city.store') }}" method="post" class="form-horizontal">
                            @csrf
                            <table class="table table-striped city">
                                <thead>
                                    <tr>
                                        <th>Country Name</th>
                                        <th>City Name</th>
                                        <th><button type="button" class="btn btn-success btn-sm" id="add_row"><i class="fa fa-plus"></i> Add More</button></th>
                                    </tr>
                                </thead>
                                <tbody >
                                    <tr>
                                        <td>
                                         {!! Form::select('country_name[]',[''=>'-Select Country-']+ CommonClass::CountryList(), old('country_name'), ['class'=>'form-control','required']) !!}
                                        </td>
                                        <td>
                                            <input type="text" name="city_name[]" value="" placeholder="Enter here..." class="form-control">
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
        col += '<td> {!! Form::select('country_name[]',[''=>'-Select Country-']+ CommonClass::CountryList(), old('country_name'), ['class'=>'form-control','required']) !!} </td>';
        col += '<td><input type="text" name="city_name[]" value="" placeholder="Enter here..." class="form-control"></td>';
        col += '<td><button class="btn btn-danger  btn-sm" id="deletebutton"><i class="fa fa-times"></i> Remove</button></td>';
        newrow.append(col); i++;
        $("table.city").append(newrow);
    });

      $("table.city").on("click", "#deletebutton", function(event){
        $(this).closest("tr").remove();
    });

  });

</script>
@endpush