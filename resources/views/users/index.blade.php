@extends('layouts.app')
@section('content')

<div class="card card-default">
	<div class="card-header">
Users
	</div>
	<div class="card-body">



		<table class="table">
			<thead>
				<th>Image</th>
				<th>Name</th>
				<th>Email</th>
				<th> </th>
		
			</thead>
			<tbody>

				@if($users->count() <= 0)
			
<tr> <td align="center" colspan="4" class="bg-info center"><p> <h1>NO Users</h1> </p></td>	</tr>
			 @else
				@foreach($users as $user)
				<tr>
				<td>
					<img src="{{Gravatar::src($user->email)}}" width="40px" height="40px" style="border-radius: 50%">

				</td>
				<td>{{$user->name}}</td>
				<td>
				{{$user->email}}

				</td>
				<td >
@if(!$user->isAdmin())





 {!! Form::model($user, ['method' => 'PATCH','route' => ['users.make-admin', $user->id]]) !!}

<div class="form-group">
  {!!Form::submit('make Admin',['class'=>'btn btn-success'])!!}
</div>
{!!Form::close()!!}

@endif


				</td>
               
				</tr>
				@endforeach
			
				

				@endif
			</tbody>
		</table>
	</div>
</div>
@stop