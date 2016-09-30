$(document).ready(function(){
/*DECLARACIÓN DE VARIABLES GLOBALES*/
/*DECLARACIÓN DE VARIABLES GLOBALES*/

/*MÉTODOS CONSTRUCTORES*/
	ListarEmpresasUsuarios();
/*MÉTODOS CONSTRUCTORES*/

/*SELECTORES*/
/*SELECTORES*/

/*FUNCIONES Y PROCEDIMIENTOS*/
	function ListarEmpresasUsuarios(){
		var user_id = $("#user_id").val();
		var route = "http://yavu.local/infoempresas/"+user_id;
		var Pendiente = false;
		var Contador = 0;
		$.get(route, function(res){
			$("#AccordionEmpresas").value = "";
			var AccordionEmpresas = "";
			$(res).each(function(key,value){
				Contador += 1;
				if(value.estado === "Pendiente"){
					Pendiente = true;
					AccordionEmpresas +=
					'<div class="list-group-item">'
						+"<strong>"+value.nombre+"</strong>"
						+'<span style="float:right;" class="label label-warning">'
							+'<span class="glyphicon glyphicon-chevron-up" aria-hidden="true"></span>'
							+value.estado
						+"</span>"
					+'</div>';
				}else if(value.estado === "Activo"){
					var ImagenPerfil = "";
					var ImagenPortada = "";
					if (value.imagen_portada === ""){
						ImagenPortada = "<div class='well well-sm'>No tienes un banner personal, puedes subir una editando la información de tu empresa <a class='btn-link' href='http://yavu.local/empresas/"+value.id+"/edit'>aquí</a></div>";
					}else{
						ImagenPortada = "<img src='/img/users/"+value.imagen_portada+"' alt=''>";
					}
					AccordionEmpresas +=
					'<div class="panel panel-default">'
						+'<div class="panel-heading" role="tab" id="heading'+Contador+'">'
							+'<h4 class="panel-title">'
								+'<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse'+Contador+'" aria-expanded="true" aria-controls="collapse'+Contador+'">'
									+'<div class="btn-link">'+value.nombre+ImagenPerfil+'</div>'
								+'</a>'
							+'</h4>'
						+'</div>'
						+'<div id="collapse'+Contador+'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading'+Contador+'">'
							+'<div class="panel-body">'
								+"<div class='thumbnail card' style='border: 0px;'>"
									+ImagenPortada+"<br>"
									+"<span><a class='btn btn-primary btn-sm' href='http://yavu.local/empresa/"+value.nombre+"/'>Perfil</a></span>&nbsp;"
									+"<span><a class='btn btn-primary btn-sm' href='http://yavu.local/empresas/"+value.id+"/edit'>Editar información</a></span>&nbsp;"
									+"<p>...</p><br>"
								+"</div>"
							+'</div>'
						+'</div>'
					+'</div>';
				}
			});
			if(Pendiente){
				AccordionEmpresas +=
				'<div class="list-group-item">'
					+'<small>El estado '
					+'<span class="label label-warning">Pendiente</span> '
					+'indica que ĺa empresa creada, está en espera de validación por parte del equipo de yavü, '
					+'mantenga la espera y el equipo de yavü se pondrá en contacto con usted.</small>'
				+'</div>';
			}
			$("#AccordionEmpresas").hide().append(AccordionEmpresas).show('slow');
		});					
	}	
/*FUNCIONES Y PROCEDIMIENTOS*/
	return true;
});