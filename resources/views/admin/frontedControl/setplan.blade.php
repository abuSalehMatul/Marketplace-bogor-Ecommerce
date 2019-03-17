@extends('admin.layout.app')
@section('title','Fronted_Control')
@section('content')
<div class="content-page">
  <div class="content">
    <div class="container">
        @php
            $all_plan=DB::table('seller_plans')->get();
           // print_r($all_plan);
           $message=Session::get('message');
        @endphp
        <h4 class="text-center text-danger">{{$message}}</h4>
        @foreach($all_plan as $plan)
        
        @php
          $plan_priority=DB::table('seller_plan_priorities')->where('seller_plan_id',$plan->id)->first(); 
           Session::forget('message');
        @endphp
        <form action="{{url('admin/priority_save_to_db/'.$plan->id)}}" method="post"> 
            @csrf   
            <div class="card">
                <div class="card-header">
                    <h2>{{$plan->plan_name}}</h2>
                </div>
                <div class="card-body">
                    <div>
                        <label>Priority</label>
                        <input type="number" name="priority" placeholder="Priority" class="" style="display:inline" required>
                        @if($plan_priority)
                        <h6 style="display:inline">{{$plan_priority->priority}}</h6>
                        @endif
                    </div>
                    <div>
                        <label>Size</label>
                        <input type="number" name="array_size" placeholder="ex:4" class="" style="display:inline" required>
                        @if($plan_priority)
                        <h6 style="display:inline">{{$plan_priority->array_size}}</h6>
                        @endif
                    </div>
                    
                
                
                </div>
                
                 <input type="submit" class="btn btn-success float-right" style=""  >
            </div>
        </form>
        @endforeach
       
       
    </div>
  </div>
  <script>
  function save_to_db(id){
      console.log(id);
      $.ajax({
              type:'get',
              url:'{{URL::to('admin/priority_save_to_db')}}',
              data:{'id':id},
              success:function(data){
                 console.log('success');
                // console.log(data);
                 location.reload();
                
                
              }
          })
  }
  </script>
</div>

@endsection