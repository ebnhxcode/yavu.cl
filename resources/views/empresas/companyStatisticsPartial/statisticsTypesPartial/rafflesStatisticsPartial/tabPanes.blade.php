<!-- Tab panes -->
<div class="tab-content">

  <!-- ######################### -->
  <!--         TAB PANE # 1      -->
  <!-- ######################### -->

  @include('empresas.companyStatisticsPartial.statisticsTypesPartial.rafflesStatisticsPartial.tabPanesPartial.general')

  <!-- ######################### -->
  <!--         TAB PANE # 2      -->
  <!-- ######################### -->

  @include('empresas.companyStatisticsPartial.statisticsTypesPartial.rafflesStatisticsPartial.tabPanesPartial.actives')

  <!-- ######################### -->
  <!--         TAB PANE # 3      -->
  <!-- ######################### -->

  @include('empresas.companyStatisticsPartial.statisticsTypesPartial.rafflesStatisticsPartial.tabPanesPartial.pending')

  <!-- ######################### -->
  <!--         TAB PANE # 4      -->
  <!-- ######################### -->

  @include('empresas.companyStatisticsPartial.statisticsTypesPartial.rafflesStatisticsPartial.tabPanesPartial.ended')

  <!-- ######################### -->
  <!--         TAB PANE # 5      -->
  <!-- ######################### -->

  @include('empresas.companyStatisticsPartial.statisticsTypesPartial.rafflesStatisticsPartial.tabPanesPartial.requests')

  {{--
    <div role="tabpanel" class="tab-pane fade" id="settings">
    </div><!-- /div .tab-pane .fade -->

    <div role="tabpanel" class="tab-pane fade" id="profile">
    </div><!-- /div .tab-pane .fade -->
  --}}

</div><!-- /div .tab-content -->