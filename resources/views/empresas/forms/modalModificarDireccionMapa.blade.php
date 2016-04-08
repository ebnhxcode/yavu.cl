<h4>{!! strtoupper($e->nombre.' Se ubica en:') !!}</h4>
{!!Form::open(['route'=>'gmaps.store', 'method'=>'POST', 'files'=>true])!!}
  <div id="map-canvas"></div>
  @if(Auth::user()->check())
    @if(isset($mapa))
      <div class="form-group">
        @if(Auth::user()->get()->id == $mapa->user_id)
          <label for="">¿Como se apoda el lugar?</label> <small>(Nombre amigable)</small>
        @else
          <label for="">Este lugar se apoda</label>
        @endif
        <input type="text"  class="form-control input-sm" name="title" value="{!! $mapa->title !!}">
      </div>
      @if(Auth::user()->get()->id == $e->user_id)
        <div class="form-group">
          <label for="">Dirección</label>
          <input type="text" class="form-control input-sm" name="address" id="searchmap" value="{!! $mapa->address !!}">
          <small>Ej. Mi Dirección 1234, Ciudad, Pais</small>
        </div>
      @else
        <div class="form-group">
          <input type="text" class="form-control input-sm no-mostrar" name="address" id="searchmap" value="{!! $mapa->address !!}">
        </div>
      @endif

      <div class="form-group" style="display: none;">
        <label for="">Lat</label>
        <input type="text" class="form-control input-sm" name="lat" id="lat" value="{!! $mapa->lat !!}">
      </div>

      <div class="form-group" style="display: none;">
        <label for="">Lng</label>
        <input type="text" class="form-control input-sm" name="lng" id="lng" value="{!! $mapa->lng !!}">
      </div>
    @endif

    @if(Auth::user()->get()->id == $e->user_id)
      <br>
      <input class="form-control" type="hidden" name="user_id" id="user_id" value="{!! $e->user_id !!}">
      <input class="form-control" type="hidden" name="empresa_id" id="empresa_id" value="{!! $e->id !!}">
      <button class="btn btn-sm btn-primary">Cambiar ubicación</button>
    @endif

  @else

    <div class="form-group">
      <input type="text"  class="no-mostrar" name="title">
    </div>
    <div class="form-group">
      <input type="text" class="no-mostrar" name="address" id="searchmap">
    </div>
    <div class="form-group" style="display: none;">
      <label for="">Lat</label>
      @if(isset($mapa))
        <input type="text" class="form-control input-sm" name="lat" id="lat" value="{!! $mapa->lat !!}">
      @endif
    </div>
    <div class="form-group" style="display: none;">
      <label for="">Lng</label>
      @if(isset($mapa))
        <input type="text" class="form-control input-sm" name="lng" id="lng" value="{!! $mapa->lng !!}">
      @endif
    </div>

  @endif


{!! Form::close() !!}


