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
          @include('feeds.showPartial.sectionCenter')
        </div><!-- /div .col-md6-sm12-xs12 -->

        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
          @include('empresas.indexPartial.sectionRight')
        </div><!-- /div .col-lg3-md3-sm12-xs12 -->

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

</script>
@else
  404
@endif
