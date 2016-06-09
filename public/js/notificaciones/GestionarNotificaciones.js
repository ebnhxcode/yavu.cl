$(document).ready(function(){
/*DECLARACION DE VARIABLES GLOBALES*/
	var Refresh = 100;
/*DECLARACION DE VARIABLES GLOBALES*/

/*MÉTODOS CONSTRUCTORES*/

/*MÉTODOS CONSTRUCTORES*/

/*SELECTORES*/

	$(function(){
		setInterval(function(){
			$("abbr.timeago").timeago();
			Refresh = 30000 + Refresh;
		}, Refresh);
		return true;
	});
/*SELECTORES*/

/*FUNCIONES Y PROCEDIMIENTOS*/

/*FUNCIONES Y PROCEDIMIENTOS*/
});