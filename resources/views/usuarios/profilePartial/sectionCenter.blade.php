<div class="list-group">

  <div class="list-group-item">
    <div id="IPortada">
      <a class='thumbnail'>
        <img id='ImagenPortada' src='/img/users/{!! isset($user)?($user->imagen_portada!='')?$user->imagen_portada:'banner.png':'' !!}'>
      </a><!-- /div .thumbnail -->
    </div><!-- div #IPortada -->
  </div><!-- /div .list-group-item -->
  <div class="list-group-item">
    <div class="softText-descriptions">

    <!-- Nav tabs -->
    <ul id="TabUserProfile" class="nav nav-tabs" role="tablist">

      <li role="presentation" class="active"><a href="#coinsHistory" aria-controls="coinsHistory" role="tab" data-toggle="tab">Historial coins</a></li>
      <li role="presentation"><a href="#ticketsHistory" aria-controls="ticketsHistory" role="tab" data-toggle="tab">Hitorial tickets</a></li>
      <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Información</a></li>
      <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Imagenes</a></li>
    </ul>
    <!-- End Nav tabs -->

    <!-- Tab panes -->
    <div class="tab-content">

      <div role="tabpanel" class="tab-pane wrap active list-group" id="coinsHistory">
        @foreach($movements = $userSession->history_moves_of_coins as $key => $movement)
          <div class="list-group-item div-hover">
            Actividad : {!! ($movement->motivo) !!} hace
            <abbr class='timeago' id='timeago' value='{!! $movement->created_at !!}' title='{!! $movement->created_at !!}'>{!! $movement->created_at !!}</abbr>
            {!! (($cantidadYavuCoins = $movement -> cantidad) > 0?'<span class="text-success">La suma de : ':'<span class="text-danger">El uso por : ') . $cantidadYavuCoins !!} <span style=" font-family: yavu_font;color: #FFE955;font-size: 2em;">J</span>.
          </div><!-- /div .list-group-item -->
        @endforeach
      </div><!-- /div .tab-pane .fade .active .list-group .wrap -->

      <div role="tabpanel" class="tab-pane fade list-group" id="ticketsHistory">
        @foreach($userSession->history_moves_of_tickets as $movement)
          <div class="list-group-item">
            Actividad : Compra de ticket ${!! ($movement->monto) !!} hace
            <abbr class='timeago' id='timeago' value='{!! $movement->created_at !!}' title='{!! $movement->created_at !!}'>{!! $movement->created_at !!}</abbr>
          </div><!-- /div .list-group-item -->
        @endforeach
      </div><!-- /div .tab-pane .fade .active .list-group .wrap -->

      <div role="tabpanel" class="tab-pane fade" id="messages">
        Some data
      </div><!-- /div .tab-pane .fade .active .list-group .wrap -->

      <div role="tabpanel" class="tab-pane fade" id="settings">
        Some data
      </div><!-- /div .tab-pane .fade .active .list-group .wrap -->

    </div><!-- /div .tab-content -->
    <!-- End Tab panes -->

    {{--{!! ($userSession->registro_coins()->sum('cantidad')) !!}--}}

  </div><!-- /div .softText-descriptions -->
  </div><!-- /div .list-group-item -->
</div><!-- /div .list-group -->