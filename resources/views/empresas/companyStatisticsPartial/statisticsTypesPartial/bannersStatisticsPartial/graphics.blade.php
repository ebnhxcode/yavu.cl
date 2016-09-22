<div id="Graphic{!! $banner->id !!}Banner{!! $graphicType !!}" class="btn-default">

  <?php
    $cdid=count($banner->displays_in_day);
    $cdiw=count($banner->displays_in_week);
    $cdim=count($banner->displays_in_month);
    $cdit=count($banner->displays_in_threemonths);
    $cdif=count($banner->displays_in_fourmonths);
    $cdis=count($banner->displays_in_sixmonths);
    $cdiy=count($banner->displays_in_year);
  ?>


  Despliegues de hoy → <b class="text-success">{{$cdid}} nuevos despliegues</b> <br>
  <span class="softText-descriptions-middle ">


    {{ ($daily_average = round($cdiw/7,0)) < $cdid ?
    ($cdid-$daily_average).' Despliegues más sobre el promedio.' :
    ($daily_average-$cdid).' Despliegues menos sobre el promedio.' }}

    {{ ($daily_average_percentage = ( round( ($daily_average/$cdid) *100, 1)+100 ) ) > 0 ?
    '+'.$daily_average_percentage :
    '-'.$daily_average_percentage }}% de visualizaciones. <br>

    <?php
    $d1 = count($banner->displays_in_day);
    $d2 = count($banner->displays_in_twodays)-$d1;
    $d3 = count($banner->displays_in_threedays)-$d2;
    $d4 = count($banner->displays_in_fourdays)-$d3;
    $d5 = count($banner->displays_in_fivedays)-$d4;
    $d6 = count($banner->displays_in_sixdays)-$d5;
    $d7 = count($banner->displays_in_week)-$d6;
    ?>
    Promedio diario en base a los últimos 7 días → <b>{{$daily_average}}</b> despliegues diarios. <br>

        <div class="progress">

        </div>

  </span><!-- .softText-descriptions-middle --> <br>

  <hr>

  Despliegues desde hace 7 días atrás → {{$cdiw}} despliegues <br>
  <span class="softText-descriptions-middle">

    {{ ( $weekly_average = round($cdim/4,0)  ) < $cdiw ?
    ($cdiw-$weekly_average).' Despliegues más sobre el promedio.' :
    ($weekly_average-$cdiw).' Despliegues menos sobre el promedio.' }}

    {{ ($weekly_average < $cdiw) ?
    '+'.round(($weekly_average/$cdiw)*100,1) :
    '-'.round(($weekly_average/$cdiw)*100,1) }} % de visualizaciones. <br>

    Promedio diario de despliegues en la semana → <b>{{$daily_average}}</b> <br>

    Promedio semanal de despliegues en base a las ultimas 4 semanas → <b>{{round($cdim/4,0)}}</b> por semana aprox. <br>

  </span><!-- .softText-descriptions-middle --> <br>

  <hr>


  <?php
    $w1 = $cdiw;
    $w2 = count($banner->displays_in_twoweeks)-$w1;
    $w3 = count($banner->displays_in_threeweeks)-$w2;
    $w4 = count($banner->displays_in_fourweeks)-$w3;
    $total = ($w1+$w2+$w3+$w4);
  ?>
  Despliegues desde hace 4 semanas atrás → {{$total}}

  <span class="softText-descriptions-middle">


    <br>
    <div class="progress">
      <div class="progress-bar progress-bar-default" data-toggle="tooltip" data-placement="top" title="Semana N°4 : {!! $w4 !!} despliegues" style="{{'width:'.($w4p=round(($w4/$total)*100,1)).'%;'}}">
        {{$w4p}}%
        <span class="sr-only">{{$w4p}}% Complete (success)</span>
      </div>
      <div class="progress-bar progress-bar-warning" data-toggle="tooltip" data-placement="top" title="Semana N°3 : {!! $w3 !!} despliegues" style="{{'width:'.($w3p=round(($w3/$total)*100,1)).'%;'}}">
        {{$w3p}}%
        <span class="sr-only">{{$w3p}}% Complete (warning)</span>
      </div>
      <div class="progress-bar progress-bar-info" data-toggle="tooltip" data-placement="top" title="Semana N°2 : {!! $w2 !!} despliegues" style="{{'width:'.($w2p=round(($w2/$total)*100,1)).'%;'}}">
        {{$w2p}}%
        <span class="sr-only">{{$w2p}}% Complete (danger)</span>
      </div>
      <div class="progress-bar progress-bar-success" data-toggle="tooltip" data-placement="top" title="Semana N°1 : {!! $w1 !!} despliegues" style="{{'width:'.($w1p=round(($w1/$total)*100,1)).'%;'}}">
        {{$w1p}}%
        <span class="sr-only">{{$w1p}}% Complete (danger)</span>
      </div>
    </div>

    hace <b>4</b> semanas → <b>{{$w4}}</b> despliegues <b><i>{{$w4p}}</i></b>% <br>
    hace <b>3</b> semanas → <b>{{$w3}}</b> despliegues <b><i>{{$w3p}}</i></b>% <br>
    hace <b>2</b> semanas → <b>{{$w2}}</b> despliegues <b><i>{{$w2p}}</i></b>% <br>
    hace <b>1</b> semana → <b>{{$w1}}</b> despliegues <b><i>{{$w1p}}</i></b>% <br>

  </span><!-- .softText-descriptions-middle --> <br>


  {{--
    <small class="text-success"> {{ $cdit_percentage = round(($cdit/$cdif)*100, 2) }}% </small> <br>
    <small> (+{{ 100-$cdit_percentage }}% de crecimiento en comparación al resultado anterior) </small> <br>
  --}}

  <hr>

  Despliegues desde hace 3 meses atrás → {{$cdit}}

  <hr>

  Despliegues desde hace 4 meses atrás → {{$cdif}}

  <hr>

  Despliegues desde hace 6 meses atrás → {{$cdis}}

  <hr>

  Despliegues desde hace 1 año → {{$cdiy}}
  <small class="text-success"> 100% </small> <br>

  <hr>


  +-----------------------------------+ <br>
  | <br>
  |  insertar gráfico <br>
  | <br>
  | <br>
  | <br>
  | <br>
  | <br>
  |  Resumenes <br>
  +-----------------------------------+ <br>

</div>