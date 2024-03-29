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
  <a href="/main/sorteos/activos" class="list-group-item panel-footer">
    <small>
      <span class="glyphicon glyphicon-chevron-left">
      </span><!-- /span .glyphicon .glyphicon-chevron-left -->
      volver a sorteos
    </small>
  </a><!-- /div .list-group-item -->
</div><!-- /div .list-group -->