@section('favicon') {!!Html::favicon('favicons/ticket.png')!!} @stop
@section('title') Tickets @stop
{!!Html::script('js/jquery.js')!!}
{!!Html::script('js/ajax/BuscarUsuario.js')!!}
@extends('layouts.front')
@section('content')
<div class="jumbotron">
	<div class="contentMiddle">
		<div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        @include('alerts.allAlerts')
      </div><!-- /div col-md12-sm12-xs12 -->
      <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
        <div class="list-group">
          @include('miniDashboard.miniDashboard')
          <div class="visible-lg visible-md">
            @if(count($bannersRandomLeft)>0)
              @include('listarBanner.listaBanner')
            @endif
          </div>
        </div><!-- /div .list-group -->
			</div><!-- /div .col-md3-sm12-xs12 -->
      <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">

        {{--
        <div class="list-group">
          <div class="list-group-item">
            <span data-toggle="tooltip" data-placement="left" title="Tickets!" style="font-family: yavu_font;font-size: 1.6em;color:#57E5DB;">E</span>&nbsp;
            <small>Valor de los tickets <span class="label label-warning">$ 100</span> Yavücoins</small>
          </div><!-- /div .list-group-item .success -->
          <div class="list-group-item">
            <div class="softText-descriptions">
              Selecciona la cantidad de tickets y c&oacute;mpralos
            </div>
            {!!Form::select('size', [1=>1,2=>2,3=>3,4=>4,5=>5,6=>6,7=>7,8=>8,9=>9,10=>10], null, ['id' => 'cantidadtickets', 'class' => 'form-control input-sm'])!!}
            <br>
            <button type="button" style="width: 100%" id='comprar' class="btn btn-primary btn-md comprar">Comprar ticket</button>
            <input type="hidden" name="_token" value="{!!csrf_token()!!}" id="token" /><!-- /input token -->
            <input type="hidden" value="{!!Auth::user()->get()->id!!}" id="user_id" /><!-- /input user_id -->
          </div><!-- /div .list-group-item -->
        </div><!-- /div .list-group -->
			</div><!-- /div .col-md6-sm12-xs12 -->
      --}}


      <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
        @include('sorteos.showPartial.sectionLeft')
      </div><!-- /div .col-md3-sm12-xs12 -->

      <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
        @include('empresas.indexPartial.sectionRight')
      </div><!-- /div .col-md3-sm12-xs12 -->

		</div><!-- /div .row -->
	</div><!-- /div #contentMiddle -->
</div><!-- /div .jumbotron -->
@stop
