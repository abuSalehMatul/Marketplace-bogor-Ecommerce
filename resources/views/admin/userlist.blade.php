@extends('admin.layout.app')
@section('title','User List')
@section('content')
<div class="content-page">
	<div class="content">
		@php
			$user=App\User::all()->sortByDesc('created_at');
		@endphp
		<table class="table table-striped">
			<thead class="thead-dark">
				<tr>
					<th scope="col">User Name</th>
					<th scope="col">User Id</th>
					<th scope="col">Email</th>
					<th scope="col">Buyer</th>
					<th scope="col">Seller</th>
					<th scope="col">Registration Date/Time</th>
				</tr>
			</thead>
			<tbody>
			@foreach($user as $user )
			@php
				$seller=App\Models\Seller::where('user_id',$user->id)->count();
				$buyer=App\Models\Buyer::where('user_id',$user->id)->count();
			@endphp
			<tr>
				<td>{{$user->name}}</td>
				<td>{{$user->id}}</td>
				<td><h6>{{$user->email}}</h6></td>
				@if($buyer > 0)
				<td><h6><i class="fas fa-check-circle"></i></h6></td>
				@else
				<td><h6></h6></td>
				@endif
				@if($seller > 0)
				<td><h6><i class="fas fa-check-circle"></i></h6></td>
				@else 
				<td><h6></h6></td>
				@endif
				<td><h6>{{$user->created_at}}</h6></td>
			</tr>
			@endforeach
		 	<tbody>
	</table>
	</div>
	
</div>
@endsection