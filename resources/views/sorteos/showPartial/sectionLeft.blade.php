@if(count($sorteos)>0)
  <div class="list-group">

    <div class="list-group-item">
      <small>LISTA DE SORTEOS ACTIVOS</small>
    </div><!-- /div .list-group-item .success -->

    @foreach($sorteos as $sorteo)

      <div id="" class="list-group-item ">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <a href="/sorteos/{!! $sorteo->id !!}"><b>{!! $sorteo->nombre_sorteo !!}</b></a>


            <span class="text-info" style="float: right;font-size: 0.8em;">
              <small><a href="/empresas/{!! $sorteo->empresa_id !!}">{!! $sorteo->nombre_empresa !!}</a></small>
            </span>

          </div><!-- /div .col-lg12-md12-sm12-xs12 -->

          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="softText-descriptions">
              {!! (($participants = $sorteo->participants()->count())>0)?$participants:'Sin' !!} opciones en tickets <br>
              Premiaci&oacute;n dentro de <abbr class='timeago text-danger' id='timeago{!! $sorteo->id !!}' value='{!! $sorteo->fecha_inicio_sorteo !!}' title='{!! $sorteo->fecha_inicio_sorteo !!}'>{!! $sorteo->fecha_inicio_sorteo !!}</abbr>
            </div>
          </div><!-- /div .col-lg12-md12-sm12-xs12 -->
          <hr>
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <a style="float:right;" class="btn btn-success btn-xs" style="" href="{!!URL::to('/sorteos/'.$sorteo->id)!!}">
              <img src="{!! asset('img/yavu019.png') !!}" width="20" alt=""/>
              ¡<small>Ir a ver el sorteo</small>!
            </a>
          </div><!-- /div .col-lg12-md12-sm12-xs12 -->
        </div><!-- /div .row -->

      {{--<table id="UserList" class="table table-hover" style="font-size: 0.8em;">
        <thead>
        <th>Nombre</th>
        <th>Empresa</th>
        <th>Estado</th>
        <th>Accion</th>
        </thead>
        @foreach($sorteos as $sorteo)
          <tbody>
          @if($sorteo->estado_sorteo != 'Pendiente')
            <td>{!! $sorteo->nombre_sorteo !!}</td>

            <td>{!!$sorteo->estado_sorteo!!}</td>
            @if(Auth::user()->get()->id == $sorteo->user_id && $sorteo->estado_sorteo == 'Pendiente')
              <td><a class="btn btn-primary" href="{!!URL::to('/sorteos/'.$sorteo->id.'/edit')!!}">Editar</a></td>
            @else
              @if($sorteo->estado_sorteo == 'Finalizado')
                <td><a class="btn btn-warning" href="{!!URL::to('/sorteos/'.$sorteo->id)!!}">Ver sorteo</a></td>
              @elseif($sorteo->estado_sorteo == 'Activo')

              @else
                <td><a class="btn btn-danger" href="{!!URL::to('/sorteos/'.$sorteo->id)!!}">Ver sorteo</a></td>
              @endif
            @endif
          @endif
          </tbody>
        @endforeach
      </table>
      --}}

    </div> <!-- /div #insideCourses .list-group-item .wrap -->
    @endforeach

  </div><!-- /div .list-group -->
@endif