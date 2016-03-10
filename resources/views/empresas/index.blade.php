{!!Html::script('js/jquery.js')!!}
{!!Html::script('js/ajax/BuscarEmpresa.js')!!}
@extends('layouts.front')	

@section('content')
<div class="jumbotron">
	<div id="contentMiddle">
		@include('alerts.alertFields')
		@include('alerts.errorsMessage')
		@include('alerts.successMessage')
		@include('alerts.warningMessage')
		<h1>Mantenedor de Empresas</h1>		
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="form-group">

  				@if(Auth::admin()->check())

				 {!!Form::text('nombre',null,['class' => 'form-control buscar', 'placeholder' => 'Nombre de empresa','id'=>'empresa'])!!}

				@elseif(Auth::user()->check() || !Auth::user()->check())

				 {!!Form::text('nombre',null,['class' => 'form-control buscar', 'placeholder' => 'Nombre de empresa','id'=>'empresathumb', 'role' => 'combobox'])!!}

				 @endif

				</div>
				@if(Auth::admin()->check())
					<table class="table table-hover" id="EmpresaList">

						<thead>
							<th>Nombre</th>
							<th>Correo</th>
							<th>ciudad</th>
							<th>Fono</th>
							<th>Aniversario Empresa</th>
							<th>Encargado</th>
							<th>Operaciones</th>
						</thead>

						@foreach($empresas as $empresa)	
							<tbody>
								<td>{{$empresa->nombre}}</td>
								<td>{{$empresa->email}}</td>
								<td>{{$empresa->ciudad}}</td>
								<td>{{$empresa->fono}}</td>
								<td>{{$empresa->fecha_creacion}}</td>
								<td>{{$empresa->nombre_encargado}}</td>
								<td>{!!link_to_route('empresas.edit', $title = 'Editar', $parameters = $empresa->id, $attributes = ['class'=>'btn btn-primary'])!!}
								</td>
							</tbody>
						@endforeach
					</table>	
					{!!$empresas->render()!!}
						
				@elseif(Auth::user()->check() || !Auth::user()->check())


					<div id="EmpresaListThumb">

					@foreach($empresas as $empresa)	
	        
				        <div class="col-md-4">
				          <div class="thumbnail">
				          	@if($empresa->imagen_perfil !== "")
				            	<img src="{!!URL::to('img/users/'.$empresa->imagen_perfil)!!}" alt="">
				            @else
				            	<img width="15%" id="ImagenPerfil" class="thumbnail" src="https://image.freepik.com/iconos-gratis/silueta-usuario-masculino_318-35708.png" alt="...">
				            @endif

				              <div class="caption">
				                <h4>{{$empresa->nombre}}</h4>
				            </div>
				            <td>{{$empresa->ciudad}}</td>
							<td>{{$empresa->fono}}</td>
				          </div>
				        </div>

					@endforeach

					</div>

					{!!$empresas->render()!!}
				@endif

				
			</div>
		</div>
	</div>
</div>


@stop