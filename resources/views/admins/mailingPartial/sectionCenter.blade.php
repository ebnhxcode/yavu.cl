<div class="list-group">
  <div class="list-group-item">
    ENV&Iacute;O DE EMAILS
  </div><!-- /div .list-group-item -->
  <div class="list-group-item">

    {!!Form::open(['action'=>['MailController@massive'], 'method'=>'POST'])!!}

    <div class='form-group has-feedback has-feedback-left'>
      {!!Form::textarea('emailList',null,['class'=>'form-control','placeholder'=>'Ingresa todos los correos separados por ";"', 'required'=>'required','style'=>'padding: 15px;font-size: 1em;', 'rows'=>'20', 'id'=>'emailList'])!!}
    </div><!-- /div .form-group .has-feedback .has-feedback-left  -->

    {!!Form::submit('enviar', ['class'=>'btn btn-success'])!!}
    {!!Form::close()!!}

  </div><!-- /div .list-group-item -->
</div><!-- /div .list-group -->