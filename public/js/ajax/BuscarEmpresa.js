	$(document).ready(function(){	
	/*DECLARACIÓ DE VARIABLES GLOBALES*/
	var Busqueda = "";
	var letter = "";
	/*DECLARACIÓN DE VARIABLES GLOBALES*/

	/*MÉTODOS CONSTRUCTORES*/
	$("#BuscarEmpresa").click(function(e){
		//BuscarSorteo();
		e.preventDefault();
	});
	/*MÉTODOS CONSTRUCTORES*/

	/*SELECTORES*/
	/*$("#usuario").on('keypress', function(e) { 		
	    if(e.which == 13) {
	        BuscarUsuario();
	    }
	});	*/
	$('.buscar').keyup(function(e){
		//console.log(String.fromCharCode(e.keyCode));
		//console.log(String.fromCharCode(112));
		//console.log(e.keyCode);

		if(e.keyCode !== 32 && e.currentTarget.value.indexOf(String.fromCharCode(32)) > -1 )
		{
			Busqueda = e.currentTarget.value;
			Busqueda = ReemplazarVacios(Busqueda);
		}
		else
		{
			Busqueda = e.currentTarget.value;
		}

		function ReemplazarVacios(Busqueda)
		{
			Busqueda = Busqueda.replace(String.fromCharCode(32), '+');
			Busqueda = Busqueda.replace('     ', '+');
			Busqueda = Busqueda.replace('    ', '+');
			Busqueda = Busqueda.replace('   ', '+');
			Busqueda = Busqueda.replace('  ', '+');
			Busqueda = Busqueda.replace('+++++', '+');
			Busqueda = Busqueda.replace('++++', '+');
			Busqueda = Busqueda.replace('+++', '+');
			Busqueda = Busqueda.replace('++', '+');
			Busqueda = Busqueda.replace('=', '');
			Busqueda = Busqueda.replace("'or'", '');
			Busqueda = Busqueda.replace("'and'", '');
			Busqueda = Busqueda.replace("script", '');
			Busqueda = Busqueda.replace("/", '');
			Busqueda = Busqueda.replace("'", '');
			Busqueda = Busqueda.replace('<', '');
			Busqueda = Busqueda.replace('>', '');

			if(Busqueda.indexOf(String.fromCharCode(32)) > -1 || Busqueda.indexOf(String.fromCharCode(219)) > -1 || Busqueda.indexOf(String.fromCharCode(48)) > -1 || Busqueda.indexOf(String.fromCharCode(16)) > -1)
			{          
				return ReemplazarVacios(Busqueda);
			}
			return Busqueda;
		}
	

		if(e.keyCode === 13)
		{
			if(Busqueda.substring(0,1) === '+')
			{
				Busqueda = Busqueda.substring(1, Busqueda.length);
			}


			console.log(Busqueda);
			//BUSCAR!
			BuscarEmpresaThumb(Busqueda);

		}


	});

	$('#nombre').keydown(function (e)
	{
	    if(e.keyCode == 13 && $("#nombre").val())
	    {
	        //BuscarSorteo();

	    }

	    //e.preventDefault();
	})	

	$('#empresathumb').keydown(function (e)
	{
	    if(e.keyCode == 13 && $("#empresathumb").val())
	    {
	        //BuscarSorteoThumb();

	    }

	    //e.preventDefault();
	})	
	/*SELECTORES*/

	/*FUNCIONES Y PROCEDIMIENTOS*/

	function BuscarEmpresa(){
		console.log("click");
		var NombreEmpresa = $("#empresa").val();
		var route = "http://186.64.123.143/buscarempresa/"+NombreEmpresa+"";
		$("#EmpresaList").text("");
		$.get(route, function(res){
			$("#EmpresaList").append(
					"<thead>"
						+"<th>Nombre</th>"
						+"<th>Correo</th>"
						+"<th>Ciudad</th>"
						+"<th>Fono</th>"
						+"<th>Aniversario Empresa</th>"
						+"<th>Encargado</th>						"
						+"<th>Operaciones</th>"
					+"</thead>"
				);
			$(res).each(function(key,value){
				$("#EmpresaList").append(
						"<tbody><td>"+value.nombre+"</td>"
						+"<td>"+value.correo+"</td>"
						+"<td>"+value.ciudad+"</td>"
						+"<td>"+value.fono+"</td>"
						+"<td>"+value.fecha_creacion+"</td>"
						+"<td>"+value.encargado+"</td>"
						+"<td> <a href='empresas/" + value.id + "/edit' class='btn btn-primary'>Editar</a> </td>");								 

			});
		});						
	}	

	/*FUNCIONES Y PROCEDIMIENTOS*/


});


	function BuscarEmpresaThumb(){
		
		var NombreEmpresa = $("#empresathumb").val();
		var route = "http://186.64.123.143/buscarempresa/"+NombreEmpresa+"";
		$("#EmpresaListThumb").text("");
		var TarjetaEmpresa = "";
		$.get(route, function(res){
			console.log("clickthum");
			TarjetaEmpresa +=
				'<div class="container" id="tourpackages-carousel">'
				+'<div class="row">';

			$(res).each(function(key,value){
				var ImagenPerfil = "/img/users/"+value.imagen_perfil;
				var ImagenPortada = "/img/users/"+value.imagen_portada;
				if (value.imagen_perfil === "")
				{
					ImagenPerfil = "http://186.64.123.143/images/pyme.jpg";
				}
				if (value.imagen_portada === "")
				{
					ImagenPortada = "http://medioambiente.nh-hoteles.es/themes/default/images/bgd-biodiversidad-00.png";
				}

				TarjetaEmpresa += 
						
						'<div class="col-md-4">'
				          	+'<div class="thumbnail card">'
								+'<img src="'+ImagenPortada+'" alt="">'
								+'<img class="img-circle" src="'+ImagenPerfil+'" alt="">'
				                +'<h4><a class="btn-link" href="/empresa/'+value.nombre+'">'+value.nombre+'</a></h4>'
				                +value.ciudad+'<br>'
				                +value.fono+'<br>'
				          +'</div>'
				        +'</div>'

				;								 
			});
			TarjetaEmpresa +=
					'</div>'
				+'</div>';

			$("#EmpresaListThumb").hide().append(TarjetaEmpresa).show('slow');

		});						
	}	
	/*FUNCIONES Y PROCEDIMIENTOS*/



 /* FUNCION DE FILTRO */
 
$(document).ready(function () {
            $('.results > li').hide();

            $('div.tags').find('input:checkbox').click(function () {
                $('.results > li').hide();
                $('div.tags').find('input:checked').each(function () {
                    $('.results > li.' + $(this).attr('rel')).show();
                });
            });
        });    


