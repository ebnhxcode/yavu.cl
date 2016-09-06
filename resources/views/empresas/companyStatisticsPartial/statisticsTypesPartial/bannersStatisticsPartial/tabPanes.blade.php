<!-- Tab panes -->
<div class="tab-content">

  <div role="tabpanel" class="tab-pane active" id="actives">

    <div class="row" style="padding-bottom: 5px;">
      <div class="list-group">

        <br>
        <div align="center">
          <img width="16" src="{{url('/img/glyphicons/glyphicons/png/glyphicons-341-globe.png')}}" alt=""> P&uacute;blicos
        </div>
        <hr>



        @foreach($userCompany->banners as $key => $banner)
          <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
              <div class="thumbnail" style="padding: 0;">
                <img class="img-responsive" id="ImagenPortada" src="{!! ($banner->banner!="")?'/img/users/'.$banner->banner:"/img/users/banner.png" !!}" alt="..." style="height: 140px;">

                <div class="caption">

                  <b>{{$userCompany->nombre}}</b> <br>


                  <div class="softText-descriptions">
                    {{count($displays = $banner->displays)}} despliegues.
                  </div><!-- /div .softText-descriptions -->
                  {{--<small class="softText-descriptions"><b>{{count($banner->displays)}}</b> despliegues</small>--}}

                </div><!-- /div .caption -->
              </div><!-- /div .thumbnail -->
            </div><!-- /div .col-xs12-sm4-md4-lg4 -->

            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">

            </div><!-- /div .col-xs12-sm8-md8-lg8 -->
          </div>

        <hr>
        @endforeach



      </div><!-- /div .list-group -->

    </div><!-- /div .row -->

  </div><!-- /div .tab-pane .fade -->

  <div role="tabpanel" class="tab-pane fade" id="inactives">
    @foreach($inactiveBanners = $userCompany->inactiveBanners as $key => $banner)
      <div class="thumbnail" style="padding: 0;">
        <img class="img-responsive" id="ImagenPortada" src="{!! ($banner->banner!="")?'/img/users/'.$banner->banner:"/img/users/banner.png" !!}" alt="..." style="height: 140px;">


        <b>{{$userCompany->nombre}}</b> <br>
        <div class="softText-descriptions">
          {{count($displays = $banner->displays)}} despliegues.
        </div><!-- /div .softText-descriptions -->
        {{--<small class="softText-descriptions"><b>{{count($banner->displays)}}</b> despliegues</small>--}}
      </div><!-- /div .thumbnail -->
    @endforeach
    {{count($inactiveBanners)<1?'No hay banners inactivos.':''}}

  </div><!-- /div .tab-pane .fade -->

  <div role="tabpanel" class="tab-pane fade" id="request-service">
    Deseas solicitar un nuevo banner para tu empresa?
  </div><!-- /div .tab-pane .fade -->


  {{--


    <div role="tabpanel" class="tab-pane fade" id="profile">
    </div><!-- /div .tab-pane .fade -->
  --}}

</div><!-- /div .tab-content -->