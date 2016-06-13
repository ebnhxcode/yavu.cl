


  @if((Auth::user()->check()) && isset($user_id))
    @if($user_id == Auth::user()->get()->id)
      <div class="list-group">
        <div class="list-group-item">
          <strong>PUBLICAR NUEVO ESTADO</strong>
        </div>
        <div class="list-group-item">
          {!!Form::open(['route'=>'estadoempresa.store', 'method'=>'POST'])!!}
          {!!Form::textarea('status',null,['class'=>'form-control','placeholder'=>'¿Qué deseas compartir en yavu?', 'maxlength'=>'500', 'required'=>'required','style'=>'resize:none;', 'rows'=>'4', 'id'=>'status'])!!}
          @if(Auth::user()->check())
            {!!Form::hidden('user_id', Auth::user()->get()->id, ['id'=>'user_id'])!!}
            {!!Form::hidden('empresa_id', $empresa_id, ['id'=>'empresa_id'])!!}
          @else
            {!!Form::hidden('user_id', $user_id, ['id'=>'user_id'])!!}
          @endif
        </div>
        <div class="list-group-item">
          {!!link_to('#!', $title="Publicar estado", $attributes = ['id'=>'publicar', 'class'=>'btn btn-success btn-sm'], $secure = null)!!}
          {!!link_to('#!', $title="Limpiar", $attributes = ['id'=>'limpiar', 'class'=>'btn btn-success btn-sm'], $secure = null)!!}
        </div>
        <div class="list-group-item">
          <div id="msj-success" class="alert alert-success alert-dismissible" role="alert" style="display:none">
            Publicacion creada correctamente
          </div>
          <div id="msj-error" class="alert alert-info alert-dismissible" role="alert" style="display:none">
            El texto ingresado contiene caracteres no permitidos que no se guardarán.
          </div>
        </div>
        {!!Form::close()!!}
      </div>
    @endif
  @endif



  <div class="list-group">
  @foreach($feeds as $feed)
      <div id='publicacion{!! $feed->id !!}' class="list-group-item">
        <div class="row">
          <div class="col-md-1 col-sm-offset-0 col-xs-offset-0">
            <a href="/empresa/NOMBRE_DE_LA_EMPRESA">
              <img class='media-object' src='/img/users/IMAGEN_PERFIL_EMPRESA' data-holder-rendered='true' style='width: 36px; height: 36px; border-radius: 10%;'/>
            </a>
          </div><!-- /div .col-md1-sm-offset-12-xs-offset-12 -->

          <div class="col-md-11 col-sm-12 col-xs-12">
            <div class="dropdown">
              <div style="float: right;" class="dropdown">
                <button class="btn btn-default btn-xs dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                  <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                  <span class="caret"></span>
                </button><!-- /button .btn .btn-default .dropdown-toggle -->
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                  <li><a onclick="eliminarEstado({!!  $feed->id.','.$feed->user_id!!})" href="#!">{!! (Auth::user()->get()->id==$feed->user_id?"Eliminar":"Ocultar") !!} publicación</a></li>
                  <!--(user_id==value.user_id?"<li><a onclick='eliminarEstado("+value.id+",0)' href='#!'>Ocultar estado</a></li>":"")-->
                  <!--(user_id==value.user_id?"<li><a href='/feeds/"+value.id+"/edit'>Editar publicaci&oacute;n</a></li>":"")-->
                </ul><!-- /ul .dropdown-menu -->
              </div><!-- /div .dropdown -->
            </div><!-- /div .dropdown -->

            <div class="media-heading">
              <strong><a href="/empresa/NOMBRE_DE_LA_EMPRESA" style="color: #3C5B28;">NOMBRE_DE_LA_EMPRESA</a></strong>
              <strong>·</strong>
              <small style="font-size: .7em; color: grey;"><abbr class='timeago' id='timeago{!! $feed->id !!}' value='{!! $feed->created_at !!}' title='{!! $feed->created_at !!}'>{!! $feed->created_at !!}</abbr></small>
            </div>

            {!! $feed->status !!}
            <hr>
            <span name='megusta' class='' onclick='Interactuar({!! $feed->id !!})' id='estado_{!! $feed->id !!}' value='e{!! $feed->empresa_id !!}'>
              <!--<img id='imgcoin{!! $feed->id !!}' src='/img/newGraphics/cobrar_coins.png' />-->
              <small>Cobrar mis coins</small>
            </span><!-- /span #estado_+feed_id -->

          </div><!-- /div .col-md11-sm12-xs12 -->
        </div><!-- /div .row -->
      </div><!-- /div .list-group-item -->
  @endforeach
  </div><!-- /div .list-group -->
  {!! $feeds->render() !!}







{{--
  <div id="e">
    <div id="Estados">
    </div><!-- /div #Estados -->
    {!!Form::hidden('idUltima', "0", ['id'=>'idUltima'])!!}
  </div><!-- /div #e -->


    <div id="msj-estado" class="alert alert-dismissible list-group-item" role="alert" style="display:none;">
      <img width="30%"  src='{!! URL::to('/img/users/iconoCargando.gif') !!}'/>
    </div><!-- /div #msj-estado -->

    <div id='msj-finPublicaciones' class="alert alert-dismissible list-group-item-warning" role="alert" style="display:none;">
      No hay mas publicaciones.
    </div>

    <a id="CargarEstados" href="#!" class="list-group-item list-group-item-info">
      Cargar estados
      <span id="EstadosNuevos" class="badge"></span>
    </a>
--}}
