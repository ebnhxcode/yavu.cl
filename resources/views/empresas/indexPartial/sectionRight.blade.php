<div class="list-group">


  @foreach($companies as $key => $company)
    @if($key < 1)
      <div class="list-group-item">
        <small>EMPRESAS SUGERIDAS</small>
      </div><!-- /div .list-group-item -->
    @endif
    @if(count($userSession->follow($company->id)->get())==0)
      <div id="company-item-{!! $company->id !!}" class="list-group-item">
        <div class="row">
          <div class="col-xs-4 col-sm-4 col-md-2 col-lg-">
            <a href="/empresas/{!! $company->id !!}">
              <img class='media-object' style='width: 36px; height: 36px; border-radius: 10%; ' src='/img/users/{!! ($company->imagen_perfil!='')?$company->imagen_perfil:'usuario_nuevo.png' !!}' class='center-block'>
            </a>
          </div>
          <div class="col-xs-4 col-sm-4 col-md-8 col-lg-8">
            <small><a href="/empresas/{!! $company->id !!}">{!! $company->nombre !!}</a></small><br>
            <div class="softText-descriptions">
              {!! $company->descripcion !!}<br>
              <span id="seguidores">{!! count($company->followers) !!}</span> seguidores<br>
              {!! count($company->visits) !!} visitas<br>
            </div>

          </div>
          <div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
            <div class="btn-group-vertical" role="group" style="float:right;">
              <a href="/empresas/{!! $company->id !!}" class="btn btn-success btn-xs">
                Ver perfil
              </a>
              <span class="btn btn-primary btn-xs" id="seguir" value="{!! $company->id !!}" role="button">Seguir</span>
            </div>
          </div>
        </div>
      </div><!-- /div .list-group-item -->
    @endif
  @endforeach
    <input type="hidden" name="_token" id="token" value="{!! csrf_token() !!}" >
</div><!-- /div .list-group -->

<!-- Banner Random -->
<div class="list-group">
  <div class="list-group-item">
    <span style="font-size: 1.8em; color: #65C400; z-index: 1003;" class="glyphicon glyphicon-bookmark"></span>
    <span style="font-size: 1.8em; color: #449d44; right: 20px; z-index: 1002;" class="glyphicon glyphicon-bookmark"></span>
    <span style="font-size: 1.8em; color: #ffcc00; right: 40px; z-index: 1001;" class="glyphicon glyphicon-bookmark"></span>
  </div><!-- /div .list-group-item -->
  <div style="padding: 9px 9px 9px 9px;" class="list-group-item">
    <div class="row">
      <div id="EmpresaListThumbBanner">
        <div class="row">
          <div class="col-xs-12 col-sm-4 col-md-12 col-lg-12 text-center">

            <a class="thumbnail">
              <img class="img-responsive" id="ImagenPortada" src="/img/yavu015.png" alt="..." style="height: 170px;">
            </a><!-- /div .thumbnail -->

            {{--
            <div class="caption">

              <p>
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                    <a class="btn-link" href="/empresas/">
                    </a><!-- /div .btn-link -->
                    <h6>
                    </h6>

                  </div><!-- /div .col-md12-sm12-xs12 -->
                </div><!-- /div .row -->
              </p>

            </div><!-- /div .caption -->
            --}}

          </div><!-- /div .col-md12-sm12-xs12 -->

        </div><!-- /div .row -->
      </div> <!-- /div  -->
    </div><!-- /div .row -->
  </div> <!-- /div .list-group-item styled -->
</div><!-- /div .list-group -->