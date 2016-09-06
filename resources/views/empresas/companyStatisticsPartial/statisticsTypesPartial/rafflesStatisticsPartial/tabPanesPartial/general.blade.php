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
        {{($rafflesActive = $userCompany->rafflesActive)?($ra = count($rafflesActive))>1?$ra.' sorteos activos.':$ra.' sorteo activo.':'0 sorteos activos.' }} <br>

        <!-- $re guarda el conteo de la petición hace referencia a $rafflesEnded -->
        {{($rafflesEnded = $userCompany->rafflesEnded)?($re = count($rafflesEnded))>1?$re.' sorteos finalizados.':$re.' sorteo finalizado.':'0 sorteos finalizados.' }} <br>

        <!-- $re guarda el conteo de la petición hace referencia a $rafflesEnded -->
        {{($rafflesPending = $userCompany->rafflesPending)?($rp = count($rafflesPending))>1?$re.' sorteos pendientes.':$re.' sorteo pendiente.':'0 sorteos pendientes.' }} <br>

        Haz realizado {{($ra+$re+$rp)}} sorteos en total<br>

        {{($raffleRaquests = $userCompany->raffleRequests)? ($rr = count($raffleRaquests))>1?'Tienes '.$rr.' peticiones de sorteos.':'Tienes '.$rr.' petición de sorteo.':'No tienes peticiones de sorteos.'}}
        <br>
      </div><!-- /div .softText-descriptions-middle -->

      <hr>

      <div style="padding-bottom: 10px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

        @foreach($userCompany->rafflesEnded as $key => $raffle)
            <div class="list-group-item">
                <span>
                  <b>
                    {{$raffle->nombre_sorteo}}
                  </b>
                  <small class="softText-descriptions" style="float:right;">
                    {{-- ver m&aacute;s --}}
                  </small><!-- /small .softText-descriptions -->
                </span>
              <br>
              <div class="softText-descriptions">
                <?php $times=0; ?>
                @foreach($followers as $key => $follower)
                  <?php ( count($follower->participatedIn($raffle->id))>0?$times++:0 ) ?>
                @endforeach

                <br>
                <br>
                +------------------------+ <br>
                | <br>
                |  insertar gráfico <br>
                | <br>
                +------------------------+ <br>
                <br>
              </div><!-- /div .softText-descriptions-middle -->
            </div><!-- /div .list-group-item -->
        @endforeach

      </div><!-- /div .col-xs12-sm12-md12-lg12 -->
    </div><!-- /div .list-group -->
  </div><!-- /div .row -->

</div><!-- /div .tab-pane .fade -->