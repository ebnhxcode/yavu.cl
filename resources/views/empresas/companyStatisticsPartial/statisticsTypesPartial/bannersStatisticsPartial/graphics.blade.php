<div id="Graphic{!! $banner->id !!}Banner{!! $graphicType !!}" class="">

  <?php
  /*
    $cdit=count($banner->displays_in_threemonths);
    $cdif=count($banner->displays_in_fourmonths);
    $cdis=count($banner->displays_in_sixmonths);
    $cdiy=count($banner->displays_in_year);
  */
  ?>

  @if( ($cdid=count($banner->displays_in_day))>0 || ($cdiw=count($banner->displays_in_week))>0 )


    @if(($cdiw=count($banner->displays_in_week))>0)
      @include('empresas.companyStatisticsPartial.statisticsTypesPartial.bannersStatisticsPartial.graphicsPartial.displaysInDay')

      <?php
        $d1 = count($banner->displays_in_day);
        $d2 = count($banner->displays_in_twodays)-$d1;
        $d3 = count($banner->displays_in_threedays)-$d2;
        $d4 = count($banner->displays_in_fourdays)-$d3;
        $d5 = count($banner->displays_in_fivedays)-$d4;
        $d6 = count($banner->displays_in_sixdays)-$d5;
        $d7 = count($banner->displays_in_week)-$d6;
        $total_days = ($d1+$d2+$d3+$d4+$d5+$d6+$d7);
      ?>


      @if( ($cdim=count($banner->displays_in_month))>0 )
        @include('empresas.companyStatisticsPartial.statisticsTypesPartial.bannersStatisticsPartial.graphicsPartial.displaysInWeek')
      @endif

      @if( ($cdim)>0 )
        <?php
          $w1 = $cdiw;
          $w2 = count($banner->displays_in_twoweeks)-$w1;
          $w3 = count($banner->displays_in_threeweeks)-$w2;
          $w4 = count($banner->displays_in_fourweeks)-$w3;
          $total = ($w1+$w2+$w3+$w4);
        ?>

        @include('empresas.companyStatisticsPartial.statisticsTypesPartial.bannersStatisticsPartial.graphicsPartial.displaysInMonth')
      @else
        <div align="center" class="well" style="margin:8px; box-shadow: 1px 2px 2px #E9E9E9; border-radius: 3px;">
          No se registran datos mensuales.
        </div><!-- .well -->
      @endif
    @else
      <div align="center" class="well" style="margin:8px; box-shadow: 1px 2px 2px #E9E9E9; border-radius: 3px;">
        No se registran datos semanales.
      </div><!-- .well -->
    @endif
  @else
    <div align="center" class="well" style="margin:8px; box-shadow: 1px 2px 2px #E9E9E9; border-radius: 3px;">
      No se registran datos diarios.
    </div><!-- .well -->
  @endif

  <hr>
  +-----------------------------------+ <br>
  | <br>
  |  insertar gráfico <br>
  | <br>
  | <br>
  | <br>
  | <br>
  | <br>
  |  Resumenes <br>
  +-----------------------------------+ <br>

</div>