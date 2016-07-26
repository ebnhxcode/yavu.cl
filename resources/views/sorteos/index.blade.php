@section('favicon') {!!Html::favicon('favicons/raffle.png')!!} @stop
@section('title') Sorteos @stop
{!!Html::script('js/jquery.js')!!}
{!!Html::script('js/ajax/BuscarSorteo.js')!!}
{!!Html::script('js/ajax/ParticiparSorteo.js')!!}
@extends('layouts.front')

@section('content')
<div class="jumbotron">
  <div class="contentMiddle">
    <div class="row sidebar-outer">
      <div id="raffleAlerts" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        @include('alerts.allAlerts')
      </div><!-- /div col-md12-sm12-xs12 -->


      <div class="col-xs-4 col-sm-3 col-md-3 col-lg-3">
        <div id="sectionLeft">

          <script>
            var windowsize = $(window).width();
            $(window).resize(function() {
              var windowsize = $(window).width();
              $('#sectionLeft').removeClass('col-xs-4');
              if (windowsize < 768) {
                $('#sectionLeft').addClass('col-xs-4');
              }
            });
            if (windowsize < 768) {
              $('#sectionLeft').addClass('col-xs-4');
            }


          </script>

          @include('sorteos.indexPartial.sectionLeft')
        </div>
      </div><!-- /div .col-md4-sm12-xs12 -->



      <div id="sectionCenter" class="col-xs-8 col-sm-6 col-md-6 col-lg-6">
        @include('sorteos.indexPartial.sectionCenter')
      </div><!-- /div .col-md8-sm12-xs12 -->

      <div id="sectionRight" class="col-xs-8 col-sm-3 col-md-3 col-lg-3" style="float:right;">
        @include('empresas.indexPartial.sectionRight')
      </div><!-- /div .col-md3-sm12-xs12 -->

    </div><!-- /div .row -->
  </div><!-- /div #contentMiddle -->
</div><!-- /div .jumbotron -->
@stop