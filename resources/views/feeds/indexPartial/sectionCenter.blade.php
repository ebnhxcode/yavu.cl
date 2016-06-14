





  <div class="list-group">

    @if(isset($myCompanies))
      <div class="list-group-item" align="right">

        <div class="row">
          <div class="col-md-1 col-sm-12 col-xs-12" style="padding-bottom: 10px;">

            <img class='media-object' src='/img/users/{!! $myCompanies[0]->imagen_perfil !!}' data-holder-rendered='true' style='width: 36px; height: 36px; border-radius: 10%; float:left;'/>

          </div>
          <div class="col-md-11 col-sm-12 col-xs-12">
            {!!Form::open(['route'=>'estadoempresa.store', 'method'=>'POST'])!!}
            {!!Form::textarea('status',null,['class'=>'form-control newCompanyPost','placeholder'=>'¡Comparte una publicaci&oacute;n!', 'maxlength'=>'500', 'required'=>'required','style'=>'resize:none; padding: 25px;font-size: 1em;', 'rows'=>'2', 'id'=>'status'])!!}
            <div style="padding-top:10px">
              <span id="characters" value="500">500</span>
              {!!link_to('#!', $title="Publicar estado", $attributes = ['id'=>'publicar', 'class'=>'btn btn-success btn-sm'], $secure = null)!!}
            </div>
            {!!Form::close()!!}
          </div>
        </div>

      </div>
    @endif


  @foreach($companyStatuses as $companyStatus)
      <div id='publicacion{!! $companyStatus->id !!}' class="list-group-item">
        <div class="row">
          <div class="col-md-1 col-sm-offset-0 col-xs-offset-0">
            <a href="/empresa/{!! $companyStatus->companyPostAuthor->nombre !!}">
              <img class='media-object' src='/img/users/{!! $companyStatus->companyPostAuthor->imagen_perfil !!}' data-holder-rendered='true' style='width: 36px; height: 36px; border-radius: 10%;'/>
            </a>
          </div><!-- /div .col-md1-sm-offset-12-xs-offset-12 -->
          <div class="col-md-11 col-sm-12 col-xs-12">

            {{--
            <div class="dropdown">
              <div style="float: right;" class="dropdown">
                <button class="btn btn-default btn-xs dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                  <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                  <span class="caret"></span>
                </button><!-- /button .btn .btn-default .dropdown-toggle -->
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                  <li><a onclick="eliminarEstado({!!  $companyStatus->id.','.$companyStatus->id!!})" href="#!">{!! (Auth::user()->get()->id==$companyStatus->id?"Eliminar":"Ocultar") !!} publicación</a></li>
                  <!--(user_id==value.user_id?"<li><a onclick='eliminarEstado("+value.id+",0)' href='#!'>Ocultar estado</a></li>":"")-->
                  <!--(user_id==value.user_id?"<li><a href='/feeds/"+value.id+"/edit'>Editar publicaci&oacute;n</a></li>":"")-->
                </ul><!-- /ul .dropdown-menu -->
              </div><!-- /div .dropdown -->
            </div><!-- /div .dropdown -->
            --}}

            <div class="media-heading">
              <strong><a href="/empresa/{!! $companyStatus->companyPostAuthor->nombre !!}" style="color: #3C5B28;">{!! $companyStatus->companyPostAuthor->nombre !!}</a></strong>
              <strong>·</strong>
              <a href="/feeds/{!! $companyStatus->id !!}">
                <small style="font-size: .7em; color: grey;"><abbr class='timeago' id='timeago{!! $companyStatus->id !!}' value='{!! $companyStatus->created_at !!}' title='{!! $companyStatus->created_at !!}'>{!! $companyStatus->created_at !!}</abbr></small>
              </a>
            </div>

            {!! $companyStatus->status !!}
            <br>
            <div style="padding-top: 15px;" name='megusta' class='' onclick='Interactuar({!! $companyStatus->id !!})' id='estado_{!! $companyStatus->id !!}' value='e{!! $companyStatus->companyPostAuthor->id !!}'>
              <!--<img id='imgcoin{!! $companyStatus->id !!}' src='/img/newGraphics/cobrar_coins.png' />-->
              <small class="btn btn-warning btn-xs">Cobrar mis coins</small>
            </div><!-- /span #estado_+feed_id -->

          </div><!-- /div .col-md11-sm12-xs12 -->
        </div><!-- /div .row -->
      </div><!-- /div .list-group-item -->
  @endforeach
  </div><!-- /div .list-group -->
{!! $companyStatuses->render() !!}

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