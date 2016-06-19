$(document).ready(function(){	
/*DECLARACIÓN DE VARIABLES GLOBALES*/
/*DECLARACIÓN DE VARIABLES GLOBALES*/

/*MÉTODOS CONSTRUCTORES*/
/*MÉTODOS CONSTRUCTORES*/

/*SELECTORES*/
	$("#SolicitudEliminacion").click(function(e){
		SolicitarEliminacion();
		e.preventDefault();
		return true;
	});		
/*SELECTORES*/

/*FUNCIONES Y PROCEDIMIENTOS*/
	function SolicitarEliminacion(){
		var empresa_id = $("#SolicitudEliminacion").val();
		var route = "http://186.64.123.143/solicitareliminacionempresa/"+empresa_id;
		$.get(route, function(res){
			$(res).each(function(key,value){
			  $('#msj-info').append();
				$("#msj-info").fadeIn();
				setTimeout(function() {
				    $("#msj-info").fadeOut(16000);
				},800);					
			});
			//console.log(Contador);
		});
		return true;
	}
/*FUNCIONES Y PROCEDIMIENTOS*/

	return true;
});