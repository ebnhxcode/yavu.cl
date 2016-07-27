<div class="list-group">

  <div class="list-group-item">
    <div class="row">
      <div class="col-md-1 col-sm-offset-0 col-xs-offset-0">
        <a href="/empresas/{!! ($postAuthor = $feed->companyPostAuthor)?$postAuthor->id:'' !!}">
          <img class='media-object' src='/img/users/{!! ($postAuthor->imagen_perfil!='')?$postAuthor->imagen_perfil:'usuario_nuevo.png' !!}' data-holder-rendered='true' style='width: 36px; height: 36px; border-radius: 10%;'/>
        </a>
      </div><!-- /div .col-md1-sm-offset-12-xs-offset-12 -->

      <div class="col-xs-12 col-sm-12 col-md-11 col-lg-11">
        @if($userSession->id==$feed->user_id)
          <div class="dropdown">
            <div style="float: right;" class="dropdown">
              <button class="btn btn-default btn-xs dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                <span class="caret"></span>
              </button><!-- /button .btn .btn-default .dropdown-toggle -->

              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li><a href='/feeds/{!!$feed->id!!}/edit'>Editar publicaci&oacute;n</a></li>
                <!--(user_id==value.user_id?"<li><a onclick='eliminarEstado("+value.id+",0)' href='#!'>Ocultar estado</a></li>":"")-->
              </ul><!-- /ul .dropdown-menu -->

            </div><!-- /div .dropdown -->
          </div><!-- /div .dropdown -->
        @endif
        <div class="media-heading">
          <strong><a href="/empresas/{!! $postAuthor->id !!}" style="color: #3C5B28;">{!! $postAuthor->nombre !!}</a></strong>
          <strong>·</strong>
          <small style="font-size: .7em; color: grey;"><abbr class='timeago' id='timeago{!! $feed->id !!}' value='{!! $feed->created_at !!}' title='{!! $feed->created_at !!}'>{!! $feed->created_at !!}</abbr></small>
        </div><!-- /div .media-heading -->
        <input type="hidden" name="_token" value="{!!csrf_token()!!}" id="token" />
        <div id='publicacion{!! $feed->id !!}'>
          {{$feed->status}}<br>
          @if($cis = $feed->statusImage()->select('company_image_status')->get())
            @foreach( $cis as $key => $image )
              <a href=#! class="thumbnail" style="margin: 0;">
                <img src="/img/users/{!! $image->company_image_status !!}" alt="" class="img-responsive center-block">
              </a><!-- /a .thumbnail -->
            @endforeach
          @endif

          <div style="padding-top: 15px;" name='megusta' class=''>
            @if($feed->statusRewarded->id!=$userSession->id)
              @if($cs = $feed->getUserInteraction($userSession->id)->get())

                <span onclick='Interactuar(this.id)' id='estado_{!! $feed->id !!}' value='e{!! $feed->companyPostAuthor->id !!}' class="btn {!! count($cs)<1?'out-yavucoin':'btn-default out-yavucoin' !!} btn-xs" >
                  {!! count($cs)<1?'<span style=" font-family: yavu_font;color: #ffcc00;">J</span>':'<span style=" font-family: yavu_font;color: #000;">I</span>' !!}
                </span><!-- /span $estado_+$companyStatus->id .btn .btn-sm .btn-default-warning -->
                <span id="status_{!! $feed->id !!}"></span>

              @endif
            @endif
          </div><!-- /div -->
        </div><!-- /div #publicacion -->
      </div><!-- /div .col-md11-sm12-xs12 -->
    </div><!-- /div .row -->
  </div><!-- /div .list-group-item -->
  <a href="/feeds" class="list-group-item panel-footer">
    <small>
      <span class="glyphicon glyphicon-chevron-left">
      </span><!-- /span .glyphicon .glyphicon-chevron-left -->
      volver a publicaciones
    </small>
  </a><!-- /div .list-group-item -->

</div><!-- /div .list-group -->