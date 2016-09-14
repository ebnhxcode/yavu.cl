<div role="tabpanel" class="tab-pane fade" id="pending">
  <div class="row">
    <div class="list-group">
      <br>
      <div align="center">
        <img width="16" src="{{url('/img/glyphicons/glyphicons/png/glyphicons-75-cup.png')}}" alt="">&nbsp;&nbsp;Sorteos <b>Pendientes</b>
      </div>
      <hr>
      <div style="padding: 10px;">
        @foreach($rafflesPending as $key => $raffle)
          <div style="margin:8px; box-shadow: 1px 2px 2px #E9E9E9; border-radius: 3px;">
            <div class="list-group-item">
              <div class="row">
                <div style="padding-bottom: 10px;" class="col-xs-1 col-sm-2 col-md-2 col-lg-2">

                  <a class="thumbnail">
                    <img id='RaffleImage' src='/img/users/{{ ($raffle->imagen_sorteo!='')?$raffle->imagen_sorteo:'usuario_nuevo.png' }}' class='center-block'>
                  </a><!-- /div .thumbnail -->

                </div><!-- /div .col-xs1-sm2-md2-lg2 -->
                <div style="padding-bottom: 10px;" class="col-xs-11 col-sm-8 col-md-8 col-lg-8">
                  <div>

                    <span style="float:right;" class="btn btn-xs btn-default">
                      Opciones
                      @include('alerts.betaInfo')
                    </span><!-- .btn .btn-xs .btn-default -->
                    <b>{{$raffle->nombre_sorteo}}</b>
                    <div class="softText-descriptions">
                      {{($d=$raffle->descripcion)?$d:'sin descripción'}} <br>
                    </div><!-- .softText-descriptions-middle -->

                  </div>

                  <div class="softText-descriptions">
                    Participantes en estos momentos <b> <small> ¡AÚN PENDIENTE! </small> </b> <br>
                    Visualizaciones <b> <small> ¡AÚN PENDIENTE! </small> </b> <br>
                  </div><!-- .softText-descriptions -->
                </div><!-- /div .col-xs11-sm8-md8-lg8 -->
              </div><!-- .row -->
            </div><!-- .list-group-item -->
          </div><!-- shadow-box -->
          <hr>
        @endforeach
      </div><!-- styled padding 10px -->
    </div><!-- /div .list-group -->
  </div><!-- /div .row -->
</div><!-- /div .tab-pane .fade -->