@extends('layouts.front')
@section('content')
  <div class="jumbotron">
  <div class="jumbotron">
    <div id="contentMiddle">
      @include('alerts.alertFields')
      @include('alerts.errorsMessage')
      @include('alerts.successMessage')
      @include('alerts.warningMessage')
      <div class="" style="font-size: 3em;">
        <img id="img" width="8%" src= "{!!URL::to('img/dash/ico_sorteo01.png')!!}"/><span >Ticket's <span class="requerido">\</span> Historial</span>
      </div>
      <div class="row">
        <div class="col-sm-4"><!--style="position:fixed;z-index:1000;"-->
          <div class="panel panel-default">
            <div class="panel-body">
              <div class="list-group">
                <div class="list-group-item list-group-item-success">
                  FILTRO DE BÚSQUEDA
                </div>
                <div class="list-group-item">
                  @if(Auth::admin()->check())
                    {!!Form::text('nombre',null,['class' => 'form-control buscar', 'placeholder' => 'buscar sorteo','id'=>'nombre_sorteo', 'aria-describedby' => 'sizing-addon1'])!!}
                  @elseif(Auth::user()->check() || !Auth::user()->check())
                    <input id='user_id' value='{!! Auth::user()->get()->id !!}' type='hidden' />
                    {!!Form::text('nombre',null,['class' => 'form-control buscar', 'placeholder' => 'buscar sorteo','id'=>'sorteothumb', 'aria-describedby' => 'sizing-addon1'])!!}
                  @endif
                </div>
                <div class='list-group-item'>
                  <div class='row'>

                    <div class='col-md-4 col-sm-4 col-xs-4'>
                      <div class='list-group'>
                        <div>
                          <a href='{!!URL::to('/sorteos/create')!!}' style='text-align:center;' class='list-group-item list-group-item-info'>
												<span>
													<img width='80%' src= '{!!URL::to('img/dash/ico_sorteo01.png')!!}'/>
												</span>
                          </a>
                        </div>
                        <div align='center'><small>Crear sorteo</small></div>
                      </div>
                    </div>

                    <div class='col-md-4 col-sm-4 col-xs-4'>
                      <div class='list-group'>
                        <div>
                          <a href='{!!URL::to('/sorteos')!!}' style='text-align:center;' class='list-group-item list-group-item-info'>
												<span>
													<img width='80%' src= '{!!URL::to('img/dash/ico_sorteo01.png')!!}'/>
												</span>
                          </a>
                        </div>
                        <div align='center'><small>Sorteos</small></div>
                      </div>
                    </div>

                    <div class='col-md-4 col-sm-4 col-xs-4'>
                      <div class='list-group' >
                        <div>
                          <a href='{!!URL::to('/feeds')!!}' style="text-align:center;" class="list-group-item list-group-item-info">
												<span>
													<img width="80%" src= "{!!URL::to('img/dash/ico_pin03.png')!!}"/>
												</span>
                          </a>
                        </div>
                        <div align="center"><small>Publicaciones</small></div>
                      </div>
                    </div>

                    <div class='col-md-4 col-sm-4 col-xs-4'>
                      <div class='list-group' >
                        <div>
                          <a href='{!!URL::to('/coins/history')!!}' style="text-align:center;" class="list-group-item list-group-item-info">
												<span>
													<img width="80%" src= "{!!URL::to('img/dash/ico_notificacion004.png')!!}"/>
												</span>
                          </a>
                        </div>
                        <div align="center"><small>Informe Coins</small></div>
                      </div>
                    </div>

                    <div class='col-md-4 col-sm-4 col-xs-4'>
                      <div class='list-group' >
                        <div>
                          <a href='{!!URL::to('/tickets/history')!!}' style="text-align:center;" class="list-group-item list-group-item-info">
												<span>
													<img width="80%" src= "{!!URL::to('img/dash/icono_informe01.png')!!}"/>
												</span>
                          </a>
                        </div>
                        <div align="center"><small>Informe Ticket's</small></div>
                      </div>
                    </div>


                </div>
                <div class="list-group">


                </div>
                </div>

                <div class="list-group-item">

                  <div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    Atento al usar tus tickets participar <br>
                    <span class="glyphicon glyphicon-tag" style="font-size: 1em; color: #BEF781;"></span>
                    <span class="glyphicon glyphicon-resize-horizontal"></span>
                    <span class="label label-info">#14</span>&nbsp;(<small class="requerido">Tickets de ejemplo</small>)
                  </div>

                </div>
              </div>

            </div>
          </div><!-- /panel -->

        </div>
        <div class="col-md-8 col-sm-12 col-xs-12">
          <div class="panel panel-default">
            <div class="panel-body">

              <div class="list-group">
                <div class="list-group-item list-group-item-success">
                  COMPRA TUS TICKET'S A <span class="label label-warning">$ 100</span>
                </div>
                <div class="list-group-item">
                  {!!Form::select('size', [1=>1,5=>5,10=>10,15=>15], null, ['placeholder' => 'Seleciona la cantidad...','id' => 'cantidadtickets', 'class' => 'form-control'])!!}
                  <br>
                  <button type="button" style="width: 100%" id='comprar' class="btn btn-primary btn-md comprar">Comprar ticket</button>
                  <input type="hidden" name="_token" value="{!!csrf_token()!!}" id="token" />
                  <input type="hidden" value="{!!Auth::user()->get()->id!!}" id="user_id" />
                </div>
              </div>
            </div>
          </div>

          <div class="panel panel-default">
            <div class="panel-body">

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
            </div>
          </div> <!-- /Panel historial -->

          <div class="panel panel-default">
            <div class="panel-body">

              <div class="list-group">
                <div class="list-group-item list-group-item-success">
                  <h5>HISTORIAL DE COMPRA DE TICKETS <span id="resizeBuy" name="small" class="glyphicon glyphicon-resize-full" style="float: right;"></span> </h5>
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
                </div>

              </div> <!-- /list group -->
            </div>
          </div> <!-- /Panel historial -->

        </div>


      </div>
    </div>

@stop