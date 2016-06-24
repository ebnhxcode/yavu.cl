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