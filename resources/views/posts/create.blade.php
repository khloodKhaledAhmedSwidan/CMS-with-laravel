@extends('layouts.app')
@section('content')
<div class="card card-default">
	<div class="card-header"> Create Post</div>
	<div class="card-body">


@include('partials.error')


		
		{!!Form::open(['method'=>'POST','action'=>'PostsController@store', 'enctype' => 'multipart/form-data']) !!}
<div class="form-group">
{!!Form::label('title','Title') !!}
{!!Form::text('title',null,['class'=>'form-control'])!!}
</div>

<div class="form-group">
{!!Form::label('description','Description') !!}
{!!Form::textarea('description',null,['class'=>'form-control', 'rows' => 5, 'cols' => 5])!!}
</div>
<div class="form-group">
{!!Form::label('content','Content') !!}
  <input id="content" type="hidden" name="content">
  <trix-editor input="content"></trix-editor>
</div>



<div class="form-group">
	<label for="category">Category</label>
	<select class="form-control" name="category" > 
		@foreach($categories as $category)
<option value="{{$category->id}}"



>{{$category->name}}</option>

		@endforeach
	</select>
</div>



@if($tags->count() > 0)
<div class="form-group">
	<label for="tag">Tags</label>
	<select class="form-control  tags-selector" name="tags[]" multiple>
		@foreach($tags as $tag)
		<option value="{{$tag->id}}">{{$tag->name}}</option>
		@endforeach
	</select>
</div>
@endif





<div class="form-group">
{!!Form::label('published_at','Published At') !!}
{!!Form::text('published_at',null,['class'=>'form-control'])!!}
</div>
<div class="form-group">
{!!Form::label('image','Image') !!}
{!!Form::file('image',null,['class'=>'form-control'])!!}
</div>
<div class="form-group">
  {!!Form::submit('Add Post',['class'=>'btn btn-success'])!!}
</div>
		{!!Form::close()!!}
	</div>
</div>
@endsection
@section('scripts')
<script type="" src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.11/js/select2.min.js"></script>
<script type="text/javascript">
	flatpickr('#published_at',{enableTime:true,
		enableSeconds:true
	})



	$(document).ready(function() {
    $('#tags-selector').select2()
});
</script>

@endsection
@section('css')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.css">


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.11/css/select2.min.css" rel="stylesheet" />
@endsection
