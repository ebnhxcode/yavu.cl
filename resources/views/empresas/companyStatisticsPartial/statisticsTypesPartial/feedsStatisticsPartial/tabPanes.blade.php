<!-- Tab panes -->
<div class="tab-content">




  <!-- ######################### -->
  <!--         TAB PANE # 1      -->
  <!-- ######################### -->

  @include('empresas.companyStatisticsPartial.statisticsTypesPartial.feedsStatisticsPartial.tabPanesPartial.hours')

    <!-- ######################### -->
  <!--         TAB PANE # 2      -->
  <!-- ######################### -->

  @include('empresas.companyStatisticsPartial.statisticsTypesPartial.feedsStatisticsPartial.tabPanesPartial.week')

    <!-- ######################### -->
  <!--         TAB PANE # 3      -->
  <!-- ######################### -->

  @include('empresas.companyStatisticsPartial.statisticsTypesPartial.feedsStatisticsPartial.tabPanesPartial.month')

    <!-- ######################### -->
  <!--         TAB PANE # 4      -->
  <!-- ######################### -->

  @include('empresas.companyStatisticsPartial.statisticsTypesPartial.feedsStatisticsPartial.tabPanesPartial.year')


  {{--
    <div role="tabpanel" class="tab-pane fade" id="settings">
    </div><!-- /div .tab-pane .fade -->

    <div role="tabpanel" class="tab-pane fade" id="profile">
    </div><!-- /div .tab-pane .fade -->
  --}}

</div><!-- /div .tab-content -->