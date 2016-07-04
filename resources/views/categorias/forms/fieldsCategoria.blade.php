<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
	<div class="list-group">
		<div class="list-group-item">
			<h4>Datos principales</h4>
		</div><!-- /div .list-group-item -->
		<div class="list-group-item">
      <div class="form-group has-feedback has-feedback-left">
        {!!Form::label('Nombre categoría:')!!}
        {!!Form::select('nombre_categoria',
          ['Gastronomia' => 'Gastronomia',
          'Tiempo libre' => 'Tiempo libre',
          'Belleza' => 'Belleza',
          'Farmacias' => 'Farmacias',
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
      </div><!-- /div .form-group .has-feedback .has-feedback-left -->
    </div><!-- /div .list-group-item -->
	</div><!-- /div .list-group -->
</div><!-- /div .col-xs8-sm8-md8-lg8 -->
