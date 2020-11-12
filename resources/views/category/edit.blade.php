@extends('layouts.app')
@section('title', 'CreatePost')
@section('content')


	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				@if(session('success'))
			<div class="alert alert-success" role="alert">{{session('success')}}</div>
			@endif
				<div class="card">
					<div class="card-body">
						<form action="{{route('catupdate', $post->id)}}" method="POST">
							
						@csrf

						  <div class="form-group">
						    <label for="exampleInputEmail1">Category name</label>
						    <input type="text" class="form-control" name="category_name" value="{{$post->name}}">

						    @error('category_name')
						    	<small style="color:red;">{{$message}}</small>
						    @enderror
						  </div>
						  <button type="submit" class="btn btn-primary">update</button>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection