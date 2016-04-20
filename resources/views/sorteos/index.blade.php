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

    <div class="" style="font-size: 4em;">
      <img width="8%" src= "{!!URL::to('img/dash/ico_sorteo01.png')!!}"/><span >Sorteos</span>
    </div>
      <div class="row">
        <div class="col-md-4 col-sm-12 col-xs-12">
          <div class="list-group">
            <div class="list-group-item">
              <h4>FILTRO DE BÚSQUEDA</h4>
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
              <a class="btn-link" style="" href="#!" id="ComprarMasTickets">
                Comprar 1 ticket
              </a><span class="label label-info">nuevo</span>
              <br>
              <a class="btn-link" style="" href="{!! URL::to('/tickets') !!}">
                Asegurate de comprar más tickets
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
              <br>

            </div>
          </div>

          <div class="list-group">
            <div class="list-group-item-full-header">
              <h6>HISTORIAL DE TICKETS</h6>
            </div>
            <div class="list-group-item">
            </div>
            <div class="list-group-item">
            </div>
            <div class="list-group-item">
            </div>
            <div class="list-group-item">
            </div>
          </div>
        </div><!-- fin del col md 4 -->
        <div class="col-md-8 col-sm-12 col-xs-12">
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
