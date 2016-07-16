<div class="list-group">
  <div class="list-group-item">

    <div class="thumbnail">
      <img id='ImagenPerfil' src='/img/users/{!! isset($user)?($user->imagen_perfil!='')?$user->imagen_perfil:'usuario_nuevo.png':'' !!}' class='center-block'>
    </div><!-- /div .thumbnail -->

    <div class="softText-descriptions">

      <!-- Nav tabs (Tabs -> botones de opciones) -->
        @include('usuarios.profilePartial.sectionLeftPartial.navTabs')
      <!-- End Nav tabs -->

      <!-- Tab panes (Panes -> Contenido de las tabs) -->
        @include('usuarios.profilePartial.sectionLeftPartial.tabPanes')
      <!-- End Tab panes -->

    </div><!-- /div .softText-descriptions -->

  </div><!-- /div .list-group-item -->
</div><!-- /div .list-group -->

@include('miniDashboard.miniDashboard')