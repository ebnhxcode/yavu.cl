<div role="tabpanel" class="tab-pane fade" id="womens">
  <div class="row" style="padding-bottom: 5px;">
    <div class="list-group">
      <br>
      <div align="center">
        <img width="16" src="{{url('/img/glyphicons/glyphicons/png/glyphicons-341-globe.png')}}" alt=""> Globales
      </div>
      <hr>
      <div align="center">
        <b>Visitas mujeres</b> : {{count($womenVisits)}} <br>
        {{round((count($womenVisits)/$totalVisits)*100,2)}}% de visitas de mujeres <br>
      </div>
      <br>
      <div style="padding: 10px;">
        <div style="padding-bottom: 10px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><!-- if change, change bottom -->
          @foreach($categories as $key => $category)
            <div style="margin:8px; box-shadow: 2px 1px 2px #E9E9E9;">
              <div class="list-group-item">
                <b>
                  {{$category->category}}
                  @if(count($category->belongs_to_this_company($userCompany->id))>0)
                    <img style="float:right;" width="16" src="{{url('/img/glyphicons/glyphicons/png/glyphicons-342-briefcase.png')}}" data-toggle="tooltip" data-placement="top" title="Categor&iacute;a de mi empresa" style alt="">
                  @endif
                </b>
                <br>
                <div class="softText-descriptions-middle">
                  {{--$category->description--}}
                </div><!-- /div .softText-descriptions-middle -->

                <div class="softText-descriptions" style="padding-bottom: 5px;">
                  <?php $visitantsInteresteds=0; ?>
                  @foreach($womenVisits as $key => $women)
                    <?php ( count($women->interestedIn($category->id))>0?$visitantsInteresteds++:0 ) ?>
                  @endforeach
                  {{($visitantsInteresteds)>0?$visitantsInteresteds.' de tus visitas mujeres les interesa esta categor&iacute;a':'no tienes visitas en esta categor&iacute;a'}}
                  <br>
                  <br>

                  @include('empresas.companyStatisticsPartial.statisticsTypesPartial.visitsStatisticsPartial.graphics',
                  ['graphicType'=>'womens'])

                </div><!-- /div .softText-descriptions -->
              </div><!-- /div .list-group-item -->
            </div><!-- styled with box-shadow -->
          @endforeach
        </div><!-- /div .col-xs12-sm12-md12-lg12 -->
      </div><!-- styled padding 10px -->
    </div><!-- /div .list-group -->

  </div><!-- /div .row -->
</div><!-- /div .tab-pane .fade -->