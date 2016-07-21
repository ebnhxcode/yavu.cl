<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="list-group">
      <div class="list-group-item">
        <div class="thumbnail">
          <img id='ImagenPerfil' src='/img/users/{!! isset($e)?($e->imagen_perfil!='')?$e->imagen_perfil:'usuario_nuevo.png':'' !!}' class="center-block" class="thumbnail" class="img-rounded" width="300px" height="100px" class="img-responsive">
          {!! Form::hidden('company_id', $e->id, ['id' => 'company_id']) !!}
        </div><!-- /div .thumbnail -->
        <div class="caption">
          @if(Auth::user()->check())
            <div class="list-group">
              {!!Form::hidden('empresa', $e->nombre, ['id'=>'empresa'])!!}
              <span class="btn btn-primary btn-sm seguir" value="{!! $e->id !!}" role="button">{!! count($e->isFollowedBy($userSession->id))>0?'Siguiendo':'Seguir' !!}</span>
              <input type="text" class="btn btn-sm text-success" id="seguidores{!! $e->id !!}" size="10" disabled value="{{($fCounts=round( count($e->followers)*(int)("7.".rand(1,9999)) ) )}}" >
              <div style="float: right;">
                @if($e->user_id == Auth::user()->get()->id)
                  <div class="dropdown">
                    <button class="btn btn-default btn-sm dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                      <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                      <span class="caret"></span>
                    </button><!-- /div .btn .btn-default .btn-sm .dropdown-toggle -->
                    <ul class="dropdown-menu pull-right" aria-labelledby="dropdownMenu1">
                      <li><a href="{!!URL::to('/feeds')!!}">Inicio</a></li>
                      <li>{!!link_to_route('empresas.edit', $title = 'Editar Perfil de Empresa', $parameters = $e->id, $attributes = [])!!}</li>
                      <li><a href="{!! route('usuarios_edit_path', Auth::user()->get()->id) !!}">Editar Perfil de Usuario</a></li>
                      <li role="separator" class="divider"></li>
                      <li><a href="{!!URL::to('/sorteos/create')!!}" style="text-align:center;" class=""><span>Crear sorteo <img width="40%" src= "{!!URL::to('img/dash/ico_sorteo01.png')!!}"/></span></a></li>
                      <li><a href='{!!URL::to('/feeds')!!}' style="text-align:center;" class=""><span>Publicaciones <img width="40%" src= "{!!URL::to('img/dash/ico_pin03.png')!!}"/></span></a></li>
                    </ul><!-- /div .dropdown-menu .pull-right -->
                  </div><!-- /div .dropdown -->
                @endif
              </div><!-- /div styled -->
            </div><!-- /div .list-group -->
          @else
            <a href="{!! URL::to('/usuarios/create') !!}" class="btn btn-primary btn-sm" role="button">Seguir</a>
            <input type="text" class="btn btn-sm text-success" id="seguidores" size="10" disabled >
            <small>Para seguir a esta empresa debes registrarte</small>
          @endif

          <div style="font-size: 1.2em;">
            <address>
              <br>
              <strong>{!! strtoupper("".$e->nombre)!!}.</strong><br />
              Direcci&oacute;n : {!!$e->direccion!!}<br>
              Ciudad : {!!$e->ciudad!!}<br>
              Fono : <abbr title="Phone"></abbr> {!!$e->fono!!}
            </address>

            <address>
              <strong>Contacto: <a href="mailto:#">{!!$e->email!!}</a></strong><br>
            </address>

            <!-- descripcion en acordeon -->
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
              <div class="panel panel-success">
                <div class="panel-heading" role="tab" id="headingOne">
                  <h4 class="panel-title"><a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">Ver Descripción</a></h4><!-- /div .panel-title -->
                </div><!-- /div .panel-heading -->
                <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                  <div class="panel-body">
                    {!! $e->descripcion !!}
                  </div><!-- /div .panel-body -->
                </div><!-- /div .collapseOne -->
              </div><!-- /div .panel .panel-success -->
            </div><!-- /div .panel-group -->
            <!-- fin acordeon -->

          </div><!-- /div styled -->
        </div><!-- /div .caption -->
      </div><!-- /div .list-group-item -->
    </div><!-- /div .list-group -->

    <!-- gmaps -->
    <div class="list-group">
      <div class="list-group-item">
        @include('empresas.forms.modalModificarDireccionMapa')
      </div><!-- /div .list-group-item -->
    </div><!-- /div .list-group -->
    <!-- /gmaps -->

  </div><!-- /div .col-lg12-md12-sm12-xs12 -->
  <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
  </div><!-- /div col-xs-5 col-sm-5 col-md-5 col-lg-5 -->
</div><!-- /div .row -->