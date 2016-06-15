@section('favicon') {!!Html::favicon('favicons/raffle.png')!!} @stop
@section('title') Raffles @stop
{!!Html::script('js/jquery.js')!!}
{!!Html::script('js/ajax/BuscarSorteo.js')!!}
{!!Html::script('js/ajax/ParticiparSorteo.js')!!}
@extends('layouts.front')
@section('content')
<div class="jumbotron">
  <div id="contentMiddle">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        @include('alerts.allAlerts')
      </div><!-- /div col-md12-sm12-xs12 -->
      <div class="col-md-4 col-sm-12 col-xs-12">
        <div class="list-group">
          <div class="list-group-item list-group-item-success">
            FILTRO DE BÚSQUEDA
          </div><!-- /div .list-group-item .success -->
          <div class="list-group-item">
            @if(Auth::admin()->check())
              {!!Form::text('nombre',null,['class' => 'form-control buscar', 'placeholder' => 'buscar sorteo','id'=>'nombre_sorteo', 'aria-describedby' => 'sizing-addon1'])!!}
            @elseif(Auth::user()->check())
              <input id="user_id" value="{!! Auth::user()->get()->id !!}" type="hidden" />
              {!!Form::text('nombre',null,['class' => 'form-control buscar', 'placeholder' => 'buscar sorteo','id'=>'sorteothumb', 'aria-describedby' => 'sizing-addon1'])!!}
            @endif
          </div><!-- /div .list-group-item -->
          @include('miniDashboard.miniDashboard')
          @include('listarBanner.listaBanner')
        </div><!-- /div .list-group -->
        <div class="list-group">
          <div class="list-group-item list-group-item-success">
            <h5>ÚLTIMOS 10 SORTEOS PENDIENTES / FINALIZADOS
              <span id="resizeCourses" name="small" class="glyphicon glyphicon-resize-full" style="float: right;">
              </span><!-- /div #resizeCourses -->
            </h5>
          </div><!-- /div .list-group-item .success -->
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
          </script><!-- /script for accion with #resizeCourses  -->
          <div id="insideCourses" class="list-group-item wrap">
            <table id="UserList" class="table table-hover" style="font-size: 0.8em;">
              <thead>
                <th>Nombre</th>
                <th>Empresa</th>
                <th>Estado</th>
                <th>Accion</th>
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
          </div> <!-- /div #insideCourses .list-group-item .wrap -->
        </div><!-- /div .list-group -->
      </div><!-- /div .col-md4-sm12-xs12 -->
      <div class="col-md-8 col-sm-12 col-xs-12">
        <div class="list-group">
          <div class="list-group-item list-group-item-success">
            COMPRA TUS TICKET'S A <span class="label label-warning">$ 100</span>
          </div><!-- /div .list-group-item .success -->
          <div class="list-group-item">
            {!!Form::select('size', [1=>1,5=>5,10=>10,15=>15], null, ['placeholder' => 'Seleciona la cantidad...','id' => 'cantidadtickets', 'class' => 'form-control'])!!}
            <br>
            <button type="button" style="width: 100%" id='comprar' class="btn btn-primary btn-md comprar">Comprar ticket</button>
            <input type="hidden" name="_token" value="{!!csrf_token()!!}" id="token" />
            <input type="hidden" value="{!!Auth::user()->get()->id!!}" id="user_id" />
          </div><!-- /div .list-group-item -->
        </div> <!-- /list group -->
          @if(Auth::admin()->check())
            @include('sorteos.forms.vistaListaAdmin')
          @else
            @include('sorteos.forms.vistaListaUsuario', array('sorteos' => $sorteos))
          @endif
      </div><!-- /div .col-md8-sm12-xs12 -->
    </div><!-- /div .row -->
  </div><!-- /div #contentMiddle -->
</div><!-- /div .jumbotron -->
@stop
