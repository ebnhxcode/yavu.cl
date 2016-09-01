<!-- Tab panes -->
<div class="tab-content">
  <div role="tabpanel" class="tab-pane active" id="categories">

    <div class="row">
      <br>
      <div class="list-group">

        <div align="center">
          <img width="16" src="{{url('/img/glyphicons/glyphicons/png/glyphicons-341-globe.png')}}" alt=""> Globales
        </div>

        <hr>

        @foreach($categories as $key => $category)
          <div style="padding-bottom: 10px;" class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
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

              <div class="softText-descriptions">
                <?php $interesteds=0; ?>
                @foreach($followers = $userCompany->followers as $key => $follower)
                  <?php ( count($follower->interestedIn($category->id))>0?$interesteds++:0 ) ?>
                @endforeach
                {{($interesteds)>0?$interesteds.' de tus seguidores tienen intereses en esta categor&iacute;a':'no tienes seguidores interesados en esta categor&iacute;a'}}
                <br>

                <span>
                  <div class="progress" style="margin: 0;">
                    &nbsp;<b>·</b>
                    <small>
                      {{ round($percent = (count($interesteds)/count($category->userInteresteds))*100,2) .'%'}}
                    </small>
                    <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: {{ ( $percent )  .'%'}};">
                    </div><!-- /div .progress-bar .progress-bar-success .progress-bar-striped .active -->
                  </div><!-- /div .progress -->
                  <span class="softText-descriptions">
                    Apuntas al {{round($percent, 2)}}% del publico global para la categor&iacute;a <b>{{$category->category}}</b>
                  </span><!-- /span .softText-descriptions -->
                  <small class="softText-descriptions" style="float:right;">
                    {{-- ver m&aacute;s --}}
                  </small><!-- /small .softText-descriptions -->
                </span>

                <br>
                +------------------------+ <br>
                | <br>
                |  insertar gráfico <br>
                | <br>
                +------------------------+ <br>
              </div><!-- /div .softText-descriptions -->
            </div><!-- /div .list-group-item -->
          </div><!-- /div .col-xs6-sm6-md6-lg6 -->
        @endforeach
      </div><!-- /div .list-group -->
    </div><!-- /div .row -->

    <div class="row">
      <div class="list-group">
        <br>
        <div align="center">
          <img width="16" src="{{url('/img/glyphicons/glyphicons/png/glyphicons-342-briefcase.png')}}" alt=""> Categor&iacute;as de mi empresa
        </div>
        <hr>

        @foreach($userCompany->myCategories as $key => $companyCategoryObject)
          <div style="padding-bottom: 10px;" class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
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

                <span>
                  <small class="softText-descriptions" style="float:right;">
                    {{-- ver m&aacute;s --}}
                  </small><!-- /small .softText-descriptions -->
                </span>


                <br>
                +------------------------+ <br>
                | <br>
                |  insertar gráfico <br>
                | <br>
                +------------------------+ <br>
              </div><!-- /div .softText-descriptions -->
            </div><!-- /div .list-group-item -->
          </div><!-- /div .col-xs6-sm6-md6-lg6 -->
        @endforeach
        <br>


      </div><!-- /div .list-group -->
    </div><!-- /div .row -->


  </div><!-- /div .tab-pane .fade -->


  {{--
    <div role="tabpanel" class="tab-pane fade" id="raffles">

    </div><!-- /div .tab-pane .fade -->



      <div role="tabpanel" class="tab-pane fade" id="profile">
      </div><!-- /div .tab-pane .fade -->
    --}}

</div><!-- /div .tab-content -->