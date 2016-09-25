<div role="tabpanel" class="tab-pane fade" id="request-service">

  <div class="row" style="padding-bottom: 5px;">
    <div class="list-group">
      <br>
      <div align="center">
        <img width="18" src="{{url('/img/glyphicons/glyphicons/png/glyphicons-417-disk-saved.png')}}" alt="">
        Solicitar
        <b>Banner Publicitario</b>
      </div>
      <hr>

      <div style="padding: 10px;">
        <div style="margin:8px; box-shadow: 1px 2px 2px #E9E9E9; border-radius: 3px;">
          <div class="list-group-item">
            <div class="row">
              <div style="padding-bottom: 10px;" class="col-xs-3 col-sm-4 col-md-4 col-lg-4">
                <a class="thumbnail" style="padding: 0;">
                  <img class="img-responsive" id="ImagenPortada" src="/img/users/banner.png" alt="..."> {{-- style="height: 140px;" --}}

                </a><!-- /div .thumbnail -->

                <div class="caption">

                  <a class="btn btn-link" href="#!"><b>{{$userCompany->nombre}}</b></a> <br>

                  <div class="softText-descriptions">

                  </div><!-- /div .softText-descriptions -->
                  {{--<small class="softText-descriptions"><b>{{count($banner->displays)}}</b> despliegues</small>--}}

                </div><!-- /div .caption -->


              </div><!-- /div .col-xs12-sm4-md4-lg4 -->

              <div class="col-xs-9 col-sm-8 col-md-8 col-lg-8">


                <div>

                  {{--
                     <span style="float:right;" class="btn btn-xs btn-default">
                      Opciones
                      @include('alerts.betaInfo')
                    </span>
                  --}}
                  <b>TITULO</b>
                  <div class="softText-descriptions">
                    DESCRIPCION <br>
                  </div><!-- .softText-descriptions-middle -->

                </div>

                <div class="softText-descriptions">

                  Visualizaciones <b>12424 </b> despliegues.<br>

                  <div class="btn-default">

                    {{--
                      +-----------------------------------+ <br>
                      | <br>
                      |  insertar gráfico <br>
                      | <br>
                      | <br>
                      | <br>
                      | <br>
                      | <br>
                      |  Resumenes <br>
                      +-----------------------------------+ <br>
                    --}}

                  </div>

                </div>

              </div><!-- /div .col-xs12-sm8-md8-lg8 -->
            </div><!-- .row -->
          </div><!-- .list-group-item -->
        </div><!-- .shadow-box -->
        <hr>
      </div>

    </div><!-- /div .list-group -->

  </div><!-- /div .row -->


</div><!-- /div .tab-pane .fade #request-service -->