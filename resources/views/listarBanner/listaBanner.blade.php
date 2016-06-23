<!-- Banner Random -->
<div class="list-group">
  <div class="list-group-item">
    <span class="glyphicon glyphicon-star"></span>
    <span style="font-size: 1.8em;" class="glyphicon glyphicon-star"></span>
    Empresas m&aacute;s seguidas
  </div>
  <div style="padding: 9px 9px 9px 9px;" class="list-group-item">
    <div class="row">
      <div id="EmpresaListThumbBanner">
        <div class="row">
          @foreach($bannersRandom as $banner)
            <div class="col-xs-12 col-sm-4 col-md-12 col-lg-12 text-center">

              <a class="thumbnail">
                <img class="img-responsive" id="ImagenPortada" src="{!! ($banner->banner!="")?'/img/users/'.$banner->banner:"/img/users/banner.png" !!}" alt="..." style="height: 170px;">
              </a>
              <div class="caption">

                <p>
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                    @foreach($banner->linksBannerData as $lbd)
                      <a class="btn-link" href="/empresa/{!!$lbd->link!!}">
                        {!! $lbd->titulo_link!!}
                      </a><!-- /div .btn-link -->
                    @endforeach
                    <h6>{!! $banner->descripcion_banner !!}</h6>

                  </div><!-- /div .col-md12-sm12-xs12 -->
                </div><!-- /div .row -->
                </p>

              </div>

            </div><!-- /div .col-md12-sm12-xs12 -->

          @endforeach
        </div><!-- /div .row -->
      </div> <!-- /div  -->
    </div><!-- /div .row -->
  </div> <!-- /div .list-group-item styled -->
  <small>Ads via <a class="btn-link" href="http://localhost:8000/">Yavü</a></small>
</div><!-- /div .list-group -->

