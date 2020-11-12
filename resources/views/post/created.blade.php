@extends('layouts.app')
@section('title', 'Create Posts')
@section('content')

<div class="container">{{-- start container --}}

	<div class="row justify-content-center">{{-- start row --}}

		<div class="col-md-8">{{-- start col-md-8 --}}

			<div class="jumbotron">{{-- start jumbotron --}}

			<div class="card">{{-- start card --}}
				<div class="card-body">{{-- start card-body --}}

	{{-- start form --}}<form action="{{route('poststore')}}" method="POST" enctype="multipart/form-data">

		{{-- This is Token --}}@csrf

							<div class="form-group">{{-- start form-group --}}
								<label>Post title</label>
								<input type="text" name="title" class="form-control" value="{{old('title')}}">
								@error('title')
								<div style="color:red;">{{ $message }}</div>
								@enderror
							</div>{{-- end form-group --}}

							<div class="form-group">{{-- start form-group --}}
						    	<label for="exampleInputEmail1">Category</label>
						   		<select class="form-control" name="category">
						    	@foreach($categories as $category)

						    	<option value="{{$category->id}}"
						    	{{($category->id==old('category'))?'selected':null}}>{{$category->name}}</option>

								@endforeach
						   		</select>
						  		@error('category')
						    	<small style="color:red;">{{$message}}</small>
						   		@enderror
							</div>{{-- end form-group --}}

							<div class="form-group">{{-- start form-group --}}
								<label>Description</label>
								<textarea class="form-control" name="description" rows="10">{{old('description')}}</textarea>
								@error('description')
								<div style="color:red;">{{ $message }}</div>	
								@enderror

								<input type="file" name="image[]" class="form-control" style="margin-top: 20px;"  multiple>
								@error('image')
								<div style="color:red;">{{ $message }}</div>
								@enderror

							</div>{{-- end form-group --}}

		{{-- This is button --}}<button type="submit" class="btn btn-primary">Post</button>

	{{-- end form --}}</form>

				</div>{{-- end card-body --}}

			</div>{{-- end card --}}

			</div>{{-- end jumbotron --}}


		</div>{{-- end col-md-8 --}}

	</div>{{-- end row --}}

</div>{{-- end container --}}


@endsection