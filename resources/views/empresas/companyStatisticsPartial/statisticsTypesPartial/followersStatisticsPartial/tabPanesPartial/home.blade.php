<div role="tabpanel" class="tab-pane active" id="home">
  <div class="row">
    <div class="list-group">
      <br>
      <div align="center" style="margin:10;">
        <img width="16" style="float:left;margin-left: 80px;" data-toggle="tooltip" data-placement="top" title="Global" src="{{url('/img/glyphicons/glyphicons/png/glyphicons-341-globe.png')}}" alt="">
        <h6>ESTA ES TU INFORMACIÓN GLOBAL</h6>
      </div>
      <hr>
      <div style="padding: 10px;">
        <div style="padding-bottom: 10px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

          <div class="well well-sm alert alert-dismissible fade-in" style="margin:8px; box-shadow: 1px 2px 2px #E9E9E9; border-radius: 3px;">

            <button type="button" class="close" data-dismiss="alert" style="margin:18px;float:right;" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>

            <small>
              <h6>¡INFO!</h6>
              Tus seguidores en las diferentes <b>categorías</b> <br>
              <br>
              El maletín significa que la <b>categoría</b> pertenece a tu empresa
              <img style="float:right;" width="16" src="{{url('/img/glyphicons/glyphicons/png/glyphicons-342-briefcase.png')}}" data-toggle="tooltip" data-placement="top" title="Categor&iacute;a de mi empresa" style alt="">
            </small>

          </div><!-- .well .well-sm -->

          <div class="alert alert-info alert-dismissible" role="alert" style="margin:8px;">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <small>Puedes ocultar los paneles como alternativa</small>
            <span class="btn btn-xs btn-default" style="padding: 2px;font-size: 0.74em;">
              ocultar
            </span><!-- .btn .btn-xs .btn-default -->
          </div>



          <div class="row">


          @foreach($categories as $key => $category)
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
              <div id="cat{{$category->id}}" style="margin:8px; box-shadow: 1px 2px 2px #E9E9E9; border-radius: 3px;">
                <div class="list-group-item">
                  <b>
                    {{$category->category}}
                    @if(count($category->belongs_to_this_company($userCompany->id))>0)
                      <img style="float:right;" width="16" src="{{url('/img/glyphicons/glyphicons/png/glyphicons-342-briefcase.png')}}" data-toggle="tooltip" data-placement="top" title="Categor&iacute;a de mi empresa" alt="">
                    @endif
                  </b>
                  {{--
                  <div class="softText-descriptions-middle">
                    $category->description
                  </div><!-- /div .softText-descriptions-middle -->
                  --}}

                  <div class="softText-descriptions" style="padding-bottom: 0px;">
                    <?php $interesteds=0; ?>
                    @foreach($followers as $key => $follower)
                      <?php ( count($follower->interestedIn($category->id))>0?$interesteds++:0 ) ?>
                    @endforeach


                    <!-- ####################### -->
                    <!--      GRAPHIC ZONE       -->
                    <!-- ####################### -->

                    @include('empresas.companyStatisticsPartial.statisticsTypesPartial.followersStatisticsPartial.graphics',
                    ['graphicType'=>'home'])

                    <span id="{{$category->id}}" class="btn btn-xs btn-default hidecat" style="float:right;">
                      <small class="text-danger">ocultar</small>
                    </span><!-- .btn .btn-xs .btn-default -->

                    <script>
                      $('.hidecat').click(function(){
                        $("#cat"+this.id).fadeOut(500);
                      });
                    </script>


                  </div><!-- /div .softText-descriptions -->
                </div><!-- /div .list-group-item -->
              </div><!-- styled with box-shadow -->
            </div><!-- .col-xs6-sm6-md6-lg6 -->

          @endforeach

          </div><!-- .row -->

        </div><!-- /div .col-xs12-sm12-md12-lg12 -->
      </div><!-- styled padding 10px -->
    </div><!-- /div .list-group -->
  </div><!-- /div .row -->
</div><!-- /div .tab-pane .fade -->