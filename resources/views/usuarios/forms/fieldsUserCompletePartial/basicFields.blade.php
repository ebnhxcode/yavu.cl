<div class="list-group">
  <div class="list-group-item panel-success">
    <small>Informaci&oacute;n b&aacute;sica de contacto</small>
  </div><!-- /div .list-group-item .panel-success -->

  <div class='list-group-item panel-success'>
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
        <div class='form-group has-feedback has-feedback-left'>
          {!!Form::text('nombre',null,['class'=>'form-control input-sm','placeholder'=>'Nombre', 'maxlength' => '100'])!!}
        </div><!-- /div .form-group .has-feedback .has-feedback-left  -->
      </div><!-- /div .col-lg6-md6-sm6-xs6 -->
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
        <div class='form-group has-feedback has-feedback-left'>
          {!!Form::text('apellido',null,['class'=>'form-control input-sm','placeholder'=>'Apellido', 'maxlength' => '100'])!!}
        </div><!-- /div .form-group .has-feedback .has-feedback-left  -->
      </div><!-- /div .col-lg6-md6-sm6-xs6 -->
    </div><!-- /div .row -->

    <div class='form-group has-feedback has-feedback-left'>
      <div class="input-group input-group-sm">
        {!!Form::email('email',null,['class'=>'form-control','placeholder'=>'Ingrese su email', 'maxlength' => '200'])!!}
        <div class="input-group-addon">
          <i class="glyphicon glyphicon-user"></i>
        </div><!-- /div .input-group-addon -->
      </div><!-- /div .input-group .input-group-sm -->
    </div><!-- /div .form-group .has-feedback .has-feedback-left  -->

    <div class='form-group has-feedback has-feedback-left'>
      <div class="input-group input-group-sm">
        {!!Form::password('password',['class'=>'form-control','placeholder'=>'Ingrese una password', 'maxlength' => '100'])!!}
        <div class="input-group-addon">
          <i class="glyphicon glyphicon-lock"></i>
        </div><!-- /div .input-group-addon -->
      </div><!-- /div .input-group .input-group-sm -->
    </div><!-- /div .form-group .has-feedback .has-feedback-left  -->
  </div><!-- /div .list-group-item .panel-success -->

  {{--
  <div class="list-group-item list-group-item-info panel-success">
    <small>Con esta informaci&oacute;n te podremos ubicar si resultas ganador dentro de los Yavüsorteos!</small>
  </div><!-- /div .list-group-item .list-group-item-info .panel-success -->
  --}}
</div><!-- /div .list-group -->