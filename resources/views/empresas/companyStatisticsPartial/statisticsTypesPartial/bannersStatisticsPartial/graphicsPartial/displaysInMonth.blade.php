<div id="DisplaysInMonth" style="margin:8px; box-shadow: 1px 2px 2px #E9E9E9; border-radius: 3px;">
  <div class="list-group-item">
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

  Despliegues desde hace 3 meses atrás →

  <hr>

  Despliegues desde hace 4 meses atrás →

  <hr>

  Despliegues desde hace 6 meses atrás →

  <hr>

  Despliegues desde hace 1 año →
  <small class="text-success">  </small> <br>
  </div><!-- .list-group-item -->
</div><!-- #DisplaysInMonth -->