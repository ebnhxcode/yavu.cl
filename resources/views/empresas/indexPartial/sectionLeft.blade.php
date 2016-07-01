<div class="list-group">
  <div class="list-group-item">
    <small>Valor de los tickets <span class="label label-warning">$ 100</span> Yavücoins</small>
  </div><!-- /div .list-group-item .success -->
  <div class="list-group-item">
    {!!Form::select('size', [1=>1,5=>5,10=>10,15=>15], null, ['placeholder' => 'Seleciona la cantidad...','id' => 'cantidadtickets', 'class' => 'form-control input-sm'])!!}
    <br>
    <button type="button" style="width: 100%" id='comprar' class="btn btn-primary btn-sm comprar">Comprar ticket</button>
    <input type="hidden" name="_token" value="{!!csrf_token()!!}" id="token" />
    <input type="hidden" value="{!!Auth::user()->get()->id!!}" id="user_id" />
  </div><!-- /div .list-group-item -->

</div><!-- /div .list-group -->
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