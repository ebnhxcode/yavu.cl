
<div role="tabpanel" class="tab-pane fade" id="followers">
  <div class="row">
    <div class="list-group">
      <br>
      <div align="center">
        <img width="16" src="{{url('/img/glyphicons/glyphicons/png/glyphicons-342-briefcase.png')}}" alt=""> Categor&iacute;as de mi empresa
      </div>
      <hr>
      <div style="padding: 10px;">
        <div style="padding-bottom: 10px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          @foreach($userCompany->myCategories as $key => $companyCategoryObject)
            <div style="margin:8px; box-shadow: 2px 1px 2px #E9E9E9;">
              <div class="list-group-item">
                <!-- $cco -> $companyCategoryObject -->
                <b>{{($cco = $companyCategoryObject->getCategory)?$cco->category:''}}</b>
                <br>
                <div class="softText-descriptions">
                  <?php $interesteds=0; ?>
                  @foreach($followers as $key => $follower)
                    <?php ( count($follower->interestedIn($cco->id))>0?$interesteds++:0 ) ?>
                  @endforeach
                  {{($interesteds)>0?$interesteds.' de tus seguidores tienen intereses en esta categor&iacute;a':'no tienes seguidores interesados en esta categor&iacute;a'}}
                    <br>

                    <!-- ####################### -->
                    <!--      GRAPHIC ZONE       -->
                    <!-- ####################### -->

                    @include('empresas.companyStatisticsPartial.statisticsTypesPartial.followersStatisticsPartial.graphics',
                    ['graphicType'=>'followers', 'category'=>$cco])

                </div><!-- /div .softText-descriptions -->
              </div><!-- /div .list-group-item -->
            </div><!-- styled with box-shadow -->
          @endforeach
        </div><!-- /div .col-xs6-sm6-md6-lg6 -->
      </div><!-- styled padding 10px -->
      <br>
    </div><!-- /div .list-group -->
  </div><!-- /div .row -->
</div><!-- /div .tab-pane .fade -->