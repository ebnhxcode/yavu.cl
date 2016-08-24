<!-- Tab panes -->
<div class="tab-content">

  <div role="tabpanel" class="tab-pane active" id="home">
    <div class="row">
      @foreach($categories as $key => $category)
        <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
          <span>
            <b>
              {{$category->category}}
            </b>
            <small class="softText-descriptions" style="float:right;">
              {{-- ver m&aacute;s --}}
            </small><!-- /small .softText-descriptions -->
          </span>

          <br>
          <div class="softText-descriptions-middle">
            {{--$category->description--}}
          </div><!-- /div .softText-descriptions-middle -->

          <div class="softText-descriptions">
            <?php $interesteds=0; ?>
            @foreach($followers = $userCompany->followers as $key => $follower)
              <?php ( count($follower->interestedIn($category->id))>0?$interesteds++:0 ) ?>
            @endforeach
            {{($interesteds)>0?$interesteds.' de tus seguidores les interesa esta categor&iacute;a':'no tienes seguidores en esta categor&iacute;a'}}
          </div><!-- /div .softText-descriptions -->
        </div><!-- -->
      @endforeach
    </div><!-- /div .row -->
  </div><!-- /div .tab-pane .fade -->

  <div role="tabpanel" class="tab-pane fade" id="profile">

  </div><!-- /div .tab-pane .fade -->

  <div role="tabpanel" class="tab-pane fade" id="messages">

    <b>Resumen</b><br>

    <div class="softText-descriptions-middle">
      Haz realizado {{count($userCompany->sorteos)}}<br>
      {{count($userCompany->rafflesActive)}} activos.
      {{count($userCompany->rafflesEnded)}} finalizados.

    </div><!-- /div .softText-descriptions-middle -->

    <div class="row">
      @foreach($userCompany->rafflesEnded as $key => $raffle)
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
      <span>
        <b>
          {{$raffle->nombre_sorteo}}
          {{--
          usar a los seguidores y preguntarle si han participado de algun sorteo
          Cuantos de tus seguidores ha participado en sorteos tuyos
           --}}

        </b>
        <small class="softText-descriptions" style="float:right;">
          {{-- ver m&aacute;s --}}
        </small><!-- /small .softText-descriptions -->
      </span>

          <br>

          <div class="softText-descriptions">

            <?php $times=0; ?>
            @foreach($followers as $key => $follower)
              <?php ( count($follower->participatedIn($raffle->id))>0?$times++:0 ) ?>
            @endforeach
            {{($times)>0?$times.' de tus seguidores particip'.(($times)>0?'&oacute;':'aron').' en este sorteo.':'tus seguidores no han participado en este sorteo.'}}
          </div><!-- /div .softText-descriptions-middle -->


        </div><!-- -->
      @endforeach
    </div><!-- /div .row -->



  </div><!-- /div .tab-pane .fade -->

  <div role="tabpanel" class="tab-pane fade" id="settings">

  </div><!-- /div .tab-pane .fade -->

</div><!-- /div .tab-content -->