<!-- Tab panes -->
<div class="tab-content">
  <div role="tabpanel" class="tab-pane active" id="home">
    <div style="padding-bottom: 5px;padding-top: 5px;">
      <b>total</b> : {{$totalVisits = (count($otherVisits = $userCompany->otherVisits)+count($womenVisits = $userCompany->womenVisits)+count($menVisits = $userCompany->menVisits))}} <br>
      100% <br>
      <div class="row">
        @foreach($categories as $key => $category)
          <div style="padding-bottom: 10px;" class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <div class="list-group-item">
              <b>{{$category->category}}</b>
              <br>
              <div class="softText-descriptions-middle">
                {{--$category->description--}}
              </div><!-- /div .softText-descriptions-middle -->

              <div class="softText-descriptions">
                <?php $visitantsInteresteds=0; ?>
                @foreach($userCompany->visits as $key => $visit)
                  <?php ( count($visit->interestedIn($category->id))>0?$visitantsInteresteds++:0 ) ?>
                @endforeach
                {{($visitantsInteresteds)>0?$visitantsInteresteds.' de tus visitantes masculinos les interesa esta categor&iacute;a':'no tienes visitantes en esta categor&iacute;a'}}
                <br>

              </div><!-- /div .softText-descriptions -->
            </div><!-- /div .list-group-item -->
          </div><!-- /div .col-xs6-sm6-md6-lg6 -->
        @endforeach
      </div><!-- /div .row -->
      <br>
      +------------------------+ <br>
      | <br>
      |  insertar gráfico <br>
      | <br>
      +------------------------+ <br>
    </div><!-- /div -->
  </div><!-- /div .tab-pane .fade -->

  <div role="tabpanel" class="tab-pane fade" id="mens">
    <div style="padding-bottom: 5px;">
      <b>cantidad de hombres</b> : {{count($menVisits)}} <br>
      {{--round((count($menVisits)/$totalVisits)*100,2)--}}% de visitas de hombres <br>
      <div class="row">
        @foreach($categories as $key => $category)
          <div style="padding-bottom: 10px;" class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <div class="list-group-item">
              <b>{{$category->category}}</b>
              <br>
              <div class="softText-descriptions-middle">
                {{--$category->description--}}
              </div><!-- /div .softText-descriptions-middle -->

              <div class="softText-descriptions">
                <?php $visitantsInteresteds=0; ?>
                @foreach($menVisits as $key => $men)
                  <?php ( count($men->interestedIn($category->id))>0?$visitantsInteresteds++:0 ) ?>
                @endforeach
                {{($visitantsInteresteds)>0?$visitantsInteresteds.' de tus visitantes masculinos les interesa esta categor&iacute;a':'no tienes visitantes en esta categor&iacute;a'}}
                <br>

              </div><!-- /div .softText-descriptions -->
            </div><!-- /div .list-group-item -->
          </div><!-- /div .col-xs6-sm6-md6-lg6 -->
        @endforeach
      </div><!-- /div .row -->
      <br>
      +------------------------+ <br>
      | <br>
      |  insertar gráfico <br>
      | <br>
      +------------------------+ <br>
    </div><!-- /div -->
  </div><!-- /div .tab-pane .fade -->

  <div role="tabpanel" class="tab-pane fade" id="womens">
    <div style="padding-bottom: 5px;">
      <b>Cantidad de mujeres</b> : {{count($womenVisits)}} <br>
      {{--round((count($womenVisits)/$totalVisits)*100,2)--}}% de visitas de mujeres <br>

      <div class="row">
        @foreach($categories as $key => $category)
          <div style="padding-bottom: 10px;" class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <div class="list-group-item">
              <b>{{$category->category}}</b>
              <br>
              <div class="softText-descriptions-middle">
                {{--$category->description--}}
              </div><!-- /div .softText-descriptions-middle -->

              <div class="softText-descriptions">
                <?php $visitantsInteresteds=0; ?>
                @foreach($womenVisits as $key => $women)
                  <?php ( count($women->interestedIn($category->id))>0?$visitantsInteresteds++:0 ) ?>
                @endforeach
                {{($visitantsInteresteds)>0?$visitantsInteresteds.' de tus visitantes masculinos les interesa esta categor&iacute;a':'no tienes visitantes en esta categor&iacute;a'}}
                <br>

              </div><!-- /div .softText-descriptions -->
            </div><!-- /div .list-group-item -->
          </div><!-- /div .col-xs6-sm6-md6-lg6 -->
        @endforeach
      </div><!-- /div .row -->
      <br>
      +------------------------+ <br>
      | <br>
      |  insertar gráfico <br>
      | <br>
      +------------------------+ <br>
    </div><!-- /div -->
  </div><!-- /div .tab-pane .fade -->

  <div role="tabpanel" class="tab-pane fade" id="others">
    <div style="padding-bottom: 5px;">
      <b>sin definir</b> : {{count($otherVisits)}} <br>
      {{--round((count($otherVisits)/$totalVisits)*100,2)--}}% de visitas sin genero<br>
      <div class="row">
        @foreach($categories as $key => $category)
          <div style="padding-bottom: 10px;" class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <div class="list-group-item">
              <b>{{$category->category}}</b>
              <br>
              <div class="softText-descriptions-middle">
                {{--$category->description--}}
              </div><!-- /div .softText-descriptions-middle -->
              <div class="softText-descriptions">
                <?php $visitantsInteresteds=0; ?>
                @foreach($otherVisits as $key => $other)
                  <?php ( count($other->interestedIn($category->id))>0?$visitantsInteresteds++:0 ) ?>
                @endforeach
                {{($visitantsInteresteds)>0?$visitantsInteresteds.' de tus visitantes masculinos les interesa esta categor&iacute;a':'no tienes visitantes en esta categor&iacute;a'}}
                <br>

              </div><!-- /div .softText-descriptions -->
            </div><!-- /div .list-group-item -->
          </div><!-- /div .col-xs6-sm6-md6-lg6 -->
        @endforeach
      </div><!-- /div .row -->
      <br>
      +------------------------+ <br>
      | <br>
      |  insertar gráfico <br>
      | <br>
      +------------------------+ <br>
    </div><!-- /div -->
  </div><!-- /div .tab-pane .fade -->
</div><!-- /div .tab-content -->