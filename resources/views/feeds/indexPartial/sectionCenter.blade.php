<div class="list-group">
  <div class="list-group-item">
    <!-- Descuble coins secretos -->
    <div class="row">
      <div align="center" class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
        <div class="circle-green-second">

        </div>
      </div>
      <div align="center" class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
        <div class="circle-green-first">

        </div>
      </div>
      <div align="center" class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
        <div class="circle-yellow-first">

        </div>
      </div>
    </div>
  </div>

  @if(isset($myCompanies) && count($myCompanies)>0)
    <div class="list-group-item" align="right">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1" style="padding-bottom: 10px;">
          <img class='media-object' src='/img/users/{!! ($myCompanies[0]->imagen_perfil!='')?$myCompanies[0]->imagen_perfil:'usuario_nuevo.png' !!}' data-holder-rendered='true' style='width: 36px; height: 36px; border-radius: 10%; float:left;'/>
        </div><!-- /div .col-md1-sm12-xs12 -->
        <div class="col-xs-12 col-sm-12 col-md-11 col-lg-11">
          {!!Form::open(['route'=>'estadoempresa.store', 'method'=>'POST'])!!}
          {!!Form::textarea('status',null,['class'=>'form-control newCompanyPost','placeholder'=>'¡Comparte una publicaci&oacute;n!', 'maxlength'=>'500', 'required'=>'required','style'=>'resize:none; padding: 15px;font-size: 1em;', 'rows'=>'2', 'id'=>'status'])!!}
          {!! Form::hidden('user_id',$myCompanies[0]->user_id) !!}
          {!! Form::hidden('empresa_id',$myCompanies[0]->id) !!}
          <hr>
          <div style="padding-top:10px">
            <span id="characters" value="500">500</span>
            {{-- {!!link_to('#!', $title="Publicar estado", $attributes = ['id'=>'publicar', 'class'=>'btn btn-success btn-sm'], $secure = null)!!} --}}
            {!!Form::submit('Publicar', ['class'=>'btn btn-sm btn-success'])!!}
          </div><!-- /div styled -->
          {!!Form::close()!!}
        </div><!-- /div .col-md11-sm12-xs12 -->
      </div><!-- /div .row -->
    </div><!-- /div .list-group-item -->
  @endif
  @foreach($companyStatuses as $key => $companyStatus)
    <div id='publicacion{!! $companyStatus->id !!}' class="list-group-item div-hover">
      <div class="row">
        <div class="col-md-1 col-sm-offset-0 col-xs-offset-0">
          <a href="/empresas/{!! $companyStatus->empresa_id !!}">
            <img class='media-object' src='/img/users/{!! ($companyStatus->companyPostAuthor->imagen_perfil!='')?$companyStatus->companyPostAuthor->imagen_perfil:'usuario_nuevo.png' !!}' data-holder-rendered='true' style='width: 36px; height: 36px; border-radius: 10%;'/>
          </a>
        </div><!-- /div .col-md1-sm-offset-12-xs-offset-12 -->
        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
          <div class="media-heading">
            <strong><a href="/empresas/{!! $companyStatus->empresa_id !!}" style="color: #3C5B28;">{!! $companyPostName = $companyStatus->companyPostAuthor->nombre !!}</a></strong>
            <strong>·</strong>
            <a href="/feeds/{!! $companyStatus->id !!}">
              <small style="font-size: .7em; color: grey;"><abbr class='timeago' id='timeago{!! $companyStatus->id !!}' value='{!! $companyStatus->created_at !!}' title='{!! $companyStatus->created_at !!}'>{!! $companyStatus->created_at !!}</abbr></small>
            </a>
          </div><!-- /div .media-heading -->
          {!! $companyStatus->status !!}
          <br>
          <div style="padding-top: 15px;" name='megusta' class=''>
            @if($companyStatus->statusRewarded->id!=Auth::user()->get()->id)
              @if($cs = $companyStatus->getUserInteraction($userSession->id)->get())


                <span onclick='Interactuar(this.id)' id='estado_{!! $companyStatus->id !!}' value='e{!! $companyStatus->companyPostAuthor->id !!}' class="btn {!! count($cs)<1?'btn-warning out-yavucoin':'btn-default out-yavucoin' !!} btn-xs" >

                  {!! count($cs)<1?'<span style=" font-family: yavu_font;color: #ffcc00;">J</span>':'<span style=" font-family: yavu_font;color: #000;">I</span>' !!}

                </span><!-- /span $estado_+$companyStatus->id .btn .btn-sm .btn-default-warning -->
                <span id="status_{!! $companyStatus->id !!}"></span>

              @endif
            @endif
            <span class="text-info" style="float: right;font-size: 0.7em;">
              <small>(Author : <a href="/empresas/{!! $companyStatus->empresa_id !!}">{!! $companyPostName !!}</a>)</small>
            </span>
          </div><!-- /div -->
        </div><!-- /div .col-md11-sm12-xs12 -->
        <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1">
          <div class="dropup">
            <a href="/feeds/{!!$companyStatus->id!!}" class="btn btn-default btn-xs">
              <span class="glyphicon glyphicon-chevron-down"></span>
            </a>
          </div><!-- /div .dropup -->

        </div><!-- /div .col-lg1-md1-sm12-xs12 -->
      </div><!-- /div .row -->
    </div><!-- /div .list-group-item #publicacion+$companyStatus->id -->
    @if($key == 5)
      <div class="list-group-item div-hover">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <a class="thumbnail">
              <img class="img-responsive" id="ImagenPortada" src="/img/users/Cocacola/productos2-head-img2211.jpg" alt="..." style="height: 170px;">
            </a>
          </div><!-- /div .col-md12-sm12-xs12 -->
        </div>
      </div>
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

</div><!-- /div .list-group -->

<script>
  $('.newCompanyPost').keyup(function(){
    refreshCharacters(this);
  });
  function refreshCharacters(textarea) {
    var post = textarea.value;
    $('#characters').text(500 - post.length);
    (post.length > 0)?$('#characters').addClass('text-success'):$('#characters').removeClass('text-success');
    ((post.length > 200)?$('#characters').addClass('text-warning'):$('#characters').removeClass('text-warning'));
    ((post.length > 400)?$('#characters').addClass('text-danger'):$('#characters').removeClass('text-danger'));
  }
</script>