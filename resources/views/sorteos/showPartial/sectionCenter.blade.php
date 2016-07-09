<div class="list-group">

  @if(isset($winners))
    <div class="list-group-item">
      <small>GANADOR DEL SORTEO</small>
    </div><!-- /div .list-group-item .success -->
    <div class="list-group-item">
      <div>
        ¡Ganador! : {!! $winners[0]->nombre.' '.$winners[0]->apellido !!}
      </div><!-- /div .well .well-xs -->
    </div><!-- /div .list-group-item .success -->

  @else
    <div class="list-group-item">
      <small>SORTEO PENDIENTE</small>
    </div><!-- /div .list-group-item .success -->
    <div class="list-group-item">
      <div class="semi-amplio">
        <div class="row">

          <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
            ¡A&uacute;n no se ha sorteado el ganador! <br>
            <span class="text-danger">
              ¡Espera hasta dentro de <abbr class='timeago text-danger' id='timeago{!! $sorteo->id !!}' value='{!! $sorteo->fecha_inicio_sorteo !!}' title='{!! $sorteo->fecha_inicio_sorteo !!}'>{!! $sorteo->fecha_inicio_sorteo !!}</abbr>!<br>
            </span><!-- /div .text-danger -->
          </div><!-- /div .col-lg9-md9-sm9-xs12 -->

          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <img width="80" style="float: right;" src="{!! URL::to('img/yavu005.png') !!}" alt="">
          </div><!-- /div .col-lg3-md3-sm3-xs12 -->

        </div><!-- /div .row -->
      </div><!-- /div .well .well-xs -->
    </div><!-- /div .list-group-item .success -->
  @endif
</div><!-- /div .list-group -->

<div class="list-group">
  <div class="list-group-item"><small class="text-success">ADMINISTRADOR: </small>
    <div style="font-size:0.75em;float:right;" class="text-info">
      info
    </div>
    <br><small class="softText-descriptions">Contactar con el ganador</small></div>
  <div class="list-group-item">
    @if($userSession->userCompanies[0]->id==$sorteo->empresa_id)
      @if($winnerInfo = $winners[0]->winnerInfo)
        {!! $winnerInfo->email !!}<br>
        {!! $winnerInfo->fono !!}<br>
        {!! $winnerInfo->fono_2 !!}<br>
      @endif
    @endif

  </div>
</div>

<div id="msjs{!! $sorteo->id !!}" class="alert alert-info alert-dismissible" style="display: none;" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div><!-- /div #msjs+sorteo_id  .alert .alert-info .alert-dismissible -->

<div class="list-group">
  <div class="list-group-item">
    <small>IMAGEN DEL SORTEO</small>
  </div>
  <div class="list-group-item">
    <div class="thumbnail">
      <img src='{!! isset($sorteo)?($sorteo->imagen_sorteo!='')?'/img/users/'.$sorteo->imagen_sorteo:'https://tiendas-asi.com/wp-content/uploads/2015/04/sorteo-diariodebodas.jpg':'' !!}' width=100%>
    </div><!-- /div .thumbnail -->
  </div><!-- /div .list-group-item-full-header -->
</div><!-- /div .list-group -->