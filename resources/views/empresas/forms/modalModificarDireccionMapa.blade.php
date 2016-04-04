<style>
  #map-canvas{
    width: 100%;
    height: 50%;
  }
</style>
<h4>{!! strtoupper($e->nombre.' Se ubica en:') !!}</h4>
{!!Form::open(['route'=>'gmaps.store', 'method'=>'POST', 'files'=>true])!!}
  <div class="form-group">
    <label for="">Title</label>
    <input type="text" class="form-control input-sm" name="title">
  </div>
  <div class="form-group">
    <label for="">Map</label>
    <input type="text" id="searchmap">
    <div id="map-canvas"></div>
  </div>
  <div class="form-group">
    <label for="">Lat</label>
    <input type="text" style="display: none;" class="form-control input-sm" name="lat" id="lat">
  </div>
  <div class="form-group">
    <label for="">Lng</label>
    <input type="text" class="form-control input-sm" name="lng" id="lng">
  </div>
  <button class="btn btn-sm btn-danger">Save</button>
{!! Form::close() !!}


