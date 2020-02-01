@extends('layouts.app')
@section('content')

<div class="card card-default">
	<div class="card-header">create Tag</div>
</div>
<div class="card-body">
@include('partials.error')

    {!! Form::model($tag, ['method' => 'PATCH','route' => ['tags.update', $tag->id]]) !!}






<div class="form-group">
{!!Form::label('name','Name') !!}
{!!Form::text('name',null,['class'=>'form-control'])!!}
</div>

<div class="form-group">
  {!!Form::submit('update Tag',['class'=>'btn btn-success'])!!}
</div>




{!!Form::close()!!}


</div>
@stop