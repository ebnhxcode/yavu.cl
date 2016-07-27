@if(count($userSession->empresas)>0)
  @if(isset($e))
    @if($e->user_id == $userSession->id)
      @include('feeds.indexPartial.sectionCenterPartial.newStatusForm')
    @endif
  @else
    @include('feeds.indexPartial.sectionCenterPartial.newStatusForm')
  @endif

@endif

<input type="hidden" name="_token" value="{!!csrf_token()!!}" id="token" />
@foreach($companyStatuses as $key => $companyStatus)
  <div id='publicacion{!! $companyStatus->id !!}' class="list-group-item">

    <div class="row">
      <div class="col-md-1 col-sm-offset-0 col-xs-offset-0">
        <a href="/empresas/{!! $companyStatus->empresa_id !!}">
          <img class='media-object' src='/img/users/{!! ($companyStatus->companyPostAuthor->imagen_perfil!='')?$companyStatus->companyPostAuthor->imagen_perfil:'usuario_nuevo.png' !!}' data-holder-rendered='true' style='width: 36px; height: 36px; border-radius: 10%;'/>
        </a>
      </div><!-- /div .col-md1-sm-offset-12-xs-offset-12 -->

      <div class="col-xs-12 col-sm-12 col-md-11 col-lg-11">

        <div style="float: right;" class="dropup">

          <button class="btn btn-default btn-xs dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="glyphicon glyphicon-chevron-down"></span>
          </button><!-- /div .btn .btn-default .btn-xs .dropdown-toggle -->


          <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
            @if($userSession->id==$companyStatus->user_id)
              <li><a href='/feeds/{!!$companyStatus->id!!}/edit'>Editar publicaci&oacute;n</a></li>
            @endif
            <li><a href="{!! URL::to('/empresas/'.$companyStatus->empresa_id.'/') !!}">Ver perfil</a></li>
          </ul><!-- /ul .dropdown-menu -->


        </div><!-- /div .dropup -->

        <div class="media-heading">
          <strong><a href="/empresas/{!! $companyStatus->empresa_id !!}" style="color: #3C5B28;">{!! $companyPostName = $companyStatus->companyPostAuthor->nombre !!}</a></strong>
          <strong>·</strong>
          <a href="/feeds/{!! $companyStatus->id !!}">
            <small style="font-size: .7em; color: grey;"><abbr class='timeago' id='timeago{!! $companyStatus->id !!}' value='{!! $companyStatus->created_at !!}' title='{!! $companyStatus->created_at !!}'>{!! $companyStatus->created_at !!}</abbr></small>
          </a>
          <strong>·</strong>
          <a class="softText-descriptions" href='/feeds/{!!$companyStatus->id!!}'>ver m&aacute;s</a>

        </div><!-- /div .media-heading -->

        {{ $companyStatus->status }}<br>


        @if($cis = $companyStatus->statusImage()->select('company_image_status')->get())
          @foreach( $cis as $key => $image )
            <a href=#! class="thumbnail" style="margin: 0;">
              <img src="/img/users/{!! $image->company_image_status !!}" alt="" class="img-responsive center-block">
            </a><!-- /a .thumbnail -->
          @endforeach
        @endif

        <div style="padding-top: 15px;" name='megusta' class=''>
          @if($companyStatus->statusRewarded->id!=$userSession->id)
            @if($cs = $companyStatus->getUserInteraction($userSession->id)->get())
            <div id="border{{$companyStatus->id}}">
              <span onclick='Interactuar(this.id)' id='estado_{!! $companyStatus->id !!}' value='e{!! $companyStatus->companyPostAuthor->id !!}' class="btn {!! count($cs)<1?' out-yavucoin':' out-yavucoin' !!} btn-xs" >
                {!! count($cs)<1?'<span style=" font-family: yavu_font;color: #ffcc00;">J</span>':'<span style=" font-family: yavu_font;color: #ffcb5f;">I</span>' !!}
              </span><!-- /span $estado_+$companyStatus->id .btn .btn-sm .btn-default-warning -->
              <span id="status_{!! $companyStatus->id !!}"></span><!-- /span #status_id -->
            </div>
            @endif
          @endif

        </div><!-- /div -->
      </div><!-- /div .col-lg11-md11-sm12-xs12 -->

    </div><!-- /div .row -->
  </div><!-- /div .list-group-item #publicacion+$companyStatus->id -->
  @if($key == 4)
    <div class="list-group-item">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <a class="thumbnail">
            <img class="img-responsive" id="ImagenPortada" src="/img/yavu015.png" alt="..." style="height: 170px;">
          </a><!-- /a .thumbnail -->
        </div><!-- /div .col-md12-sm12-xs12 -->
      </div><!-- /div .row -->
    </div><!-- /div .list-group-item -->
  @endif
  @if($key == 9)
    <div class="list-group-item">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <a class="thumbnail">
            <img class="img-responsive" id="ImagenPortada" src="/img/yavu015.png" alt="..." style="height: 170px;">
          </a><!-- /a .thumbnail -->
        </div><!-- /div .col-md12-sm12-xs12 -->
      </div><!-- /div .row -->
    </div><!-- /div .list-group-item -->
  @endif
@endforeach

<div class="list-group-item" style="text-align: center;">
  <div>
    {!! $companyStatuses->render() !!}
  </div><!-- /div -->
  <small class="text-info">
    Navega entre p&aacute;ginas para encontrar m&aacute;s coins
  </small><!-- /small .text-info -->
</div><!-- /div .list-group-item styled -->


<script>
  $('.newCompanyPost').keyup(function(){
    refreshCharacters(this);
  });
  function refreshCharacters(textarea) {
    var post = textarea.value;
    $('#characters').text(200 - post.length);
    (post.length > 0)?$('#characters').addClass('text-success'):$('#characters').removeClass('text-success');
    ((post.length > 100)?$('#characters').addClass('text-warning'):$('#characters').removeClass('text-warning'));
    ((post.length > 150)?$('#characters').addClass('text-danger'):$('#characters').removeClass('text-danger'));
  }
</script>