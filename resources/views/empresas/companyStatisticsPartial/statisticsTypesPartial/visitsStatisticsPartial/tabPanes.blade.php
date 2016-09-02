<!-- Tab panes -->
<div class="tab-content wrap">

  <?php $totalVisits = (count($otherVisits = $userCompany->otherVisits)+count($womenVisits = $userCompany->womenVisits)+count($menVisits = $userCompany->menVisits)) ?>

  <!-- ######################### -->
  <!--         TAB PANE # 1      -->
  <!-- ######################### -->

  @include('empresas.companyStatisticsPartial.statisticsTypesPartial.visitsStatisticsPartial.tabPanesPartial.home')

  <!-- ######################### -->
  <!--         TAB PANE # 2      -->
  <!-- ######################### -->

  @include('empresas.companyStatisticsPartial.statisticsTypesPartial.visitsStatisticsPartial.tabPanesPartial.mens')

  <!-- ######################### -->
  <!--         TAB PANE # 3      -->
  <!-- ######################### -->

  @include('empresas.companyStatisticsPartial.statisticsTypesPartial.visitsStatisticsPartial.tabPanesPartial.womens')

  <!-- ######################### -->
  <!--         TAB PANE # 4      -->
  <!-- ######################### -->

  @include('empresas.companyStatisticsPartial.statisticsTypesPartial.visitsStatisticsPartial.tabPanesPartial.others')

</div><!-- /div .tab-content -->

<script>
  (function(){
    $('.openclose').click(function(){
      if($(this).text().trim() == 'ver más detalles') $(this).text('cerrar detalles');
      else if ($(this).text().trim() == 'cerrar detalles') $(this).text('ver más detalles');
    });
  })();
</script><!-- /script open/close 'ver más detalles' -->