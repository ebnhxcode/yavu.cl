
  <div class="list-group-item">
    Ingresar nombre y la descripci&oacute;n de la nueva categor&iacute;a
  </div><!-- /div .list-group-item -->

  <div class="list-group-item">
    {!!Form::text('category',null,['class'=>'form-control','placeholder'=>'Nombre para la nueva categor&iacute;a', 'required'])!!}
    <br>{!! csrf_field() !!}
    {!!Form::textarea('description',null,['class'=>'form-control','placeholder'=>'Descripci&oacute;n para la nueva categor&iacute;a', 'rows' => '2', 'required'])!!}
  </div><!-- /div .list-group-item -->





{{--
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
--}}