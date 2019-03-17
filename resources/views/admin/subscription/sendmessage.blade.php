@extends('admin.layout.app')
@section('title','Seller List')
@section('content')
<div class="content-page">
  <div class="content">
    <div class="container">
       <form action="{{url('admin/subscribersendmessage')}}" method="POST">
        @csrf
           <div class="form-group">
                <label for="message">Message</label>
                {{-- <input type="email" class="form-control" id="email"> --}}
                <textarea  class="form-control" id="message" name="message" required>

                </textarea>
                <input type="submit"  class="form-control btn btn-success" value="Send Message">
            </div>
       </form>
    </div>
  </div>
</div>