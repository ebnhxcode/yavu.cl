{!!Html::script('js/jquery.js')!!}
{!!Html::script('js/ajax/GestionarEstadosEmpresa.js')!!}
{!!Html::script('js/ajax/SeguirEmpresa.js')!!}
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCyB6K1CFUQ1RwVJ-nyXxd6W0rfiIBe12Q&libraries=places"
        type="text/javascript"></script>
{!!Html::script('js/googlemaps/MakerGoogleMaps.js')!!}
@extends('layouts.front')
@section('content')
<div class="jumbotron">
	<div id="contentMiddle">
		@include('alerts.alertFields')
		@foreach($empresa as $e)
			<div class="row" style="margin-top:-35px;">
				<div class="col-sm-8">
					<div class="list-group" >
						<div class="list-group-item-full-header">
							{!!Form::hidden('empresa', $e->nombre, ['id'=>'empresa'])!!}
							<h6>{{ strtoupper("Perfil publico de: ".$e->nombre)}}</h6>
						</div>
						<div class="">
							<div class="thumbnail">
                  <!-- Portada -->
								@if($e->imagen_portada === "" )
									<img id="ImagenPortada" src="http://medioambiente.nh-hoteles.es/themes/default/images/bgd-biodiversidad-00.png" alt="...">
								@else
									<img id="ImagenPortada" src="/img/users/{{$e->imagen_portada}}" alt="...">
								@endif
                  <!-- /Portada -->
                  <!-- Perfil -->
								@if($e->imagen_perfil === "")
									<img id="ImagenPerfil" src="https://image.freepik.com/iconos-gratis/silueta-usuario-masculino_318-35708.png" class="img-circle" alt="...">
								@else
									<img id="ImagenPerfil" src="/img/users/{{$e->imagen_perfil}}" class="img-circle" alt="...">
								@endif
                  <!-- /Perfil -->
                <div class="list-group">
                  <div class="list-group-item-full-header">
                    <h6>DESCRIPCIÓN</h6>
                  </div>
                  <div class="list-group-item">
                    {!! $e->descripcion !!}
                  </div>
                </div>
                <div class="caption">
                  <h6>DATOS</h6>
                  Email : {{$e->email}}<br>
                  Dirección : {{$e->direccion}}<br>
                  Ciudad : {{$e->ciudad}}<br>
                  @if (Auth::user()->check())
                    <p>
                      <span class="btn btn-primary btn-sm" id="seguir" value="{!! $e->id !!}" role="button">Seguir</span>
                      <input type="text" class="btn btn-sm text-success" id="seguidores" size="10" disabled >
                    </p>
                  @else
                    <p>
                      <a href="{!! URL::to('/usuarios/create') !!}" class="btn btn-primary btn-sm" role="button">Seguir</a>
                      <input type="text" class="btn btn-sm text-success" id="seguidores" size="10" disabled >
                    </p>
                    <small>Para seguir a esta empresa debes registrarte</small>
                  @endif
                </div>
              </div>
            </div>
          </div>
					{!!Form::hidden('empresa_id', $e->id, ['id'=>'empresa_id'])!!}
          <input type="hidden" name="_token" value="{!! csrf_token() !!}" id="token" />
          @if(isset(Auth::user()->get()->id) && Auth::user()->get()->id===$e->user_id)
            @if((isset($e) && Auth::user()->check() ) && $e->user_id == Auth::user()->get()->id)
              <div class="list-group">
                <div class="list-group-item-full-header">
                  <h6>PUBLICAR NUEVO ESTADO</h6>
                </div>
                {!!Form::open(['route'=>'estadoempresa.store', 'method'=>'POST'])!!}
                  {!!Form::textarea('status',null,['class'=>'form-control-stat','placeholder'=>'¿Qué deseas compartir en yavu?', 'maxlength'=>'500', 'required'=>'required','style'=>'resize:none;', 'rows'=>'10', 'id'=>'status'])!!}
                  @if(Auth::user()->check())
                    {!!Form::hidden('user_id', Auth::user()->get()->id, ['id'=>'user_id'])!!}
                  @else
                    {!!Form::hidden('user_id', $e->user_id, ['id'=>'user_id'])!!}
                  @endif
                  <div class="list-group-item">
                    {!!link_to('#!', $title="Publicar estado", $attributes = ['id'=>'publicar', 'class'=>'btn btn-success btn-sm'], $secure = null)!!}
                    {!!link_to('#!', $title="Limpiar", $attributes = ['id'=>'limpiar', 'class'=>'btn btn-success btn-sm'], $secure = null)!!}
                  </div>
                  <div class="list-group-item">
                    <div id="msj-success" class="alert alert-success alert-dismissible" role="alert" style="display:none">
                      Publicacion creada correctamente
                    </div>
                    <div id="msj-error" class="alert alert-info alert-dismissible" role="alert" style="display:none">
                      El texto ingresado contiene caracteres no permitidos que no se guardarán.
                    </div>
                  </div>
                  {!!Form::close()!!}
                </div>
            @endif
          @endif
          <div>
            <div id="Estados">
            </div>
            {!!Form::hidden('idUltima', "0", ['id'=>'idUltima'])!!}
          </div>
          <div>
            <div id="msj-estado" class="alert alert-dismissible list-group-item" role="alert" style="display:none;">
              <img width="30%"  src='/images/iconoCargando.gif'/>
            </div>
            <div id='msj-finPublicaciones' class="alert alert-dismissible list-group-item-warning" role="alert" style="display:none;">
                No hay mas publicaciones.
            </div>
            <a id="CargarEstados" href="#!" class="list-group-item list-group-item-info">
              Cargar estados
              <span id="EstadosNuevos" class="badge"></span>
            </a>
          </div>
		  		<br>
				</div>
				<div class="col-sm-4"><!--style="position:fixed;z-index:1000;"-->
					<div class="list-group">
						<div class="list-group-item-full-header">
							<h6>INFORMACIÓN</h6>
						</div>
						<div class="list-group-item">
							Últimas novedades en yavu
						</div>	
						@if(Auth::user()->check())
							{!!link_to_route('usuarios.edit', $title = 'Actualizar mis datos', $parameters = Auth::user()->get()->id, $attributes = ['class'=>'list-group-item list-group-item-info'])!!}
							<a href="{!!URL::to('dashboard')!!}" class="list-group-item list-group-item-warning">Volver a <strong>Inicio</strong></a>
						@endif
					</div>	
					<div class="list-group">
						<div class="list-group-item">
							<h6>ACCESOS RÁPIDOS</h6>
						</div>
						<a class="list-group-item list-group-item-warning" href="{!! URL::to('/feeds') !!}">Ir a publicaciones</a>
            @if(Auth::user()->get()->id == $e->user_id)
						  {!!link_to_route('empresas.edit', $title = 'Modificar datos de mi empresa', $parameters = $e->id, $attributes = ['class'=>'list-group-item list-group-item-info'])!!}
              <a href="{!!URL::to('sorteos/create')!!}" class="list-group-item list-group-item-warning">Crear sorteo nuevo</a>
            @endif
						<a href="{!!URL::to('dashboard')!!}" class="list-group-item list-group-item-warning">Volver a <strong>Inicio</strong></a>
					</div>

					<div class="list-group">                    
						<div class="list-group-item">
							<h6>GRAFICOS</h6>
              <div class="wrapper">
                <div class="counter col_fourth">
                  <i class="fa fa-code fa-2x"></i>
                  <p class="count-text ">Visitas Al Perfil</p>
                  <h2 class="timer count-title" id="count-number" data-to="300" data-speed="1500"></h2>
                </div>
                <div class="counter col_fourth">
                  <i class="fa fa-coffee fa-2x"></i>
                  <p class="count-text ">Impacto Publicaciones</p>
                  <h2 class="timer count-title" id="count-number" data-to="17870" data-speed="1500"></h2>
                </div>
                <div class="counter col_fourth">
                  <i class="fa fa-lightbulb-o fa-2x"></i>
                  <p class="count-text ">Coins Otorgadas</p>
                  <h2 class="timer count-title" id="count-number" data-to="847" data-speed="1500"></h2>
                </div>
              </div>
  					</div>
  				</div>
          <!-- gmaps -->

          <div class="list-group">
            <div class="list-group-item">
              @include('empresas.forms.modalModificarDireccionMapa')
            </div>
          </div>




          <!-- /gmaps -->
			  </div>
  			<br />
      </div>
    @endforeach
  </div>
</div>
@stop
<script>
  var formatNumber = {
    separador: ".", // separador para los miles
    sepDecimal: ',', // separador para los decimales
    formatear:function (num){
      num +='';
      var splitStr = num.split('.');
      var splitLeft = splitStr[0];
      var splitRight = splitStr.length > 1 ? this.sepDecimal + splitStr[1] : '';
      var regx = /(\d+)(\d{3})/;
      while (regx.test(splitLeft)) {
        splitLeft = splitLeft.replace(regx, '$1' + this.separador + '$2');
      }
      return this.simbol + splitLeft  +splitRight;
    },
    new:function(num, simbol){
      this.simbol = simbol ||'';
      return this.formatear(num);
    }
  }
  /*VARIABLES*/
  /*VARIABLES*/


  /*FUNCIONES Y PROCEDIMIENTOS*/
  function ContarInteracciones(status_id){
    status_id = status_id;
    var route = "http://localhost:8000/contarinteracciones/"+status_id;
    var user_id = $("#user_id");
    var Contador = 0;
    $.get(route, function(res){
      $(res).each(function(key,value){
        Contador += 1;
      });
      $("#badge_"+status_id).text(Contador);
    });
  }

  function ContarNotificaciones(){
    var user_id = $("#user_id").val();
    $.ajax({
      url: "http://localhost:8000/cargarpops/"+$("#idUltimaNotificacion").val()+"/"+user_id+"/novistas",
      type: 'GET',
      dataType: 'json',
      cache: false,
      async: true,
      success: function success(data, status) {
        if (data > 0) {
          $("#CantidadNotificaciones").show('fast').text(data);
          //$("#Notificaciones").css('color','#F5A9A9');
        }else{
          $("#CantidadNotificaciones").hide('fast').text("");
          //$("#Notificaciones").css('color','');
        }
      },
      error: function error(xhr, textStatus, errorThrown) {
        //alert('Remote sever unavailable. Please try later');
      }
    });
    return true;
  }
  function ContarCoins(){
    var route = "http://localhost:8000/contarcoins";
    var user_id = $("#user_id");
    $.get(route, function(res){
      $(".CantidadCoins").text("");
      $(res).each(function(key,value){
        if(parseInt(value.coins)>0){
          $(".CantidadCoins").append(formatNumber.new(value.coins, "$ "));
        }
      });
    });
    return true;
  }
  function eliminarEstado(id){
    console.log(id);
    var route = "http://localhost:8000/eliminarfeed/"+id;
    $.ajax({
      url: route,
      type: 'GET',
      dataType: 'json',
      success:function(){
        console.log('exito');
        $("#publicacion"+id).fadeOut();
      }
    });
    return true;
  }
  function Interactuar(valor){
    var status_id = valor.replace('estado_','');
    var user_id = $("#user_id").val();
    var token = $("#token").val();
    var route = "http://localhost:8000/interactuar";
    $.ajax({
      url: route,
      headers: {'X-CSRF-TOKEN': token},
      type: 'POST',
      dataType: 'json',
      data: {
        status_id: status_id,
        user_id: user_id
      },
      success:function(){
        $('#'+valor).addClass("text-info").fadeIn();
        console.log('exito');
        ContarInteracciones(status_id);
        ContarNotificaciones();
        ContarCoins();
      }
    });
    ContarInteracciones(status_id);
    $('#'+valor).removeClass("text-info").fadeIn();
    return true;
  }



  /*FUNCIONES Y PROCEDIMIENTOS*/

</script>