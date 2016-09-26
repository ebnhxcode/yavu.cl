
<div role="tabpanel" class="tab-pane fade" id="followers">
  <div class="row">
    <div class="list-group">
      <br>
      <div align="center">
        <img style="float:left;margin-left: 80px;" data-toggle="tooltip" data-placement="top" title="{{$userCompany->nombre}}" width="16" src="{{url('/img/glyphicons/glyphicons/png/glyphicons-342-briefcase.png')}}" alt="">
        <h6>ESTAS SON LAS CATEGORIAS A LAS QUE PERTENECE TU EMPRESA</h6>
      </div>
      <hr>
      <div style="padding: 10px;">
        <div style="padding-bottom: 10px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

          <div class="well well-sm alert alert-dismissible fade-in" style="margin:8px; box-shadow: 1px 2px 2px #E9E9E9; border-radius: 3px;">

            <button type="button" class="close" data-dismiss="alert" style="margin:18px;float:right;" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>

            <small>
              <h6>¡ESTAS SON TUS CATEGORÍAS!</h6>
              Esta es la cantidad de seguidores que pertenecen a cada categoría <br>
              <br>
              El maletín significa que la categoría pertenece a tu empresa
              <img style="float:right;" width="16" src="{{url('/img/glyphicons/glyphicons/png/glyphicons-342-briefcase.png')}}" data-toggle="tooltip" data-placement="top" title="Categor&iacute;a de mi empresa" style alt="">
            </small>

          </div><!-- .well .well-sm -->

          <div class="alert alert-info alert-dismissible" role="alert" style="margin:8px;">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <small>Puedes ocultar los paneles como alternativa</small>
            <span class="btn btn-xs btn-default hidecat" style="padding: 2px;font-size: 0.74em;">
              ocultar
            </span><!-- .btn .btn-xs .btn-default -->
          </div>

        @foreach($userCompany->myCategories as $key => $companyCategoryObject)
          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <div class="Displays" id="cat{{$companyCategoryObject->id}}" style="margin:8px; box-shadow: 1px 2px 2px #E9E9E9; border-radius: 3px;">
              <div class="list-group-item">
                <!-- $cco -> $companyCategoryObject -->
                <b>{{($cco = $companyCategoryObject->getCategory)?$cco->category:''}}</b>
                <div class="softText-descriptions">
                  <?php $interesteds=0; ?>
                  @foreach($followers as $key => $follower)
                    <?php ( count($follower->interestedIn($cco->id))>0?$interesteds++:0 ) ?>
                  @endforeach


                    <!-- ####################### -->
                    <!--      GRAPHIC ZONE       -->
                    <!-- ####################### -->

                    @include('empresas.companyStatisticsPartial.statisticsTypesPartial.followersStatisticsPartial.graphics',
                    ['graphicType'=>'followers', 'category'=>$cco])

                  </div><!-- /div .softText-descriptions -->
                </div><!-- /div .list-group-item -->
              </div><!-- styled with box-shadow .Displays -->
            </div><!-- .col-xs6-sm6-md6-lg6 -->
          @endforeach
        </div><!-- /div .col-xs6-sm6-md6-lg6 -->
      </div><!-- styled padding 10px -->
      <br>
    </div><!-- /div .list-group -->
  </div><!-- /div .row -->
</div><!-- /div .tab-pane .fade -->