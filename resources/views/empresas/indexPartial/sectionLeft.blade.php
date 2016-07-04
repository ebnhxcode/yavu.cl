<div class="list-group">
  <div class="list-group-item">
    {!!Form::open(['action'=>'EmpresaController@BuscarEmpresas', 'method'=>'GET'])!!}
    <div class="input-group input-group-sm">
      {!!Form::text('nombre',null,['class' => 'form-control', 'placeholder' => 'Buscar empresas', 'aria-describedby' => 'sizing-addon1', 'required'])!!}
      <span class="input-group-addon" id="sizing-addon1">
          <span class="glyphicon glyphicon-search">
          </span><!-- /span .glyphicon .glyphicon-search -->
        </span><!-- /span .input-group-addon #sizing-addon1 -->
    </div><!-- /div .input-group .input-group-lg -->
    {!! csrf_field() !!}
    <div class="softText-descriptions">
      Filtros de b&uacute;squeda
    </div>
    {!!Form::select('ciudad',
      ['Tarapacá' => 'Tarapacá',
      'Parinacota' => 'Parinacota',
      'Arica' => 'Arica',
      'Antofagasta' => 'Antofagasta',
      'Atacama' => 'Atacama',
      'La Serena' => 'La Serena',
      'Coquimbo' => 'Coquimbo',
      'Valparaiso' => 'Valparaiso',
      'Aconcagua' => 'Aconcagua',
      'Región Metropolitana' => 'Región Metropolitana',
      'O Higgins' => 'O Higgins',
      'Curicó' => 'Curicó',
      'Talca' => 'Talca',
      'Linares' => 'Linares',
      'Maule' => 'Maule',
      'Ñuble' => 'Ñuble',
      'Concepción' => 'Concepción',
      'Arauco' => 'Arauco',
      'Biobío' => 'Biobío',
      'Malleco' => 'Malleco',
      'Cautín' => 'Cautín',
      'Araucanía' => 'Araucanía',
      'Los Ríos' => 'Los Ríos',
      'Valdivia' => 'Valdivia',
      'Osorno' => 'Osorno',
      'Los Lagos' => 'Los Lagos',
      'Llanquihue' => 'Llanquihue',
      'Chiloé' => 'Chiloé',
      'Aysen' => 'Aysen',
      'Magallanes' => 'Magallanes',
      'otra' => 'otras...'],
      $selected = null, ['class' => 'form-control input-sm', 'maxlength' => '100'])
      !!}
    {!!Form::close()!!}
  </div>
</div>


@include('miniDashboard.miniDashboard')
@if(count($bannersRandom)>0)
  @include('listarBanner.listaBanner')
@endif
{{--
<div class="list-group">

  <div class="list-group-item list-group-item-success">
    <h5>ÚLTIMOS 10 SORTEOS PENDIENTES / FINALIZADOS
      <span id="resizeCourses" name="small" class="glyphicon glyphicon-resize-full" style="float: right;">
      </span><!-- /div #resizeCourses -->
    </h5>
  </div><!-- /div .list-group-item .success -->

  <script>
    $('#resizeCourses').click(function(){
      if($(this).attr('name') == 'small'){
        $('#insideCourses').removeClass('wrap');
        $('#insideCourses').addClass('wrap-long-vertical');
        $(this).removeClass('glyphicon-resize-full');
        $(this).addClass('glyphicon-resize-small');
        $(this).attr('name', 'long');
        return true;
      }else{
        $('#insideCourses').removeClass('wrap-long-vertical');
        $('#insideCourses').addClass('wrap');
        $(this).removeClass('glyphicon-resize-small');
        $(this).addClass('glyphicon-resize-full');
        $(this).attr('name', 'small');
        return true;
      }
    });
  </script><!-- /script for accion with #resizeCourses  -->
  <div id="insideCourses" class="list-group-item wrap">
    <table id="UserList" class="table table-hover" style="font-size: 0.8em;">
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
          <td>{!! $sorteo->nombre_empresa !!}</td>
          <td>{!!$sorteo->estado_sorteo!!}</td>
          @if(Auth::user()->get()->id == $sorteo->user_id && $sorteo->estado_sorteo == 'Pendiente')
            <td><a class="btn btn-primary" href="{!!URL::to('/sorteos/'.$sorteo->id.'/edit')!!}">Editar</a></td>
          @else
            @if($sorteo->estado_sorteo == 'Finalizado')
              <td><a class="btn btn-warning" href="{!!URL::to('/sorteos/'.$sorteo->id)!!}">Ver sorteo</a></td>
            @elseif($sorteo->estado_sorteo == 'Activo')
              <td><a class="btn btn-success" href="{!!URL::to('/sorteos/'.$sorteo->id)!!}">Ver sorteo</a></td>
            @else
              <td><a class="btn btn-danger" href="{!!URL::to('/sorteos/'.$sorteo->id)!!}">Ver sorteo</a></td>
            @endif
          @endif
        @endif
        </tbody>
      @endforeach
    </table>
  </div> <!-- /div #insideCourses .list-group-item .wrap -->
</div><!-- /div .list-group -->
--}}