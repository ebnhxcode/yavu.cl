<div id="IPortada" class="list-group">
  <div class="thumbnail">
    <!-- Portada -->
      <img id='ImagenPortada' src='/img/users/{!! isset($e)?($e->imagen_portada!='')?$e->imagen_portada:'banner.png':'banner.png' !!}'>
    <!-- /Portada -->
  </div>
</div>
<input type="hidden" name="_token" value="{!!csrf_token()!!}" id="token" />
@include('feeds.indexPartial.sectionCenter')
<br>