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
              ['Región de Arica y Parinacota' =>
                ['Arica' => 'Arica',
                'Putre' => 'Putre'],
              'Región de Tarapacá' =>
                ['Iquique' => 'Iquique',
                'Alto Hospicio' => 'Alto Hospicio',
                'Pica' => 'Pica'],
              'Región de Antofagasta' =>
                ['Antofagasta' => 'Antofagasta',
                'Mejillones' => 'Mejillones',
                'Taltal' => 'Taltal',
                'Calama' => 'Calama',
                'Ollagüe' => 'Ollagüe',
                'San Pedro de Atacama' => 'San Pedro de Atacama',
                'Tocopilla' => 'Tocopilla'],
              'Región de Atacama' =>
                ['Copiapó' => 'Copiapó',
                'Caldera' => 'Caldera',
                'El Salvador' => 'El Salvador',
                'Chañaral' => 'Chañaral',
                'Diego de Almagro' => 'Diego de Almagro',
                'Vallenar' => 'Vallenar',
                'Huasco' => 'Huasco'],
              'Región de Coquimbo' =>
                ['La Serena' => 'La Serena',
                'Coquimbo' => 'Coquimbo',
                'Vicuña' => 'Vicuña',
                'Illapel' => 'Illapel',
                'Los Vilos' => 'Los Vilos',
                'Ovalle' => 'Ovalle',
                'Combarbalá' => 'Combarbalá'],
              'Región de Valparaiso' =>
                ['Valparaiso' => 'Valparaiso',
                'Viña del Mar' => 'Viña del Mar',
                'Casablanca' => 'Casablanca',
                'Concón' => 'Concón',
                'San Felipe' => 'San Felipe',
                'Olmué' => 'Olmué',
                'Villa Alemana' => 'Villa Alemana',
                'Quilpué' => 'Quilpué',
                'Los Andes' => 'Los Andes',
                'La Ligua' => 'La Ligua',
                'Papudo' => 'Papudo',
                'Zapallar' => 'Zapallar',
                'Quillota' => 'Quillota',
                'Calera' => 'Calera',
                'San Antonio' => 'San Antonio',
                'Algarrobo' => 'Algarrobo',
                'Cartagena' => 'Cartagena'],
              'Región Metropolitana' =>
                ['Colina' => 'Colina',
                'Melipilla' => 'Melipilla',
                'San José de Maipo' => 'San José de Maipo',
                'Santiago' => 'Santiago',
                'Cerrillos' => 'Cerrillos',
                'Cerro Navia' => 'Cerro Navia',
                'Conchalí' => 'Conchalí',
                'El Bosque' => 'El Bosque',
                'Estación Central' => 'Estación Central',
                'Huechuraba' => 'Huechuraba',
                'Independencia' => 'Independencia',
                'La Cisterna' => 'La Cisterna',
                'La Florida' => 'La Florida',
                'La Granja' => 'La Granja',
                'La Pintana' => 'La Pintana',
                'La Reina' => 'La Reina',
                'Las Condes' => 'Las Condes',
                'Lo Barnechea' => 'Lo Barnechea',
                'Lo Espejo' => 'Lo Espejo',
                'Lo Prado' => 'Lo Prado',
                'Macul' => 'Macul',
                'Maipú' => 'Maipú',
                'Ñuñoa' => 'Ñuñoa',
                'Pedro Aguirre Cerda' => 'Pedro Aguirre Cerda',
                'Peñalolén' => 'Peñalolén',
                'Providencia' => 'Providencia',
                'Pudahuel' => 'Pudahuel',
                'Quilicura' => 'Quilicura',
                'Quinta Normal' => 'Quinta Normal',
                'Recoleta' => 'Recoleta',
                'Renca' => 'Renca',
                'San Joaquín' => 'San Joaquín',
                'San Miguel' => 'San Miguel',
                'San Ramón' => 'San Ramón',
                'Vitacura' => 'Vitacura'],
              'Región de O Higgins' =>
                ['Rancagua' => 'Rancagua',
                'Rengo' => 'Rengo',
                'San Fernando' => 'San Fernando',
                'Pichilemu' => 'Pichilemu',
                'Santa Cruz' => 'Santa Cruz',
                'San Vicente' => 'San Vicente',
                'Chimbarongo' => 'Chimbarongo'],
              'Región del Maule' =>
                ['Curicó' => 'Curicó',
                'Talca' => 'Talca',
                'Constitución' => 'Constitución',
                'Linares' => 'Linares',
                'Cauquenes' => 'Cauquenes',
                'Maule' => 'Maule',
                'Parral' => 'Parral',
                'Molina' => 'Molina',
                'San Clemente' => 'San Clemente',
                'San Rafael' => 'San Rafael'],
              'Región del Biobío' =>
                ['Chillán' => 'Chillán',
                'Concepción' => 'Concepción',
                'Los Ángeles' => 'Los Ángeles',
                'Talcahuano' => 'Talcahuano',
                'Coronel' => 'Coronel',
                'Chiguayante' => 'Chiguayante',
                'Curanilahue' => 'Curanilahue',
                'Lebu' => 'Lebu',
                'San Rosendo' => 'San Rosendo',
                'Bulnes' => 'Bulnes',
                'Cobquecura' => 'Cobquecura'],
              'Región de la Araucanía' =>
                ['Temuco' => 'Temuco',
                'Angol' => 'Angol',
                'Puerto Saavedra' => 'Puerto Saavedra',
                'Villarrica' => 'Villarrica',
                'Pucón' => 'Pucón',
                'Lonquimay' => 'Lonquimay',
                'Collipulli' => 'Collipulli'],
              'Región de Los Ríos' =>
                ['Valdivia' => 'Valdivia',
                'Panguipulli' => 'Panguipulli',
                'La Unión' => 'La Unión',
                'Río Bueno' => 'Río Bueno',
                'Lago Ranco' => 'Lago Ranco'],
              'Región de Los Lagos' =>
                ['Osorno' => 'Osorno',
                'Puerto Montt' => 'Puerto Montt',
                'Ancud' => 'Ancud',
                'Castro' => 'Castro',
                'Cochamó' => 'Cochamó',
                'Quellón' => 'Quellón',
                'Chaitén' => 'Chaitén',
                'Frutillar' => 'Frutillar',
                'LLanquihue' => 'Llanquihue',
                'Futaleufú' => 'Futaleufú'],
              'Región de Aysén' =>
                ['Melinka' => 'Melinka',
                'Lago Verde' => 'Lago Verde',
                'Puerto Cisnes' => 'Puerto Cisnes',
                'Puerto Aysén' => 'Puerto Aysén',
                'Coyhaique' => 'Coyhaique',
                'Balmaceda' => 'Balmaceda',
                'Puerto Ibañez' => 'Puerto Ibañez',
                'Chile Chico' => 'Chile Chico',
                'Cochrane' => 'Cochrane',
                'Caleta Tortel' => 'Caleta Tortel',
                'Villa O Higgins' => 'Villa O Higgins'],
              'Región de Magallanes y la Antártica' =>
                ['Torres del Paine' => 'Torres del Paine',
                'Puerto Natales' => 'Puerto Natales',
                'Punta Arenas' => 'Punta Arenas',
                'Porvenir' => 'Porvenir',
                'Puerto Williams' => 'Puerto Williams']],
              $selected = null, ['class' => 'form-control', 'required' => 'required'])
      !!}
    </div><!-- /div .form-group .has-feedback .has-feedback-left  -->

    @if($userActive)
      
      {{--
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
      --}}

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