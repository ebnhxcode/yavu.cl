@section('favicon') {!!Html::favicon('favicons/raffle.png')!!} @stop
@if(isset($sorteo))
  {!!Html::script('js/jquery.js')!!}
  {!!Html::script('js/ajax/ParticiparSorteo.js')!!}
  @section('title') {!! $sorteo->nombre_sorteo !!} @stop
  @extends('layouts.front')
  @section('content')
    <div class="jumbotron">
      <div class="contentMiddle">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            @include('alerts.allAlerts')
          </div><!-- /div .col-md12-sm12-xs12 -->
          <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
            @include('sorteos.showPartial.sectionLeft')
          </div><!-- /div .col-lg3-md3-sm3-xs4 -->
          <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            @include('sorteos.showPartial.sectionCenter')
          </div><!-- /div .col-lg6-md6-sm6-xs8 -->
          <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
            @include('sorteos.showPartial.sectionRight')
          </div><!-- /div .col-lg3-md3-sm3-xs8 -->
        </div><!-- /div .col-md4-sm12-xs12 -->
      </div><!-- /div .row -->
    </div><!-- /div #contentMiddle -->
  @stop
@else
  404
@endif
