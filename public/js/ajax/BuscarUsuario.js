$(document).ready(function(){	
	/*DECLARACIÓN DE VARIABLES GLOBALES*/
	/*DECLARACIÓN DE VARIABLES GLOBALES*/

	/*MÉTODOS CONSTRUCTORES*/

	/*MÉTODOS CONSTRUCTORES*/

	/*SELECTORES*/
	/*$("#usuario").on('keypress', function(e) { 		
	    if(e.which == 13) {
	        BuscarUsuario();
	    }
	});	*/
	$("#BuscarUsuario").click(function(e)
	{
		if($("#usuario").val())
		{			BuscarUsuario();
		}
		e.preventDefault();
	});

	$('#usuario').keydown(function (e)
	{
	    if(e.keyCode == 13 && $("#usuario").val())
	    {
	        BuscarUsuario();
	    }
	    //e.preventDefault();
	})
	/*SELECTORES*/

	/*FUNCIONES Y PROCEDIMIENTOS*/
	function BuscarUsuario(){
		console.log("click");
		var NombreUsuario = $("#usuario").val();
		var route = "http://186.64.123.143/buscarusuario/"+NombreUsuario+"";
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
});