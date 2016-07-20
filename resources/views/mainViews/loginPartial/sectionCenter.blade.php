<div align="center">

  <h2>Iniciar Sesi&oacute;n</h2>

  <!-- Formulario inicio sesión -->
    {!!Form::open(['route' => 'log.store', 'method' => 'POST'])!!}

      <div class="form-group has-feedback has-feedback-left ">
        {!!Form::label('Correo electrónico')!!}
        {!!Form::email('email',null,['class'=>'form-control','placeholder'=>'Ingresa tu email de usuario'])!!}
      </div><!-- /div .form-group .has-feedback .has-feedback-left -->

      <div class="form-group has-feedback has-feedback-left ">
        {!!Form::label('Clave')!!}
        {!!Form::password('password',['class'=>'form-control','placeholder'=>'Ingresa tu clave'])!!}
      </div><!-- /div .form-group .has-feedback .has-feedback-left -->

      <input type="hidden" name="_token" value="{!! csrf_token() !!}"><!-- /input token -->

      <div class="form-group has-feedback has-feedback-left ">
        <button type="submit" class='btn btn-success' style="width:100%;" ><b>Iniciar sesi&oacute;n</b> <small> y buscar sorteos</small></button>
      </div><!-- /div .form-group .has-feedback .has-feedback-left -->

    {!!Form::close()!!}
  <!-- End Formulario inicio sesión -->

  <div class="form-group has-feedback has-feedback-left ">
    <a class="btn btn-primary" style='width:100%;' href='{!! url("social/facebook") !!}'>
      <img src="{!! URL::to('/img/users/facebook.png') !!}" width="18px" alt="">
      <span>
        <b>Usa Facebook</b> <small>Para iniciar sesi&oacute;n</small>
      </span>
    </a><!-- /a .btn .btn-primary -->
  </div><!-- /div .form-group .has-feedback .has-feedback-left -->

  <div style="font-size: 0.9em;">
    ¿No tienes una cuenta? <a style="width:100%;" href="/usuarios/create" class="btn btn-warning" role="button"><b>Registrate</b> <small>¡Es gratis y r&aacute;pido!</small></a> <br/>
    @if(Request::path() == 'login')
      ¿Problemas para iniciar sesi&oacute;n? Haz click <a data-toggle="modal" data-target="#myModal" href="#!">Aqu&iacute;</a>
    @endif
  </div><!-- /div -->

</div><!-- /div  -->