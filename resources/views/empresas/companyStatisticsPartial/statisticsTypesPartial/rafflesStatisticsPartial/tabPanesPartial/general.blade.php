<div role="tabpanel" class="tab-pane active" id="general">
  <div class="row">
    <div class="list-group">
      <br>
      <div align="center">
        <img width="16" src="{{url('/img/glyphicons/glyphicons/png/glyphicons-341-globe.png')}}" alt=""> General
      </div>
      <hr>

      <b>Resumen</b><br>

      <div class="softText-descriptions-middle">

        <!-- $ra guarda el conteo de la petición hace referencia a $rafflesActive -->
        {{($ra = count($rafflesActive))>1?$ra.' sorteos activos.':$ra.' sorteo activo.'}} <br>

        <!-- $re guarda el conteo de la petición hace referencia a $rafflesEnded -->
        {{($re = count($rafflesEnded))>1?$re.' sorteos finalizados.':$re.' sorteo finalizado.'}} <br>

        <!-- $re guarda el conteo de la petición hace referencia a $rafflesPending -->
        {{($rp = count($rafflesPending))>1?$rp.' sorteos pendientes.':$rp.' sorteo pendiente.'}} <br>

        Haz realizado {{($ra+$re+$rp)}} sorteos en total<br>

        <!-- $re guarda el conteo de la petición hace referencia a $rafflesRequests -->
        {{($rr = count($raffleRaquests))>1?'Tienes '.$rr.' peticiones de sorteos.':'Tienes '.$rr.' petición de sorteo.'}}

        <br>
      </div><!-- /div .softText-descriptions-middle -->

      <hr>

      <div style="padding-bottom: 10px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">



      </div><!-- /div .col-xs12-sm12-md12-lg12 -->
    </div><!-- /div .list-group -->
  </div><!-- /div .row -->

</div><!-- /div .tab-pane .fade -->