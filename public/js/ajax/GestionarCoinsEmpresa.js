$(document).ready(function(){	
	/*DECLARACIÓN DE VARIABLES GLOBALES*/
	var formatNumber = {
	 separador: ".", // separador para los miles
	 sepDecimal: ',', // separador para los decimales
	 formatear:function (num){
	  num +='';
	  var splitStr = num.split('.');
	  var splitLeft = splitStr[0];
	  var splitRight = splitStr.length > 1 ? this.sepDecimal + splitStr[1] : '';
	  var regx = /(\d+)(\d{3})/;
	  while (regx.test(splitLeft)) {
	  splitLeft = splitLeft.replace(regx, '$1' + this.separador + '$2');
	  }
	  return this.simbol + splitLeft  +splitRight;
	 },
	 new:function(num, simbol){
	  this.simbol = simbol ||'';
	  return this.formatear(num);
	 }
	}	
	/*DECLARACIÓN DE VARIABLES GLOBALES*/

	/*MÉTODOS CONSTRUCTORES*/
	ContarCoins();
	InfoEmpresas();
	/*MÉTODOS CONSTRUCTORES*/

	/*SELECTORES*/
	/*SELECTORES*/

	/*FUNCIONES Y PROCEDIMIENTOS*/
	function ContarCoins(){
		var CargarEstados = $("#CargarEstados"); 
		var route = "http://localhost:8000/contarcoins";
		var user_id = $("#user_id");
		$.get(route, function(res){
			$("#CantidadCoins").value = "";
			$(res).each(function(key,value){
				console.log(value.coins);
				if(parseInt(value.coins)>0){
					$("#CantidadCoins").append(formatNumber.new(value.coins, "$ "));	
				}
					//$("#CantidadCoins").html("<p>0</p>");	
			});
		});						
	}
	function InfoEmpresas(){
		var user_id = $("#user_id").val();
		var route = "http://localhost:8000/infoempresas/"+user_id;
		var Pendiente = false;
		console.log(user_id);
		$.get(route, function(res){
			$("#EstadoEmpresa").value = "";
			$(res).each(function(key,value){
				if(value.estado === "Pendiente"){
					Pendiente = true;
					//$("#EstadoEmpresa").removeClass("label-success");
					//$("#EstadoEmpresa").addClass("label-warning");
					$("#EstadoEmpresa").append(
						'<div class="list-group-item">'
							+"<strong>"+value.nombre+"</strong>"
							+'<span style="float:right;" class="label label-warning">'								
								+'<span class="glyphicon glyphicon-chevron-up" aria-hidden="true"></span>'
								+value.estado
							+"</span>"	
						+'</div>'				
					);
				}else if(value.estado === "Activo"){
					//$("#EstadoEmpresa").removeClass("label-warning");
					//$("#EstadoEmpresa").addClass("label-success");
					$("#EstadoEmpresa").append(
						'<div class="list-group-item">'
							+"<strong>"+value.nombre+"</strong>"						
							+'<span style="float:right;" class="label label-success">'
								+'<span class="glyphicon glyphicon-chevron-up" aria-hidden="true"></span>'
								+"<a href='empresa/"+value.nombre+"/'>"+value.estado+"</a>"											
							+"</span>"	
							+'<a class="btn-xs btn-link" style="float:right;" href="empresas/'+value.id+'/edit">Editar</a>'	
						+'</div>'
					);					
				}					
			});
			if(Pendiente){
				$("#EstadoEmpresa").append(
					'<div class="list-group-item">'
						+'<small>El estado '
						+'<span class="label label-warning">Pendiente</span> '
						+'indica que ĺa empresa creada, está en espera de validación por parte del equipo de yavü, '
						+'mantenga la espera y el equipo de yavü se pondrá en contacto con usted.</small>'	
					+'</div>'
				);
			}
		});	
	}

	/*FUNCIONES Y PROCEDIMIENTOS*/
});