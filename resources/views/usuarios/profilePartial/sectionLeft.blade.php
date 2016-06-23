<div class="list-group">
  <div class="list-group-item">

    <div class="thumbnail">
      <img id='ImagenPerfil' src='/img/users/{!! isset($user)?($user->imagen_perfil!='')?$user->imagen_perfil:'usuario_nuevo.png':'' !!}' class='center-block'>
    </div><!-- /div .thumbnail -->

    <h3>{!! $user->nombre.' '.$user->apellido !!}</h3>
    <div class="dropdown">
      <button class="btn btn-default btn-sm dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
        <span class="caret"></span>
      </button><!-- /div .btn .btn-default .btn-sm .dropdown-toggle -->
      <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
        <li>
          <a href="{!! route('usuarios_edit_path', $user->id) !!}">Editar Perfil de Usuario</a>
        </li>
      </ul><!-- /div .dropdown-menu -->
    </div><!-- /div .dropdown -->

  </div><!-- /div .list-group-item -->
</div><!-- /div .list-group -->

@include('miniDashboard.miniDashboard')