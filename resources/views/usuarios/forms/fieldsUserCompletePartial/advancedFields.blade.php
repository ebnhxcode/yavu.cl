@if($userActive = Auth::user()->check())
  <div class="list-group">
    <div class="list-group-item">
      <small>Imagen de perfil y portada</small>
    </div><!-- /div .list-group-item -->
    <div class="list-group-item">

      <div class='form-group has-feedback has-feedback-left'>
        (Solo jpg, png) {!!Form::label('Imagen de perfil:')!!}<span id='Perfil'></span><br>
        <span class=''>

          <label class="btn btn-default btn-sm btn-file">
            <span class="glyphicon glyphicon-camera "></span>
            Buscar imagen ... <input type="file" name="imagen_perfil" style="display: none;" id="imagen_perfil" maxlength="255" size="2048">
          </label><!-- /label .btn .btn-default .btn-sm .btn-file -->

        </span><!-- /span .btn-file .btn-md -->
        <a class="thumbnail" href="">
          <img width='' id='ImagenPerfil' class='img-responsive-centered' src='/img/users/{!! isset($user)?($user->imagen_perfil!='')?$user->imagen_perfil:'usuario_nuevo.png':'usuario_nuevo.png' !!}'>
        </a>


      </div><!-- /div .form-group .has-feedback .has-feedback-left  -->
      <div class='form-group has-feedback has-feedback-left'>
        <small>(Solo jpg, png)</small> {!!Form::label('Imagen de portada:')!!}<span id='Portada'></span><br>
          <span class=''>

            <label class="btn btn-default btn-sm btn-file">
              <span class="glyphicon glyphicon-camera "></span>
              Buscar imagen ... <input type="file" name="imagen_portada" style="display: none;" id="imagen_portada" maxlength="255" size="2048">
            </label><!-- /label .btn .btn-default .btn-sm .btn-file -->

          </span>
        <a class="thumbnail" href="">
          <img width='' id='ImagenPortada' class='img-responsive-centered' src='/img/users/{!! isset($user)?($user->imagen_portada!='')?$user->imagen_portada:'banner.png':'banner.png' !!}'>
        </a>
      </div><!-- /div .form-group .has-feedback .has-feedback-left  -->

    </div><!-- /div .list-group-item -->
  </div><!-- /div .list-group -->
@endif

<div class="list-group">
  <div class="list-group-item">
    <small>Datos de ubicaci&oacute;n</small>
  </div><!-- /div .list-group-item -->
  <div class="list-group-item">


    <div class='form-group has-feedback has-feedback-left'>
      {!!Form::select('ciudad',
      ['Tarapacá' => 'Tarapacá',
      'Parinacota' => 'Parinacota',
      'Arica' => 'Arica',
      'Antofagasta' => 'Antofagasta',
      'Atacama' => 'Atacama',
      'La Serena' => 'La Serena',
      'Coquimbo' => 'Coquimbo',
      'Valparaiso' => 'Valparaiso',
      'Aconcagua' => 'Aconcagua',
      'Región Metropolitana' => 'Región Metropolitana',
      'O Higgins' => 'O Higgins',
      'Curicó' => 'Curicó',
      'Talca' => 'Talca',
      'Linares' => 'Linares',
      'Maule' => 'Maule',
      'Ñuble' => 'Ñuble',
      'Concepción' => 'Concepción',
      'Arauco' => 'Arauco',
      'Biobío' => 'Biobío',
      'Malleco' => 'Malleco',
      'Cautín' => 'Cautín',
      'Araucanía' => 'Araucanía',
      'Los Ríos' => 'Los Ríos',
      'Valdivia' => 'Valdivia',
      'Osorno' => 'Osorno',
      'Los Lagos' => 'Los Lagos',
      'Llanquihue' => 'Llanquihue',
      'Chiloé' => 'Chiloé',
      'Aysen' => 'Aysen',
      'Magallanes' => 'Magallanes',
      'otra' => 'otras...'],
      $selected = null, ['class' => 'form-control input-sm', 'maxlength' => '100'])
      !!}
    </div><!-- /div .form-group .has-feedback .has-feedback-left  -->

    @if($userActive)
      <div class='form-group has-feedback has-feedback-left'>
        {!!Form::select('region',
          ['I Región' => 'I Región',
          'II Región' => 'II Región',
          'III Región' => 'III Región',
          'IV Región' => 'IV Región',
          'V Región' => 'V Región',
          'VI Región' => 'VI Región',
          'VII Región' => 'VII Región',
          'VIII Región' => 'VIII Región',
          'IX Región' => 'IX Región',
          'X Región' => 'X Región',
          'XI Región' => 'XI Región',
          'XII Región' => 'XII Región',
          'XIII Región' => 'XIII Región',
          'XVI Región' => 'XVI Región',
          'XV Región' => 'XV Región'],
          $selected = null, ['class' => 'form-control input-sm', 'maxlength' => '100'])
        !!}
      </div><!-- /div .form-group .has-feedback .has-feedback-left  -->

      <div class='form-group has-feedback has-feedback-left'>
        {!!Form::text('direccion',null,['class'=>'form-control input-sm','placeholder'=>'Direcci&oacute;n', 'maxlength' => '100'])!!}
      </div><!-- /div .form-group .has-feedback .has-feedback-left  -->

      <div class='form-group has-feedback has-feedback-left'>
        {!!Form::select('pais',
          ['Chile' => 'Chile',
          'Argentina' => 'Argentina',
          'Bolivia' => 'Bolivia',
          'Brasil' => 'Brasil',
          'Colombia' => 'Colombia',
          'Ecuador' => 'Ecuador',
          'Mexico' => 'Mexico',
          'Panama' => 'Panama',
          'Paraguay' => 'Paraguay',
          'Venezuela' => 'Venezuela',
          'Uruguay' => 'Uruguay',
          'Otro' => 'Otro'],
          $selected = null, ['class' => 'form-control input-sm', 'maxlength' => '100'])
        !!}
      </div><!-- /div .form-group .has-feedback .has-feedback-left  -->
    @endif

  </div><!-- /div .list-group-item -->
</div><!-- /div .list-group -->

<script>
  $('#imagen_perfil').change(function(){
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
      $('#Perfil').addClass('btn btn-success btn-xs').text('ok');
    }
  });

  $('#imagen_portada').change(function(){
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
      $('#Portada').addClass('btn btn-success btn-xs').text('ok');
    }
  });
</script>