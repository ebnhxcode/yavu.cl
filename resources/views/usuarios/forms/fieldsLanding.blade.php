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
            {!!Form::label('Nombre')!!}
            {!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ingrese su nombre','required'=>'required'])!!}
          </div><!-- /div .form-group .has-feedback .has-feedback-left  -->

        </div><!-- /div .col-lg6-md6-sm6-xs12 -->

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

          <div class='form-group has-feedback has-feedback-left'>
            {!!Form::label('Apellido')!!}
            {!!Form::text('apellido',null,['class'=>'form-control','placeholder'=>'Ingrese su apellido','required'=>'required'])!!}
          </div><!-- /div .form-group .has-feedback .has-feedback-left  -->

        </div><!-- /div .col-lg6-md6-sm6-xs12 -->

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

          <div class='form-group has-feedback has-feedback-left'>
            {!!Form::label('Email')!!}
            {!!Form::email('email',null,['class'=>'form-control','placeholder'=>'Ingrese su email','required'=>'required'])!!}
          </div><!-- /div .form-group .has-feedback .has-feedback-left  -->

        </div><!-- /div .col-lg6-md6-sm6-xs12 -->

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

          <div class='form-group has-feedback has-feedback-left'>
            {!!Form::label('Clave')!!}
            {!!Form::password('password',['class'=>'form-control','placeholder'=>'Ingrese una clave', 'required' => 'required'])!!}
          </div><!-- /div .form-group .has-feedback .has-feedback-left  -->

        </div><!-- /div .col-lg6-md6-sm6-xs12 -->

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

          <div class='form-group has-feedback has-feedback-left'>
            {!!Form::label('Ciudad')!!}
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
        {!!Form::submit('Registrar', ['class'=>'btn btn-primary btn-success', 'style' => 'width:100%;'])!!}
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






