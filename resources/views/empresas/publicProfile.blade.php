@section('favicon') {!!Html::favicon('favicons/company.png')!!} @stop
@section('title') {!! ($e->nombre) !!} @stop
{!!Html::script('js/jquery.js')!!}
<!-- AIzaSyCrcjogGTQUWUOD3Bvp-B1mVzUq0q6WMgU -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCrcjogGTQUWUOD3Bvp-B1mVzUq0q6WMgU&libraries=places"></script>
{!!Html::script('js/googlemaps/MakerGoogleMaps.js')!!}
@extends('layouts.front')
@section('content')
<div class="jumbotron">
	<div class="contentMiddle">
    <div class="row" style="margin-top:-35px;">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
        @include('alerts.allAlerts')
      </div><!-- /div .col-xs12-sm12-md12-lg12-->

      <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"><!--style="position:fixed;z-index:1000;"-->
        @include('empresas.publicProfilePartial.sectionLeft')
      </div><!-- /div .col-xs12-sm12-md3-lg3-->

      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        @include('empresas.publicProfilePartial.sectionCenter')
      </div><!-- /div .col-xs12-sm12-md6-lg6-->

      <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
        <!-- agregar algo aquí -->

        <!-- MetisMenu CSS -->
        {!!Html::style('/css/chat/vendor/metisMenu/metisMenu.min.css')!!}
          <!-- Custom CSS -->
        {!!Html::style('/css/chat/dist/css/sb-admin-2.css')!!}
          <!-- Morris Charts CSS -->
        {!!Html::style('/css/chat/vendor/morrisjs/morris.css')!!}
          <!-- Custom Fonts -->
        {!!Html::style('/css/chat/vendor/font-awesome/css/font-awesome.min.css')!!}

        <div style=" width:280px; z-index: 2000; padding:0;margin:0;" class="chat-panel {{--panel--}} panel panel-default">

          <div>

            <!-- Nav tabs -->
            <ul class="nav nav-tabs row" role="tablist">
              <li class="col-xs-6 col-sm-6 col-md-6 col-lg-6" role="presentation" class="active">
                <a href="#home" aria-controls="home" role="tab" data-toggle="tab">Ahora</a>
              </li><!-- .col-lg6-md6-sm6-xs6 -->
              <li class="col-xs-6 col-sm-6 col-md-6 col-lg-6" role="presentation">
                <a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Promociones</a>
              </li><!-- .col-lg6-md6-sm6-xs6 -->

              @if($e->user_id == $userSession->id)
                <li class="col-xs-6 col-sm-6 col-md-6 col-lg-6" role="presentation">
                  <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Archivados</a>
                </li><!-- .col-lg6-md6-sm6-xs6 -->

                <li class="col-xs-6 col-sm-6 col-md-6 col-lg-6" role="presentation">
                  <a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Configuración</a>
                </li><!-- .col-lg6-md6-sm6-xs6 -->

              @endif
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">

              <div role="tabpanel" class="tab-pane active" id="home">
                <div class="panel-heading">
                  <i class="fa fa-comments fa-fw"></i> Chat
                  <div class="btn-group pull-right">
                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                      <i class="fa fa-chevron-down"></i>
                    </button>
                    <ul class="dropdown-menu slidedown">
                      <li>
                        <a href="#">
                          <i class="fa fa-refresh fa-fw"></i> Refresh
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-check-circle fa-fw"></i> Available
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-times fa-fw"></i> Busy
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-clock-o fa-fw"></i> Away
                        </a>
                      </li>
                      <li class="divider"></li>
                      <li>
                        <a href="#">
                          <i class="fa fa-sign-out fa-fw"></i> Sign Out
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                  <ul class="chat">
                    <li class="left clearfix">
                <span class="chat-img pull-left">
                    <img src="http://placehold.it/50/55C1E7/fff" alt="User Avatar" class="img-circle" />
                </span>
                      <div class="chat-body clearfix">
                        <div class="header">
                          <strong class="primary-font">Jack Sparrow</strong>
                          <small class="pull-right text-muted">
                            <i class="fa fa-clock-o fa-fw"></i> 12 mins ago
                          </small>
                        </div>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                      </div>
                    </li>
                    <li class="right clearfix">
                <span class="chat-img pull-right">
                    <img src="http://placehold.it/50/FA6F57/fff" alt="User Avatar" class="img-circle" />
                </span>
                      <div class="chat-body clearfix">
                        <div class="header">
                          <small class=" text-muted">
                            <i class="fa fa-clock-o fa-fw"></i> 13 mins ago</small>
                          <strong class="pull-right primary-font">Bhaumik Patel</strong>
                        </div>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                      </div>
                    </li>
                    <li class="left clearfix">
                <span class="chat-img pull-left">
                    <img src="http://placehold.it/50/55C1E7/fff" alt="User Avatar" class="img-circle" />
                </span>
                      <div class="chat-body clearfix">
                        <div class="header">
                          <strong class="primary-font">Jack Sparrow</strong>
                          <small class="pull-right text-muted">
                            <i class="fa fa-clock-o fa-fw"></i> 14 mins ago</small>
                        </div>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                      </div>
                    </li>
                    <li class="right clearfix">
                <span class="chat-img pull-right">
                    <img src="http://placehold.it/50/FA6F57/fff" alt="User Avatar" class="img-circle" />
                </span>
                      <div class="chat-body clearfix">
                        <div class="header">
                          <small class=" text-muted">
                            <i class="fa fa-clock-o fa-fw"></i> 15 mins ago</small>
                          <strong class="pull-right primary-font">Bhaumik Patel</strong>
                        </div>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                      </div>
                    </li>
                  </ul>
                </div>
                <!-- /.panel-body -->
                <div class="panel-footer">
                  <div class="input-group">
                    <input id="btn-input" type="text" class="form-control input-sm" placeholder="Type your message here..." />
              <span class="input-group-btn">
                  <button class="btn btn-warning btn-sm" id="btn-chat">
                    Send
                  </button>
              </span>
                  </div>
                </div>
                <!-- /.panel-footer -->
              </div>

              <div role="tabpanel" class="tab-pane" id="profile">
                <div class="panel-heading">
                  <i class="fa fa-comments fa-fw"></i> Chat
                  <div class="btn-group pull-right">
                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                      <i class="fa fa-chevron-down"></i>
                    </button>
                    <ul class="dropdown-menu slidedown">
                      <li>
                        <a href="#">
                          <i class="fa fa-refresh fa-fw"></i> Refresh
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-check-circle fa-fw"></i> Available
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-times fa-fw"></i> Busy
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-clock-o fa-fw"></i> Away
                        </a>
                      </li>
                      <li class="divider"></li>
                      <li>
                        <a href="#">
                          <i class="fa fa-sign-out fa-fw"></i> Sign Out
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                  <ul class="chat">
                    <li class="left clearfix">
                <span class="chat-img pull-left">
                    <img src="http://placehold.it/50/55C1E7/fff" alt="User Avatar" class="img-circle" />
                </span>
                      <div class="chat-body clearfix">
                        <div class="header">
                          <strong class="primary-font">Jack Sparrow</strong>
                          <small class="pull-right text-muted">
                            <i class="fa fa-clock-o fa-fw"></i> 12 mins ago
                          </small>
                        </div>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                      </div>
                    </li>
                    <li class="right clearfix">
                <span class="chat-img pull-right">
                    <img src="http://placehold.it/50/FA6F57/fff" alt="User Avatar" class="img-circle" />
                </span>
                      <div class="chat-body clearfix">
                        <div class="header">
                          <small class=" text-muted">
                            <i class="fa fa-clock-o fa-fw"></i> 13 mins ago</small>
                          <strong class="pull-right primary-font">Bhaumik Patel</strong>
                        </div>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                      </div>
                    </li>
                    <li class="left clearfix">
                <span class="chat-img pull-left">
                    <img src="http://placehold.it/50/55C1E7/fff" alt="User Avatar" class="img-circle" />
                </span>
                      <div class="chat-body clearfix">
                        <div class="header">
                          <strong class="primary-font">Jack Sparrow</strong>
                          <small class="pull-right text-muted">
                            <i class="fa fa-clock-o fa-fw"></i> 14 mins ago</small>
                        </div>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                      </div>
                    </li>
                    <li class="right clearfix">
                <span class="chat-img pull-right">
                    <img src="http://placehold.it/50/FA6F57/fff" alt="User Avatar" class="img-circle" />
                </span>
                      <div class="chat-body clearfix">
                        <div class="header">
                          <small class=" text-muted">
                            <i class="fa fa-clock-o fa-fw"></i> 15 mins ago</small>
                          <strong class="pull-right primary-font">Bhaumik Patel</strong>
                        </div>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                      </div>
                    </li>
                  </ul>
                </div>
                <!-- /.panel-body -->
                <div class="panel-footer">
                  <div class="input-group">
                    <input id="btn-input" type="text" class="form-control input-sm" placeholder="Type your message here..." />
              <span class="input-group-btn">
                  <button class="btn btn-warning btn-sm" id="btn-chat">
                    Send
                  </button>
              </span>
                  </div>
                </div>
                <!-- /.panel-footer -->
              </div>

              <div role="tabpanel" class="tab-pane" id="messages">

              </div>

              <div role="tabpanel" class="tab-pane" id="settings">

              </div>
            </div>

          </div>


        </div>

      </div><!-- /div .col-xs12-sm12-md3-lg3-->

      <br />
    </div><!-- /div .row styled -->
  </div><!-- /div .contentMiddle -->
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
  /*VARIABLES*/
  /*VARIABLES*/


  /*FUNCIONES Y PROCEDIMIENTOS*/

  function ContarNotificaciones(){
    var user_id = $("#user_id").val();
    $.ajax({
      url: "http://yavu.local/cargarpops/"+$("#idUltimaNotificacion").val()+"/"+user_id+"/novistas",
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
    var route = "http://yavu.local/contarcoins";
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
      var route = "http://yavu.local/eliminarfeed/"+id;
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

  function Interactuar(valor) {
    var status_id = valor.replace('estado_', '');
    var e_id = $('#estado_' + status_id).attr('value').replace('e','');
    var user_id = $("#user_id").val();
    var token = $("#token").val();
    var route = "http://yavu.local/interactuar";
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
        $('#'+valor).append('<span style="font-family: yavu_font;color: #ffcb5f;">I</span>').fadeIn(1000);
        $('#status_'+status_id).append('<span class="text-success"><small>¡Coins obtenidos!</small></span>').hide().fadeIn(1000);


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
    var route = "http://yavu.local/contarinteracciones/"+status_id;
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