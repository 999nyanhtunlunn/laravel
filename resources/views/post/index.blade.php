@extends('layouts.app')
@section('title', 'Posts')
@section('content')

	<div class="container">{{-- start container --}}

				<div class="row justify-content-center">{{-- start row --}}

					<div class="col-md-8">{{-- start col-md-8 --}}

					@if(session('success'))
					<div class="alert alert-success" role="alert">{{session('success')}}</div>
					@endif

					</div>{{-- end col-md-8 --}}

				</div>	{{-- end row --}}

	<a href="{{route('postcreate')}}" class="btn btn-primary">Create Post</a>{{-- This is link --}}

	@foreach($posts as $post)
	<div class="row justify-content-center" style="margin-bottom: 20px;">{{-- start row --}}

		<div class="col-md-8">{{-- start col-md-8 --}}

			<div class="card">{{-- start card --}}

				<div class="card-body">{{-- start card-body --}}

{{--This is  $post->category->name--}}<span class="float-right">{{$post->category->name}}</span><br><br>

{{-- This is $post->title --}}			<h5 style="font-weight: bold;">{{$post->title}}</h5>
										<hr>

								

								@foreach($post->images as $image)
								<div class="image">
							<img src="{{asset('/storage/uploads/'.$image->image)}}" class="img-thumbnail" width="100%">
								</div>
								@endforeach
								

								<p>
	{{-- This is $post->description --}}{{str_limit($post ->description, $limit=150, $end="...")}}
						
								</p>
					
								<div class="dateinfo">
	{{-- This is $post->created_at --}}	<p><span style="font-weight: bold;">Date:</span> {{$post->created_at}}</p>
								</div>
					
					<button type="button" class="btn btn-warning">
						<a href="{{route('postshow', $post->id)}}">show</a>
					</button>&nbsp;&nbsp;

					<a href="{{route('postedit', $post->id)}}" class="btn btn-primary">Edit</a>&nbsp;&nbsp;

					<a href="{{route('postdelete',$post->id)}}" on click="return confirm('Are you sure to delete?')" class="btn btn-danger">Delete</a><br><br>

					<span style="font-weight: bold;">By {{$post->user->name}}</span>

				</div>{{-- end card-body --}}

			</div>{{-- end card --}}

		</div>{{-- end col-md-8 --}}

	</div>   {{-- end row --}}           
	@endforeach

</div>{{-- end container --}}


@endsection


