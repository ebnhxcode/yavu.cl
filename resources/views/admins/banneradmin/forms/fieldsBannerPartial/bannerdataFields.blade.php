<div class="list-group-item">
  <h4>Datos principales</h4>
</div><!-- /div .list-group-item -->

<div class="list-group-item">
  <div class="form-group has-feedback has-feedback-left">
    {!!Form::label('Titulo:')!!}
    {!!Form::text('titulo_banner',null,['class'=>'form-control','placeholder'=>'Ingrese el titulo del banner', 'maxlength' => '100', 'required'])!!}
  </div><!-- /div .form-group .has-feedback .has-feedback-left -->

  <div class="form-group has-feedback has-feedback-left">
    {!!Form::label('Descripción:')!!}
    {!!Form::textarea('descripcion_banner',null,['class'=>'form-control','placeholder'=>'Agregue una breve descripción para su banner', 'maxlength'=>'999', 'rows'=>'5', 'id'=>'descripción', 'required'])!!}
  </div><!-- /div .form-group .has-feedback .has-feedback-left -->
</div><!-- /div .list-group-item -->


<!-- GESTION DE LAS FOTOS -->

<div class="list-group-item">
  <div class="form-group has-feedback has-feedback-left">
    {!!Form::label('Subir imagen banner: ')!!}<br>
    <div>
      <span class="btn-file btn-sm">
        Buscar imagen{!!Form::file('banner', ['id' => 'ImagenBanner',  'maxlength' => '255', 'size' => '2048', 'required'])!!}
      </span>
      @if(isset($empresa))
        <img width="15%" id="ImagenBanner" class="thumbnail img-responsive-centered" src="/img/users/{!! ($banner_data->banner!="")?$banner_data->banner:'usuario_nuevo.png'!!}" alt="..." required="required">
      @else
        <img width="15%" id="ImagenBanner" class="thumbnail img-responsive-centered" src="/img/users/usuario_nuevo.png" alt="..." required="required">
      @endif
    </div>
  </div><!-- /div .form-group .has-feedback .has-feedback-left -->
</div><!-- /div .list-group-item -->

<!-- END GESTION DE LAS FOTOS -->



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
