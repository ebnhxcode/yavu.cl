<div class="list-group">
  <div class="list-group-item panel-success">
    <small>Informaci&oacute;n b&aacute;sica de contacto</small>
  </div><!-- /div .list-group-item .panel-success -->

  <div class='list-group-item panel-success'>
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
        <div class='form-group has-feedback has-feedback-left'>
          {!!Form::text('nombre',null,['class'=>'form-control input-sm','placeholder'=>'Nombre', 'maxlength' => '100', 'required'])!!}
        </div><!-- /div .form-group .has-feedback .has-feedback-left  -->
      </div><!-- /div .col-lg6-md6-sm6-xs6 -->
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
        <div class='form-group has-feedback has-feedback-left'>
          {!!Form::text('apellido',null,['class'=>'form-control input-sm','placeholder'=>'Apellido', 'maxlength' => '100', 'required'])!!}
        </div><!-- /div .form-group .has-feedback .has-feedback-left  -->
      </div><!-- /div .col-lg6-md6-sm6-xs6 -->
    </div><!-- /div .row -->

    <div class='form-group has-feedback has-feedback-left'>
      {!!Form::text('login',null,['class'=>'form-control input-sm','placeholder'=>'Nombre de usuario', 'maxlength' => '100', 'required'])!!}
    </div><!-- /div .form-group .has-feedback .has-feedback-left  -->

    <div class='form-group has-feedback has-feedback-left'>
      <div class="input-group input-group-sm">
        {!!Form::email('email',null,['class'=>'form-control','placeholder'=>'Ingrese su email', 'maxlength' => '200', 'required'])!!}
        <div class="input-group-addon">
          <i class="glyphicon glyphicon-user"></i>
        </div><!-- /div .input-group-addon -->
      </div><!-- /div .input-group .input-group-sm -->
    </div><!-- /div .form-group .has-feedback .has-feedback-left  -->

    <div class='form-group has-feedback has-feedback-left'>
      <div class="input-group input-group-sm">
        {!!Form::password('password',['class'=>'form-control','placeholder'=>(Auth::user()->check())?'Cambiar clave':'Ingrese una clave', 'maxlength' => '100', 'required'])!!}
        <div class="input-group-addon">
          <i class="glyphicon glyphicon-lock"></i>
        </div><!-- /div .input-group-addon -->
      </div><!-- /div .input-group .input-group-sm -->
    </div><!-- /div .form-group .has-feedback .has-feedback-left  -->

    <div class='form-group has-feedback has-feedback-left'>
      <div class="input-group input-group-sm">
        {!!Form::date('fecha_nacimiento',null,['class'=>'form-control input-sm','placeholder'=>'', 'maxlength' => '100', 'required'])!!}
        <span class="softText-descriptions">(D&iacute;a/Mes/A&ntilde;o)</span>
        <div class="input-group-addon">
          Fecha de nacimiento
        </div><!-- /div .input-group-addon -->
      </div><!-- /div .input-group .input-group-sm -->
    </div><!-- /div .form-group .has-feedback .has-feedback-left  -->

    <div class='form-group has-feedback has-feedback-left'>
      {!!Form::text('fono',null,['class'=>'form-control input-sm','placeholder'=>'Tel&eacute;fono', 'maxlength' => '16', 'required'])!!}
      <span class="softText-descriptions"><small>Podr&iacute;as ser un ganador</small></span>
    </div><!-- /div .form-group .has-feedback .has-feedback-left  -->

    @if($userActive = Auth::user()->check())

      <div class='form-group has-feedback has-feedback-left'>
        {!!Form::text('fono_2',null,['class'=>'form-control input-sm','placeholder'=>'Tel&eacute;fono secundario', 'maxlength' => '16'])!!}
      </div><!-- /div .form-group .has-feedback .has-feedback-left  -->

      <div class='form-group has-feedback has-feedback-left'>
        {!!Form::text('rut',null,['class'=>'form-control input-sm','placeholder'=>'Rut', 'id' => 'rut', 'maxlength' => '16'])!!}
      </div><!-- /div .form-group .has-feedback .has-feedback-left  -->

      <div class='form-group has-feedback has-feedback-left'>
        {!!Form::select('sexo',
          ['Masculino' => 'Masculino',
          'Femenino' => 'Femenino',
          'Otro' => 'Otro'],
          $selected = null, ['class' => 'form-control input-sm', 'maxlength' => '10'])
        !!}
      </div><!-- /div .form-group .has-feedback .has-feedback-left  -->

    @endif
  </div><!-- /div .list-group-item .panel-success -->
  {{--
  <div class="list-group-item list-group-item-info panel-success">
    <small>Con esta informaci&oacute;n te podremos ubicar si resultas ganador dentro de los Yavüsorteos!</small>
  </div><!-- /div .list-group-item .list-group-item-info .panel-success -->
  --}}
</div><!-- /div .list-group -->

@if($userActive)
  <script>

    $('#rut').change(function(){
      ValidarRut($('#rut').val());
    });
    $('#rut').keyup(function(e){
      if (e.keyCode === 13){
        ValidarRut($('#rut').val());
      }
    });
    $('.form-control').keyup(function(e){
    });
    function ValidarRut(rut){
      console.log('click');
      var route = 'http://localhost:8000/validarrutusuario/'+rut+'';
      document.getElementById('FormUsuario').onsubmit = function() {
        return false;
      }
      $.get(route, function(res){

        if(res !== 'false'){
          $('#rut').val(res);
          document.getElementById('FormUsuario').onsubmit = function() {
            return true;
          }
        }else{
          $('#rut').val('');
          $('#rut').focus();
          alert('Formato de rut invalido');

        }
      });
    }


  </script>
@endif