<!-- Tab panes -->
<div class="tab-content">

  <div role="tabpanel" class="tab-pane active" id="general">



  </div><!-- /div .tab-pane .fade -->

  <div role="tabpanel" class="tab-pane fade" id="actives">

  </div><!-- /div .tab-pane .fade -->

  <div role="tabpanel" class="tab-pane fade" id="inactives">

  </div><!-- /div .tab-pane .fade -->


  <div role="tabpanel" class="tab-pane fade" id="requests">

    <div class="list-group">
      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
        <div class="">

          <div class="softText-descriptions">
            Tienes {{count($raffleRaquests = $userCompany->raffleRequests)}} peticiones de sorteos.
          </div><!-- /div .softText-descriptions -->

        </div><!-- /div .list-group-item -->
      </div><!-- /div .col-xs12-sm6-md6-lg6 -->
    </div><!-- /div .list-group -->

  </div><!-- /div .tab-pane .fade -->




  {{--
    <div role="tabpanel" class="tab-pane fade" id="settings">
    </div><!-- /div .tab-pane .fade -->

    <div role="tabpanel" class="tab-pane fade" id="profile">
    </div><!-- /div .tab-pane .fade -->
  --}}

</div><!-- /div .tab-content -->