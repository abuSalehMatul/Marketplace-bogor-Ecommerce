@extends('admin.layout.app')
@section('title','FAQ Crate')
@push('headerscript')
<link href="{{ asset('theme/plugins/summernote/summernote.css') }}" rel="stylesheet" />

@endpush
@section('content')
<div class="content-page">
	<!-- Start content -->
	<div class="content">
		<div class="container">


			<div class="row">
				<div class="col-xs-12">
					<div class="page-title-box">
						<h4 class="page-title">FAQ Crate</h4>
						<div class="clearfix"><a href="{{ route('sellerfaq.index') }}" class="pull-right btn btn-info btn-sm"><i class="fa fa-plus"></i>&nbsp;&nbsp;Back</a></div>
					</div>
				</div>
			</div>
			<!-- end row -->
			<div class="row">
				<div class="col-xs-12">
					<div class="card-box">
						<form action="{{ route('sellerfaq.store') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
							@csrf

							<div class="row form-group">
								<div class="col-sm-12">                 
									<h4 class="m-b-20 m-t-0 header-title"><b>Questions</b></h4>                  

									<textarea class="form-control summernote"  name="questions"></textarea>

									<div class="text-danger">{{ $errors->first('questions') }}</div>
								</div>
							</div>
							<div class="row form-group">                

								<div class="col-sm-12">
									<label for="">Answers</label>
									<textarea name="answers" id="" class="form-control  summernote"></textarea>
									<div class="text-danger">{{ $errors->first('answers') }}</div>                     
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
