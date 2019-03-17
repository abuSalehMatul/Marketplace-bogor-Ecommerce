@extends('admin.layout.app')
@section('title','Partner_add')
@section('content')
<div class="content-page">
  <!-- Start content -->
  <div class="content">
    <div class="container">
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

      <form action="{{url('admin/addpartner')}}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="form-group">
                <label for="exampleFormControlInput1">Name of the Partner</label>
                <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="ABC company" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">url of the Partner</label>
                <input type="text" name="url" class="form-control" id="exampleFormControlInput1" placeholder="https://salehmatul.com" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlFile1">Thumnile Image of The Partner</label>
                <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1" required>
            </div>
          
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Description</label>
                <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="6" required></textarea>
            </div>
            <div class="form-group">
                <input type="submit" class="form-control btn btn-info" value="Add the partner">
            </div>
        </form>
    </div>
  </div>
</div>
@endsection