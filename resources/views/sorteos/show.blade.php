@section('favicon') {!!Html::favicon('favicons/raffle.png')!!} @stop
@if(isset($sorteo))
  {!!Html::script('js/jquery.js')!!}
  {!!Html::script('js/ajax/ParticiparSorteo.js')!!}
  @section('title') {!! $sorteo->nombre_sorteo !!} @stop
  @extends('layouts.front')
  @section('content')
    <div class="jumbotron">
      <div id="contentMiddle">
        <div class="row">

          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            @include('alerts.allAlerts')
          </div><!-- /div .col-md12-sm12-xs12 -->

          <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
            @include('sorteos.showPartial.sectionLeft')
          </div>

          <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

            @include('sorteos.showPartial.sectionCenter')

          </div><!-- /div .col-md6-sm12-xs12 -->

          <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
            @include('sorteos.showPartial.sectionRight')
          </div><!-- /div .col-md3-sm12-xs12 -->

            {{--
            @if(Auth::user()->get()->id == $sorteo->user_id)
              <script language="JavaScript" type="text/javascript">
                var bPreguntar = true;
                window.onbeforeunload = preguntarAntesDeSalir;
                function preguntarAntesDeSalir()                  {
                  if (bPreguntar) return "¿Seguro que quieres salir?";
                }
              </script>
            @endif
            --}}
          </div><!-- /div .col-md4-sm12-xs12 -->
        </div><!-- /div .row -->
      </div><!-- /div #contentMiddle -->
    </div><!-- /div .jumbotron -->
  @stop
@else
  404
@endif
