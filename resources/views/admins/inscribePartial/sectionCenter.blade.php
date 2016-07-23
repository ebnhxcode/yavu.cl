<div class="list-group">
  <div class="list-group-item">
    ENV&Iacute;O DE EMAILS
  </div><!-- /div .list-group-item -->
  <div class="list-group-item">

    {!!Form::open([route('usuarios_create_path'), 'method'=>'POST', 'files' => true, 'autocomplete' => 'off'])!!}

    <div class='form-group has-feedback has-feedback-left'>

    @include('usuarios.forms.fieldsUserCompletePartial.basicFields')
    @include('usuarios.forms.fieldsUserCompletePartial.advancedFields')
    </div><!-- /div .form-group .has-feedback .has-feedback-left  -->

    {!!Form::submit('Guardar', ['class'=>'btn btn-success'])!!}
    {!!Form::close()!!}

  </div><!-- /div .list-group-item -->
</div><!-- /div .list-group -->