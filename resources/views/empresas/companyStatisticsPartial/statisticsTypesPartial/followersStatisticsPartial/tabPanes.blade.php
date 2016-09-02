<!-- Tab panes -->
<div class="tab-content">

  <?php $followers = $userCompany->followers ?>

  <!-- ######################### -->
  <!--         TAB PANE # 1      -->
  <!-- ######################### -->

  @include('empresas.companyStatisticsPartial.statisticsTypesPartial.followersStatisticsPartial.tabPanesPartial.home')

  <!-- ######################### -->
  <!--         TAB PANE # 2      -->
  <!-- ######################### -->

  @include('empresas.companyStatisticsPartial.statisticsTypesPartial.followersStatisticsPartial.tabPanesPartial.followers')


  {{--

      <div role="tabpanel" class="tab-pane fade" id="profile">
      </div><!-- /div .tab-pane .fade -->
    --}}

</div><!-- /div .tab-content -->

<script>
  (function(){
    $('.openclose').click(function(){
      if($(this).text().trim() == 'ver más detalles') $(this).text('cerrar detalles');
      else if ($(this).text().trim() == 'cerrar detalles') $(this).text('ver más detalles');
    });
  })();
</script><!-- /script open/close 'ver más detalles' -->