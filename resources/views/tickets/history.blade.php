@section('favicon') {!!Html::favicon('favicons/ticket.png')!!} @stop
@section('title') Ticket history @stop
@extends('layouts.front')
@section('content')
<div class="jumbotron">
  <div id="contentMiddle">
    @include('alerts.allAlerts')
    <!--
    <div class="" style="font-size: 3em;">
      <img id="img" style="padding-bottom: 20px;" width="8%" src= "{!!URL::to('img/newGraphics/neo_icono_tickets.png')!!}"/><span> <a href="{!! URL::to('tickets') !!}">Ticket's</a><span class="requerido">\</span> Historial</span>
    </div>
    -->
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
      <!--
        <div class="alert alert-warning alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          Atento al usar tus tickets participar <br>
          <span class="glyphicon glyphicon-tag" style="font-size: 1em; color: #BEF781;"></span>
          <span class="glyphicon glyphicon-resize-horizontal"></span>
          <span class="label label-info">#14</span>&nbsp;(<small class="requerido">Tickets de ejemplo</small>)
        </div>
       -->
      </div>
      <div class="col-md-4 col-sm-12 col-xs-12"><!--style="position:fixed;z-index:1000;"-->
        <div>
          <div>
            <div class="list-group">

              @include('miniDashboard.miniDashboard')

            </div><!-- /div list group -->

          </div><!-- /div panel body -->
        </div><!-- /div panel -->
      </div>

      <div class="col-md-8 col-sm-12 col-xs-12">
        <div>
          <div>

            <div class="list-group">
              <div class="list-group-item list-group-item-success">
                <h5>HISTORIAL DE USO DE TICKETS <span id="resizeUse" name="small" class="glyphicon glyphicon-resize-full" style="float: right;"></span> </h5>
              </div>

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
              </script>

              <div id="insideHistoryUse" class="list-group-item wrap">
                <table id="UserList" class="table table-hover" style="font-size: 0.8em;">
                  <thead>
                  <th>Transaccion</th>
                  <th>Ticket's</th>
                  <th>Momento</th>
                  <th>Sorteo</th>

                  @if(Auth::admin()->check())
                    <th>Operaciones</th>
                  @endif
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
                </table>
              </div>

            </div> <!-- /list group -->
          </div> <!-- /div panel body  -->
        </div> <!-- /Panel historial uso -->

        <div>
          <div>

            <div class="list-group">
              <div class="list-group-item list-group-item-success">
                <h5>HISTORIAL DE COMPRA/GASTO DE TICKETS <span id="resizeBuy" name="small" class="glyphicon glyphicon-resize-full" style="float: right;"></span> </h5>
              </div>

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
              </script>

              <div id="insideHistoryBuy" class="list-group-item wrap">
                <table id="UserList" class="table table-hover" style="font-size: 0.8em;">
                  <thead>
                  <th>Transaccion</th>
                  <th>Coins</th>
                  <th>Tickets</th>
                  <th>Fecha</th>

                  @if(Auth::admin()->check())
                    <th>Operaciones</th>
                  @endif
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
                </table>
              </div><!-- /div insideHistory -->

            </div> <!-- /list group -->
          </div>
        </div> <!-- /Panel historial compra -->

      </div><!-- /div col-md-8 col-sm-12 col-xs-12 -->


    </div><!-- /div row -->
  </div><!-- /div contentMiddle -->
</div><!-- /div jumbotron -->

@stop