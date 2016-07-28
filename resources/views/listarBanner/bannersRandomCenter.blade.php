@if($key == 4)
  <div class="list-group-item">
    <div align="middle" class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <a href="/empresas/{{$bannersRandomCenter[0]->empresa_id}}">
          <img id="firstBannerCenter" src="/img/users/{!!($bannersRandomCenter[0]->banner!='')?$bannersRandomCenter[0]->banner:'banner.png'!!}" alt="..." style="height: 50px;border-radius: 5px;" >
        </a>
        <a href="/empresas/{{$bannersRandomCenter[0]->empresa_id}}" class="btn btn-default btn-xs">
          ver perfil
        </a>
        @if(count($bannersRandomCenter[0]->companyId->followers)>0)
          <div class="btn-group" role="group" aria-label="...">
            <a href="{!! URL::to('/empresas/'.$bannersRandomCenter[0]->empresa_id.'/sorteos') !!}" class="btn btn-success btn-xs">
              <img src="{!! asset('img/yavu019.png') !!}" width="20" alt=""/>
              Ver sorteos
            </a>
          </div><!-- /div .btn-group -->
        @endif
      </div><!-- /col-xs12-sm12-md6-lg6 -->
    </div><!-- /div .row -->
  </div><!-- /div .list-group-item -->
@endif

@if($key == 9)

  <div class="list-group-item">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <img id="firstBannerCenter" src="/img/users/{!!($bannersRandomCenter[1]->banner!='')?$bannersRandomCenter[1]->banner:'banner.png'!!}" alt="..." style="height: 50px;">

        <div class="softText-descriptions-middle" style="padding: 3px;">

          <a href="/empresas/{!! $bannersRandomCenter[1]->empresa_id !!}">
            <b>{!! $bannersRandomCenter[1]->companyName->nombre !!}</b>
            <span class="softText-descriptions" style="float:right;">
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
        <img id="firstBannerCenter" src="/img/users/{!!($bannersRandomCenter[2]->banner!='')?$bannersRandomCenter[2]->banner:'banner.png'!!}" alt="..." style="height: 50px;">
        <a href="/empresas/{{$bannersRandomCenter[2]->empresa_id}}" class="btn btn-default btn-xs">
          ver perfil
        </a>
        @if(count($bannersRandomCenter[2]->companyId->followers)>0)
          <div class="btn-group" role="group" aria-label="...">
            <a href="{!! URL::to('/empresas/'.$bannersRandomCenter[2]->empresa_id.'/sorteos') !!}" class="btn btn-success btn-xs">
              <img src="{!! asset('img/yavu019.png') !!}" width="20" alt=""/>
              Ver sorteos
            </a>
          </div><!-- /div .btn-group -->
        @endif
      </div><!-- /col-xs12-sm12-md6-lg6 -->
    </div><!-- /div .row -->
  </div><!-- /div .list-group-item -->

@endif