@extends('admin.layout.app')
@section('title','Create_Plan')
@section('content')
<div class="content-page">
  <div class="content">
      <form action="{{ route('sellerplan.store') }}" method="POST">
        @csrf
        <div class="form-group" style="border: 1px solid #c6c6c6;box-shadow: 1px 1px #d6cbcb;padding: 24px;">
            <label >Name of the Plan</label>
            <input type="text" class="form-control" name="plan_name" required> 
        </div>
        <div class="form-group" style="padding:10px">
            <label style="display:block;text-decoration:underline;">Price</label>
            <h6 style="display:inline">$ </h6> <input type="number"  name="plan_price" required> 
        </div>
        <div class="form-group" style="padding:10px">
            <label style="text-decoration:underline">Duration</label><br>
            {{-- <h6 style="display:inline">Year</h6><input type="number" name="plan_year" required> / --}}
            <h6 style="display:inline">Month</h6><input type="number" name="plan_month" required> 
        </div>

        <div class="form-group" style="padding:10px">
            <label> Description</label>
             <textarea name="description" style="width: 100%;">
                Description of the Plan...
            </textarea>
        </div>
        <input type="submit" class="btn btn-success" value="Create a new plan" style="padding: 10px;margin-left: auto;display: block;">
      </form>
     
  </div>
</div>
<script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script> <script type="text/javascript">
//<![CDATA[
        bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
  //]]>
  </script>>
@endsection

