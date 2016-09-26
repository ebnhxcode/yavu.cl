<div role="tabpanel" class="tab-pane active" id="global">
  <div class="row" style="padding-bottom: 5px;">
    <div class="list-group">
      <br>
      <div align="center" style="margin:10;">
        <img width="20" style="float:left;margin-left: 80px;" data-toggle="tooltip" data-placement="top" title="Global" src="{{url('/img/glyphicons/glyphicons/png/glyphicons-341-globe.png')}}" alt="">
        <h6>ESTA ES TU INFORMACIÓN GLOBAL</h6>
      </div>
      <hr>
      <div align="center">
        <b>Total</b> : {{count($userCompany->visits)}}
        visitas
        <div class="softText-descriptions">
          Visitas de hoy → <b> {{count($visits_in_day=$userCompany->visits_in_day)}} </b> <br>
          Visitas desde hace 7 días → <b> {{count($visits_in_week=$userCompany->visits_in_week)}} </b> <br>
          Visitas desde hace de 4 semanas → <b> {{count($visits_in_month=$userCompany->visits_in_month)}} </b> <br>
          Visitas desde hace 1 año → <b> {{count($visits_in_year=$userCompany->visits_in_year)}} </b> <br>
        </div><!-- .softText-descriptions -->

      </div>
      <br>
      <div style="padding: 10px;">
        <div style="padding-bottom: 10px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <div class="row">
            @foreach($categories as $key => $category)
              <div id="cat{{$category->id}}" class="col-xs-12 col-sm-10 col-md-6 col-lg-6">
                <div class="Displays" style="margin:8px; box-shadow: 1px 2px 2px #E9E9E9; border-radius: 3px;">
                  <div class="list-group-item">
                    <b>
                      {{$category->category}}
                      @if(count($category->belongs_to_this_company($userCompany->id))>0)
                        <img style="float:right;" width="16" src="{{url('/img/glyphicons/glyphicons/png/glyphicons-342-briefcase.png')}}" data-toggle="tooltip" data-placement="top" title="Categor&iacute;a de mi empresa" alt="">
                      @endif
                    </b>
                    <div class="softText-descriptions-middle">
                      {{--$category->description--}}
                    </div><!-- /div .softText-descriptions-middle -->

                    <div class="softText-descriptions" style="padding-bottom: 5px;">
                      <?php $visitantsInteresteds=[]; ?>

                      @foreach($userCompany->visits as $key => $visit)

                        @if(count($visit->interestedIn($category->id))>0)
                          <?php array_push($visitantsInteresteds,$visit); ?>
                        @endif

                      @endforeach
                      <!-- ####################### -->
                      <!--      GRAPHIC ZONE       -->
                      <!-- ####################### -->
                      @include('empresas.companyStatisticsPartial.statisticsTypesPartial.visitsStatisticsPartial.graphics',
                      ['graphicType'=>'global'])

                    </div><!-- /div .softText-descriptions -->
                  </div><!-- /div .list-group-item -->
                </div><!-- styled with box-shadow .Displays -->
              </div><!-- /div .col-xs12-sm10-md6-lg6 -->
            @endforeach
          </div><!-- .row -->
        </div><!-- /div .col-xs12-sm12-md12-lg12 -->
      </div><!-- styled padding 10px -->
    </div><!-- /div .list-group -->

  </div><!-- /div .row -->
</div><!-- /div .tab-pane .fade -->