<div class="col-sm-8">
	<div class="list-group" >
		<div class="list-group-item">
			<h4>Datos principales</h4>
		</div>
		<div class="list-group-item">
            <div class="form-group has-feedback has-feedback-left">
                {!!Form::label('Nombre categoría:')!!}
                {!!Form::select('nombre_categoria', 
                    ['Gastronomia' => 'Gastronomia',
                    'Tiempo libre' => 'Tiempo libre',
                    'Belleza' => 'Belleza',
                    'Bienestar' => 'Bienestar',
                    'Servicios' => 'Servicios',
                    'Tecnología' => 'Tecnología', 
                    'Accesorios' => 'Accesorios', 
                    'Hogar' => 'Hogar',
                    'Productos' => 'Productos',
                    'Viajes' => 'Viajes',
                    'Deportes y Fitness' => 'Deportes y Fitness',
                    'Centros médicos' => 'Centros médicos',
                    'Entretenimiento Nocturno' => 'Entretenimiento Nocturno',
                    'Mascotas' => 'Mascotas',
                    'Automotriz' => 'Automotriz',
                    'Vestuario y Calzado' => 'Vestuario y Calzado',  
                    'Otra' => 'Otras...'], 
                    $selected = null, ['class' => 'form-control', 'maxlength' => '100']) 
                !!} 
            </div>
            <div>
                <input type="hidden" value="{!! $empresa -> id  !!} " name="empresa_id"></input>
            </div> 
        </div>
	</div>
</div>

<div class="col-sm-4">

