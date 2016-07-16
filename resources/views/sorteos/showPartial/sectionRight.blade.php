<div class="list-group">

  <div class="list-group-item">
    <small>INFORMACIÓN DEL SORTEO</small>
  </div><!-- /div .list-group-item .success -->

  <div class="list-group-item">
    <h3><b>{!!$sorteo->nombre_sorteo!!}</b><br></h3>
    <h5><span class="softText">{!!$sorteo->estado_sorteo!!}</span></h5>
    <div class="softText-descriptions-middle">
      {!!$sorteo->descripcion!!}<br>
      Dentro de
      <abbr class='timeago text-danger' id='timeago{!! $sorteo->id !!}' value='{!! $sorteo->fecha_inicio_sorteo !!}' title='{!! $sorteo->fecha_inicio_sorteo !!}'>{!! $sorteo->fecha_inicio_sorteo !!}</abbr><br>
      A las 21:00:00 horas.
    </div><!-- /div .softText-descriptions-middle -->
    <br>
    <div class="">
      <input id="token" type="hidden" name="_token" value="{!! csrf_token() !!}">
      <button class="btn btn-success btn-md UsarTicket" value="{!! $sorteo->id !!}" type="button" data-dismiss="modal">Participar</button>
    </div><!-- /div .amplio -->

    <hr>

    <!-- #refact plz -->
    @if($sorteo->user_id == Auth::user()->get()->id && !isset($winners))
      <a id="SortearGanador" data-toggle="modal"  class="btn btn-primary btn-sm" value="{!! $sorteo->id !!}">Sortear ganador</a>
      @include('sorteos.forms.modalSortearParticipante')
      @if($sorteo->estado_sorteo == 'Pendiente')
      {!!link_to_route('sorteos.edit', $title = 'Editar', $parameters = $sorteo->id, $attributes = ['class'=>'btn btn-primary btn-sm'])!!}
      @endif
    @endif
    <!-- #end refact plz -->

  </div><!-- /div .list-group-item -->
</div><!-- /div .list-group -->