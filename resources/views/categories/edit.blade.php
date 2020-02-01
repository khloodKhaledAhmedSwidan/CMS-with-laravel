@extends('layouts.app')
@section('content')

<div class="card card-default">
	<div class="card-header">create Category</div>
</div>
<div class="card-body">
@include('partials.error')

    {!! Form::model($category, ['method' => 'PATCH','route' => ['categories.update', $category->id]]) !!}






<div class="form-group">
{!!Form::label('name','Name') !!}
{!!Form::text('name',null,['class'=>'form-control'])!!}
</div>

<div class="form-group">
  {!!Form::submit('update Category',['class'=>'btn btn-success'])!!}
</div>




{!!Form::close()!!}


</div>
@stop