@extends('layouts.front')
@section('content')
<div class="jumbotron">
	<div id="contentIn">
		<h4>Actualización de cliente : {{$user->NOMBRE_USUARIO .' '. $user->APELLIDO_USUARIO}}</h4>

		{!!Form::model($user, ['method'=>'PATCH', 'action' => ['UserController@update', $user->ID_USUARIO] ])!!}
			@include('usuarios.forms.fieldsUser')
			{!!Form::submit('Guardar', ['class'=>'btn btn-primary btn-success'])!!}
		{!!Form::close()!!}

		{!!Form::open(['action'=> ['UserController@destroy', $user->ID_USUARIO], 'method'=>'DELETE'])!!}
			{!!Form::submit('Eliminar', ['class'=>'btn btn-primary btn-danger'])!!}
		{!!Form::close()!!}

	</div>
</div>
@stop