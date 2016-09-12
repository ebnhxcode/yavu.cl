<!-- Tab panes -->
<div class="tab-content">

  <!-- ######################### -->
  <!--         TAB PANE # 1      -->
  <!-- ######################### -->

  @include('empresas.companyStatisticsPartial.statisticsTypesPartial.bannersStatisticsPartial.tabPanesPartial.actives')

    <!-- ######################### -->
  <!--         TAB PANE # 2      -->
  <!-- ######################### -->

  @include('empresas.companyStatisticsPartial.statisticsTypesPartial.bannersStatisticsPartial.tabPanesPartial.expired')

    <!-- ######################### -->
  <!--         TAB PANE # 3      -->
  <!-- ######################### -->

  @include('empresas.companyStatisticsPartial.statisticsTypesPartial.bannersStatisticsPartial.tabPanesPartial.request-service')

  {{--
    <div role="tabpanel" class="tab-pane fade" id="profile">
    </div><!-- /div .tab-pane .fade -->
  --}}

</div><!-- /div .tab-content -->