@section('favicon') {!!Html::favicon('favicons/company.png')!!} @stop
@section('title') {!! ($empresa[0]->nombre) !!} profile @stop
{!!Html::script('js/jquery.js')!!}
@if(Auth::user()->check())
  {!!Html::script('js/ajax/GestionarEstadosEmpresa.js')!!}
  {!!Html::script('js/ajax/SeguirEmpresa.js')!!}
@endif
<!-- AIzaSyCrcjogGTQUWUOD3Bvp-B1mVzUq0q6WMgU -->

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCrcjogGTQUWUOD3Bvp-B1mVzUq0q6WMgU&libraries=places"></script>

{!!Html::script('js/googlemaps/MakerGoogleMaps.js')!!}

@extends('layouts.front')
@section('content')
<div class="jumbotron">
	<div id="contentMiddle">
    @include('alerts.allAlerts')
		@foreach($empresa as $e)
			<div class="row" style="margin-top:-35px;">
        <div class="col-md-4 col-sm-12 col-xs-12"><!--style="position:fixed;z-index:1000;"-->

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">

              <div class="list-group">
                <div class="list-group-item-full-header">

                  <div class="thumbnail">


                      @if($e->imagen_perfil === "")
                        <img id="ImagenPerfil" src="/img/users/usuario_nuevo.png" class="center-block" class="thumbnail">
                      @else
                        <img id="ImagenPerfil" src="/img/users/{!!$e->imagen_perfil!!}" class="center-block" class="thumbnail" class="img-rounded" width="300px" height="100px" class="img-responsive" >
                      @endif



                      <div class="caption">
                        @if(Auth::user()->check())
                          <div class="list-group">

                            <div>
                              {!!Form::hidden('empresa', $e->nombre, ['id'=>'empresa'])!!}
                              <div>
                                <span class="btn btn-primary btn-sm" id="seguir" value="{!! $e->id !!}" role="button">Seguir</span>
                                <input type="text" class="btn btn-sm text-success" id="seguidores" size="10" disabled >


                                  <div style="float: right;" class="">
                                    @if($e->user_id == Auth::user()->get()->id)
                                    <div class="">
                                      <div class="" >
                                        <div>

                                          <div class="dropdown">
                                            <button class="btn btn-default btn-sm dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                              <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                                              <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu pull-right" aria-labelledby="dropdownMenu1">
                                              <li><a href="{!!URL::to('/feeds')!!}">Inicio</a></li>
                                              <li>
                                                {!!link_to_route('empresas.edit', $title = 'Editar Perfil de Empresa', $parameters = $e->id, $attributes = [])!!}
                                              </li>
                                              <li>
                                                <a href="{!! route('usuarios_edit_path', Auth::user()->get()->id) !!}">Editar Perfil de Usuario</a>
                                              </li>
                                              <li role="separator" class="divider"></li>
                                              <li>
                                                <a href="{!!URL::to('/sorteos/create')!!}" style="text-align:center;" class="">
                                                  <span>
                                                    Crear sorteo <img width="40%" src= "{!!URL::to('img/dash/ico_sorteo01.png')!!}"/>
                                                  </span>
                                                </a>
                                              </li>
                                              <li>
                                                <a href='{!!URL::to('/feeds')!!}' style="text-align:center;" class="">
                                                  <span>
                                                    Publicaciones <img width="40%" src= "{!!URL::to('img/dash/ico_pin03.png')!!}"/>
                                                  </span>
                                                </a>
                                              </li>
                                            </ul>
                                          </div><!-- /div dropdown -->

                                        </div>
                                      </div>
                                    </div>
                                    @endif
                                  </div>


                              </div>
                              @else
                                <p>
                                  <a href="{!! URL::to('/usuarios/create') !!}" class="btn btn-primary btn-sm" role="button">Seguir</a>
                                  <input type="text" class="btn btn-sm text-success" id="seguidores" size="10" disabled >
                                </p>
                                <small>Para seguir a esta empresa debes registrarte</small>
                              @endif
                            </div>

                            <div style="font-size: 1.2em;">
                              <address>
                                <br>
                                <strong>{!! strtoupper("".$e->nombre)!!}.</strong><br />
                                Direcci&oacute;n : {!!$e->direccion!!}<br>
                                Ciudad : {!!$e->ciudad!!}<br>
                                Fono : <abbr title="Phone"></abbr> {!!$e->fono!!}
                              </address>

                              <address>
                                <strong>Contacto: <a href="mailto:#">{!!$e->email!!}</a></strong><br>                             
                              </address>

                              <!--<h3>{!! $e->descripcion !!}</h3>-->
                              <button id='Info' type='button' class='btn btn-info btn-sm' data-container='body' data-toggle='popover' data-placement='top' data-content='{!! $e->descripcion !!}' data-original-title=''> Descripcion
                              </button>

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
              </div>
            </div><!-- /div col-md-7 col-sm-7 col-xs-7 -->

            <div class="col-md-5 col-sm-5 col-xs-5">

            </div><!-- /div col-md-5 col-sm-5 col-xs-5 -->
          </div>


        </div>
				<div class="col-md-8 col-sm-12 col-xs-12">

          <div id="IPortada" class="list-group">
            <div class="thumbnail">
              <!-- Portada -->
              @if($e->imagen_portada === "" )
                <img id="ImagenPortada" src="/img/users/banner.png" alt="...">
              @else
                <img id="ImagenPortada" src="/img/users/{!!$e->imagen_portada!!}" alt="...">
                @endif
                  <!-- /Portada -->
            </div>
          </div>

					{!!Form::hidden('empresa_id', $e->id, ['id'=>'empresa_id'])!!}
          <input type="hidden" name="_token" value="{!! csrf_token() !!}" id="token" />
          @if((Auth::user()->check()))
            @if($e->user_id == Auth::user()->get()->id)
              <div class="list-group">
                <div class="list-group-item">
                  <strong>PUBLICAR NUEVO ESTADO</strong>
                </div>
                <div class="list-group-item">
                  {!!Form::open(['route'=>'estadoempresa.store', 'method'=>'POST'])!!}
                  {!!Form::textarea('status',null,['class'=>'form-control','placeholder'=>'¿Qué deseas compartir en yavu?', 'maxlength'=>'500', 'required'=>'required','style'=>'resize:none;', 'rows'=>'4', 'id'=>'status'])!!}
                  @if(Auth::user()->check())
                    {!!Form::hidden('user_id', Auth::user()->get()->id, ['id'=>'user_id'])!!}
                  @else
                    {!!Form::hidden('user_id', $e->user_id, ['id'=>'user_id'])!!}
                  @endif
                </div>
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
            <div>
              <div id="Estados">
              </div>
              {!!Form::hidden('idUltima', "0", ['id'=>'idUltima'])!!}
            </div>
            <div>
              <div id="msj-estado" class="alert alert-dismissible list-group-item" role="alert" style="display:none;">
                <img width="30%"  src='{!! URL::to('/img/users/iconoCargando.gif') !!}'/>
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
          @endif
		  		<br>
				</div><!-- /div col-md-8 12 12 -->
        <div class="col-md-12 col-sm-12 col-xs-12 ">
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

  function ContarNotificaciones(){
    var user_id = $("#user_id").val();
    $.ajax({
      url: "http://yavu.cl/cargarpops/"+$("#idUltimaNotificacion").val()+"/"+user_id+"/novistas",
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
    var route = "http://yavu.cl/contarcoins";
    var user_id = $("#user_id");
    $.get(route, function(res){
      $(".CantidadCoins").text("");
      $(res).each(function(key,value){
        if(parseInt(value)>0){
          $(".CantidadCoins").append(formatNumber.new(value, "$ "));
        }
      });
    });
    return true;
  }
  function eliminarEstado(id, user_id){
    //console.log( $("#user_id").attr('value')+"/"+user_id);
    user_id = user_id || null;
    var user_anon = $("#user_id").attr('value') || null;


    if( user_anon == user_id){
      var route = "http://yavu.cl/eliminarfeed/"+id;
      $.ajax({
        url: route,
        type: 'GET',
        dataType: 'json',
        success:function(){
          console.log('exito');
          return $("#publicacion"+id).fadeOut();
        }
      });
    }else{
      //console.log(user_anon+"-"+user_id);
      return $("#publicacion"+id).fadeOut();
    }
    return true;
  }

  function Interactuar(valor){
    var status_id = valor.replace('estado_','');
    var user_id = $("#user_id").val();
    var e_id = $('#estado_' + status_id).attr('value').replace('e','');
    var token = $("#token").val();
    var route = "http://yavu.cl/interactuar";
    $.ajax({
      url: route,
      headers: {'X-CSRF-TOKEN': token},
      type: 'POST',
      dataType: 'json',
      data: {
        status_id: status_id,
        user_id: user_id,
        empresa_id: e_id
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
  function ContarInteracciones(status_id){
    status_id = status_id;
    var route = "http://yavu.cl/contarinteracciones/"+status_id;
    var user_id = $("#user_id").val();
    var Contador = 0;
    $.get(route, function(res){
      $(res).each(function(key,value){
        if(value.user_id === user_id){
          //$('#estado_'+status_id).addClass("btn-coins-down").fadeIn();
          //$('#imgcoin'+status_id).attr('src', '/img/newGraphics/cobrar_coins02.png').fadeIn();
          $('#cobrarcoins'+status_id).addClass("text-info").fadeIn();
          //+"<img id='imgcoin"+value.id+"' src='/img/newGraphics/yavucoin_neo01_small01.png' />"
        }
        //Contador += 1;
      });
      //$("#badge_"+status_id).text(Contador);
    });
    return true;
  }



  /*FUNCIONES Y PROCEDIMIENTOS*/

</script>