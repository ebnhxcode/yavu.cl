<!-- Tab panes -->
<div class="tab-content">

  <div role="tabpanel" class="tab-pane active" id="general">

    <b>Resumen</b><br>


    <div class="softText-descriptions-middle">
      <!-- $ra guarda el conteo de la petición hace referencia a $rafflesActive -->
      {{($rafflesActive = $userCompany->rafflesActive)?($ra = count($rafflesActive))>1?$ra.' sorteos activos.':$ra.' sorteo activo.':'0 sorteos activos.' }} <br>
      <!-- $re guarda el conteo de la petición hace referencia a $rafflesEnded -->
      {{($rafflesEnded = $userCompany->rafflesEnded)?($re = count($rafflesEnded))>1?$re.' sorteos finalizados.':$re.' sorteo finalizado.':'0 sorteos finalizados.' }} <br>

      Haz realizado {{($ra+$re)}} sorteos en total<br>
    </div><!-- /div .softText-descriptions-middle -->

    <hr>
    <div class="row">
      <div class="list-group">
        @foreach($userCompany->rafflesEnded as $key => $raffle)
          <div style="padding-bottom: 10px;" class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
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
          </div><!-- /div .col-xs12-sm6-md6-lg6 -->
        @endforeach
      </div><!-- /div .list-group -->
    </div><!-- /div .row -->

  </div><!-- /div .tab-pane .fade -->

  <div role="tabpanel" class="tab-pane fade" id="actives">

  </div><!-- /div .tab-pane .fade -->

  <div role="tabpanel" class="tab-pane fade" id="inactives">

  </div><!-- /div .tab-pane .fade -->


  <div role="tabpanel" class="tab-pane fade" id="requests">

    <div class="list-group">
      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
        <div class="">

          <div class="softText-descriptions">
            Tienes {{count($raffleRaquests = $userCompany->raffleRequests)}} peticiones de sorteos.
          </div><!-- /div .softText-descriptions -->

        </div><!-- /div .list-group-item -->
      </div><!-- /div .col-xs12-sm6-md6-lg6 -->
    </div><!-- /div .list-group -->

  </div><!-- /div .tab-pane .fade -->




  {{--
    <div role="tabpanel" class="tab-pane fade" id="settings">
    </div><!-- /div .tab-pane .fade -->

    <div role="tabpanel" class="tab-pane fade" id="profile">
    </div><!-- /div .tab-pane .fade -->
  --}}

</div><!-- /div .tab-content -->