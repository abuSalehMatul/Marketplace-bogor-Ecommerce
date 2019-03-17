@extends('admin.layout.app')
@section('title','Edit')
@push('headerscript')
<link href="{{ asset('theme/plugins/summernote/summernote.css') }}" rel="stylesheet" />
@foreach($row as $r)
@endforeach
@endpush
@section('content')
<div class="content-page">
	<!-- Start content -->
	<div class="content">
		<div class="container">


			<div class="row">
				<div class="col-xs-12">
					<div class="page-title-box">
						<h4 class="page-title">Edit</h4>
						<div class="clearfix"><a href="{{ route('buyerhelp.create') }}" class="pull-right btn btn-info btn-sm"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add New</a></div>
					</div>
				</div>
			</div>
			<!-- end row -->
			<div class="row">
				<div class="col-xs-12">
					<div class="card-box">
						<form action="{{ route('buyerhelp.update',$row->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
							@method('PUT')
							@csrf

							<div class="row form-group">
								<div class="col-sm-6">
									<label for="">Title</label>
									<input type="text" name="title" class="form-control" required="" value="{{ old('title',$row->title) }}">
									<div class="text-danger">{{ $errors->first('title') }}</div>             
								</div>
								<div class="col-sm-6">
									<label for="">Icon Class</label>
									<input type="text" name="icon_class" class="form-control" required="" value="{{ old('icon_class',$row->icon_class) }}">
									<div class="text-danger">{{ $errors->first('icon_class') }}</div>             
								</div>

							</div>

							
							<div class="row form-group">                

								<div class="col-sm-12">
									<label for="">Short Description</label>
									<textarea name="short_description" id="" class="form-control  summernote">{{ old('short_description',$row->short_description) }}</textarea>
									<div class="text-danger">{{ $errors->first('short_description') }}</div>                     
								</div> 
							</div>
							<div class="row form-group">
								<div class="col-sm-12">                 
									<h4 class="m-b-20 m-t-0 header-title"><b>Full Description</b></h4>                  

									<textarea class="form-control summernote"  name="full_description">{{ old('full_description',$row->full_description) }}</textarea>

									<div class="text-danger">{{ $errors->first('full_description') }}</div>
								</div>
							</div>
							<div class="row form-group">
								
								<div class="col-md-12">
									<button class="btn btn-primary " type="submit">Save</button>
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

	<script src="{{ asset('theme/plugins/summernote/summernote.min.js')}}"></script>
	<script>
		jQuery(document).ready(function(){

			$('.summernote').summernote({
                    height: 180,                 // set editor height
                    minHeight: null,             // set minimum height of editor
                    maxHeight: null,             // set maximum height of editor
                    focus: false                 // set focus to editable area after initializing summernote
                });

		});
	</script>
	@endpush
