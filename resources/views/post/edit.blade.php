@extends('layouts.app')
@section('title', 'Create Posts')
@section('content')

<div class="container">{{-- start container --}}

	<div class="row justify-content-center">{{-- start row --}}

		<div class="col-md-8">{{-- start col-md-8 --}}

			@if(session('success'))
			<div class="alert alert-success" role="alert">{{session('success')}}</div>
			@endif

			<div class="jumbotron">{{-- start jumbotron --}}

			<div class="card">{{-- start card --}}
				<div class="card-body">{{-- start card-body --}}

	{{-- start form --}}<form action="{{route('postupdate', $post->id)}}" method="POST">

		{{-- This is Token --}}@csrf

							<div class="form-group">{{-- start form-group --}}
								<label>Post title</label>
								<input type="text" name="title" class="form-control" value="{{$post->title}}">
								@error('title')
								<div style="color:red;">{{ $message }}</div>
								@enderror
							</div>{{-- end form-group --}}

							<div class="form-group">{{-- start form-group --}}
						    	<label for="exampleInputEmail1">Category</label>
						   		<select class="form-control" name="category">
						    	@foreach($categories as $category)

						    	<option value="{{$category->id}}"{{($category->id==$post->category->id)?'selected':null}}>{{$category->name}}</option>

								@endforeach
						   		</select>
						  		@error('category')
						    	<small style="color:red;">{{$message}}</small>
						   		@enderror
							</div>{{-- end form-group --}}

							<div class="form-group">{{-- start form-group --}}
								<label>Description</label>
								<textarea class="form-control" name="description" rows="10">{{$post->description}}</textarea>
								@error('description')
								<div style="color:red;">{{ $message }}</div>	
								@enderror
{{-- 
								<input type="file" name="image" class="form-control" style="margin-top: 20px;">
								@error('image')
								<div style="color:red;">{{ $message }}</div>
								@enderror --}}

							</div>{{-- end form-group --}}

		{{-- This is button --}}<button type="submit" class="btn btn-primary">update</button>

	{{-- end form --}}</form>

				</div>{{-- end card-body --}}

			</div>{{-- end card --}}

			</div>{{-- end jumbotron --}}


		</div>{{-- end col-md-8 --}}

	</div>{{-- end row --}}

</div>{{-- end container --}}


@endsection


