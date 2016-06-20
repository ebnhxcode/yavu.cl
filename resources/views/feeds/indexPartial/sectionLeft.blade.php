@include('miniDashboard.miniDashboard')
<div class="list-group">
  {{--
  <div class="list-group-item list-group-item-success">
    FILTROS DE BÚSQUEDA
  </div>
  <div class="list-group-item">
    <input id="user_id" value="{!! Auth::user()->get()->id !!}" type="hidden" />
    {!!Form::text('nombre',null,['class' => 'form-control buscar', 'placeholder' => 'buscar publicaciones','id'=>'feedsearch', 'aria-describedby' => 'sizing-addon1'])!!}
  </div>

  <div class="list-group-item">
    Categorias
    {!! Form::checkbox('name', 'value') !!}
  </div>
--}}
</div> <!-- /div .list group -->
@if(count($bannersRandom)>0)
  @include('listarBanner.listaBanner')
@endif