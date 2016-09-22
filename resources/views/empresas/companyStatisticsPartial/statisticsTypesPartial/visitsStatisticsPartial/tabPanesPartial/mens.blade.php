<div role="tabpanel" class="tab-pane fade" id="mens">
  <div class="row" style="padding-bottom: 5px;">
    <div class="list-group">
      <br>
      <div align="center" style="margin:10;">
        <img width="20" style="float:left;margin-left: 80px;" data-toggle="tooltip" data-placement="top" title="Hombres" src="{{url('/img/glyphicons/glyphicons/png/glyphicons-4-user.png')}}" alt="">
        <h6>ESTA ES TU INFORMACIÓN GLOBAL DE LOS USUARIOS HOMBRES</h6>
      </div>
      <hr>
      <div align="center">
        <b>Visitas hombres</b> : {{count($menVisits)}} <br>
        {{round((count($menVisits)/$totalVisits)*100,2)}}% de visitas de hombres <br>
      </div>
      <br>
      <div style="padding: 10px;">
        <div style="padding-bottom: 10px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><!-- if change, change bottom -->
          <div class="row">
            @foreach($categories as $key => $category)
              <div class="col-xs-12 col-sm-10 col-md-6 col-lg-6">
                <div style="margin:8px; box-shadow: 1px 2px 2px #E9E9E9; border-radius: 3px;">
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
                      <?php $visitantsInteresteds=0; ?>
                      @foreach($menVisits as $key => $men)
                        <?php ( count($men->interestedIn($category->id))>0?$visitantsInteresteds++:0 ) ?>
                      @endforeach

                      @include('empresas.companyStatisticsPartial.statisticsTypesPartial.visitsStatisticsPartial.graphics',
                      ['graphicType'=>'mens'])

                    </div><!-- /div .softText-descriptions -->
                  </div><!-- /div .list-group-item -->
                </div><!-- styled with box-shadow -->
              </div><!-- /div .col-xs12-sm10-md6-lg6 -->
            @endforeach
          </div><!-- .row -->
        </div><!-- /div .col-xs12-sm12-md12-lg12 -->
      </div><!-- styled padding 10px -->
    </div><!-- /div .list-group -->

  </div><!-- /div .row -->
</div><!-- /div .tab-pane .fade -->