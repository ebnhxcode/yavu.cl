<!-- Banner Random -->
<div class="list-group">
  @if(isset($mostrarbanner))
    @foreach($mostrarbanner as $banner)
    <div style="padding: 30px 30px 5px 30px;" class="list-group-item">
      <div class="row">
        <div id="EmpresaListThumbBanner">
          <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                <img id="ImagenPortada" src="{!! ($banner->banner!="")?'/img/users/'.$banner->banner:"/img/users/banner.png" !!}" alt="..." style="height: 170px;">
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <address>
                      <h4>
                        <a class="btn-link" href="/empresa/{!!$banner->nombre!!}">
                          {!! $banner->nombre!!}
                        </a><!-- /div .btn-link -->
                      </h4>
                      <strong></strong> {!!$banner->titulo_banner!!}<br>
                    </address>
                  </div><!-- /div .col-md12-sm12-xs12 -->
                </div><!-- /div .row -->
              </div><!-- /div .col-md12-sm12-xs12 -->
        </div><!-- /div .row -->
        </div> <!-- /div  -->
      </div><!-- /div .row -->
    </div> <!-- /div .list-group-item styled -->
    @endforeach
  @endif
</div><!-- /div .list-group -->

