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
              {!!Form::number('fono',null,['class'=>'form-control','placeholder'=>'Tel&eacute;fono', 'maxlength' => '16', 'required'])!!}
              <div class="input-group-addon">
                Tel&eacute;fono
              </div><!-- /div .input-group-addon -->
            </div><!-- /div .input-group .input-group-sm -->
          </div><!-- /div .form-group .has-feedback .has-feedback-left  -->
        </div><!-- /div .col-lg6-md6-sm6-xs12 -->

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






