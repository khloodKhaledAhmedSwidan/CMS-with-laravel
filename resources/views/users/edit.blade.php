@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 ">
            <div class="panel panel-default">
                <div class="panel-heading">My Profile</div>
  {!! Form::model($user, ['method' => 'PUT','route' => ['users.update-profile', $user->id]]) !!}

<div class="form-group">
{!!Form::label('name','Name') !!}
{!!Form::text('name',null,['class'=>'form-control'])!!}
</div>


<div class="form-group">
{!!Form::label('About Me','about') !!}
{!!Form::textarea('about',null,['class'=>'form-control', 'rows' => 5, 'cols' => 5])!!}
</div>

<div class="form-group">
  {!!Form::submit('update ',['class'=>'btn btn-success'])!!}
</div>


    {!!Form::close()!!}
                <div class="panel-body">
         
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
