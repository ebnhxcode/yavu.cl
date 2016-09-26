<div class="list-group-item" align="right">
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1" style="padding-bottom: 10px;">
      <img class='media-object' src='/img/users/{!! ($myCompanies[0]->imagen_perfil!='')?$myCompanies[0]->imagen_perfil:'usuario_nuevo.png' !!}' data-holder-rendered='true' style='width: 36px; height: 36px; border-radius: 10%; float:left;'/>
    </div><!-- /div .col-md1-sm12-xs12 -->
    <div class="col-xs-12 col-sm-12 col-md-11 col-lg-11">
      {!!Form::open(['route'=>'estadoempresa.store', 'method'=>'POST', 'files' => 'true'])!!}
      {!!Form::textarea('status',null,['class'=>'form-control newCompanyPost box-shadow','placeholder'=>'¡Comparte una publicaci&oacute;n!', 'maxlength'=>'200', 'required'=>'required','style'=>'resize:none; padding: 15px;font-size: 1em;', 'rows'=>'2', 'id'=>'status'])!!}

      <div class="softText-descriptions">

        <!-- Nav tabs -->
        <ul id="TabUserProfile" class="nav nav-tabs" role="tablist">

          <li role="presentation" class="">
            <a href="#image" class="btn" aria-controls="image" role="tab" data-toggle="tab">
              <span class="glyphicon glyphicon-camera status-image-load"></span>
            </a>
          </li>
          {{--
          <li role="presentation"><a href="#ticketsHistory" aria-controls="ticketsHistory" role="tab" data-toggle="tab">Hitorial tickets</a></li>
          <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Información</a></li>
          <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Imagenes</a></li>
          --}}
        </ul>
          <!-- End Nav tabs -->

        <!-- Tab panes -->
        <div class="tab-content">

          <div align="center" role="tabpanel" class="tab-pane fade list-group" id="image">
            <br/>
            <label class="btn btn-default btn-file">
              <span class="glyphicon glyphicon-camera "></span>
              Buscar imagen ... <input type="file" style="display: none;" name="company_image_status" id="company_image_status" maxlength="1000" size="2048" />
            </label>
          </div><!-- /div .tab-pane .fade .active .list-group .wrap -->

          {{--
          <div role="tabpanel" class="tab-pane fade list-group" id="ticketsHistory">
            Some data
          </div><!-- /div .tab-pane .fade .active .list-group .wrap -->

          <div role="tabpanel" class="tab-pane fade" id="messages">
            Some data
          </div><!-- /div .tab-pane .fade .active .list-group .wrap -->

          <div role="tabpanel" class="tab-pane fade" id="settings">
            Some data
          </div><!-- /div .tab-pane .fade .active .list-group .wrap -->
          --}}


        </div><!-- /div .tab-content -->
        <!-- End Tab panes -->

        {{--{!! ($userSession->registro_coins()->sum('cantidad')) !!}--}}

      </div><!-- /div .softText-descriptions -->

      {!! Form::hidden('user_id',$myCompanies[0]->user_id) !!}
      {!! Form::hidden('empresa_id',$myCompanies[0]->id) !!}
      <div style="padding-top:10px">
        <span id="characters" value="200">200</span>
        {{-- {!!link_to('#!', $title="Publicar estado", $attributes = ['id'=>'publicar', 'class'=>'btn btn-success btn-sm'], $secure = null)!!} --}}
        {!!Form::submit('Publicar', ['class'=>'btn btn-sm btn-success box-shadow'])!!}
      </div><!-- /div styled -->
      {!!Form::close()!!}
    </div><!-- /div .col-md11-sm12-xs12 -->
  </div><!-- /div .row -->
</div><!-- /div .list-group-item -->
<script>
  $('#company_image_status').change(function(){
    var formato = this.value;
    var formatosPermitidos = ['jpg', 'jpeg', 'png', 'gif'];
    formato = formato.split('.');
    var sizeByte = this.files[0].size;
    var siezekiloByte = parseInt(sizeByte / 1024);
    if((formatosPermitidos.indexOf(formato[1]) < 0) || (siezekiloByte > $(this).attr('size'))) {
      alert('Formato de imagen invalido o tamaño supera los 2 Megas, seleccione otra imagen con tamaño menor');
      this.value = '';
    }else{

    }
  });
</script>