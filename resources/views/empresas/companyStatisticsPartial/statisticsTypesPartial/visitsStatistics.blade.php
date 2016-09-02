<div class="list-group">
  <div class="list-group-item list-group-item-success">
    Estad&iacute;stica de visitas al perfil el d&iacute;a de hoy
    <a style="float:right;" href="{{url('empresas/'.$userCompany->id)}}">
      <img width='32' style="border-radius: 10%;" id='ImagenPerfil' src='/img/users/{!! isset($userCompany)?($userCompany->imagen_perfil!='')?$userCompany->imagen_perfil:'banner.png':'banner.png' !!}'>
      <b>{{$userCompany->nombre}}</b>
    </a>
  </div><!-- /div .list-group-item -->
  <div class="list-group-item">
    <div class="row">
      <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
        @include('empresas.companyStatisticsPartial.statisticsTypesPartial.visitsStatisticsPartial.navTabs')
      </div><!-- /div .col-xs2-sm2-md2-lg2 -->
      <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
        @include('empresas.companyStatisticsPartial.statisticsTypesPartial.visitsStatisticsPartial.tabPanes')
      </div><!-- /div .col-xs8-sm8-md8-lg8 -->
      <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
        <span>
          <img style="padding-top: 20px;margin: 5px;" width="24" data-toggle="tooltip" data-placement="right" title="Desliza vertical!"  src="{{url('/img/glyphicons/glyphicons/png/glyphicons-727-mouse-scroll.png')}}" alt="">
        </span>
      </div><!-- /div .col-xs2-sm2-md2-lg2 -->
    </div><!-- /div .row -->
  </div><!-- /div .list-group-item -->
</div><!-- /div .list-group -->