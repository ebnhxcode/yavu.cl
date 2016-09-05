<div id="Graphic{!! $category->id !!}Category{{$graphicType}}" class="collapse">

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
    </span><!-- /span .softText-descriptions -->
    <small class="softText-descriptions" style="float:right;">
      {{-- ver m&aacute;s --}}
    </small><!-- /small .softText-descriptions -->


  </span>

  <br>
  +------------------------+ <br>
  | <br>
  |  insertar gráfico <br>
  | <br>
  +------------------------+ <br>

</div>

<!-- boton que cierra y abre la caja del gráfico -->
<br>
<small class="btn btn-xs btn-info">
  <span class="openclose" data-toggle="collapse" data-target="#Graphic{{$category->id}}Category{{$graphicType}}" style="float:right;">
    ver más detalles
  </span><!-- #openclose .btn .btn-default .btn-xs -->
</small><!-- .btn .btn-xs .btn-default -->