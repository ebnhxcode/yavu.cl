<div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active">
      <a href="#register" aria-controls="register" role="tab" data-toggle="tab">Register</a>
    </li><!-- /li .active -->
    <li role="presentation">
      <a href="#info" aria-controls="info" role="tab" data-toggle="tab">Info</a>
    </li><!-- /li -->
  </ul><!-- /ul .nav .nav-tabs -->
  <!-- End Nav tabs -->

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="register">
      <div class="row">
        <br/>

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class='form-group has-feedback has-feedback-left'>
            <div class="input-group input-group-sm">
              {!!Form::email('email',null,['class'=>'form-control','placeholder'=>'Ingrese su email', 'maxlength' => '200', 'required'])!!}
              <div class="input-group-addon">
                <i class="glyphicon glyphicon-user"></i> Email
              </div><!-- /div .input-group-addon -->
            </div><!-- /div .input-group .input-group-sm -->
          </div><!-- /div .form-group .has-feedback .has-feedback-left  -->
        </div><!-- /div .col-lg6-md6-sm6-xs12 -->

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class='form-group has-feedback has-feedback-left'>
            <div class="input-group input-group-sm">
              {!!Form::password('password',['class'=>'form-control','placeholder'=>'Ingrese una password', 'maxlength' => '100', 'required'])!!}
              <div class="input-group-addon">
                <i class="glyphicon glyphicon-lock"></i> Clave
              </div><!-- /div .input-group-addon -->
            </div><!-- /div .input-group .input-group-sm -->
          </div><!-- /div .form-group .has-feedback .has-feedback-left  -->
        </div><!-- /div .col-lg6-md6-sm6-xs12 -->

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class='form-group has-feedback has-feedback-left'>
            <div class="input-group input-group-sm">
              {!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ingrese su nombre','required'=>'required'])!!}
              <div class="input-group-addon">
                Nombre
              </div><!-- /div .input-group-addon -->
            </div><!-- /div .input-group .input-group-sm -->
          </div><!-- /div .form-group .has-feedback .has-feedback-left  -->
        </div><!-- /div .col-lg6-md6-sm6-xs12 -->

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class='form-group has-feedback has-feedback-left'>
            <div class="input-group input-group-sm">
              {!!Form::text('apellido',null,['class'=>'form-control','placeholder'=>'Ingrese su apellido','required'=>'required'])!!}
              <div class="input-group-addon">
                Apellido
              </div><!-- /div .input-group-addon -->
            </div><!-- /div .input-group .input-group-sm -->
          </div><!-- /div .form-group .has-feedback .has-feedback-left  -->
        </div><!-- /div .col-lg6-md6-sm6-xs12 -->

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class='form-group has-feedback has-feedback-left'>
            <div class="input-group input-group-sm">
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
              <div class="input-group-addon">
                Ciudad
              </div><!-- /div .input-group-addon -->
            </div><!-- /div .input-group .input-group-sm -->
          </div><!-- /div .form-group .has-feedback .has-feedback-left  -->
        </div><!-- /div .col-lg6-md6-sm6-xs12 -->


        {{--
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class='form-group has-feedback has-feedback-left'>
            <div class="input-group input-group-sm">
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
              $selected = null, ['class' => 'form-control', 'required' => 'required'])
              !!}
              <div class="input-group-addon">
                Ciudad
              </div><!-- /div .input-group-addon -->
            </div><!-- /div .input-group .input-group-sm -->
          </div><!-- /div .form-group .has-feedback .has-feedback-left  -->
        </div><!-- /div .col-lg6-md6-sm6-xs12 -->

        --}}


        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class='form-group has-feedback has-feedback-left'>
            <div class="input-group input-group-sm">
              {!!Form::text('login',null,['class'=>'form-control','placeholder'=>'Nombre de usuario', 'maxlength' => '100', 'required'])!!}
              <div class="input-group-addon">
                Nombre usuario
              </div><!-- /div .input-group-addon -->
            </div><!-- /div .input-group .input-group-sm -->
          </div><!-- /div .form-group .has-feedback .has-feedback-left  -->
        </div><!-- /div .col-lg6-md6-sm6-xs12 -->

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class='form-group has-feedback has-feedback-left'>
            <div class="input-group input-group-sm">
              {!!Form::date('fecha_nacimiento',null,['class'=>'form-control', 'maxlength' => '50', 'required'])!!}
              <div class="input-group-addon">
                Nacimiento
              </div><!-- /div .input-group-addon -->
            </div><!-- /div .input-group .input-group-sm -->
            <span class="softText-descriptions">(D&iacute;a/Mes/A&ntilde;o)</span>
          </div><!-- /div .form-group .has-feedback .has-feedback-left  -->
        </div><!-- /div .col-lg6-md6-sm6-xs12 -->

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class='form-group has-feedback has-feedback-left'>
            <div class="input-group input-group-sm">
              {!!Form::text('fono',null,['class'=>'form-control','placeholder'=>'Tel&eacute;fono', 'maxlength' => '18'])!!}
              <div class="input-group-addon">
                Tel&eacute;fono
              </div><!-- /div .input-group-addon -->
            </div><!-- /div .input-group .input-group-sm -->
            <span class="softText-descriptions"><small>Podr&iacute;as ser un ganador</small></span>
          </div><!-- /div .form-group .has-feedback .has-feedback-left  -->
        </div><!-- /div .col-lg6-md6-sm6-xs12 -->

        <div align="center" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <small><b style="font-size: 0.9em;">¿Como te enteraste de yavü?</b></small>
          <div class='form-group has-feedback has-feedback-left'>
            {!!Form::select('asUserHear',
            ['Registro en Línea' => 'Registro en Línea',
            'Por la radio' => 'Por la radio',
            'En en diario' => 'En en diario',
            'Por una revista' => 'Por una revista',
            'En otros sitios' => 'En otros sitios',
            'Por un amigo' => 'Por un amigo',
            'Por publicidad en Facebook' => 'Por publicidad en Facebook',
            'otra' => 'otras...'],
            $selected = null, ['class' => 'form-control input-sm', 'maxlength' => '100'])
            !!}
          </div><!-- /div .form-group .has-feedback .has-feedback-left  -->
        </div><!-- /div .col-lg12-md12-sm12-xs12 -->


        {{-- NO DISPONIBLE TEMPORALMENTE PERO A FUTURO SE CONSIDERARÁ
        <div class='form-group has-feedback has-feedback-left'>
          @include('alerts.showThatIsRequired') {!!Form::label('Codigo Referido:')!!}
          {!!Form::text('referido',null,['class'=>'form-control','placeholder'=>''])!!}
        </div>
        --}}

        <div class='form-group has-feedback has-feedback-left'>
          {!!Form::hidden('tipo_usuario', 'Usuario')!!}
        </div><!-- /div .form-group .has-feedback .has-feedback-left  -->

        <div class='form-group has-feedback has-feedback-left'>
          {!!Form::hidden('estado', 'Activo')!!}
        </div><!-- /div .form-group .has-feedback .has-feedback-left  -->

      </div><!-- /div .row -->

      <div class="form-group has-feedback has-feedback-left">
        <button type="submit" class="btn btn-success" style="width:100%;">
          ¡ Reg&iacute;strate en <img width="64px" src="/img/yavu004.png" alt=""/> !
        </button><!-- /button .btn .btn .success -->
      </div>

    </div><!-- /div .tab-pane .active #register -->

    <div role="tabpanel" class="tab-pane fade" id="info">

      <div align="center" class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

          <h1>¡Bienvenido a Yavü!</h1>

        </div><!-- /div .col-lg6-md6-sm6-xs12 -->

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

          <h4>
            Yavü es una plataforma en donde empresas, concursos y premios coexisten para brindar un servicio único a nuestros usuarios.
          </h4>

        </div><!-- /div .col-lg6-md6-sm6-xs12 -->

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

          <img class="img-responsive" src="/img/icono_que_es.png" alt=""/>

        </div><!-- /div .col-lg6-md6-sm6-xs12 -->

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

          <h4>
            Sigue a comercios de tu interés, conoce promociones y descuentos en tu ciudad.
          </h4>

        </div><!-- /div .col-lg6-md6-sm6-xs12 -->

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

          <img class="img-responsive" src="/img/newGraphics/icono_comercio02.png" alt=""/>

        </div><!-- /div .col-lg6-md6-sm6-xs12 -->

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

          <h4>
            Participa en concursos todas las semanas y entérate de los eventos más importantes totalmente gratis en Yavu.cl.
          </h4>

        </div><!-- /div .col-lg6-md6-sm6-xs12 -->

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

          <img class="img-responsive" src="/img/newGraphics/icofinal_informes.png" alt=""/>

        </div><!-- /div .col-lg6-md6-sm6-xs12 -->




      </div><!-- /div .row -->

    </div><!-- /div .tab-pane #info -->

  </div><!-- /div .tab-content -->
  <!-- End Tab panes -->

</div><!-- /div -->






