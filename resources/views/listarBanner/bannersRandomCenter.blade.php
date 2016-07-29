@if($key == 4)
  <div class="list-group-item">
    <div align="middle" class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <a href="/empresas/{{$bannersRandomCenter[0]->empresa_id}}">
          <img id="firstBannerCenter" src="/img/users/{!!($bannersRandomCenter[0]->banner!='')?$bannersRandomCenter[0]->banner:'banner.png'!!}" alt="..." style="height: 50px;border-radius: 5px;" >
        </a>

        <div class="softText-descriptions-middle" style="padding: 3px;">

          <a href="/empresas/{!! $bannersRandomCenter[0]->empresa_id !!}">
            <b>{!! $bannersRandomCenter[0]->companyName->nombre !!}</b>
            <span class="softText-descriptions">
              <small>{{$bcf = count($bannersRandomCenter[0]->companyId->followers)}} seguidor{{($bcf>2)?'es':''}}.</small>
            </span>
          </a>





          <div class="softText-descriptions" style="padding-bottom: 5px;">
            {{ $bannersRandomCenter[0]->descripcion_banner }}
          </div>

        </div><!-- /div .softText-descriptions-middle -->

      </div><!-- /col-xs12-sm12-md6-lg6 -->
    </div><!-- /div .row -->
  </div><!-- /div .list-group-item -->
@endif

@if($key == 9)

  <div class="list-group-item">
    <div align="middle" class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

        <a href="/empresas/{{$bannersRandomCenter[1]->empresa_id}}">
          <img id="firstBannerCenter" src="/img/users/{!!($bannersRandomCenter[1]->banner!='')?$bannersRandomCenter[1]->banner:'banner.png'!!}" alt="..." style="height: 50px;border-radius: 5px;" >
        </a>

        <div class="softText-descriptions-middle" style="padding: 3px;">

          <a href="/empresas/{!! $bannersRandomCenter[1]->empresa_id !!}">
            <b>{!! $bannersRandomCenter[1]->companyName->nombre !!}</b>
            <span class="softText-descriptions">
              <small>{{$bcf = count($bannersRandomCenter[1]->companyId->followers)}} seguidor{{($bcf>2)?'es':''}}.</small>
            </span>
          </a>

          <div class="softText-descriptions" style="padding-bottom: 5px;">
            {{ $bannersRandomCenter[1]->descripcion_banner }}
          </div>

        </div><!-- /div .caption -->

      </div><!-- /col-xs12-sm12-md6-lg6 -->
    </div><!-- /div .row -->
  </div><!-- /div .list-group-item -->

@endif

@if($key == 14)

  <div class="list-group-item">
    <div align="middle" class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

        <a href="/empresas/{{$bannersRandomCenter[2]->empresa_id}}">
          <img id="firstBannerCenter" src="/img/users/{!!($bannersRandomCenter[2]->banner!='')?$bannersRandomCenter[2]->banner:'banner.png'!!}" alt="..." style="height: 50px;border-radius: 5px;" >
        </a>

        <div class="softText-descriptions-middle" style="padding: 3px;">

          <a href="/empresas/{!! $bannersRandomCenter[2]->empresa_id !!}">
            <b>{!! $bannersRandomCenter[2]->companyName->nombre !!}</b>
            <span class="softText-descriptions">
              <small>{{$bcf = count($bannersRandomCenter[2]->companyId->followers)}} seguidor{{($bcf>2)?'es':''}}.</small>
            </span>
          </a>

          <div class="softText-descriptions" style="padding-bottom: 5px;">
            {{ $bannersRandomCenter[2]->descripcion_banner }}
          </div>

        </div><!-- /div .caption -->

      </div><!-- /col-xs12-sm12-md6-lg6 -->
    </div><!-- /div .row -->
  </div><!-- /div .list-group-item -->

@endif