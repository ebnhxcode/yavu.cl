<div class="list-group">
  <div class="list-group-item list-group-item-success">
    <h6>
      PETICIONES DE SORTEOS
      <a style="float:right;" href="{{url('empresas/'.$userCompany->id)}}">
        <img width='32' style="border-radius: 10%;" id='ImagenPerfil' src='/img/users/{!! isset($userCompany)?($userCompany->imagen_perfil!='')?$userCompany->imagen_perfil:'banner.png':'banner.png' !!}'>
        <b>{{$userCompany->nombre}}</b>
      </a>
    </h6>
  </div><!-- /div .list-group-item -->
  <div class="list-group-item">
    <div class="row">
      <?php

      ($rafflesActive = $userCompany->rafflesActive);

      ($rafflesEnded = $userCompany->rafflesEnded);

      ($rafflesPending = $userCompany->rafflesPending);

      ($raffleRaquests = $userCompany->raffleRequests);

      ?>
      <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
        @include('empresas.companyStatisticsPartial.statisticsTypesPartial.rafflesStatisticsPartial.navTabs')
      </div><!-- /div .col-xs2-sm2-md2-lg2 -->
      <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
        @include('empresas.companyStatisticsPartial.statisticsTypesPartial.rafflesStatisticsPartial.tabPanes')
      </div><!-- /div .col-xs10-sm10-md10-lg10 -->
    </div><!-- /div .row -->
  </div><!-- /div .list-group-item -->
</div><!-- /div .list-group -->