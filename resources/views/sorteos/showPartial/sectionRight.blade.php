<div class="list-group">

  <div class="list-group-item">
    <small>INFORMACIÓN DEL SORTEO</small>
  </div><!-- /div .list-group-item .success -->

  <div class="list-group-item">
    <h3><b>{!!$sorteo->nombre_sorteo!!}</b><br></h3>
    <h5><span class="softText">{{$raffleStatus = $sorteo->estado_sorteo}}</span></h5>
    @if($raffleStatus != 'Finalizado')
      <div class="softText-descriptions-middle">
        {!!$sorteo->descripcion!!}<br>

        @if(date('m/d/Y') == $sorteo->fecha_inicio_sorteo)
          Quedan : {{9-date('h')}} horas aprox
        @endif

      </div><!-- /div .softText-descriptions-middle -->
      <br>
      <div>
        <input id="token" type="hidden" name="_token" value="{!! csrf_token() !!}">
        <button class="btn btn-success btn-md UsarTicket" value="{!! $sorteo->id !!}" type="button" data-dismiss="modal">Participar</button>
      </div><!-- /div -->
    @else
      <div class="thumbnail">
        <img id='ImagenPerfil' src='/img/users/{{ ($winnerInfo = $winners[0]->winnerInfo)?($wip = $winnerInfo->imagen_perfil!='')?$wip:'usuario_nuevo.png':''}}' class='center-block'>
      </div><!-- /div .thumbnail -->

      ¡Ganador! : {{ $winnerInfo->nombre . ' ' . $winnerInfo->apellido  }} <br>

    @endif

      <!-- #refact plz -->
    @if($sorteo->user_id == Auth::user()->get()->id && !isset($winners))
      {{-- <a id="SortearGanador" data-toggle="modal"  class="btn btn-primary btn-sm" value="{!! $sorteo->id !!}">Sortear ganador</a> --}}
      @include('sorteos.forms.modalSortearParticipante')
      @if($sorteo->estado_sorteo == 'Pendiente')
      {!!link_to_route('sorteos.edit', $title = 'Editar', $parameters = $sorteo->id, $attributes = ['class'=>'btn btn-primary btn-sm'])!!}
      @endif
    @endif
    <!-- #end refact plz -->

  </div><!-- /div .list-group-item -->

  {{-- EXTRA
  <div class="list-group-item">
    <small>
      AYUDA A QUE <b  style="font-size: 1.2em;">{{ $winnerInfo->nombre}}</b> SEPA QUE GAN&Oacute;
    </small>
  </div><!-- /div .list-group-item -->
  --}}

</div><!-- /div .list-group -->