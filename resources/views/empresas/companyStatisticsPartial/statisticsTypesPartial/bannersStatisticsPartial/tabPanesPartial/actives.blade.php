<div role="tabpanel" class="tab-pane active" id="actives">
  <div class="row" style="padding-bottom: 5px;">
    <div class="list-group">
      <br>
      <div align="center">
        <img width="16" src="{{url('/img/glyphicons/glyphicons/png/glyphicons-659-tick.png')}}" alt=""> Banners <b>Activos</b>
      </div>
      <hr>

      <div style="padding: 10px;">
        @foreach($userCompany->banners as $key => $banner)
          <div style="margin:8px; box-shadow: 1px 2px 2px #E9E9E9; border-radius: 3px;">
            <div class="list-group-item">
              <div class="row">
                <div style="padding-bottom: 10px;" class="col-xs-3 col-sm-4 col-md-4 col-lg-4">
                  <a class="thumbnail" style="padding: 0;">
                    <img class="img-responsive" id="ImagenPortada" src="{!! ($banner->banner!="")?'/img/users/'.$banner->banner:"/img/users/banner.png" !!}" alt="..."> {{-- style="height: 140px;" --}}

                  </a><!-- /div .thumbnail -->

                  <div class="caption">

                    <a class="btn btn-link" href="/empresas/{{$userCompany->id}}"><b>{{$userCompany->nombre}}</b></a> <br>

                    <div class="softText-descriptions">

                    </div><!-- /div .softText-descriptions -->
                    {{--<small class="softText-descriptions"><b>{{count($banner->displays)}}</b> despliegues</small>--}}

                  </div><!-- /div .caption -->


                </div><!-- /div .col-xs12-sm4-md4-lg4 -->

                <div class="col-xs-9 col-sm-8 col-md-8 col-lg-8">


                  <div>

                    <span style="float:right;" class="btn btn-xs btn-default">
                      Opciones
                      @include('alerts.betaInfo')
                    </span>
                    <b>{{$banner->titulo_banner}}</b>
                    <div class="softText-descriptions">
                      {{($b=$banner->descripcion_banner)?$b:'sin descripción'}} <br>
                    </div><!-- .softText-descriptions-middle -->

                  </div>

                  <div class="softText-descriptions">

                    Visualizaciones totales → <b>{{count($displays = $banner->displays)}} </b> despliegues.
                    <hr>

                    @include('empresas.companyStatisticsPartial.statisticsTypesPartial.bannersStatisticsPartial.graphics',
                    ['graphicType'=>'actives'])

                  </div><!-- .softText-descriptions -->

                </div><!-- /div .col-xs12-sm8-md8-lg8 -->
              </div><!-- .row -->
            </div><!-- .list-group-item -->
          </div><!-- shadow-box -->
          <hr>
        @endforeach
      </div>





    </div><!-- /div .list-group -->

  </div><!-- /div .row -->

</div><!-- /div .tab-pane .fade #actives -->