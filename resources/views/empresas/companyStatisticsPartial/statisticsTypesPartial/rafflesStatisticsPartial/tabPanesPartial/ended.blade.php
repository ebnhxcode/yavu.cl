<div role="tabpanel" class="tab-pane fade" id="ended">
  <div class="row">
    <div class="list-group">
      <br>
      <div align="center">
        <img width="16" src="{{url('/img/glyphicons/glyphicons/png/glyphicons-641-elections.png')}}" alt="">&nbsp;&nbsp;Sorteos <b>Finalizados</b>
      </div>
      <hr>
      <div style="padding: 10px;">
        @foreach($rafflesEnded as $key => $raffle)

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
                </span>
                <b>{{$raffle->nombre_sorteo}}</b>
                <div class="softText-descriptions">
                  {{($d=$raffle->descripcion)?$d:'sin descripción'}} <br>
                </div><!-- .softText-descriptions-middle -->

              </div>

              <div class="softText-descriptions">
                Concursantes totales  <b>{{count($raffle->participants)}}</b> <br>

                Visualizaciones <b>{{count($raffle->displays)}}</b> <br> <!-- <- le sirve a nuestros clientes para hacerle seguimiento a los sorteos -->

                <div class="btn-default">

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

                </div><!-- .btn-default -->

              </div><!-- .softText-descriptions -->

            </div><!-- /div .col-xs11-sm8-md8-lg8 -->

          </div><!-- .row -->
          <hr>
        @endforeach
      </div><!-- styled padding 10px -->
    </div><!-- /div .list-group -->
  </div><!-- /div .row -->
</div><!-- /div .tab-pane .fade -->