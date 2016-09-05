<div class="list-group">
  <div class="list-group-item list-group-item-success">
    Estad&iacute;stica de cobro de coins
    <a style="float:right;" href="{{url('empresas/'.$userCompany->id)}}">
      <img width='32' style="border-radius: 10%;" id='ImagenPerfil' src='/img/users/{!! isset($userCompany)?($userCompany->imagen_perfil!='')?$userCompany->imagen_perfil:'banner.png':'banner.png' !!}'>
      <b>{{$userCompany->nombre}}</b>
    </a>
  </div><!-- /div .list-group-item -->
  <div class="list-group-item">
    <div class="row">
      <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
        @include('empresas.companyStatisticsPartial.statisticsTypesPartial.chargesStatisticsPartial.navTabs')
      </div><!-- /div .col-xs3-sm3-md3-lg3 -->
      <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
        @include('empresas.companyStatisticsPartial.statisticsTypesPartial.chargesStatisticsPartial.tabPanes')
      </div><!-- /div .col-xs9-sm9-md9-lg9 -->
    </div><!-- /div .row -->
  </div><!-- /div .list-group-item -->
</div><!-- /div .list-group -->