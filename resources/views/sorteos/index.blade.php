  {!!Html::script('js/jquery.js')!!}
  {!!Html::script('js/ajax/BuscarSorteo.js')!!}
  {!!Html::script('js/ajax/ParticiparSorteo.js')!!}
{!!Html::script('js/ajax/GestionarCoins.js')!!}
{!!Html::script('js/ajax/GestionarCompraTicket.js')!!}
@extends('layouts.front') 
@section('content')
<div class="jumbotron">
  <div id="contentMiddle">
    @include('alerts.alertFields')
    @include('alerts.errorsMessage')
    @include('alerts.successMessage')
    @include('alerts.warningMessage')
    <h1>Sorteos</h1><span class="text-danger" id="Mensaje"></span>
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="form-group">
          @if(Auth::admin()->check())
            <div class="input-group input-group-lg">
              <span class="glyphicon glyphicon-search input-group-addon" id="sizing-addon1"></span>
              {!!Form::text('nombre',null,['class' => 'form-control buscar', 'placeholder' => 'buscar...','id'=>'nombre_sorteo', 'aria-describedby' => 'sizing-addon1'])!!}
            </div>
          @elseif(Auth::user()->check() || !Auth::user()->check())
            <div class="input-group input-group-lg">
              <span class="glyphicon glyphicon-search input-group-addon" id="sizing-addon1"></span>
              {!!Form::text('nombre',null,['class' => 'form-control buscar', 'placeholder' => 'buscar...','id'=>'sorteothumb', 'aria-describedby' => 'sizing-addon1'])!!}
            </div>
          @endif
        </div>
        @if(Auth::admin()->check())
					@include('sorteos.forms.vistaListaAdmin')
        @elseif(Auth::user()->check() || !Auth::user()->check())
		      @include('sorteos.forms.vistaListaUsuario', array('sorteos' => $sorteos))
        @endif
        {!!$sorteos->render()!!}
      </div>
    </div>
  </div>
</div>
@stop
