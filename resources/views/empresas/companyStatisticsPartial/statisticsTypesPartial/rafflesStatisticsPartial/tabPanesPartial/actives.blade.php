<div role="tabpanel" class="tab-pane fade" id="actives">
  <div class="row">
    <div class="list-group">
      <br>
      <div align="center">
        <img width="16" src="{{url('/img/glyphicons/glyphicons/png/glyphicons-341-globe.png')}}" alt=""> Sorteos Activos
      </div>
      <hr>
      <div style="padding: 10px;">
        @foreach($rafflesActive as $key => $raffle)

          <div class="row">
            <div style="padding-bottom: 10px;" class="col-xs-12 col-sm-2 col-md-2 col-lg-2">

              <a class="thumbnail">
                <img id='RaffleImage' src='/img/users/{{ ($raffle->imagen_sorteo!='')?$raffle->imagen_sorteo:'usuario_nuevo.png' }}' class='center-block'>
              </a><!-- /div .thumbnail -->

            </div><!-- /div .col-xs12-sm12-md12-lg12 -->
            <div style="padding-bottom: 10px;" class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
              <div>
                <span style="float:right;" class="btn btn-xs btn-default">
                  Opciones
                  @include('alerts.betaInfo')
                </span>
                <b>{{$raffle->nombre_sorteo}}</b>
                <div class="softText-descriptions-middle">
                  {{$raffle->descripcion}} <br>


                </div>
              </div>

              <div class="softText-descriptions">
                Participantes {{count($raffle->participants)}} <br>
              </div>

            </div><!-- /div .col-xs12-sm12-md12-lg12 -->

          </div>
          <hr>
        @endforeach
      </div><!-- styled padding 10px -->
    </div><!-- /div .list-group -->
  </div><!-- /div .row -->

</div><!-- /div .tab-pane .fade -->