<div role="tabpanel" class="tab-pane active" id="general">
  <div class="row">
    <div class="list-group">
      <br>
      <div align="center">
        <img width="16" src="{{url('/img/glyphicons/glyphicons/png/glyphicons-70-gift.png')}}" alt=""> General
      </div>
      <hr>

      <div align="center">
        <h2>Resumen</h2>
      </div>

      <br>

      <div class="list-group" align="center">
        <div class="row">
          <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">

            <!-- $ra guarda el conteo de la petición hace referencia a $rafflesActive -->
            <a href="#actives" role="tab" data-toggle="tab" class="btn btn-default btn-xs" style="float:right;">
              <span class="text-success">
                ver estadísticas
              </span><!-- .text-success -->
            </a><!-- .btn .btn-default .btn-xs -->
            <div class="text-success">
              <h3>¡{{($ra = count($rafflesActive))>1?$ra.' sorteos activos':$ra.' sorteo activo'}}!</h3>
            </div><!-- .text-success -->

            <br>

            <!-- $re guarda el conteo de la petición hace referencia a $rafflesEnded -->
            <a href="#ended" role="tab" data-toggle="tab" class="btn btn-default btn-xs" style="float:right;">
              <span class="text-primary">
                ver estadísticas
              </span><!-- .text-primary -->
            </a><!-- .btn .btn-default .btn-xs -->
            <div class="text-primary">
              <h3>¡{{($re = count($rafflesEnded))>1?$re.' sorteos finalizados':$re.' sorteo finalizado'}}!</h3>
            </div><!-- .text-primary -->

            <br>

            <!-- $re guarda el conteo de la petición hace referencia a $rafflesPending -->
            <a href="#pending" role="tab" data-toggle="tab" class="btn btn-default btn-xs" style="float:right;">
              <span class="text-warning">
                ver estadísticas
              </span><!-- .text-warning -->
            </a><!-- .btn .btn-default .btn-xs -->
            <div class="text-warning">
              <h3>¡{{($rp = count($rafflesPending))>1?$rp.' sorteos pendientes':$rp.' sorteo pendiente'}}!</h3>
            </div><!-- .text-warning -->

            <br>

            Haz realizado {{($ra+$re)}} sorteos en total. <br>
            @if($crp=count($rp)>0)
              Más <b>{{$crp}}</b> sorteo{{($crp>1?'s pendientes':' pendiente')}}
            @endif

            <br>

            <!-- $re guarda el conteo de la petición hace referencia a $rafflesRequests -->
            {{($rr = count($raffleRaquests))>1?'Tienes '.$rr.' peticiones de sorteos.':'Tienes '.$rr.' petición de sorteo.'}}

            <br>


          </div><!-- .col-xs10-sm10-md10-lg10 -->
        </div><!-- .row -->

      </div><!-- .list-group -->

      <div style="padding-bottom: 10px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

      </div><!-- /div .col-xs12-sm12-md12-lg12 -->
    </div><!-- /div .list-group -->
  </div><!-- /div .row -->

</div><!-- /div .tab-pane .fade #general -->