<div id="gridSystemModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
  <div class="modal-dialog" role="document">

    <div class="modal-content">

      <div class="modal-header">
        <a href="{{URL::to('/')}}"><img src={{asset('img/yavu005.png')}} width="20%"></a>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button><!-- /button .close -->
        <div align="center">
          <h4 class="modal-title" id="gridSystemModalLabel"></h4>
        </div><!-- /div aligned #gridSystemModalLabel -->
      </div><!-- /div .modal-header -->

      <div class="modal-body">
        @include('alerts.alertFields')
        {!!Form::open(['action'=>'UserController@store', 'method'=>'POST', 'id' => 'FormRegistroLanding'])!!}
          @include('usuarios.forms.fieldsLanding')
          {!! csrf_field() !!}
          <div class="form-group has-feedback has-feedback-left">
            {!!Form::submit('Registrar', ['class'=>'btn btn-primary btn-success', 'style' => 'width:100%;'])!!}
          </div>
        {!!Form::close()!!}

        {{--
        <div class="form-group has-feedback has-feedback-left">
          <a class="btn btn-primary" href='{!! URL::to("/social/facebook") !!}'>
            <span>
              <img src="{!! URL::to('/img/users/facebook.png') !!}" width="7%" alt="">
              Registrate o Inicia sesi&oacute;n con Facebook
            </span>
          </a><!-- /a .btn .btn-primary -->
        </div><!-- /div .form-group .has-feedback .has-feedback-left -->
        --}}

      </div><!-- /div .modal-body -->

    </div><!-- /div .modal-content -->

  </div><!-- /div .modal-dialog -->
</div><!-- /div .modal .fade #gridSystemModal -->