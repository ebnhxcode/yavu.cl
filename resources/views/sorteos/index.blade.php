{!!Html::script('js/jquery.js')!!}
{!!Html::script('js/ajax/BuscarSorteo.js')!!}
{!!Html::script('js/ajax/ParticiparSorteo.js')!!}
@extends('layouts.front')
@section('content')
<div class="jumbotron">
  <div id="contentMiddle">
    @include('alerts.alertFields')
    @include('alerts.errorsMessage')
    @include('alerts.successMessage')
    @include('alerts.warningMessage')
      <div class="" style="font-size: 3em;">
        <img id="img" width="8%" src= "{!!URL::to('img/dash/ico_sorteo01.png')!!}"/><span>Sorteos</span>
      </div>
      <div class="row">
        <div class="col-md-4 col-sm-12 col-xs-12">
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
                    <input id="user_id" value="{!! Auth::user()->get()->id !!}" type="hidden" />
                    {!!Form::text('nombre',null,['class' => 'form-control buscar', 'placeholder' => 'buscar sorteo','id'=>'sorteothumb', 'aria-describedby' => 'sizing-addon1'])!!}
                  @endif
                </div>

                <div class="list-group-item">
                  <div class="row">

                    <div class="col-md-4 col-sm-4 col-xs-4">
                      <div class="list-group" >
                        <div>
                          <a href="{!!URL::to('/sorteos/create')!!}" style="text-align:center;" class="list-group-item list-group-item-info">
										<span>
											<img width="80%" src= "{!!URL::to('img/dash/ico_sorteo01.png')!!}"/>
										</span>
                          </a>
                        </div>
                        <div align="center"><small>Crear sorteo</small></div>
                      </div>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-4">
                      <div class="list-group" >
                        <div>
                          <a href="{!!URL::to('/tickets')!!}" style="text-align:center;" class="list-group-item list-group-item-info">
										<span>
											<img width="80%" src= "{!!URL::to('img/dash/ico_ticket01.png')!!}"/>
										</span>
                          </a>
                        </div>
                        <div align="center"><small>Tickets</small></div>
                      </div>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-4">
                      <div class="list-group" >
                        <div>
                          <a href="{!!URL::to('/feeds')!!}" style="text-align:center;" class="list-group-item list-group-item-info">
										<span>
											<img width="80%" src= "{!!URL::to('img/dash/ico_pin03.png')!!}"/>
										</span>
                          </a>
                        </div>
                        <div align="center"><small>Publicaciones</small></div>
                      </div>
                    </div>
                    {{--
                    <div class="col-md-4 col-sm-4 col-xs-4">
                      <div class="list-group">

                        <div class="row">
                          <div class="col-md-4 col-sm-4 col-xs-4">
                            <div class="list-group" >
                              <div>
                                <a href="{!!URL::to('/feeds')!!}" style="text-align:center;" class="list-group-item list-group-item-info">
                                <span>
                                  <img width="20%" src= "{!!URL::to('img/dash/ico_pin03.png')!!}"/>
                                </span>
                                </a>
                              </div>
                            </div>
                          </div>

                          <div class="col-md-4 col-sm-4 col-xs-4">
                            <div class="list-group" >
                              <a href="{!!URL::to('/empresas')!!}" style="text-align:center;" class="list-group-item list-group-item-warning">
                              <span>
                                <img width="20%" src= "{!!URL::to('img/dash/ico_empresa.png')!!}" class=""/>
                              </span>
                              </a>
                            </div>
                          </div>

                          <div class="col-md-4 col-sm-4 col-xs-4">
                            <div class="list-group" >
                              <a href="{!!URL::to('/empresas/create')!!}" style="text-align:center;" class="list-group-item list-group-item-warning">
                              <span>
                                <img width="20%" src= "{!!URL::to('img/dash/ico_empresa.png')!!}" class=""/>
                              </span>
                              </a>
                            </div>
                          </div>

                          <div class="col-md-4 col-sm-4 col-xs-4">

                            <div class="list-group" >
                              <a href="{!!URL::to('/sorteos')!!}" style="text-align:center;" class="list-group-item list-group-item-warning">
                              <span>
                                <img width="20%" src= "{!!URL::to('img/dash/ico_sorteo01.png')!!}" class=""/>
                              </span>
                              </a>
                            </div>
                          </div>

                          <div class="col-md-4 col-sm-4 col-xs-4">

                            <div class="list-group" >
                              <a href="{!!URL::to('/sorteos/create')!!}" style="text-align:center;" class="list-group-item list-group-item-warning">
                              <span>
                                <img width="20%" src= "{!!URL::to('img/dash/ico_sorteo01.png')!!}" class=""/>
                              </span>
                              </a>
                            </div>

                          </div>

                          <div class="col-md-4 col-sm-4 col-xs-4">
                            <div class="list-group" >
                              <a href="{!!URL::to('/pops')!!}" style="text-align:center;" class="list-group-item list-group-item-danger">
                              <span>
                                <img width="20%" src= "{!!URL::to('img/dash/ico_notificacion004.png')!!}" class=""/>
                              </span>
                              </a>
                            </div>
                          </div>
                          <!-- <div class="col-md-12 col-sm-12 col-xs-12"><!--style="position:fixed;z-index:1000;"

                   <div class="list-group" >
                     <div class="list-group-item-full-header">
                       <h1>CONFIGURACION</h1>
                     </div>
                     <a href="#" style="text-align: center;" class="list-group-item list-group-item-info">
                       <span><img  src= "{!!URL::to('img/dash/ico_configurar_dash02.png')!!}" class=""/></span>

                      </a>
                   </div> -->

                          <div class="col-md-4 col-sm-4 col-xs-4">


                            <div class="list-group" >
                              <a href="{!!URL::to('/reports')!!}" style="text-align:center;" class="list-group-item list-group-item-success">
                       <span>
                         <img width="20%" src= "{!!URL::to('img/dash/icono_informe01.png')!!}" class=""/></span>
                              </a>

                            </div>


                          </div>

                          <div class="col-md-4 col-sm-4 col-xs-4">

                            <div class="list-group" >
                              <a href="{!!URL::to('/tickets')!!}" style="text-align:center;" class="list-group-item list-group-item-info">
                       <span>
                         <img width="20%" src= "{!!URL::to('img/dash/ico_ticket01.png')!!}" class=""/></span>
                              </a>

                            </div>

                          </div>

                          <div class="col-md-4 col-sm-4 col-xs-4">

                            <div class="list-group" >
                              <a href="{!!URL::to('/tickets/create')!!}" style="text-align:center;" class="list-group-item list-group-item-info">
                       <span>
                         <img width="20%" src= "{!!URL::to('img/dash/ico_ticket01.png')!!}" class=""/></span>
                              </a>

                            </div>

                          </div>

                        </div>


                      </div>
                    </div>
                    --}}
                  </div>
                </div>

                <div class="list-group-item">
                  <div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    Atento al usar tus tickets participar
                    <span class="glyphicon glyphicon-tag" style="font-size: 1em; color: #BEF781;"></span>
                    <span class="glyphicon glyphicon-resize-horizontal"></span>
                    <span class="label label-info">#14</span>&nbsp;(<small class="requerido">Tickets de ejemplo</small>)
                  </div>
                </div>

              </div> <!-- /list group -->

            </div>
          </div> <!-- /panel -->

          <div class="panel panel-default">
            <div class="panel-body">

              <div class="list-group">
                <div class="list-group-item list-group-item-success">
                  <h5>HISTORIAL DE COMPRA DE TICKETS <span id="resize" name="small" class="glyphicon glyphicon-resize-full" style="float: right;"></span> </h5>
                </div>

                <script>
                  $('#resize').click(function(){
                    if($(this).attr('name') == 'small'){
                      $('#insideHistory').removeClass('wrap');
                      $('#insideHistory').addClass('wrap-long-vertical');
                      $(this).removeClass('glyphicon-resize-full');
                      $(this).addClass('glyphicon-resize-small');
                      $(this).attr('name', 'long');
                      return true;
                    }else{
                      $('#insideHistory').removeClass('wrap-long-vertical');
                      $('#insideHistory').addClass('wrap');
                      $(this).removeClass('glyphicon-resize-small');
                      $(this).addClass('glyphicon-resize-full');
                      $(this).attr('name', 'small');
                      return true;
                    }
                  });
                </script>

                <div id="insideHistory" class="list-group-item wrap">
                  <table id="UserList" class="table table-hover" style="font-size: 0.8em;">
                    <thead>
                    <th>Transaccion</th>
                    <th>Coins</th>
                    <th>Tickets</th>
                    <th>Fecha</th>
                    <th>Sorteo</th>

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
                      <td>nombreSorteo</td>
                      </tbody>
                    @endforeach
                  </table>
                </div>

              </div> <!-- /list group -->
            </div>
          </div> <!-- /Panel historial -->

        </div><!-- /col md 4 -->

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
              @if(Auth::admin()->check())
                @include('sorteos.forms.vistaListaAdmin')
              @elseif(Auth::user()->check() || !Auth::user()->check())
                @include('sorteos.forms.vistaListaUsuario', array('sorteos' => $sorteos))
              @endif
            </div>
          </div>
        </div><!-- fin del col md 8 -->

      </div>
    </div>
  </div>
</div>
@stop
