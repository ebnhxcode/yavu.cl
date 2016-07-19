<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
    <div class='form-group has-feedback has-feedback-left'>
      <b>Nombre</b>
      {!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ingrese su nombre','required'=>'required'])!!}
    </div><!-- /div .form-group .has-feedback .has-feedback-left  -->
  </div><!-- /div .col-xs12-sm12-md6-lg6 -->
  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
    <div class='form-group has-feedback has-feedback-left'>
      <b>Apellido</b>
      {!!Form::text('apellido',null,['class'=>'form-control','placeholder'=>'Ingrese su apellido','required'=>'required'])!!}
    </div><!-- /div .form-group .has-feedback .has-feedback-left  -->
  </div><!-- /div .col-xs12-sm12-md6-lg6 -->
  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
    <div class='form-group has-feedback has-feedback-left'>
      <b>Email</b>
      {!!Form::email('email',null,['class'=>'form-control','placeholder'=>'Ingrese su email','required'=>'required'])!!}
    </div><!-- /div .col-xs12-sm12-md6-lg6 -->
  </div><!-- /div .col-xs12-sm12-md6-lg6 -->
  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
    <div class='form-group has-feedback has-feedback-left'>
      <b>Clave</b>
      {!!Form::password('password',['class'=>'form-control','placeholder'=>'Ingrese una clave'])!!}
    </div><!-- /div .col-xs12-sm12-md6-lg6 -->
  </div><!-- /div .col-xs12-sm12-md6-lg6 -->
</div><!-- /div .row -->