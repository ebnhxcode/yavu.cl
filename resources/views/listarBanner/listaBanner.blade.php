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

            <div class="thumbnail" style="padding: 0;">
              <img class="img-responsive" id="ImagenPortada" src="{!! ($banner->banner!="")?'/img/users/'.$banner->banner:"/img/users/banner.png" !!}" alt="..." style="height: 170px;">

              <div class="softText-descriptions-middle" style="padding: 3px;">

                <a href="/empresas/{!! $banner->empresa_id !!}">
                  <b>{!! $banner->companyName->nombre !!}
                    <span class="softText-descriptions" style="float:right;">
                      {{-- <small>{{$bcf = count($banner->companyId->followers)}} seguidor{{($bcf>2)?'es':''}}.</small> --}}
                    </span>
                  </b><br>
                </a>
                <div class="softText-descriptions" style="padding-bottom: 5px;">
                  {{ $banner->descripcion_banner }}
                </div>
                <!-- #siempre hay atajos -->
                <div class="softText-descriptions">
                  <small>Enlaces publicitarios</small>
                </div><!-- /div .softText-descriptions -->
                <!--<img style="width: 16px;" src="/img/glyphicons/glyphicons-social/png/glyphicons-social-31-facebook.png" alt="Facebook">-->
                @foreach($banner->linksBannerData as $lbd)
                  <a class="btn-link" href="{!!$lbd->link!!}">
                    {!! $lbd->titulo_link !!}
                  </a><!-- /div .btn-link -->
                  <br>
                @endforeach



              </div><!-- /div .caption -->

              {{--<small class="softText-descriptions"><b>{{count($banner->displays)}}</b> despliegues</small>--}}
            </div><!-- /div .thumbnail -->
          </div><!-- /div .col-md12-sm12-xs12 -->
        @endforeach
      </div><!-- /div .row -->
    </div> <!-- /div #EmpresaListThumbBanner -->
  </div> <!-- /div .list-group-item styled -->
</div><!-- /div .list-group -->

