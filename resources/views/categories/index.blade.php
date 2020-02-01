@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-end mb-2">
	<a href="{{route('categories.create')}}" class="float-right btn btn-success ">Add Catedory</a>
</div>
<div class="card card-default">
	<div class="card-header">Categories</div>
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
				@foreach($categories as $category)
				<tr>
					<td>{{$category->name}}</td>
					<td>{{$category->posts->count()}}</td>
					<td>
						<a href="{{ route('categories.edit',$category->id) }}" class="btn btn-info col-sm-2">Edit</a>

{!!Form::open(['method'=>'DELETE','action'=>['CategoriesController@destroy',$category->id],'class'=>'pull-right col-sm-10'])!!}
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
