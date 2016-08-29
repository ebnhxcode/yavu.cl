<!-- Tab panes -->
<div class="tab-content">

  <div role="tabpanel" class="tab-pane active" id="home">

    <div class="list-group">
      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
        <div class="">

          @foreach($userCompany->banners as $key => $banner)
            <div class="thumbnail" style="padding: 0;">
              <img class="img-responsive" id="ImagenPortada" src="{!! ($banner->banner!="")?'/img/users/'.$banner->banner:"/img/users/banner.png" !!}" alt="..." style="height: 170px;">
              <div class="softText-descriptions">
                {{count($displays = $banner->displays)}} despliegues.
              </div><!-- /div .softText-descriptions -->
              {{--<small class="softText-descriptions"><b>{{count($banner->displays)}}</b> despliegues</small>--}}
            </div><!-- /div .thumbnail -->
          @endforeach

        </div><!-- /div .list-group-item -->
      </div><!-- /div .col-xs12-sm6-md6-lg6 -->
    </div><!-- /div .list-group -->

  </div><!-- /div .tab-pane .fade -->

  <div role="tabpanel" class="tab-pane fade" id="raffles">

  </div><!-- /div .tab-pane .fade -->




  {{--
    <div role="tabpanel" class="tab-pane fade" id="settings">
    </div><!-- /div .tab-pane .fade -->

    <div role="tabpanel" class="tab-pane fade" id="profile">
    </div><!-- /div .tab-pane .fade -->
  --}}

</div><!-- /div .tab-content -->