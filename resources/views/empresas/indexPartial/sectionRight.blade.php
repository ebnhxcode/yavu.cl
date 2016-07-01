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