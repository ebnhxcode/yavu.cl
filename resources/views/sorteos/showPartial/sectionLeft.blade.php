@if(count($sorteos)>0)
  <div class="list-group">

    <div class="list-group-item">
      <small>LISTA DE SORTEOS ACTIVOS</small>
    </div><!-- /div .list-group-item .success -->

    @foreach($sorteos as $sorteo)

      <div id="" class="list-group-item ">
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <b>{!! $sorteo->nombre_sorteo !!}</b>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <td>{!! $sorteo->nombre_empresa !!}</td>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <a class="btn btn-success btn-sm" href="{!!URL::to('/sorteos/'.$sorteo->id)!!}">Ver sorteo</a>
          </div>
        </div>







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