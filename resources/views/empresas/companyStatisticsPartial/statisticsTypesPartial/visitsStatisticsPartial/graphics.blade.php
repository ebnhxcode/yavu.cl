<!-- ################################ -->
<!--
        DETALLE DE VARIABLES QUE TENGO PARA DESPLEGAR EN CADA GRÁFICO :
        Cada una es un objeto arreglo con la cantidad asociada a la relación
        $totalVisits;$menVisits;$womenVisits;$otherVisits;$userCompany;$userSession;$category;$graphicType;

--!>

<!-- ################################ -->




<div id="Graphic{!! $category->id !!}Category{{$graphicType}}" class="collapse in">

  {{($vI_count=count($visitantsInteresteds))>0?$vI_count.' de las visitas que haz tenido tienen interes en esta categor&iacute;a':'no tienes visitantes en esta categor&iacute;a'}} <br>

  <?php count($visits_in_day=$userCompany->visits_in_day); ?>
  <?php count($visits_in_week=$userCompany->visits_in_week); ?>
  <?php count($visits_in_month=$userCompany->visits_in_month); ?>
  <?php count($visits_in_year=$userCompany->visits_in_year); ?>
  {{--
  Visitas desde hace 7 días : <b> {{count($userCompany->visits_in_week)}} </b> <br>
  Visitas desde hace de 4 semanas : <b> {{count($userCompany->visits_in_month)}} </b> <br>
  Visitas desde hace 1 año : <b> {{count($userCompany->visits_in_year)}} </b> <br>
  --}}

  <div class="btn-default" id="graphic-box">

{{--
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
--}}
    <?php $vsid=[];$vsiw=[];$vsiw=[];$vsim=[];$vsiy=[]; ?>
    @foreach($visitantsInteresteds as $key => $vI)
      @foreach($visits_in_day as $key => $vid)
        @if($vid==$vI)
          <?php array_push($vsid, $vid); ?>
        @endif
      @endforeach

      @foreach($visits_in_week as $key => $viw)
        @if($viw==$vI)
          <?php array_push($vsiw, $viw); ?>
        @endif
      @endforeach

      @foreach($visits_in_month as $key => $vim)
        @if($vim==$vI)
          <?php array_push($vsim, $vim); ?>
        @endif
      @endforeach

      @foreach($visits_in_year as $key => $viy)
        @if($viy==$vI)
          <?php array_push($vsiy, $viy); ?>
        @endif
      @endforeach

    @endforeach


    Registro de visitas : <br>
    Visitas de hoy → <b>{{count($vsid)}}</b> <br>
    Visitas desde hace 7 días → <b>{{count($vsiw)}}</b> <br>
    Visitas desde hace de 4 semanas → <b>{{count($vsim)}}</b> <br>
    Visitas desde hace 1 año → <b>{{count($vsiy)}}</b> <br>

    <canvas id="Grafico{{$category->id}}Category{{$graphicType}}" width="400" height="200"></canvas>
    <script>
      var ctx = document.getElementById("Grafico{{$category->id}}Category{{$graphicType}}");
      var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
          labels: [
            "Visitas Interesadas",
            "Visitas Totales"
          ],
          datasets: [
            {
              data: [{{count($visitantsInteresteds)}}, {{count($vsiy)}}],
              backgroundColor: [
                "#FF6384",
                "#36A2EB"
              ],
              hoverBackgroundColor: [
                "#FF6384",
                "#36A2EB"
              ]
            }
          ]
        }
      });
    </script>
    {{count($vsiy)}}, {{count($visitantsInteresteds)}}

  </div><!-- #graphic-box .btn-default -->

</div><!-- #GraphicsIdCategory .collapse -->

<!-- boton que cierra y abre la caja del gráfico -->
<br>
<span class="btn btn-sm btn-default">
  <small class="openclose text-success" data-toggle="collapse" data-target="#Graphic{{$category->id}}Category{{$graphicType}}">
    cerrar detalles
  </small><!-- #openclose .btn .btn-default .btn-xs -->
</span><!-- .btn .btn-xs .btn-default -->