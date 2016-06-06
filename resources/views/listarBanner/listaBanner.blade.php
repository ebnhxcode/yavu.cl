<!-- Banner Random -->
<div style="padding: 30px 30px 5px 30px;" class="list-group-item">
  <div class="row">
           <div id="EmpresaListThumbBanner">
            <div class="row">
              @if(isset($mostrarbanner))
                @foreach($mostrarbanner as $banner)
                  <div class="col-md-12 col-sm-12 col-xs-12 text-center">
              
                      <img id="ImagenPortada" src="{!! ($banner->banner!="")?'/img/users/'.$banner->banner:"/img/users/banner.png" !!}" alt="..." style="height: 170px;">
                      <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <address>
                            <h4><a class="btn-link" href="/empresa/{!!$banner->nombre!!}">{!! $banner->nombre!!}</a></h4>
                            <strong></strong> {!!$banner->titulo_banner!!}<br>
                          
                          </address>
                        </div>
                      </div><!-- /div row -->
          
                  </div>
                @endforeach
              @endif  
            </div>
          </div> <!-- /Empresa list thumb -->
  </div><!-- /row -->
</div> <!-- /list group item -->

