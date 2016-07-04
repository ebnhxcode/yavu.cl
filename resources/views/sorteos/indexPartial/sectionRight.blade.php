<div class="list-group">


  @foreach($companies as $key => $company)
    @if($key < 1)
      <div class="list-group-item">
        <small>Empresas sugeridas</small>
      </div><!-- /div .list-group-item -->
    @endif
    @if(count($userSession->follow($company->id)->get())==0)
      <div class="list-group-item">
        <div class="row">
          <div class="col-md-2 col-sm-4 col-xs-4">
            <img class='media-object' style='width: 36px; height: 36px; border-radius: 10%; ' src='/img/users/{!! ($company->imagen_perfil!='')?$company->imagen_perfil:'usuario_nuevo.png' !!}' class='center-block'>
          </div>
          <div class="col-xs-4 col-sm-4 col-md-5 col-lg-5">
            {!! $company->nombre !!}
          </div>
          <div class="col-xs-4 col-sm-4 col-md-5 col-lg-5">
            <a href="/empresas/{!! $company->id !!}" class="btn btn-success btn-sm">
              Ver perfil
            </a>
          </div>
        </div>
      </div><!-- /div .list-group-item -->
    @endif
  @endforeach

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
              <img class="img-responsive" id="ImagenPortada" src="/img/users/Cocacola/lg_felicidad.jpg" alt="..." style="height: 170px;">
            </a><!-- /div .thumbnail -->

            {{--
            <div class="caption">

              <p>
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                    <a class="btn-link" href="/empresa/">
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
  <small>Ads via <a class="btn-link" href="http://yavu.cl/">Yavü</a></small>
</div><!-- /div .list-group -->