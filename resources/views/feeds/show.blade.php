@section('favicon') {!!Html::favicon('favicons/feed.png')!!} @stop
{!!Html::script('js/jquery.js')!!}
{!!Html::script('js/ajax/ParticiparSorteo.js')!!}
@if(isset($feed))
@section('title') Show a feed @stop
@extends('layouts.front')
@section('content')
  <div class="jumbotron">
    <div class="contentMiddle">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          @include('alerts.allAlerts')
        </div><!-- /div .col-md12-sm12-xs12 -->

        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
          @include('feeds.indexPartial.sectionLeft')
        </div><!-- /div .col-md4-sm12-xs12 -->

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
          <div class="list-group">
            <div class="list-group-item">
              <div class="row">
                <div class="col-md-1 col-sm-offset-0 col-xs-offset-0">
                  <a href="/empresas/{!! ($postAuthor = $feed->companyPostAuthor)?$postAuthor->id:'' !!}">
                    <img class='media-object' src='/img/users/{!! ($postAuthor->imagen_perfil!='')?$postAuthor->imagen_perfil:'usuario_nuevo.png' !!}' data-holder-rendered='true' style='width: 36px; height: 36px; border-radius: 10%;'/>
                  </a>
                </div><!-- /div .col-md1-sm-offset-12-xs-offset-12 -->

                <div class="col-xs-12 col-sm-12 col-md-11 col-lg-11">
                  @if($userSession->id==$feed->user_id)
                  <div class="dropdown">
                    <div style="float: right;" class="dropdown">
                      <button class="btn btn-default btn-xs dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        <span class="caret"></span>
                      </button><!-- /button .btn .btn-default .dropdown-toggle -->


                      <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">

                          <li><a href='/feeds/{!!$feed->id!!}/edit'>Editar publicaci&oacute;n</a></li>


                        <!--(user_id==value.user_id?"<li><a onclick='eliminarEstado("+value.id+",0)' href='#!'>Ocultar estado</a></li>":"")-->

                      </ul><!-- /ul .dropdown-menu -->


                    </div><!-- /div .dropdown -->
                  </div><!-- /div .dropdown -->
                  @endif
                  <div class="media-heading">
                    <strong><a href="/empresas/{!! $postAuthor->id !!}" style="color: #3C5B28;">{!! $postAuthor->nombre !!}</a></strong>
                    <strong>·</strong>
                    <small style="font-size: .7em; color: grey;"><abbr class='timeago' id='timeago{!! $feed->id !!}' value='{!! $feed->created_at !!}' title='{!! $feed->created_at !!}'>{!! $feed->created_at !!}</abbr></small>
                  </div>
                  <input type="hidden" name="_token" value="{!!csrf_token()!!}" id="token" />
                  <div id='publicacion{!! $feed->id !!}'>
                    {!! $feed->status !!}
                    <hr>
                    <div style="padding-top: 15px;" name='megusta' class=''>
                      @if($feed->statusRewarded->id!=$userSession->id)
                        @if($cs = $feed->getUserInteraction($userSession->id)->get())
                          <span onclick='Interactuar(this.id)' id='estado_{!! $feed->id !!}' value='e{!! $feed->companyPostAuthor->id !!}' class="btn {!! count($cs)<1?'btn-warning out-yavucoin':'btn-default out-yavucoin' !!} btn-xs" >

                            {!! count($cs)<1?'<span style=" font-family: yavu_font;color: #ffcc00;">J</span>':'<span style=" font-family: yavu_font;color: #000;">I</span>' !!}

                          </span><!-- /span $estado_+$companyStatus->id .btn .btn-sm .btn-default-warning -->
                          <span id="status_{!! $feed->id !!}"></span>
                        @endif
                      @endif
                      <span class="text-info" style="float: right;font-size: 0.7em;">
                        <small>(Author : <a href="/empresas/{!! $postAuthor->id !!}">{!! $postAuthor->nombre !!}</a>)</small>
                      </span><!-- /span .test-info -->
                    </div><!-- /div -->
                  </div><!-- /div #publicacion -->
                </div><!-- /div .col-md11-sm12-xs12 -->
              </div><!-- /div .row -->
            </div><!-- /div .list-group-item -->
            <a href="/feeds" class="list-group-item panel-footer">
              <small>
                <span class="glyphicon glyphicon-chevron-left">
                </span><!-- /span .glyphicon .glyphicon-chevron-left -->
                volver a publicaciones
              </small>
            </a><!-- /div .list-group-item -->
          </div><!-- /div .list-group -->
        </div><!-- /div .col-md6-sm12-xs12 -->

        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
            @include('feeds.indexPartial.sectionRight')
        </div><!-- /div .col-lg3-md3-sm12-xs12 -->

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          {{-- @include('feeds.indexPartial.sectionRight') --}}
        </div><!-- /div .col-lg12-md12-sm12-xs12 -->

      </div><!-- /div .row -->
    </div><!-- /div #contentMiddle -->
  </div><!-- /div .jumbotron -->
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
  function Interactuar(valor) {
    var status_id = valor.replace('estado_', '');
    var e_id = $('#estado_' + status_id).attr('value').replace('e','');
    var user_id = $("#user_id").val();
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
        $('#'+valor).text('');
        $('#'+valor).append('<span style="font-family: yavu_font;color: #000;">I</span>').fadeIn();
        $('#status_'+status_id).append('<span class="text-success"><small>¡Coins obtenidos!</small></span>').hide().fadeIn();
        ContarNotificaciones();
        ContarCoins();
      }
    });
    ContarInteracciones(status_id);
    $('#'+valor).addClass("text-info").fadeIn();
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

</script>
@else
  404
@endif
