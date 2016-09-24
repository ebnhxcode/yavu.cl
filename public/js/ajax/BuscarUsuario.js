$(document).ready(function(){	
/*DECLARACIÓN DE VARIABLES GLOBALES*/
/*DECLARACIÓN DE VARIABLES GLOBALES*/

/*MÉTODOS CONSTRUCTORES*/

/*MÉTODOS CONSTRUCTORES*/

/*SELECTORES*/
	$("#BuscarUsuario").click(function(e){
		if($("#usuario").val()){
			BuscarUsuario();
		}
		e.preventDefault();
		return true;
	});

	$('#usuario').keydown(function (e){
		if(e.keyCode == 13 && $("#usuario").val()){
			BuscarUsuario();
		}
		e.preventDefault();
		return true;
	})
/*SELECTORES*/

/*FUNCIONES Y PROCEDIMIENTOS*/
	function BuscarUsuario(){
		var NombreUsuario = $("#usuario").val();
		var route = "http://192.168.0.103/buscarusuario/"+NombreUsuario+"";
		$("#UserList").text("");
		$.get(route, function(res){
			$("#UserList").append(
				"<thead>"
					+"<th>Nombre</th>"
					+"<th>Correo</th>"
					+"<th>Ciudad</th>"
					+"<th>Fono</th>"
					+"<th>Cumplea&ntilde;os</th>"
					+"<th>Sexo</th>"
					+"<th>Operaciones</th>"
				+"</thead>"
			);
			$(res).each(function(key,value){
				$("#UserList").append(
					"<tbody><td>"+value.nombre+"</td>"
					+"<td>"+value.email+"</td>"
					+"<td>"+value.ciudad+"</td>"
					+"<td>"+value.fono+"</td>"
					+"<td>"+value.fecha_nacimiento+"</td>"
					+"<td>"+value.sexo+"</td>"
					+"<td> <a href='usuarios/" + value.id + "/edit' class='btn btn-primary'>Editar</a> </td>");
			});
		});	
		return true;					
	}	
/*FUNCIONES Y PROCEDIMIENTOS*/
	return true;
});