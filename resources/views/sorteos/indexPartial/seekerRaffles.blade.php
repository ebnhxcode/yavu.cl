<div id="seekerRaffles" class="row">

  <div id="seekbar" class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
    <div class="list-group">
      <div class="">
        {!!Form::open(['route'=>'search_raffles_engine', 'method'=>'POST'])!!}
        @if(Auth::admin()->check())
          {!!Form::text('nombre',null,['class' => 'form-control buscar', 'placeholder' => 'nombre, ciudad, etc ...','id'=>'nombre_sorteo', 'aria-describedby' => 'sizing-addon1'])!!}
        @elseif(Auth::user()->check())
          <input id="user_id" value="{!! Auth::user()->get()->id !!}" type="hidden" />
          <div align="middle" class="softText-descriptions-middle text-info">
            <h6>BUSCAR POR REFERENCIA</h6>
          </div>
          <div class="input-group">
            <span class="input-group-addon" id="sizing-addon1">
              <span class="glyphicon glyphicon-search">
              </span><!-- /span .glyphicon .glyphicon-search -->
            </span><!-- /span .input-group-addon #sizing-addon1 -->
            {!!Form::text('nombre',null,['class' => 'form-control buscar', 'placeholder' => 'nombre, ciudad, etc...','id'=>'sorteothumb', 'aria-describedby' => 'sizing-addon1'])!!}
          </div><!-- /div .input-group .input-group-lg -->

          <input type="hidden" name="_token" value="{!!csrf_token()!!}" id="token" />

        @endif
        {!!Form::close()!!}
      </div><!-- /div .list-group-item -->
    </div> <!-- /list group -->
  </div><!-- /div col-lg3-md3-sm3-xs12 -->

</div><!-- .row #seeker -->