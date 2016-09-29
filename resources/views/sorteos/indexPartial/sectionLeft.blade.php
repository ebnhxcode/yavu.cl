<div class="list-group">
  <div class="">
    {!!Form::open(['route'=>'search_raffles_engine', 'method'=>'POST'])!!}
      @if(Auth::admin()->check())
        {!!Form::text('nombre',null,['class' => 'form-control buscar', 'placeholder' => 'Buscar sorteo','id'=>'nombre_sorteo', 'aria-describedby' => 'sizing-addon1'])!!}
      @elseif(Auth::user()->check())
        <input id="user_id" value="{!! Auth::user()->get()->id !!}" type="hidden" />

        <div class="input-group input-group-sm">
          <span class="input-group-addon" id="sizing-addon1">
            <span class="glyphicon glyphicon-search">
            </span><!-- /span .glyphicon .glyphicon-search -->
          </span><!-- /span .input-group-addon #sizing-addon1 -->
          {!!Form::text('nombre',null,['class' => 'form-control buscar input-md', 'placeholder' => 'Buscar sorteo','id'=>'sorteothumb', 'aria-describedby' => 'sizing-addon1'])!!}
        </div><!-- /div .input-group .input-group-lg -->

        <input type="hidden" name="_token" value="{!!csrf_token()!!}" id="token" />

      @endif
    {!!Form::close()!!}
  </div><!-- /div .list-group-item -->
</div> <!-- /list group -->
{{--
<div class="list-group">
  <div class="list-group-item">
    <span data-toggle="tooltip" data-placement="left" title="Tickets!" style="font-family: yavu_font;font-size: 1.6em;color:#57E5DB;">E</span>&nbsp;
    <small>Valor de los tickets <span class="label label-warning">$ 100</span> Yavücoins</small>
  </div><!-- /div .list-group-item .success -->
  <div class="list-group-item">
    <div class="softText-descriptions">
      Selecciona la cantidad de tickets y c&oacute;mpralos
    </div>
    {!!Form::select('size', [1=>1,2=>2,3=>3,4=>4,5=>5,6=>6,7=>7,8=>8,9=>9,10=>10], null, ['id' => 'cantidadcompra', 'class' => 'form-control input-sm'])!!}
    <br>
    <button type="button" style="width: 100%" id='comprar' class="btn btn-primary btn-sm comprar">Comprar ticket</button>
    <input type="hidden" name="_token" value="{!!csrf_token()!!}" id="token" />
    <input type="hidden" value="{!!Auth::user()->get()->id!!}" id="user_id" />
  </div><!-- /div .list-group-item -->

</div><!-- /div .list-group -->
--}}
@include('miniDashboard.miniDashboard')

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