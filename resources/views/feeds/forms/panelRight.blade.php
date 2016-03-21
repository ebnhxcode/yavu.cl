<div class="col-sm-8">

  <div id="e">

	 <div id="Estados"></div>

	 {!!Form::hidden('idUltima', "0", ['id'=>'idUltima'])!!}    

  </div>

  <div>

	 <div id="msj-estado" class="alert alert-dismissible list-group-item" role="alert" style="display:none;">
		<img width="30%"  src='/images/iconoCargando.gif'/>
	 </div>

	 <div id='msj-finPublicaciones' class="alert alert-dismissible list-group-item-warning" role="alert" style="display:none;">
		No hay mas publicaciones.
	 </div>

	 <a id="CargarEstados" href="#!" class="list-group-item list-group-item-info">
		Cargar estados 
		<span id="EstadosNuevos" class="badge"></span>                  
	 </a>  

  </div>

  <br /> 

</div>