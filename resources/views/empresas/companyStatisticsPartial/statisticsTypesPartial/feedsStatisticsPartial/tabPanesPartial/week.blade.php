<div role="tabpanel" class="tab-pane fade" id="week">

  <div class="row">
    <div class="list-group">
      <br>
      <div align="center">
        <img width="16" src="{{url('/img/glyphicons/glyphicons/png/glyphicons-58-history.png')}}" alt="">&nbsp;&nbsp;
        Publicaciones en los últimos <b>7 Días</b> atrás
      </div>
      <hr>

      <div style="padding: 10px;">

        @foreach($userCompany->feeds_in_week as $feed)

          <div style="margin:8px; box-shadow: 1px 2px 2px #E9E9E9; border-radius: 3px;">
            <div class="list-group-item">
              <div class="row">
                <div style="padding-bottom: 10px;" class="col-xs-6 col-sm-6 col-md-2 col-lg-2" align="center">
                  <h6>FECHA</h6>
                  <small>
                    {{$feed->created_at}}
                  </small>
                  <br>
                </div><!-- /div .col-xs2-sm2-md2-lg2 -->

                <div style="padding-bottom: 10px;" class="col-xs-6 col-sm-6 col-md-2 col-lg-2" align="center">
                  <h6>TIPO</h6>
                  @if($cis = $feed->statusImage()->select('company_image_status')->get())
                    @foreach( $cis as $key => $image )
                      <a href=#! class="thumbnail" style="margin: 0;padding: 0; border-radius: 7px;">
                        <img style="border-radius: 5px;" src="/img/users/{{ ($image->company_image_status!='')?$image->company_image_status:'usuario_nuevo.png' }}" alt="" class="center-block">
                      </a><!-- /a .thumbnail -->
                    @endforeach
                  @endif

                </div><!-- /div .col-xs2-sm2-md2-lg2 -->


                <div style="padding-bottom: 10px;" class="col-xs-6 col-sm-6 col-md-3 col-lg-3" align="center">
                  <h6>PUBLICACIÓN</h6>
                  <small class="softText-descriptions">

                    <div class="well well-sm" style="margin:8px; box-shadow: 1px 2px 2px #E9E9E9; border-radius: 3px;">
                      {{ substr($feed->status, 0, 80).'...' }}
                    </div><!-- .well .well-sm -->

                    <hr>

                    <b>{{ count($feed->interactions) }}</b> personas interactuaron <br>
                    <span style="float:left;">
                      <img width="16" src="{{url('/img/glyphicons/glyphicons/png/glyphicons-38-coins.png')}}" alt="">
                      $ {{ number_format(count($feed->interactions)*40 , 0, '', ',') }}
                    </span>
                  </small><!-- .softText-descriptions -->
                </div><!-- /div .col-xs3-sm3-md3-lg3 -->



                <div style="padding-bottom: 10px;" class="col-xs-6 col-sm-6 col-md-4 col-lg-4" align="center">
                  <h6>ALCANCE</h6>
                  <div class="progress">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                      <span class="sr-only">40% Complete (success)</span>
                    </div>
                  </div>
                  <div class="progress">
                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                      <span class="sr-only">20% Complete</span>
                    </div>
                  </div>
                  <div class="progress">
                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                      <span class="sr-only">60% Complete (warning)</span>
                    </div>
                  </div>
                  <div class="progress">
                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                      <span class="sr-only">80% Complete (danger)</span>
                    </div>
                  </div>


                </div><!-- /div .col-xs4-sm4-md4-lg4 -->







              </div><!-- .row -->
            </div><!-- .list-group-item -->
          </div><!-- shadow-box -->

        @endforeach

      </div><!-- styled padding 10px -->
    </div><!-- /div .list-group -->
  </div><!-- /div .row -->

</div><!-- /div .tab-pane .fade -->