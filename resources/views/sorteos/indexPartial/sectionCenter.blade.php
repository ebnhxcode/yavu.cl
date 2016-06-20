<div class="list-group">
  <div class="">
    <!-- FILTRO DE BÚSQUEDA -->
  </div><!-- /div .list-group-item .success -->
  <div class="">
    @if(Auth::admin()->check())
      {!!Form::text('nombre',null,['class' => 'form-control buscar', 'placeholder' => 'Buscar sorteo','id'=>'nombre_sorteo', 'aria-describedby' => 'sizing-addon1'])!!}
    @elseif(Auth::user()->check())
      <input id="user_id" value="{!! Auth::user()->get()->id !!}" type="hidden" />

      <div class="input-group input-group-lg">
        <span class="input-group-addon" id="sizing-addon1">
          <span class="glyphicon glyphicon-search">
          </span><!-- /span .glyphicon .glyphicon-search -->
        </span><!-- /span .input-group-addon #sizing-addon1 -->
        {!!Form::text('nombre',null,['class' => 'form-control buscar input-md', 'placeholder' => 'Buscar sorteo','id'=>'sorteothumb', 'aria-describedby' => 'sizing-addon1'])!!}
      </div><!-- /div .input-group .input-group-lg -->
    @endif
  </div><!-- /div .list-group-item -->
</div> <!-- /list group -->
<div class="list-group">
  @include('sorteos.forms.vistaListaUsuario', array('sorteos' => $sorteos))
</div>

