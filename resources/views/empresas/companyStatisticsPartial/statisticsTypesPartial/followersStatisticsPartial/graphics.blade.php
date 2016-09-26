<div id="Graphic{!! $category->id !!}Category{{$graphicType}}" class="collapse in">

  {{($interesteds)>0?$interesteds.' de tus seguidores tienen intereses en esta categor&iacute;a':'no tienes seguidores interesados en esta categor&iacute;a'}}

  <span>


    <div class="progress" style="margin: 0;">
      &nbsp;<b>·</b>
      <small>
        {{ round($percent = (count($interesteds)/count($category->userInteresteds))*100,2) .'%'}}
      </small>
      <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: {{ ( $percent )  .'%'}};">
      </div><!-- /div .progress-bar .progress-bar-success .progress-bar-striped .active -->
    </div><!-- /div .progress -->
    <span class="softText-descriptions">
      Apuntas al {{round($percent, 2)}}% del publico global para la categor&iacute;a <b>{{$category->category}}</b>
      <br>
      a {{count($category->userInteresteds)}} personas les interesa esto.
    </span><!-- /span .softText-descriptions -->
    <small class="softText-descriptions" style="float:right;">
      {{-- ver m&aacute;s --}}
    </small><!-- /small .softText-descriptions -->


  </span>


  <div id="graphic-box">
    <canvas id="Grafico{{$category->id}}Category{{$graphicType}}" width="400" height="200"></canvas>
    <script>
      var ctx = document.getElementById("Grafico{{$category->id}}Category{{$graphicType}}");
      var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
          labels: [
            "Público Alcanzado",
            "Público Global"
          ],
          datasets: [
            {
              data: [{{round($percent, 2)}}, 100-{{round($percent, 2)}}],
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
  </div><!-- $graphic-box -->
{{--
  <br>
  +------------------------+ <br>
  | <br>
  |  insertar gráfico <br>
  | <br>
  +------------------------+ <br>
--}}
</div>

<!-- boton que cierra y abre la caja del gráfico -->
<br>
<span class="btn btn-sm btn-default">
  <small class="openclose text-success" data-toggle="collapse" data-target="#Graphic{{$category->id}}Category{{$graphicType}}">
    cerrar detalles
  </small><!-- #openclose .btn .btn-default .btn-xs -->
</span><!-- .btn .btn-xs .btn-default -->