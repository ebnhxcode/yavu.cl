@section('favicon') {!!Html::favicon('favicons/company.png')!!} @stop
@section('title') {!! ($empresa[0]->nombre) !!} @stop
{!!Html::script('js/jquery.js')!!}
@if(Auth::user()->check())
  {{-- {!!Html::script('js/ajax/GestionarEstadosEmpresa.js')!!} --}}
  {!!Html::script('js/ajax/SeguirEmpresa.js')!!}
@endif
<!-- AIzaSyCrcjogGTQUWUOD3Bvp-B1mVzUq0q6WMgU -->

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCrcjogGTQUWUOD3Bvp-B1mVzUq0q6WMgU&libraries=places"></script>

{!!Html::script('js/googlemaps/MakerGoogleMaps.js')!!}

@extends('layouts.front')
@section('content')
<div class="jumbotron">
	<div class="contentMiddle">
    @include('alerts.allAlerts')
		@foreach($empresa as $e)
			<div class="row" style="margin-top:-35px;">
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4"><!--style="position:fixed;z-index:1000;"-->

          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

              <div class="list-group">
                <div class="list-group-item-full-header">

                  <div class="thumbnail">


                      @if($e->imagen_perfil === "")
                        <img id="ImagenPerfil" src="/img/users/usuario_nuevo.png" class="center-block" class="thumbnail">
                      @else
                        <img id="ImagenPerfil" src="/img/users/{!!$e->imagen_perfil!!}" class="center-block" class="thumbnail" class="img-rounded" width="300px" height="100px" class="img-responsive" >
                      @endif

                        {!! Form::hidden('company_id', $e->id, ['id' => 'company_id']) !!}

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

                                <!-- descripcion en acordeon -->
                              <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-success">
                                  <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                      <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                        Ver Descripción
                                      </a>
                                    </h4>
                                  </div>
                                  <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">
                                      {!! $e->descripcion !!}
                                    </div>
                                  </div>
                                </div>
                              </div> <!-- fin acordeon -->

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

            <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">

            </div><!-- /div col-xs-5 col-sm-5 col-md-5 col-lg-5 -->
          </div>


        </div>
				<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">

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
          <input type="hidden" name="_token" value="{!!csrf_token()!!}" id="token" />
          @include('feeds.indexPartial.sectionCenter')


		  		<br>
				</div><!-- /div col-md-8 12 12 -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
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
      url: "http://186.64.123.143/cargarpops/"+$("#idUltimaNotificacion").val()+"/"+user_id+"/novistas",
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
    var route = "http://186.64.123.143/contarcoins";
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
      var route = "http://186.64.123.143/eliminarfeed/"+id;
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
    var route = "http://186.64.123.143/interactuar";
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
        $('#'+valor).removeClass("btn-warning");
        $('#'+valor).addClass("btn-default");
        $('#'+valor).text('Cobrados');
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
    var route = "http://186.64.123.143/contarinteracciones/"+status_id;
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