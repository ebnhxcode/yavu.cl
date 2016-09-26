<div id="DisplaysInDay" class="Displays" style="margin:8px; box-shadow: 1px 2px 2px #E9E9E9; border-radius: 3px;">
  <div class="list-group-item">
  Despliegues de hoy → <b class="text-success">{{$cdid}} nuevos despliegues</b> <br>
    <span class="softText-descriptions-middle ">

      {{ ($daily_average = round($cdiw/7,0)) < $cdid ?
      ($cdid-$daily_average).' Despliegues más sobre el promedio →' :
      ($daily_average-$cdid).' Despliegues menos sobre el promedio →' }}

      {{ ($daily_average_percentage = ( round( ($daily_average/$cdid ) *100, 1)+100 ) ) > 0 ?
      '+'.$daily_average_percentage :
      '-'.$daily_average_percentage }}% de visualizaciones. <br>

      Promedio diario en base a los últimos 7 días → <b>{{$daily_average}}</b> despliegues diarios. <br>

    </span><!-- .softText-descriptions-middle --> <br>
  </div><!-- .list-group-item -->
</div><!-- #DisplaysInDay -->