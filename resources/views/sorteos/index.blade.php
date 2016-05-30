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
    @include('alerts.infoMessage')
    <div class="" style="font-size: 3em;">
      <img id="img" style="padding-bottom: 20px;" width="8%" src= "{!!URL::to('img/newGraphics/neo_icono_sorteo.png')!!}"/><span>Sorteos</span>
    </div>
    <div class="row">

      <div class="col-md-4 col-sm-12 col-xs-12">
        <div>
          <div>
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

            @include('miniDashboard.miniDashboard')
              @include('listarBanner.listaBanner')
           
            </div> <!-- /list group -->

          </div>
        </div> <!-- /panel -->

        <div>
          <div>

            <div class="list-group">

              <div class="list-group-item list-group-item-success">
                <h5>ÚLTIMOS 10 SORTEOS PENDIENTES / FINALIZADOS<span id="resizeCourses" name="small" class="glyphicon glyphicon-resize-full" style="float: right;"></span> </h5>
              </div>

              <script>
                $('#resizeCourses').click(function(){
                  if($(this).attr('name') == 'small'){
                    $('#insideCourses').removeClass('wrap');
                    $('#insideCourses').addClass('wrap-long-vertical');
                    $(this).removeClass('glyphicon-resize-full');
                    $(this).addClass('glyphicon-resize-small');
                    $(this).attr('name', 'long');
                    return true;
                  }else{
                    $('#insideCourses').removeClass('wrap-long-vertical');
                    $('#insideCourses').addClass('wrap');
                    $(this).removeClass('glyphicon-resize-small');
                    $(this).addClass('glyphicon-resize-full');
                    $(this).attr('name', 'small');
                    return true;
                  }
                });
              </script>

              <div id="insideCourses" class="list-group-item wrap">
                <table id="UserList" class="table table-hover" style="font-size: 0.8em;">
                  <thead>
                  <th>Nombre</th>
                  <th>Empresa</th>
                  <th>Estado</th>
                  <th>Accion</th>

                  @if(Auth::admin()->check())
                    <th>Operaciones</th>
                  @endif
                  </thead>
                  @foreach($sorteos as $sorteo)
                  <tbody>
                  @if($sorteo->estado_sorteo != 'Pendiente')
                    <td>{!! $sorteo->nombre_sorteo !!}</td>
                    <td>{!! $sorteo->nombre_empresa !!}</td>
                    <td>{!!$sorteo->estado_sorteo!!}</td>
                    @if(Auth::user()->get()->id == $sorteo->user_id && $sorteo->estado_sorteo == 'Pendiente')
                      <td><a class="btn btn-primary" href="{!!URL::to('/sorteos/'.$sorteo->id.'/edit')!!}">Editar</a></td>
                    @else
                      @if($sorteo->estado_sorteo == 'Finalizado')
                        <td><a class="btn btn-warning" href="{!!URL::to('/sorteos/'.$sorteo->id)!!}">Ver sorteo</a></td>
                      @elseif($sorteo->estado_sorteo == 'Activo')
                        <td><a class="btn btn-success" href="{!!URL::to('/sorteos/'.$sorteo->id)!!}">Ver sorteo</a></td>
                      @else
                        <td><a class="btn btn-danger" href="{!!URL::to('/sorteos/'.$sorteo->id)!!}">Ver sorteo</a></td>
                      @endif
                    @endif
                  @endif
                  </tbody>

                  @endforeach
                </table>
              </div> <!-- /div inside courses -->

            </div> <!-- /list group -->
          </div>
        </div> <!-- /Panel sorteos pendientes -->

        {{--

        <div>
          <div>

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
                    <td>{!!$rticket->nombre_sorteo!!}</td>
                    </tbody>
                  @endforeach
                </table>
              </div> <!-- /div inside history -->

            </div> <!-- /list group -->
          </div> <!-- /panel body -->
        </div> <!-- /Panel historial -->

        --}}

      </div><!-- /col md 4 -->

      <div class="col-md-8 col-sm-12 col-xs-12">
        <div>
          <div>

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

            </div> <!-- /list group -->



          </div> <!-- /panel body -->
        </div> <!-- /panel -->


        <div>
          <div>
            @if(Auth::admin()->check())
              @include('sorteos.forms.vistaListaAdmin')
            @elseif(Auth::user()->check() || !Auth::user()->check())
              @include('sorteos.forms.vistaListaUsuario', array('sorteos' => $sorteos))
            @endif

          </div> <!-- /panel body -->
        </div> <!-- /panel -->

      </div><!-- fin del col md 8 -->

    </div>
  </div>
</div>
@stop
