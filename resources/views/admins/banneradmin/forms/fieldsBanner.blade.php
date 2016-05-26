<div class="col-sm-12">
  <div class="list-group" >
    <div class="list-group-item">
      <h4>Datos principales</h4>
    </div>
    <div class="list-group-item">
      <div class="form-group has-feedback has-feedback-left">
        (<strong><small><span class="requerido">Requerido</span></small></strong>) {!!Form::label('Titulo:')!!}
        {!!Form::text('titulo',null,['class'=>'form-control','placeholder'=>'Ingrese el titulo del banner', 'maxlength' => '100'])!!}
      </div>

<div class="form-group has-feedback has-feedback-left">
        (<strong><small><span class="requerido">Requerido</span></small></strong>) {!!Form::label('Descripción:')!!}
        {!!Form::textarea('descripcion',null,['class'=>'form-control','placeholder'=>'Agregue una breve descripción para su banner', 'maxlength'=>'999', 'rows'=>'5', 'id'=>'descripción'])!!}
      </div> 

      
    </div>
    <!-- GESTION DE LAS FOTOS -->

    <div class="list-group-item">
      <div class="form-group has-feedback has-feedback-left">
        (<strong><small><span class="requerido">Solo jpg, png</span></small></strong>) {!!Form::label('Subir imagen banner: ')!!}<span id="Banner" ></span><br>
        <div>
          <span class="btn-file btn-sm">
            Buscar imagen{!!Form::file('banner', ['id' => 'ImagenBanner',  'maxlength' => '255', 'size' => '2048'])!!}
          </span>
          @if(isset($empresa))
            <img width="15%" id="ImagenBanner" class="thumbnail img-responsive-centered" src="/img/users/{!! ($banner_data->banner!="")?$banner_data->banner:'usuario_nuevo.png'!!}" alt="...">
          @else
            <img width="15%" id="ImagenBanner" class="thumbnail img-responsive-centered" src="/img/users/usuario_nuevo.png" alt="...">
          @endif
        </div>
      </div>
    </div>

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
             <div class="form-group has-feedback has-feedback-left">
        (<strong><small><span class="requerido">Requerido</span></small></strong>) {!!Form::label('Link 1:')!!}
        {!!Form::text('link1',null,['class'=>'form-control','placeholder'=>'Ingrese el link 1', 'maxlength' => '100'])!!}
      </div> 
         <div class="form-group has-feedback has-feedback-left">
        (<strong><small><span class="requerido">Requerido</span></small></strong>) {!!Form::label('Link 2:')!!}
        {!!Form::text('link2',null,['class'=>'form-control','placeholder'=>'Ingrese el link 2', 'maxlength' => '100'])!!}
      </div>   
  </div>

  <script>

  $('#ImagenBanner').change(function(){
    var formato = this.value;
    var formatosPermitidos = ['jpg', 'jpeg', 'png', 'gif'];
    formato = formato.split('.');
    var sizeByte = this.files[0].size;
    var siezekiloByte = parseInt(sizeByte / 1024);
    if((formatosPermitidos.indexOf(formato[1]) < 0) || (siezekiloByte > $(this).attr('size')))

    { 

      alert('Formato de imagen invalido o tamaño supera 1 Mega, no se subirá');
      this.value = '';
    }
    else
    {
      $('#ImagenBanner').addClass('btn btn-success btn-xs').text('ok');
    }
  });

</script>

  <!--</div>-->