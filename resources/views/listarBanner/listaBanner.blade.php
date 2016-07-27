<!-- Banner Random -->
<div class="list-group">
  <div class="list-group-item list-heading">
    <small style="font-size: 0.68em;">ANUNCIOS</small>
  </div><!-- /div .list-group-item -->

  <div style="padding: 9px 9px 9px 9px;" class="list-group-item">
    <div id="EmpresaListThumbBanner">
      <div class="row">
        @foreach($bannersRandomLeft as $key => $banner)
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><!-- text-center -->

            <div class="thumbnail">
              <img class="img-responsive" id="ImagenPortada" src="{!! ($banner->banner!="")?'/img/users/'.$banner->banner:"/img/users/banner.png" !!}" alt="..." style="height: 170px;">

              <div class="softText-descriptions-middle">

                <a href="/empresas/{!! $banner->empresa_id !!}">
                  <b>{!! $banner->companyName->nombre !!}
                    <span class="softText-descriptions" style="float:right;">
                    <small>{{$bcf = count($banner->companyId->followers)}} seguidor{{($bcf>2)?'es':''}}.</small>
                    </span>
                  </b><br>
                </a>
                <div class="softText-descriptions" style="padding-bottom: 5px;">
                  {{ $banner->descripcion_banner }}
                </div>

                <div class="softText-descriptions">
                  <small>Enlaces publicitarios</small>
                </div>
                <img src="/img/" alt="">
                @foreach($banner->linksBannerData as $lbd)
                  <a class="btn-link" href="{!!$lbd->link!!}">
                    {!! $lbd->titulo_link!!}
                  </a><!-- /div .btn-link -->
                  <br>
                @endforeach



              </div><!-- /div .caption -->

              <small class="softText-descriptions"><b>{{count($banner->displays)}}</b> despliegues</small>
              {{--<small class="softText-descriptions"><b>{{count($banner->displays)}}</b> despliegues</small>--}}

            </div><!-- /div .thumbnail -->
          </div><!-- /div .col-md12-sm12-xs12 -->
        @endforeach
      </div><!-- /div .row -->
    </div> <!-- /div #EmpresaListThumbBanner -->
  </div> <!-- /div .list-group-item styled -->
</div><!-- /div .list-group -->

