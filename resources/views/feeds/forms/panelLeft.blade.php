<div class="col-md-4 col-sm-12 col-xs-12">
  <div>
    <div>
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
        @include('miniDashboard.miniDashboard')
        @include('listarBanner.listaBanner')
           




      </div> <!-- /list group -->
    </div> <!-- /panel body -->
  </div> <!-- /panel -->
</div><!-- fin del col md 4 -->
