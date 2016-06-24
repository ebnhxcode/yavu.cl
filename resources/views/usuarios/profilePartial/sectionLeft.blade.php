<div class="list-group">
  <div class="list-group-item">

    <div class="thumbnail">
      <img id='ImagenPerfil' src='/img/users/{!! isset($user)?($user->imagen_perfil!='')?$user->imagen_perfil:'usuario_nuevo.png':'' !!}' class='center-block'>
    </div><!-- /div .thumbnail -->

    <div class="softText-descriptions">
      <!-- Nav tabs -->
      <ul id="TabUserProfile" class="nav nav-pills" role="tablist">

        <li role="presentation" class="active">
          <a href="#user" aria-controls="user" role="tab" data-toggle="tab" style="padding: 3px 3px 3px 3px;">
            <img data-toggle="tooltip" data-placement="top" title="Yo" src="/img/newGraphics/usuario_nuevo.png" style="width: 36px;" alt=""/>
          </a>
        </li>

        <li role="presentation">
          <a href="#companies" aria-controls="companies" role="tab" data-toggle="tab" style="padding: 3px 3px 3px 3px;">
            <img data-toggle="tooltip" data-placement="top" title="Empresas" src="/img/newGraphics/icono_empresa.png" style="width: 48px;" alt=""/>
          </a>
        </li>

        <li role="presentation">
          <a href="#raffles" aria-controls="raffles" role="tab" data-toggle="tab" style="padding: 3px 3px 3px 3px;">
            <img data-toggle="tooltip" data-placement="top" title="Sorteos" src="/img/newGraphics/icofinal_sorteos_premios.png" style="width: 48px;" alt=""/>
          </a>
        </li>

        <li role="presentation">
          <a href="#feeds" aria-controls="feeds" role="tab" data-toggle="tab" style="padding: 3px 3px 3px 3px;">
            <img data-toggle="tooltip" data-placement="top" title="Publicaciones" src="/img/newGraphics/icofinal_publicaciones.png" style="width: 48px;" alt=""/>
          </a>
        </li>


      </ul>
      <!-- End Nav tabs -->

      <!-- Tab panes -->
      <div class="tab-content">


        <div role="tabpanel" class="tab-pane active " id="user">

          <div style="padding: 4px 4px 4px 4px;">
            <div>
              <strong><h4>{!! $userSession->nombre.' '.$userSession->apellido !!}</h4></strong>
            </div>

            <div>
              Sigues a <strong>{!! $ce = count($userSession->countTotalFollowedCompanies) !!}</strong> empresa{!! ($ce>1)?'s':'' !!}.
              <!--<a href="#companies" aria-controls="companies" role="tab" data-toggle="tab">empresas</a>-->
            </div>

            <div>
              <strong>Usuario:</strong> {!! $userSession->email !!}
            </div>

            <div>
              <strong>De:</strong> {!! $userSession->ciudad !!}
              <div style="float:right;">
                <a href="/usuarios/{!! $userSession->id !!}/edit">
                  <span class="glyphicon glyphicon-edit"></span>
                  <small> Editar informaci&oacute;n</small>
                </a>
              </div>
            </div>



          </div>

        </div><!-- /div .tab-pane .fade .active .list-group .wrap -->

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

        <div role="tabpanel" class="tab-pane fade list-group" id="raffles">
          Info
        </div><!-- /div .tab-pane .fade .list-group .wrap -->


        <div role="tabpanel" class="tab-pane fade list-group" id="feeds">
          Info
        </div><!-- /div .tab-pane .fade .list-group .wrap -->

      </div><!-- /div .tab-content -->
      <!-- End Tab panes -->

      {{--{!! ($userSession->registro_coins()->sum('cantidad')) !!}--}}

    </div><!-- /div .softText-descriptions -->


    {{--
    <div class="dropdown">
      <button class="btn btn-default btn-sm dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
        <span class="caret"></span>
      </button><!-- /div .btn .btn-default .btn-sm .dropdown-toggle -->
      <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
        <li>
          <a href="{!! route('usuarios_edit_path', $user->id) !!}">Editar Perfil de Usuario</a>
        </li>
      </ul><!-- /div .dropdown-menu -->
    </div><!-- /div .dropdown -->
    --}}
  </div><!-- /div .list-group-item -->
</div><!-- /div .list-group -->

@include('miniDashboard.miniDashboard')