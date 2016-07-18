{{--
  <div id='EstadoEmpresa'>
  </div><!-- /div #EstadoEmpresa -->
--}}
@if(count($companies = $userSession->userCompanies)>0)
  @foreach($companies as $key => $company)
    <section id="userCompaniesInfo" class="list-group">
      <div class="list-group-item">
        <div class="softText-descriptions-middle">
          <a class="" href="/empresas/{!! $company->id !!}" style="margin: 0;">
            <img width='32' style="border-radius: 10%;" id='ImagenPerfil' src='/img/users/{!! isset($company)?($company->imagen_perfil!='')?$company->imagen_perfil:'banner.png':'banner.png' !!}'>
          </a>
          <a class="" href="/empresas/{!! $company->id !!}" style="margin: 0;">
            {!! $company->nombre !!}
          </a>
          <a href="/empresas/{!! $company->id !!}" class="softText" style="float:right;">
            {!! $company->estado !!}
          </a>
        </div>
      </div>
      <div class="list-group-item">
        <div class="row">
          <div class="col-xs-6">
            <a class="thumbnail" href="/empresas/{!! $company->id !!}" style="margin: 0;">
              <img width='' id='ImagenPortada' class='img-responsive-centered' src='/img/users/{!! isset($company)?($company->imagen_portada!='')?$company->imagen_portada:'banner.png':'banner.png' !!}'>
            </a>
          </div>
          <div class="col-xs-6">
            <div class="list-group">
              <div class="list-group-item">
                <small>Men&uacute; empresas</small>
              </div>
              <a href="/empresas/{!! $company->id !!}" class="list-group-item">
                <small>Visitar p&aacute;gina</small>
              </a>
              <a href="/empresas/{!! $company->id !!}/edit" class="list-group-item">
                <small>Editar p&aacute;gina</small>
              </a>
            </div>
          </div>
        </div>
      </div><!-- /div .list-group-item -->
    </section><!-- /div .list-group -->
  @endforeach
@endif