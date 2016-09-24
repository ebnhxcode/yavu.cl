<div id="DisplaysInWeek" style="margin:8px; box-shadow: 1px 2px 2px #E9E9E9; border-radius: 3px;">
  <div class="list-group-item">
    Despliegues desde hace 7 días atrás → {{$cdiw}} despliegues <br>
    <span class="softText-descriptions-middle">

      {{ ( $weekly_average = round($cdim/4,0)  ) < $cdiw ?
      ($cdiw-$weekly_average).' Despliegues más sobre el promedio.' :
      ($weekly_average-$cdiw).' Despliegues menos sobre el promedio.' }}

      {{ ($weekly_average < $cdiw) ?
      '+'.round(($weekly_average/$cdiw)*100,1) :
      '-'.round(($weekly_average/$cdiw)*100,1) }} % de visualizaciones. <br>

      Promedio diario de despliegues en la semana → <b>{{$daily_ave = round($cdiw/7,0)}}</b> <br>

      Promedio semanal de despliegues en base a las ultimas 4 semanas → <b>{{round($cdim/4,0)}}</b> por semana aprox. <br>

      <div class="progress">
        <div class="progress-bar progress-bar-warning" data-toggle="tooltip" data-placement="top" title="Día N°7 : {!! $d7 !!} despliegues" style="{{'width:'.($d7p=round(($d7/$total_days)*100,1)).'%;'}}">
          {{$d7p}}%
          <span class="sr-only">{{$d7p}}% Complete (success)</span>
        </div><!-- (.progress-bar .+=*.warning) -->
        <div class="progress-bar progress-bar-info" data-toggle="tooltip" data-placement="top" title="Día N°6 : {!! $d6 !!} despliegues" style="{{'width:'.($d6p=round(($d6/$total_days)*100,1)).'%;'}}">
          {{$d6p}}%
          <span class="sr-only">{{$d6p}}% Complete (success)</span>
        </div><!-- (.progress-bar .+=*.info) -->
        <div class="progress-bar progress-bar-success" data-toggle="tooltip" data-placement="top" title="Día N°5 : {!! $d5 !!} despliegues" style="{{'width:'.($d5p=round(($d5/$total_days)*100,1)).'%;'}}">
          {{$d5p}}%
          <span class="sr-only">{{$d5p}}% Complete (success)</span>
        </div><!-- (.progress-bar .+=*.success) -->
        <div class="progress-bar progress-bar-default" data-toggle="tooltip" data-placement="top" title="Día N°4 : {!! $d4 !!} despliegues" style="{{'width:'.($d4p=round(($d4/$total_days)*100,1)).'%;'}}">
          {{$d4p}}%
          <span class="sr-only">{{$d4p}}% Complete (success)</span>
        </div><!-- (.progress-bar .+=*.default) -->
        <div class="progress-bar progress-bar-warning" data-toggle="tooltip" data-placement="top" title="Día N°3 : {!! $d3 !!} despliegues" style="{{'width:'.($d3p=round(($d3/$total_days)*100,1)).'%;'}}">
          {{$d3p}}%
          <span class="sr-only">{{$d3p}}% Complete (warning)</span>
        </div><!-- (.progress-bar .+=*.warning) -->
        <div class="progress-bar progress-bar-info" data-toggle="tooltip" data-placement="top" title="Día N°2 : {!! $d2 !!} despliegues" style="{{'width:'.($d2p=round(($d2/$total_days)*100,1)).'%;'}}">
          {{$d2p}}%
          <span class="sr-only">{{$d2p}}% Complete (danger)</span>
        </div><!-- (.progress-bar .+=*.info) -->
        <div class="progress-bar progress-bar-success" data-toggle="tooltip" data-placement="top" title="Día N°1 : {!! $d1 !!} despliegues" style="{{'width:'.($d1p=round(($d1/$total_days)*100,1)).'%;'}}">
          {{$d1p}}%
          <span class="sr-only">{{$d1p}}% Complete (danger)</span>
        </div><!-- (.progress-bar .+=*.success) -->
      </div><!-- .progress -->
    </span><!-- .softText-descriptions-middle --> <br>
  </div><!-- .list-group-item -->
</div><!-- #DisplaysInWeek -->