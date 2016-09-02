<!-- ################################ -->
<!--
        DETALLE DE VARIABLES QUE TENGO PARA DESPLEGAR EN CADA GRÁFICO :
        Cada una es un objeto arreglo con la cantidad asociada a la relación
        $totalVisits;$menVisits;$womenVisits;$otherVisits;$userCompany;$userSession;$category;$graphicType;

--!>

<!-- ################################ -->




<div id="Graphic{!! $category->id !!}Category{{$graphicType}}" class="collapse">
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
</div><!-- #GraphicsIdCategory .collapse -->

<!-- boton que cierra y abre la caja del gráfico -->
<br>
<small class="btn btn-xs btn-info">
  <span class="openclose" data-toggle="collapse" data-target="#Graphic{{$category->id}}Category{{$graphicType}}" style="float:right;">
    ver más detalles
  </span><!-- #openclose .btn .btn-default .btn-xs -->
</small><!-- .btn .btn-xs .btn-default -->