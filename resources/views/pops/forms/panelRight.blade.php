<div class="col-sm-8">

  <div id="e">

	 <div id="Notificacion"></div>

	 {!!Form::hidden('idUltima', "0", ['id'=>'idUltima'])!!}    

  </div>

  <div>

	 <div id="msj-estado" class="alert alert-dismissible list-group-item" role="alert" style="display:none;">
		<img width="30%"  src='/images/iconoCargando.gif'/>
	 </div>

	 <div id='msj-finPublicaciones' class="alert alert-dismissible list-group-item-warning" role="alert" style="display:none;">
		No hay mas notificaciones.
	 </div>

	 <a id="CargarNotificaciones" href="#!" class="list-group-item list-group-item-info">
		Cargar notificaciones 
		<span id="NotificacionesNuevas" class="badge"></span>                  
	 </a>  

  </div>

  <br /> 

</div>