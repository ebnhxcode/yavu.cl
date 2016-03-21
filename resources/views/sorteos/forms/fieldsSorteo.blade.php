<div class="col-sm-8">
	<div class="list-group" >
		<div class="list-group-item">
			<h4>Datos principales</h4>
		</div>
		<div class="list-group-item">
			<div class="form-group has-feedback has-feedback-left">
				{!!Form::label('Nombre del sorteo:')!!}
				{!!Form::text('nombre_sorteo',null,['class'=>'form-control','placeholder'=>'Ingrese el nombre del Sorteo'])!!}
			</div>
			<div class="form-group has-feedback has-feedback-left">
				{!!Form::label('Descripción:')!!}
				{!!Form::textarea('descripcion',null,['class'=>'form-control','maxlength'=>'500','placeholder'=>'Ingrese la descripcion del sorteo'])!!}
		    </div>
	        <div class="form-group has-feedback has-feedback-left">
	          {!!Form::label('Fecha de inicio Sorteo:')!!}
	          {!!Form::date('fecha_inicio_sorteo',null,['class'=>'form-control','placeholder'=>''])!!}
	        </div> 
        	<div class="form-group has-feedback has-feedback-left">
	            {!!Form::hidden('estado_sorteo', 'Pendiente')!!} 
    	    </div>      
          		<!-- GESTION DE LAS FOTOS -->

			@if(isset($sorteo))
				<div class="list-group-item">
					<div class="form-group has-feedback has-feedback-left">

						{!!Form::label('Imagen sorteo:')!!}<br>
						{!!Form::file('imagen_sorteo', ['class' => 'btn'])!!}
						<br>
					</div>
				</div>			
			@endif
     		@if (Auth::admin()->check()) 	
				<div class="form-group has-feedback has-feedback-left">
					{!!Form::label('Estado Sorteo:')!!}		
					{!!Form::select('estado_sorteo', 
						['Pendiente' => 'Pendiente',	
						'Aprobado' => 'Aprobado'], 
						$selected = null, ['class' => 'form-control']) 
					!!}	
				</div>
			@endif 
		</div>
	</div>
</div>
<div class="col-sm-4">