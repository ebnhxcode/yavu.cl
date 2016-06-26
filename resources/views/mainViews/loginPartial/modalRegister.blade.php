<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Problemas con el inicio de sesi&oacute;n</h4>
      </div><!-- /div .modal-header -->
      <div class="modal-body">
        Ingrese su correo electr&oacute;nico
        <div class="row">
          <div class="col-md-9 col-sm-9 col-xs-9">
            {!!Form::open(['route'=>'usuarios_resetpassword_path', 'method'=>'POST'])!!}
            <input name="emailRenovarClave" id="emailRenovarClave" class="form-control" type="email" required="required">
            {!! csrf_field() !!}
          </div><!-- /div .col-md9-sm9-xs9 -->
          <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
            {!!Form::submit('Renovar clave', ['class'=>'btn btn-primary btn-success', 'id' => 'RenovarClave'])!!}
            {!!Form::close()!!}
          </div><!-- /div .col-md3-sm3-xs3 -->
        </div><!-- /div .row -->
      </div><!-- /div .modal-body -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div><!-- /div .modal-footer -->
    </div><!-- /div .modal-content -->
  </div><!-- /div .modal-dialog -->
</div><!-- /div .modal-dialog -->
<!-- End Modal -->