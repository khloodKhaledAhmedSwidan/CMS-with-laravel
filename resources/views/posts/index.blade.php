@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-end mb-2">
	<a href="{{route('posts.create')}}" class="float-right btn btn-success ">Add Post</a>
</div>
<div class="card card-default">
	<div class="card-header">
		Posts
	</div>
	<div class="card-body">
		<table class="table">
			<thead>
				<th>Image</th>
				<th>Title</th>
				<th>Category</th>
				<th> </th>
		
			</thead>
			<tbody>

				@if($posts->count() <= 0)
			
<tr> <td align="center" colspan="4" class="bg-info center"><p> <h1>NO POSTS</h1> </p></td>	</tr>
			 @else
				@foreach($posts as $post)
				<tr>
				<td>
					<img src="{{asset($post->image)}}" width="120px" height="60px">
				</td>
				<td>{{$post->title}}</td>
				<td>
					<a href="{{route('categories.edit',$post->category->id)}}">
						
{{$post->category->name}}						
					</a>

				</td>
				<td >
					<a href="{{route('posts.edit',$post->id)}}" class="btn btn-info btn-sm">Edit</a>
                	{!!Form::open(['method'=>'DELETE','action'=>['PostsController@destroy',$post->id],'class'=>'pull-right col-sm-10'])!!}
<div class="form-group">
	{!!Form::submit('Delete ',['class'=>'btn btn-danger   btn-sm '])!!}
</div>
{!!Form::close()!!}


				</td>
               
				</tr>
				@endforeach
			
				

				@endif
			</tbody>
		</table>
	</div>
</div>
@stop