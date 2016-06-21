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
    $('#Info').click(function(){
      $("#Info").popover('show');
      return true;
    });


/*SELECTORES*/

/*FUNCIONES Y PROCEDIMIENTOS*/
	function ContarCoins(){
		var CargarEstados = $("#CargarEstados"); 
		var route = "http://186.64.123.143/contarcoins";
		var user_id = $("#user_id");
		$.get(route, function(res){
			$(".CantidadCoins").value = "";
			$(res).each(function(key,value){
				if(parseInt(value)>0){
					$(".CantidadCoins").show('fast').append(formatNumber.new(value, "$ "));
				}
			});
		});
		return true;
	}
	function InfoEmpresas(){
		var route = "http://186.64.123.143/infoempresas/";
		var Pendiente = false;
		$.get(route, function(res){
			$("#EstadoEmpresa").value = "";
			$(res).each(function(key,value){
				if(value.estado === "Pendiente"){
					Pendiente = true;
					$("#EstadoEmpresa").append(
						'<div>'+
						'<div class="list-group-item">'
							+"<strong>"+value.nombre+"</strong>"
							+'<span style="float:right;" class="label label-warning">'								
								+'<span class="glyphicon glyphicon-chevron-up" aria-hidden="true"></span>'
								+value.estado
							+"</span>"	
						+'</div>'
						+'</div>'
					);
				}else if(value.estado === "Activo"){
					var ImagenPerfil = "/img/users/"+value.imagen_perfil;
					if (value.imagen_perfil === ""){
						ImagenPerfil = "https://image.freepik.com/iconos-gratis/silueta-usuario-masculino_318-35708.png";
					}



					$(".hasoneempresa").css("display", "");
					
					$("#EstadoEmpresa").append(
						'<div>'+
							'<div class="list-group">'

										+'<div class="list-group-item list-group-item-success">'
											+'<a class="btn-link" href="/empresa/'+value.nombre+'">'+"<img class='media-object' src='"+ImagenPerfil+"' data-holder-rendered='true' style='width: 32px; height: 32px; border: 1px solid #73AD21;'/></a>"
											+'&nbsp;<strong><a class="btn-link" href="/empresa/'+value.nombre+'">'+value.nombre+'</a></strong>'
										+'</div>'

										+'<div class="list-group-item ">'

											+'<strong>Estado de la Empresa :</strong>'
											+'<span style="float:right;" class="label label-success">'
												+'<span class="glyphicon glyphicon-chevron-up" aria-hidden="true"></span>'
												+value.estado
											+"</span>"
										+'</div>'

										+'<div class="list-group-item">'
											+'<strong>Modificar Datos Empresa :</strong>'
											+'<a style="float:right;" class="btn-xs btn-primary btn-sm" href="empresas/'+value.id+'/edit">Editar</a>'
										+'</div>'

										+'<div class="list-group-item">'
											+'<strong>Perfil de la Empresa :</strong>'
											+"<a style='float:right;' class='btn-xs btn-primary btn-sm' href='empresa/"+value.nombre+"/'>Perfil</a>"
										+'</div>'


							+'</div>'
						+'</div>'
					);					
				}
				return true;
			});
			if(Pendiente){
				$("#EstadoEmpresa").append(
				'<div class="list-group-item">'
					+'<small>El estado '
					+'<span class="label label-warning">Pendiente</span> '
					+'indica que ĺa empresa creada, está en espera de validación por parte del equipo de yavü, '
					+'mantenga la espera y el equipo de yavü se pondrá en contacto con usted.</small>'
				+'</div>');
			}
			return true;
		});
		return true;
	}

/*FUNCIONES Y PROCEDIMIENTOS*/
	return true;
});