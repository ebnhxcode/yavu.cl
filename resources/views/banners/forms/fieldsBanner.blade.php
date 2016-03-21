<div class="col-sm-12">
	<div class="list-group" >
		<div class="list-group-item">
			<h4>Datos principales</h4>
		</div>
		<div class="list-group-item">
			<div class="form-group has-feedback has-feedback-left">
				{!!Form::label('Nombre del banner:')!!}
				{!!Form::text('banner_empresa',null,['class'=>'form-control','placeholder'=>'Ingrese el nombre del banner'])!!}
			</div>


        <div class="form-group has-feedback has-feedback-left">
          {!!Form::label('Ingrese Enlace de la Empresa:')!!}
          {!!Form::text('enlace_empresa',null,['class'=>'form-control','placeholder'=>''])!!}

        </div> 

         <div class="form-group has-feedback has-feedback-left">
          {!!Form::label('Ingrese imagen empresa:')!!}
          {!!Form::text('imagen_empresa',null,['class'=>'form-control','placeholder'=>''])!!}

        </div> 

        <div class="form-group has-feedback has-feedback-left">
				{!!Form::label('Descripción a publicitar:')!!}
				{!!Form::textarea('comentario_banner',null,['class'=>'form-control','maxlength'=>'500','placeholder'=>'Ingrese la descripcion del sorteo'])!!}
      </div>

        	 <div class="form-group has-feedback has-feedback-left">
            {!!Form::hidden('estado_banner', 'Pendiente')!!} 
          </div>             
       
  		
         		@if (Auth::admin()->check()) 

			<div class="form-group has-feedback has-feedback-left">
				{!!Form::label('Estado Banner:')!!}		
				{!!Form::select('estado_banner', 
					['Pendiente' => 'Pendiente',	
					'Aprobado' => 'Aprobado'], 
					$selected = null, ['class' => 'form-control']) 
				!!}	

			</div>

				@endif 

</div>
		</div>
    </div>
        </div>		
