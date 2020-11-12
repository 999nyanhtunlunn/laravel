@extends('layouts.app')
@section('title', 'Category Create')
@section('content')

	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="jumbotron">
					<div class="card">
						<div class="card-body">
							<form action="{{route('catstore')}}" method="POST">
							@csrf

							 <div class="form-group">
						    <label for="exampleInputEmail1">Category name</label>
						    <input type="text" class="form-control" name="category_name" value="{{old('category_name')}}">

						    @error('category_name')
						    	<small style="color:red;">{{$message}}</small>
						    @enderror
						    <br>	

						    <button type="submit" class="btn btn-primary">submit</button>
						  </div>

						  	</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		{{-- show --}}
				<div class="row justify-content-center" style="margin-top: 100px;">
					<div class="col-md-8">
			<table class="table table-hover">
			<thead>

					<tr>
						<th>No</th><th>Name</th><th>Created Date</th><th>Action</th>
					</tr>

			</thead>

			<tbody>
				@foreach($categories as $key=>$category)

					<tr>
					<td>{{++$key}}</td>
					<td>{{$category->name}}</td>
					<td>{{\Carbon\Carbon::parse($category->created_at)->format('d-M-Y')}}</td>

					<td>

					<a href="{{route('catedit', $category->id)}}">Edit</a>
					<a href="{{route('catdelete', $category->id)}}">Delete</a>

					</td>
					</tr>
				@endforeach

			</tbody>
	</table>
		</div>
	</div>
	{{-- end show --}}
	</div>

@endsection