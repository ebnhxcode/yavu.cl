@section('favicon') {!!Html::favicon('favicons/ticket.png')!!} @stop
@section('title') Ticket history @stop
@extends('layouts.front')
@section('content')
<div class="jumbotron">
  <div id="contentMiddle">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        @include('alerts.allAlerts')
      </div><!-- /div .col-md12-sm12-xs12 -->
      <div class="col-md-4 col-sm-12 col-xs-12">
        <div class="list-group">
          @include('miniDashboard.miniDashboard')
        </div><!-- /div .list-group -->
      </div><!-- /div .col-md4-sm12-xs12 -->
      <div class="col-md-8 col-sm-12 col-xs-12">
        <div class="list-group">
          <div class="list-group-item list-group-item-success">
            <h5>HISTORIAL DE USO DE TICKETS
              <span id="resizeUse" name="small" class="glyphicon glyphicon-resize-full" style="float: right;">
              </span><!-- /span #resizeUse .glyphicon .glyphicon-resize-full -->
            </h5>
          </div><!-- /div .list-group-item .success -->
          <script>
            $('#resizeUse').click(function(){
              if($(this).attr('name') == 'small'){
                $('#insideHistoryUse').removeClass('wrap');
                $('#insideHistoryUse').addClass('wrap-long-vertical');
                $(this).removeClass('glyphicon-resize-full');
                $(this).addClass('glyphicon-resize-small');
                $(this).attr('name', 'long');
                return true;
              }else{
                $('#insideHistoryUse').removeClass('wrap-long-vertical');
                $('#insideHistoryUse').addClass('wrap');
                $(this).removeClass('glyphicon-resize-small');
                $(this).addClass('glyphicon-resize-full');
                $(this).attr('name', 'small');
                return true;
              }
            });
          </script><!-- /script for accion with #resizeUse -->
          <div id="insideHistoryUse" class="list-group-item wrap">
            <table id="UserList" class="table table-hover" style="font-size: 0.8em;">
              <thead>
                <th>Transaccion</th>
                <th>Ticket's</th>
                <th>Momento</th>
                <th>Sorteo</th>
              </thead>
              @foreach($registros_participante as $rp)
                <tbody>
                  <td>{!! $rp->id !!}</td>
                  <td>1</td>
                  <td>
                    <abbr class="timeago" id="date{!!$rp->id!!}" title="{!!$rp->created_at!!}"></abbr>
                  </td>
                  <td>{!!$rp->nombre_sorteo!!}</td>
                </tbody>
              @endforeach
            </table><!-- /table #UserList .table .table-hover -->
          </div><!-- /div #insideHistoryUse .list-group-item .wrap -->
        </div> <!-- /div .list-group -->
        <div class="list-group">
          <div class="list-group-item list-group-item-success">
            <h5>HISTORIAL DE COMPRA/GASTO DE TICKETS <span id="resizeBuy" name="small" class="glyphicon glyphicon-resize-full" style="float: right;"></span> </h5>
          </div><!-- /div .list-group-item .success -->
          <script>
            $('#resizeBuy').click(function(){
              if($(this).attr('name') == 'small'){
                $('#insideHistoryBuy').removeClass('wrap');
                $('#insideHistoryBuy').addClass('wrap-long-vertical');
                $(this).removeClass('glyphicon-resize-full');
                $(this).addClass('glyphicon-resize-small');
                $(this).attr('name', 'long');
                return true;
              }else{
                $('#insideHistoryBuy').removeClass('wrap-long-vertical');
                $('#insideHistoryBuy').addClass('wrap');
                $(this).removeClass('glyphicon-resize-small');
                $(this).addClass('glyphicon-resize-full');
                $(this).attr('name', 'small');
                return true;
              }
            });
          </script><!-- /script for accion with #resizeBuy -->
          <div id="insideHistoryBuy" class="list-group-item wrap">
            <table id="UserList" class="table table-hover" style="font-size: 0.8em;">
              <thead>
                <th>Transaccion</th>
                <th>Coins</th>
                <th>Tickets</th>
                <th>Fecha</th>
              </thead>
              @foreach($rtickets as $rticket)
                <tbody>
                <td>{!! $rticket->id !!}</td>
                <td>{!!$rticket->monto!!}</td>
                <td>{!!$rticket->cantidad_tickets!!}</td>
                <td>
                  <abbr class="timeago" id="date{!!$rticket->id!!}" title="{!!$rticket->created_at!!}"></abbr>
                </td>
                </tbody>
              @endforeach
            </table><!-- /table #UserList .table .table-hover -->
          </div><!-- /div #insideHistoryBuy .list-group-item .wrap -->
        </div> <!-- /div .list-group -->
      </div><!-- /div .col-md8-sm12-xs12 -->
    </div><!-- /div .row -->
  </div><!-- /div #contentMiddle -->
</div><!-- /div .jumbotron -->
@stop