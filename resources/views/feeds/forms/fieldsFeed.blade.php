<div class="col-sm-8">
	<div class="list-group" >
		<div class="list-group-item">
			<h4>Datos principales</h4>
		</div>		
		<div class="list-group-item">	
			<div class="form-group has-feedback has-feedback-left">
				{!!Form::label('Titulo:')!!}
				{!!Form::text('titulo',null,['class'=>'form-control','placeholder'=>'Ingrese el título de la publicación'])!!}
			</div>
			<div class="form-group has-feedback has-feedback-left">
				{!!Form::label('Descripción:')!!}
				{!!Form::textarea('descripcion',null,['class'=>'form-control','placeholder'=>'Ingrese el contenido','rows' => '3'])!!}
			</div>			

		</div>
	</div>
</div>

<div class="col-sm-4">