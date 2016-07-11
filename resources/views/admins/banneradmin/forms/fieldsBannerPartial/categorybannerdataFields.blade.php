<div class="list-group-item">
  <div class="form-group has-feedback has-feedback-left">
    {!!Form::label('Nombre categoría:')!!}
    {!!Form::select('category',
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
      $selected = null, ['class' => 'form-control', 'maxlength' => '100', 'required'])
    !!}
  </div><!-- /div .form-group .has-feedback .has-feedback-left -->
</div><!-- /div .list-group-item -->