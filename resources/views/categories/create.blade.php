@extends('layouts.app')
@section('content')

<div class="card card-default">
	<div class="card-header">create Category</div>
</div>
<div class="card-body">
@include('partials.error')



{!!Form::open(['method'=>'POST','action'=>'CategoriesController@store']) !!}
<div class="form-group">
{!!Form::label('name','Name') !!}
{!!Form::text('name',null,['class'=>'form-control'])!!}
</div>

<div class="form-group">
  {!!Form::submit('Add Category',['class'=>'btn btn-success'])!!}
</div>
{!!Form::close()!!}


</div>
@stop