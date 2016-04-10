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
    <h1>Sorteos</h1><span class="text-danger" id="Mensaje"></span>
    <a class="btn btn-default btn-sm" href="{!! URL::to("/sorteos/create") !!}">
      <span class="glyphicon glyphicon-plus"></span>
      Crear nuevo sorteo
    </a>
    <span class="btn btn-default btn-sm" style="" href="#!" id="ComprarMasTickets">
      <span class="glyphicon glyphicon-plus"></span>
      Comprar más tickets
    </span>
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="form-group">
          @if(Auth::admin()->check())
            <div class="input-group input-group-lg">
              <span class="glyphicon glyphicon-search input-group-addon" id="sizing-addon1"></span>
              {!!Form::text('nombre',null,['class' => 'form-control buscar', 'placeholder' => 'buscar...','id'=>'nombre_sorteo', 'aria-describedby' => 'sizing-addon1'])!!}
            </div>
          @elseif(Auth::user()->check() || !Auth::user()->check())
            <input id="user_id" value="{!! Auth::user()->get()->id !!}" type="hidden" />
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
