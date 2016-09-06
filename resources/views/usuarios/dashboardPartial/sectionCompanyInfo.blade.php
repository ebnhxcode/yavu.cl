{{--
  <div id='EstadoEmpresa'>
  </div><!-- /div #EstadoEmpresa -->
--}}
@if(count($companies = $userSession->userCompanies)>0)
  @foreach($companies as $key => $company)
    <section id="userCompaniesInfo" class="list-group">
      <div class="list-group-item list-heading">
        <div class="softText-descriptions-middle">
          <a href="/empresas/{!! $company->id !!}" style="margin: 0; color: #3c763d;">
            <img width='32' style="border-radius: 10%;" id='ImagenPerfil' src='/img/users/{!! isset($company)?($company->imagen_perfil!='')?$company->imagen_perfil:'banner.png':'banner.png' !!}'>
          </a><!-- /a styled -->
          <a href="/empresas/{!! $company->id !!}" style="margin: 0; color: #3c763d;">
            {!! $company->nombre !!}
          </a><!-- /a styled -->
          <a href="/empresas/{!! $company->id !!}" class="softText" style="float:right;">
            {!! $company->estado !!}
          </a><!-- /a .softText styled -->
        </div><!-- /div .softText-descriptions-middle -->
      </div><!-- /div .list-group-item -->
      <div class="list-group-item">
        <div class="row">
          <div class="col-xs-6">
            <a class="thumbnail" href="/empresas/{!! $company->id !!}" style="margin: 0;">
              <img width='' id='ImagenPortada' class='img-responsive-centered' src='/img/users/{!! isset($company)?($company->imagen_portada!='')?$company->imagen_portada:'banner.png':'banner.png' !!}'>
            </a><!-- /a .thumbnail -->
          </div><!-- /div .col-xs6 -->
          <div class="col-xs-6">
            <div class="list-group">
              <div class="list-group-item list-heading">
                <small>Men&uacute; empresas</small>
              </div><!-- /div .list-group-item -->
              <a href="/empresas/{!! $company->id !!}" class="list-group-item">
                <small>Visitar p&aacute;gina</small>
              </a><!-- /div .list-group-item -->
              <a href="/empresas/{!! $company->id !!}/edit" class="list-group-item">
                <small>Editar p&aacute;gina</small>
              </a><!-- /div .list-group-item -->
            </div><!-- /div .list-group -->
          </div><!-- /div .col-xs6 -->
        </div><!-- /div .row -->
      </div><!-- /div .list-group-item -->
    </section><!-- /div .list-group -->
  @endforeach
@endif