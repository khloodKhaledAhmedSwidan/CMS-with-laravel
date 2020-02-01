@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-end mb-2">
	<a href="{{route('tags.create')}}" class="float-right btn btn-success ">Add Tag</a>
</div>
<div class="card card-default">
	<div class="card-header">Tags</div>
	<div class="card-body">

			@if($errors->any())
	<div class="alert alert-danger">
		<ul class="list-group">
			@foreach($errors->all() as $error)
<li class="list-group-item text-danger">
	{{$error}}
</li>
			@endforeach
		</ul>
	</div>
	@endif
		<table class="table">
			<thead><th>Name</th>
<th>Posts Number</th>
<th></th>
			</thead>
			<tbody>
				@foreach($tags as $tag)
				<tr>
					<td>{{$tag->name}}</td>
					<td>{{$tag->posts->count()}}</td>
					<td>
						<a href="{{ route('tags.edit',$tag->id) }}" class="btn btn-info col-sm-2">Edit</a>

{!!Form::open(['method'=>'DELETE','action'=>['TagsController@destroy',$tag->id],'class'=>'pull-right col-sm-10'])!!}
<div class="form-group">
	{!!Form::submit('Delete ',['class'=>'btn btn-danger   '])!!}
</div>
{!!Form::close()!!}
					</td>
					
				</tr>
				@endforeach

			</tbody>
		</table>




	</div>
</div>
@stop
