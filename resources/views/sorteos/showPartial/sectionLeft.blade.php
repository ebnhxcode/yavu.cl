@if(count($sorteos)>0)
  <div class="list-group">

    <div class="list-group-item">
      <small>LISTA DE SORTEOS ACTIVOS</small>
      <a href="/sorteos" style="float: right;">
        <b class="softText-descriptions">
          ¡{{count($sorteos)}} Sorteos!
        </b>
      </a>
    </div><!-- /div .list-group-item .success -->

    <div class="list-group-item">
      <div class="collapse" id="collapseExample">

        @foreach($sorteos as $key => $sorteo)
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <a href="/sorteos/{!! $sorteo->id !!}"><b>{!! $sorteo->nombre_sorteo !!}</b></a>

              <span class="text-info" style="float: right;font-size: 0.8em;">
                <small><a href="/empresas/{!! $sorteo->empresa_id !!}">{!! $sorteo->nombre_empresa !!}</a></small>
              </span><!-- /span .text-info -->

            </div><!-- /div .col-lg12-md12-sm12-xs12 -->

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="softText-descriptions">
                {!! (($participants = $sorteo->participants()->count())>0)?$participants:'Sin' !!} opciones en tickets <br>
                Premiaci&oacute;n dentro de <abbr class='timeago text-danger' id='timeago{!! $sorteo->id !!}' value='{!! $sorteo->fecha_inicio_sorteo !!}' title='{!! $sorteo->fecha_inicio_sorteo !!}'>{!! $sorteo->fecha_inicio_sorteo !!}</abbr>
              </div><!-- /div .softText-descriptions -->
            </div><!-- /div .col-lg12-md12-sm12-xs12 -->
            
            <hr>

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <a style="float:right;" class="btn btn-success btn-xs" href="{!!URL::to('/sorteos/'.$sorteo->id)!!}">
                <img src="{!! asset('img/yavu019.png') !!}" width="20" alt=""/>
                ¡<small>IR A VER EL SORTEO</small>!
              </a><!-- /div .btn .btn-success .btn-xs -->
            </div><!-- /div .col-lg12-md12-sm12-xs12 -->
          </div><!-- /div .row -->
          <hr>
        @endforeach

      </div><!-- /div #collapseExample .collapse -->
      <small>
        <span id="openclose" data-toggle="collapse" data-target="#collapseExample" class="btn btn-default btn-xs">
          ABRIR
        </span><!-- #openclose .btn .btn-default .btn-xs -->
      </small>
      <script>

        $('#openclose').click(function(){
          if($(this).text().trim() == 'ABRIR') $(this).text('CERRAR');
          else if ($(this).text().trim() == 'CERRAR') $(this).text('ABRIR');
        });
        
      </script><!-- /script open/close -->
    </div><!-- /div .list-group-item -->
  </div><!-- /div .list-group -->
@endif