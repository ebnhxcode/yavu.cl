<div class="list-group-item">
  <div class="form-group has-feedback has-feedback-left">
    {!!Form::label('Titulo para el enlace:')!!}
    {!!Form::text('titulo_link1',null,['class'=>'form-control','placeholder'=>'Ingrese el titulo para el enlace', 'maxlength' => '1000'])!!}
  </div><!-- /div .form-group .has-feedback .has-feedback-left -->


  <div class="form-group has-feedback has-feedback-left">
    {!!Form::label('Link 1:')!!}
    {!!Form::text('link1',null,['class'=>'form-control','placeholder'=>'Ingrese el link 1', 'maxlength' => '100', 'required'])!!}
  </div><!-- /div .form-group .has-feedback .has-feedback-left -->

  <div class="form-group has-feedback has-feedback-left">
    {!!Form::label('Titulo para el enlace 2:')!!}
    {!!Form::text('titulo_link2',null,['class'=>'form-control','placeholder'=>'Ingrese el titulo para el enlace', 'maxlength' => '1000', 'required'])!!}
  </div><!-- /div .form-group .has-feedback .has-feedback-left -->

  <div class="form-group has-feedback has-feedback-left">
    {!!Form::label('Link 2:')!!}
    {!!Form::text('link2',null,['class'=>'form-control','placeholder'=>'Ingrese el link 2', 'maxlength' => '100', 'required'])!!}
  </div><!-- /div .form-group .has-feedback .has-feedback-left -->
</div><!-- /div .list-group-item -->
