<div class="list-group">
  <div class="list-group-item">
    <h6>TUS EMPRESAS</h6>
  </div><!-- /div .list-group-item -->
  @foreach($userSession->userCompanies as $key => $company)
    <div class="list-group-item">
      <small class="softText">Ver perfil de</small>
      <a href="{!!URL::to('/empresas/'.$company->id)!!}">
        <img id="ImagenPerfil" src="/img/users/{!!($company->imagen_perfil!='')?$company->imagen_perfil:'banner.png'!!}" alt="..." style="width: 30px; height: 30px; border-radius: 10%;">
        <strong>{!! $company->nombre !!}</strong>
      </a>
      <br/>
      {!!($fCounts=count($company->followers))!!} seguidor{!!($fCounts>1||$fCounts==0?'es':'')!!}.
    </div><!-- /div .list-group-item -->
  @endforeach
</div><!-- /div .list-group -->