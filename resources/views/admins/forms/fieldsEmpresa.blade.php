<div class="col-sm-8">
  <div class="list-group" >
    <div class="list-group-item">
      <h4>Datos principales</h4>
    </div>
    <div class="list-group-item">
      <div class="form-group has-feedback has-feedback-left">
        (<strong><small><span class="requerido">Requerido</span></small></strong>) {!!Form::label('Nombre Único de empresa:')!!}
        {!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ingrese el nombre de la empresa', 'maxlength' => '100'])!!}
      </div>
      <div class="form-group has-feedback has-feedback-left">
        (<strong><small><span class="requerido">Requerido</span></small></strong>) {!!Form::label('Email:')!!}
        {!!Form::email('email',null,['class'=>'form-control','placeholder'=>'Ingrese email de la empresa', 'maxlength' => '200'])!!}
        <i class="form-control-feedback glyphicon glyphicon-user"></i>
      </div>

      <div class="form-group has-feedback has-feedback-left">
        (<strong><small><span class="requerido">Requerido</span></small></strong>) {!!Form::label('Ciudad:')!!}
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
          $selected = null, ['class' => 'form-control', 'maxlength' => '100'])
        !!}
      </div>
      <div class="form-group has-feedback has-feedback-left">
        (<strong><small><span class="requerido">Requerido</span></small></strong>) {!!Form::label('Descripción:')!!}
        {!!Form::textarea('descripcion',null,['class'=>'form-control','placeholder'=>'Agregue una breve descripción de su empresa', 'maxlength'=>'999', 'rows'=>'5', 'id'=>'descripción'])!!}
      </div>

    </div>
    <!-- GESTION DE LAS FOTOS -->

    <div class="list-group-item">
      <div class="form-group has-feedback has-feedback-left">
        (<strong><small><span class="requerido">Solo jpg, png</span></small></strong>) {!!Form::label('Cambiar foto de perfil: ')!!}<span id="Perfil" ></span><br>
        <div>
          <span class="btn-file btn-sm">
            Buscar imagen{!!Form::file('imagen_perfil', ['id' => 'imagen_perfil',  'maxlength' => '255', 'size' => '2048'])!!}
          </span>
          @if(isset($empresa))
            <img width="15%" id="ImagenPerfil" class="thumbnail img-responsive-centered" src="/img/users/{!! ($empresa->imagen_perfil!="")?$empresa->imagen_perfil:'usuario_nuevo.png'!!}" alt="...">
          @else
            <img width="15%" id="ImagenPerfil" class="thumbnail img-responsive-centered" src="/img/users/usuario_nuevo.png" alt="...">
          @endif
        </div>
      </div>

      <div class="form-group has-feedback has-feedback-left">
        (<strong><small><span class="requerido">Solo jpg, png</span></small></strong>) {!!Form::label('Cambiar foto de portada: ')!!}<span id="Portada"></span><br>
        <div>
          <span class="btn-file btn-sm">
            Buscar imagen{!!Form::file('imagen_portada', ['id' => 'imagen_portada', 'maxlength' => '255', 'size' => '2048'])!!}
          </span>
          @if(isset($empresa))
            <img width="25%" id="ImagenPortada" class="thumbnail img-responsive-centered" src="/img/users/{!! ($empresa->imagen_portada!="")?$empresa->imagen_portada:'banner.png'!!}" alt="...">
          @else
            <img width="25%" id="ImagenPortada" class="thumbnail img-responsive-centered" src="/img/users/banner.png" alt="...">
          @endif
        </div>
      </div>
    </div>

  </div>
</div>


<div class="col-sm-4">
  <div class="list-group" >
    <div class="list-group-item">
      <h4>Datos de Contacto</h4>
    </div>
    <div class="list-group-item">
      <div class="form-group has-feedback has-feedback-left">
        (<strong><small><span class="requerido">Requerido</span></small></strong>) {!!Form::label('Rut:')!!} <small>(Si no lo tiene ingrese su rut personal)</small>
        {!!Form::text('rut',null,['class'=>'form-control','placeholder'=>'Ingrese rut de la empresa', 'id' => 'rut',  'maxlength' => '16'])!!}
        <i class="form-control-feedback glyphicon glyphicon-user"></i>
      </div>

      <div class="form-group has-feedback has-feedback-left">
        (<strong><small><span class="requerido">Requerido</span></small></strong>) {!!Form::label('Dirección:')!!}
        {!!Form::text('direccion',null,['class'=>'form-control','placeholder'=>'Ingrese dirección', 'maxlength' => '100'])!!}
      </div>

      <div class="form-group has-feedback has-feedback-left">
        (<strong><small><span class="requerido">Requerido</span></small></strong>) {!!Form::label('Región:')!!}
        {!!Form::select('region',
          ['I Región' => 'I Región',
          'II Región' => 'II Región',
          'III Región' => 'III Región',
          'IV Región' => 'IV Región',
          'V Región' => 'V Región',
          'VI Región' => 'VI Región',
          'VII Región' => 'VII Región',
          'VIII Región' => 'VIII Región',
          'IX Región' => 'IX Región',
          'X Región' => 'X Región',
          'XI Región' => 'XI Región',
          'XII Región' => 'XII Región',
          'XIII Región' => 'XIII Región',
          'XVI Región' => 'XVI Región',
          'XV Región' => 'XV Región'],
          $selected = null, ['class' => 'form-control', 'maxlength' => '100'])
        !!}
      </div>

      <div class="form-group has-feedback has-feedback-left">
        (<strong><small><span class="requerido">Requerido</span></small></strong>) {!!Form::label('País:')!!}
        {!!Form::select('pais',
          ['Chile' => 'Chile',
          'Argentina' => 'Argentina',
          'Bolivia' => 'Bolivia',
          'Brasil' => 'Brasil',
          'Colombia' => 'Colombia',
          'Ecuador' => 'Ecuador',
          'Mexico' => 'Mexico',
          'Panama' => 'Panama',
          'Paraguay' => 'Paraguay',
          'Venezuela' => 'Venezuela',
          'Uruguay' => 'Uruguay',
          'Otro' => 'Otro'],
          $selected = null, ['class' => 'form-control', 'maxlength' => '100'])
        !!}
      </div>

      <div class="form-group has-feedback has-feedback-left">
        {!!Form::label('Teléfono Movil:')!!}
        {!!Form::text('fono',null,['class'=>'form-control','placeholder'=>'Celular', 'maxlength' => '20'])!!}
      </div>

      <div class="form-group has-feedback has-feedback-left">
        {!!Form::label('Teléfono Fijo:')!!}
        {!!Form::text('fono_2',null,['class'=>'form-control','placeholder'=>'Teléfono fijo', 'maxlength' => '20'])!!}
      </div>

      <div class="form-group has-feedback has-feedback-left">
        (<strong><small><span class="requerido">Requerido</span></small></strong>) {!!Form::label('Nombre del encargado:')!!}
        {!!Form::text('nombre_encargado',null,['class'=>'form-control','placeholder'=>'Encargado de la empresa', 'maxlength' => '100'])!!}
      </div>

      <div class="form-group has-feedback has-feedback-left">
        (<strong><small><span class="requerido">Requerido</span></small></strong>) {!!Form::label('Email cliente:')!!}
        {!!Form::email('user_email',null,['class'=>'form-control','placeholder'=>'Ingrese email del cliente', 'maxlength' => '200'])!!}
        <i class="form-control-feedback glyphicon glyphicon-user"></i>
      </div>

      <div class="form-group has-feedback has-feedback-left">
        {!!Form::label('Estado Empresa:')!!}
        {!!Form::select('estado',
          ['Pendiente' => 'Pendiente',
          'Activo' => 'Activo'],
          $selected = null, ['class' => 'form-control', 'maxlength' => '30'])
        !!}
      </div>

    </div>
  </div>
  <!--</div>-->

  <script>

    $("#rut").change(function(){
      ValidarRut($("#rut").val());
    });

    function ValidarRut(rut){
      console.log("click");
      var route = "http://localhost:8000/validarrutempresa/"+rut+"";
      document.getElementById('FormEmpresa').onsubmit = function() {
        return false;
      }
      $.get(route, function(res){
        if(res === 'registrado'){
          $("#rut").val("");
          $("#rut").focus();
          alert('El rut ya se encuentra registrado');
        }
        if(res !== 'false'){
          $("#rut").val(res);
          document.getElementById('FormEmpresa').onsubmit = function() {
            return true;
          }
        }else{
          $("#rut").val("");
          $("#rut").focus();
          alert('Formato de rut invalido');
        }
      });

    }
    $(".form-control").keyup(function(e){
      //console.log(e.keyCode);
    });
    $(".form-control").change(function(){
      $(this).val(NormalizarInputs(SanearInputs($(this).val())));
    });

    function SanearInputs(Busqueda){
      Busqueda = Busqueda.replace(String.fromCharCode(32), '+');
      Busqueda = Busqueda.replace('     ', '');
      Busqueda = Busqueda.replace('    ', '');
      Busqueda = Busqueda.replace('   ', '');
      Busqueda = Busqueda.replace('  ', '');
      Busqueda = Busqueda.replace('+++', '');
      Busqueda = Busqueda.replace('++', '');
      Busqueda = Busqueda.replace('=', '');
      Busqueda = Busqueda.replace("'or'", '');
      Busqueda = Busqueda.replace("'and'", '');
      Busqueda = Busqueda.replace("script", '');
      Busqueda = Busqueda.replace("/", '');
      Busqueda = Busqueda.replace("'''", '');
      Busqueda = Busqueda.replace("''", '');
      Busqueda = Busqueda.replace("'", '');
      Busqueda = Busqueda.replace('<', '');
      Busqueda = Busqueda.replace('>', '');

      if(Busqueda.indexOf(String.fromCharCode(32)) > -1 || Busqueda.indexOf(String.fromCharCode(219)) > -1 || Busqueda.indexOf(String.fromCharCode(48)) > -1 || Busqueda.indexOf(String.fromCharCode(16)) > -1)
      {
        return SanearInputs(Busqueda);
      }
      console.log(Busqueda.indexOf(String.fromCharCode(187)));

      return Busqueda;
    }
    function NormalizarInputs(Busqueda)
    {
      if (Busqueda.indexOf('+') > -1)
      {
        Busqueda = Busqueda.replace('+', ' ');
        return NormalizarInputs(Busqueda);
      }
      return Busqueda;
    }

    $("#imagen_perfil").change(function(){
      var formato = this.value;
      var formatosPermitidos = ["jpg", "jpeg", "png", "gif"];
      formato = formato.split('.');
      var sizeByte = this.files[0].size;
      var siezekiloByte = parseInt(sizeByte / 1024);
      if((formatosPermitidos.indexOf(formato[1]) < 0) || (siezekiloByte > $(this).attr('size')))
      {

        alert('Formato de imagen invalido o tamaño supera 1 Mega, no se subirá');
        this.value = '';

      }
      else
      {
        $("#Perfil").addClass('btn btn-success btn-xs').text('ok');
      }
    });

    $("#imagen_portada").change(function(){
      var formato = this.value;
      var formatosPermitidos = ["jpg", "jpeg", "png", "gif"];
      formato = formato.split('.');
      var sizeByte = this.files[0].size;
      var siezekiloByte = parseInt(sizeByte / 1024);
      if((formatosPermitidos.indexOf(formato[1]) < 0) || (siezekiloByte > $(this).attr('size')))
      {
        alert('Formato de imagen invalido o tamaño supera 1 Mega, no se subirá');
        this.value = '';
      }
      else
      {
        $("#Portada").addClass('btn btn-success btn-xs').text('ok');
      }
    });



  </script>