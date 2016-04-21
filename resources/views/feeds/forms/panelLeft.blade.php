<div class="col-md-4 col-sm-12 col-xs-12">
  <div id="sticky" class="list-group">
    <div class="list-group-item list-group-item-success">
      <h5>FILTROS DE BÚSQUEDA</h5>
    </div>
    <div class="list-group-item">
      <input id="user_id" value="{!! Auth::user()->get()->id !!}" type="hidden" />
      {!!Form::text('nombre',null,['class' => 'form-control buscar', 'placeholder' => 'buscar publicaciones','id'=>'feedsearch', 'aria-describedby' => 'sizing-addon1'])!!}
    </div>
    
    <div class="list-group-item">
      Categorias
    </div>

    <div class="list-group-item">
      <span class="text-danger" id="Mensaje"></span>
      <a class="btn-link" href="{!! URL::to("/sorteos/create") !!}">
        Crear nuevo sorteo
      </a><span class="label label-info">nuevo</span>
      <br>
      <a class="btn-link" style="" href="{!! URL::to('/tickets') !!}">
        Comprar más tickets
      </a><span class="label label-info">nuevo</span>
      <br>
      <a class="btn-link" style="" href="{!! URL::to('/feeds') !!}">
        Volver a publicaciones
      </a><span class="label label-info">nuevo</span>
      <br>
      <a class="btn-link" style="" href="{!! URL::to('/profile') !!}">
        Ir a mi perfil
      </a><span class="label label-info">nuevo</span>
      <br>
      <a class="btn-link" style="" href="{!! URL::to('/dashboard') !!}">
        Inicio
      </a><span class="label label-info">nuevo</span>
      <br>

    </div>


  </div>
</div><!-- fin del col md 4 -->
<script>


</script>