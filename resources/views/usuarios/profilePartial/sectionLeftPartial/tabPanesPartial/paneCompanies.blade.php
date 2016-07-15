<div role="tabpanel" class="tab-pane fade list-group" id="companies">

  <div style="padding: 4px 4px 4px 4px;">
    <strong>Explora</strong>
  </div>

  <div>
    <a href="/feeds" class="btn-link">Publicaciones</a>
  </div>
  <div>
    <a href="/sorteos" class="btn-link">Sorteos</a>
  </div>
  <div>
    <a href="/empresas" class="btn-link">Empresas</a>
  </div>

  <hr/>

  <div style="padding: 4px 4px 4px 4px;">
    <strong>Empresas que sigues</strong>
  </div>

  @foreach($userSession->followedCompanies as $key => $followedCompany)
    <a href="/empresas">
      <img data-toggle="tooltip" data-placement="top" title="{!! $followedCompany->getCompanyFollow->nombre !!}" src='/img/users/{!! ($followedCompany->getCompanyFollow->imagen_perfil!='')?$followedCompany->getCompanyFollow->imagen_perfil:'usuario_nuevo.png' !!}' data-holder-rendered='true' style='width: 36px; height: 36px; border-radius: 10%;'/>
    </a>
  @endforeach

</div><!-- /div .tab-pane .fade .active .list-group .wrap -->