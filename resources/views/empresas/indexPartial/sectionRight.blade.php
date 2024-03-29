<div class="list-group">
  @foreach($companies as $key => $company)
    @if($key < 1)
      <div class="list-group-item list-heading">
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
          </div><!-- /div col-xs4-sm4-md2-lg2 -->

          <div class="col-xs-4 col-sm-4 col-md-8 col-lg-8">
            <small><a href="/empresas/{!! $company->id !!}">{!! $company->nombre !!}</a></small><br>
            <div class="softText-descriptions">
              {{-- {!! $company->descripcion !!}--}}

              <span id="seguidores{!! $company->id !!}">{{($fCounts=round( count($company->followers)*(int)("1.".rand(1,9999)) ) )}} seguidor{{($fCounts>1||$fCounts==0?'es':'')}}.</span><br>
              {{--
              {!! round(count($company->visits)*3.6) !!} visitas<br>
              --}}

            </div><!-- /div .softText-descriptions -->
          </div><!-- /div col-xs4-sm4-md8-lg8 -->

          <div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
            <div class="btn-group-vertical" role="group" style="float:right;">
              <a href="/empresas/{!! $company->id !!}" class="btn btn-success btn-xs">
                Ver perfil
              </a><!-- /a .btn .btn-success .btn-xs -->
              <span class="btn btn-primary btn-xs seguir" value="{!! $company->id !!}" role="button">Seguir</span>
            </div><!-- /div .btn-group-vertical -->
          </div><!-- /div col-xs4-sm4-md2-lg2 -->

        </div><!-- /div .row -->
      </div><!-- /div .list-group-item -->
    @endif
  @endforeach
  <input type="hidden" name="_token" id="token" value="{!! csrf_token() !!}" >
</div><!-- /div .list-group -->

<div class="visible-lg visible-md">
  @if(count($bannersRandomLeft)>0)
    @include('listarBanner.listaBanner')
  @endif
</div>

{{--
<!-- Banner Random -->
<div class="list-group">
  <div class="list-group-item list-heading">
    <small class="" style="font-size: 0.7em;">EVENTOS</small>
  </div><!-- /div .list-group-item -->
  <div style="padding: 9px 9px 9px 9px;" class="list-group-item">
    <div class="row">
      <div id="EmpresaListThumbBanner">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">

            <a href="https://www.facebook.com/Bigcacho-Toto-254597678029937/" target="_blank" class="thumbnail">
              <img class="img-responsive" id="ImagenPortada" src="/img/Events/1.png" alt="..." style="height: 170px;">
            </a><!-- /div .thumbnail -->
 
            <div class="softText-descriptions">
              Si deseas ver m&aacute;s informacion haz click en el banner.
            </div>

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

          </div><!-- /div .col-md12-sm12-xs12 -->

        </div><!-- /div .row -->
      </div> <!-- /div  -->
    </div><!-- /div .row -->
  </div> <!-- /div .list-group-item styled -->
</div><!-- /div .list-group -->

--}}