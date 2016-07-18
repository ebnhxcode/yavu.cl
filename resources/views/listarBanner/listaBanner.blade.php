<!-- Banner Random -->
<div class="list-group">
  <div class="list-group-item">
    <small>PUBLICIDAD</small>
  </div><!-- /div .list-group-item -->

  <div style="padding: 9px 9px 9px 9px;" class="list-group-item">
    <div id="EmpresaListThumbBanner">
      <div class="row">
        @foreach($bannersRandomLeft as $key => $banner)
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><!-- text-center -->

            <div class="thumbnail">
              <img class="img-responsive" id="ImagenPortada" src="{!! ($banner->banner!="")?'/img/users/'.$banner->banner:"/img/users/banner.png" !!}" alt="..." style="height: 170px;">

              <div class="caption softText-descriptions-middle">
                <a href="/empresas/{!! $banner->empresa_id !!}">
                  <b>{!! $banner->companyName->nombre !!}</b><br>
                </a>

                <div class="softText-descriptions">
                  <small>Enlaces publicitarios</small>
                </div>
                @foreach($banner->linksBannerData as $lbd)
                  <a class="btn-link" href="{!!$lbd->link!!}">
                    {!! $lbd->titulo_link!!}
                  </a><!-- /div .btn-link -->
                  <br>
                @endforeach
                <br>
                <div class="softText-descriptions">
                  <small>Descripci&oacute;n</small>
                </div>
                <h6>{!! $banner->descripcion_banner !!}</h6>
              </div><!-- /div .caption -->
            </div><!-- /div .thumbnail -->

          </div><!-- /div .col-md12-sm12-xs12 -->
        @endforeach
      </div><!-- /div .row -->
    </div> <!-- /div #EmpresaListThumbBanner -->
  </div> <!-- /div .list-group-item styled -->
</div><!-- /div .list-group -->

