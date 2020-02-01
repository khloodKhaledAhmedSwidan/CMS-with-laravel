@extends('layouts.app')
@section('content')

<div class="card card-default">
	<div class="card-header">create Category</div>
</div>
<div class="card-body">

@include('partials.error')

 {!! Form::model($post, ['method' => 'PATCH','route' => ['posts.update', $post->id]]) !!}


<div class="form-group">
{!!Form::label('title','title') !!}
{!!Form::text('title',null,['class'=>'form-control'])!!}
</div>

<div class="form-group">
{!!Form::label('description','Description') !!}
{!!Form::textarea('description',null,['class'=>'form-control', 'rows' => 5, 'cols' => 5])!!}
</div>


<div class="form-group">
{!!Form::label('content','Content') !!}

{{Form::hidden('content',null,['class'=>'form-control'])}}


  <trix-editor input="content"></trix-editor>

</div>
<div class="form-group">
{!!Form::label('published_at','Published At') !!}
{!!Form::text('published_at',null,['class'=>'form-control'])!!}
</div>

<div class="form-group">
{!!Form::label('image','Image') !!}

{!!Form::file('image',null,['class'=>'form-control'])!!}
</div>
<div class="form-group">
  {!!Form::submit('update Post',['class'=>'btn btn-success'])!!}
</div>




{!!Form::close()!!}


</div>
@endsection
@section('scripts')
<script type="" src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script type="text/javascript">
	flatpickr('#published_at',{enableTime:true,
	enableSeconds:true })
</script>
@endsection
@section('css')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.css">


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">


@endsection
