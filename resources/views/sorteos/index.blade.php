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
          <div class="list-group">
            <div class="list-group-item list-group-item-success">
              <h5>FILTRO DE BÚSQUEDA</h5>
              @if(Auth::admin()->check())
                {!!Form::text('nombre',null,['class' => 'form-control buscar', 'placeholder' => 'buscar sorteo','id'=>'nombre_sorteo', 'aria-describedby' => 'sizing-addon1'])!!}
              @elseif(Auth::user()->check() || !Auth::user()->check())
                <input id="user_id" value="{!! Auth::user()->get()->id !!}" type="hidden" />
                {!!Form::text('nombre',null,['class' => 'form-control buscar', 'placeholder' => 'buscar sorteo','id'=>'sorteothumb', 'aria-describedby' => 'sizing-addon1'])!!}
                <br />
              @endif
            </div>
            <div class="list-group-item">
              <span class="text-danger" id="Mensaje"></span>
              <a class="btn-link" href="{!! URL::to("/sorteos/create") !!}">
                Crear nuevo sorteo
              </a><span class="label label-info">nuevo</span>
              <br>
              <a class="btn-link" style="" href="{!! URL::to('/tickets') !!}">
                Comprar más tickets
              </a><span class="label label-info">nuevo</span>
              <br>
              <a class="btn-link" style="" href="{!! URL::to('/feeds') !!}">
                Volver a publicaciones
              </a><span class="label label-info">nuevo</span>
              <br>
              <a class="btn-link" style="" href="{!! URL::to('/profile') !!}">
                Ir a mi perfil
              </a><span class="label label-info">nuevo</span>
              <br>
              <a class="btn-link" style="" href="{!! URL::to('/dashboard') !!}">
                Inicio
              </a><span class="label label-info">nuevo</span>
              <hr>

              <div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                Atento al usar tus tickets participar <br>
                <span class="glyphicon glyphicon-tag" style="font-size: 1em; color: #BEF781;"></span>
                <span class="glyphicon glyphicon-resize-horizontal"></span>
                <span class="label label-info">#14</span>&nbsp;(<small class="requerido">Tickets de ejemplo</small>)
              </div>

            </div>
          </div>

          <div class="list-group">
            <div class="list-group-item list-group-item-success">
              <h5>HISTORIAL DE COMPRA DE TICKETS</h5>
            </div>

            <div class="list-group-item wrap">
              <table id="UserList" class="table table-hover" style="font-size: 0.8em;">
                <thead>
                <th>Monto</th>
                <th>Cantidad</th>
                <th>Fecha</th>
                @if(Auth::admin()->check())
                  <th>Operaciones</th>
                @endif
                </thead>
                @foreach($rtickets as $rticket)
                  <tbody>
                  <td>{!!$rticket->monto!!}</td>
                  <td>{!!$rticket->cantidad_tickets!!}</td>
                  <td>
                    <abbr class="timeago" id="date{!!$rticket->id!!}" title="{!!$rticket->created_at!!}"></abbr>
                  </td>
                  </tbody>
                @endforeach
              </table>
            </div>

          </div>
        </div><!-- fin del col md 4 -->
        <div class="col-md-8 col-sm-12 col-xs-12">
          <div class="panel-formato-yavu panel-default">
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
