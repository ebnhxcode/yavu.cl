<div class="list-group">

  <div class="list-group-item">
    <div id="IPortada">
      <a class='thumbnail'>
        <img id='ImagenPortada' src='/img/users/{!! isset($user)?($user->imagen_portada!='')?$user->imagen_portada:'banner.png':'' !!}'>
      </a><!-- /div .thumbnail -->
    </div><!-- div #IPortada -->
  </div><!-- /div .list-group-item -->
</div><!-- /div .list-group -->