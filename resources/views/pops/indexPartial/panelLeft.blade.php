<div class="list-group">
  @include('miniDashboard.miniDashboard')
</div> <!-- /div .list-group -->
<div class="visible-lg visible-md">
  @if(count($bannersRandomLeft)>0)
    @include('listarBanner.listaBanner')
  @endif
</div>