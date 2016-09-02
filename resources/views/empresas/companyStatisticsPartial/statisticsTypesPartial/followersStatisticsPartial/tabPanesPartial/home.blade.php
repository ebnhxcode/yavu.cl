<div role="tabpanel" class="tab-pane active" id="home">
  <div class="row">
    <div class="list-group">
      <br>
      <div align="center">
        <img width="16" src="{{url('/img/glyphicons/glyphicons/png/glyphicons-341-globe.png')}}" alt=""> Globales
      </div>
      <hr>
      <div style="padding: 10px;">
        <div style="padding-bottom: 10px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
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
                  <?php $interesteds=0; ?>
                  @foreach($followers as $key => $follower)
                    <?php ( count($follower->interestedIn($category->id))>0?$interesteds++:0 ) ?>
                  @endforeach
                  {{($interesteds)>0?$interesteds.' de tus seguidores tienen intereses en esta categor&iacute;a':'no tienes seguidores interesados en esta categor&iacute;a'}}
                  <br>

                  <!-- ####################### -->
                  <!--      GRAPHIC ZONE       -->
                  <!-- ####################### -->

                  @include('empresas.companyStatisticsPartial.statisticsTypesPartial.followersStatisticsPartial.graphics',
                  ['graphicType'=>'home'])

                </div><!-- /div .softText-descriptions -->
              </div><!-- /div .list-group-item -->
            </div><!-- styled with box-shadow -->
          @endforeach
        </div><!-- /div .col-xs12-sm12-md12-lg12 -->
      </div><!-- styled padding 10px -->
    </div><!-- /div .list-group -->
  </div><!-- /div .row -->
</div><!-- /div .tab-pane .fade -->