<div class="col-sm-8">
	<div class="list-group" >
		<div class="list-group-item">
			<h4>Datos principales</h4>
		</div>
		<div class="list-group-item">
            <div class="form-group has-feedback has-feedback-left">
                {!!Form::label('Nombre categoría:')!!}
                {!!Form::text('nombre_categoria',null,['class'=>'form-control','placeholder'=>''])!!}
            </div> 
            <div class="form-group has-feedback has-feedback-left">
                {!!Form::label('Tipo categoría:')!!}
                {!!Form::text('tipo_categoria',null,['class'=>'form-control','placeholder'=>''])!!}
            </div> 
        </div>
	</div>
</div>

<div class="col-sm-4">