$(document).ready(function(){
/*DECLARACIÓ DE VARIABLES GLOBALES*/
	var Busqueda = "";
	var letter = "";
/*DECLARACIÓN DE VARIABLES GLOBALES*/

/*MÉTODOS CONSTRUCTORES*/
	$("#BuscarEmpresa").click(function(e){
		//BuscarSorteo();
		e.preventDefault();
		return true;
	});
	SorteosEmpresa();
/*MÉTODOS CONSTRUCTORES*/

/*SELECTORES*/
	$('.buscar').keyup(function(e){
		if(e.keyCode !== 32 && e.currentTarget.value.indexOf(String.fromCharCode(32)) > -1 ){
			Busqueda = e.currentTarget.value;
			Busqueda = ReemplazarVacios(Busqueda);
		}else{
			Busqueda = e.currentTarget.value;
		}

		function ReemplazarVacios(Busqueda){
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

			if(Busqueda.indexOf(String.fromCharCode(32)) > -1 || Busqueda.indexOf(String.fromCharCode(219)) > -1 || Busqueda.indexOf(String.fromCharCode(48)) > -1 || Busqueda.indexOf(String.fromCharCode(16)) > -1){
				return ReemplazarVacios(Busqueda);
			}
			return Busqueda;
		}
		if(e.keyCode === 13){
			if(Busqueda.substring(0,1) === '+'){
				Busqueda = Busqueda.substring(1, Busqueda.length);
			}
			//BUSCAR!
			BuscarEmpresaThumb(Busqueda);
		}
		return true;
	});

	$('#nombre').keydown(function (e){
		if(e.keyCode == 13 && $("#nombre").val()){
			//BuscarSorteo();
		}
		return true;
	});

	$('#empresathumb').keydown(function (e){
		if(e.keyCode == 13 && $("#empresathumb").val()){
			//BuscarSorteoThumb();
		}
		return true;
	});
/*SELECTORES*/

/*FUNCIONES Y PROCEDIMIENTOS*/
	function BuscarEmpresa(){
		var NombreEmpresa = $("#empresa").val();
		var route = "http://yavu.cl/buscarempresa/"+NombreEmpresa+"";
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
				+"</thead>");
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
		return true;
	}

	function BuscarEmpresaThumb(){
		var NombreEmpresa = $("#empresathumb").val();
		var route = "http://yavu.cl/buscarempresa/"+NombreEmpresa+"";
		$("#EmpresaListThumb").text("");
		var TarjetaEmpresa = "";
		$.get(route, function(res){
			TarjetaEmpresa += '<div class="container" id="tourpackages-carousel">'+'<div class="row">';
			$(res).each(function(key,value){
				//var ImagenPerfil = "/img/users/"+value.imagen_perfil;
				var ImagenPortada = "/img/users/"+value.imagen_portada;
				if (value.imagen_perfil === ""){
					ImagenPerfil = "http://yavu.cl/images/pyme.jpg";
				}
				if (value.imagen_portada === ""){
					ImagenPortada = "/img/users/banner.png";
				}
				TarjetaEmpresa +=
					'<div class="col-md-6 col-sm-12 col-xs-12">'
					+'<div class="thumbnail card">'
					+'<img src="'+ImagenPortada+'" style="height: 200px;">'
					// +'<img class="img-circle" src="'+ImagenPerfil+'" alt="">'
					+'<address>'
					+'<h4><a class="btn-link" href="/empresa/'+value.nombre+'">'+value.nombre+'</a></h4>'
					+'<strong>Ciudad :</strong> '+value.ciudad+'<br>'
					+'<strong>Contacto <span class="caret"></span></strong><br>'
					+'<strong>Fono :</strong> '+value.fono+'<br>'
					+'<a href="mailto:#">'+value.email+'</a><br>'
					+'</address>'
					+'<div align="center">'
					+'<div class="btn-group" role="group" aria-label="...">'
						+'<a href="empresa/'+value.nombre+'/" class="btn btn-default btn-xs">Ver perfil</a>'
						+'<a href="empresa/'+value.nombre+'/sorteos" class="btn btn-default btn-xs">Ver sorteos</a>'
					+'</div>'
					+'</div>'
					+'</div>'
					+'</div>';
			});
			TarjetaEmpresa += '</div>'+'</div>';
			$("#EmpresaListThumb").hide().append(TarjetaEmpresa).show('slow');
		});
		return true;
	}

	function SorteosEmpresa(){
		var route = "http://yavu.cl/sorteosempresa/";
		$.ajax({
			url: route,
			type: 'GET',
			dataType: 'json',
			cache: false,
			jsonpCallback: 'mantener',
			async: true,
			success: function success(data, status) {
        var SorteosActivos = document.getElementsByClassName("SorteosActivos");
        console.log(data[0]);
        
        //console.log(SorteosActivos.length);

        //tomar la coleccion de sorteos activos
        //comparar si le pertenece
        //asignarselo
        //console.log(data[0].user_id);

			}
		});


		return true;
	}

/*FUNCIONES Y PROCEDIMIENTOS*/
	return true;
});//Fin del document ready principal

/* FUNCION DE FILTRO */
$(document).ready(function () {
	$('.results > li').hide();
	$('div.tags').find('input:checkbox').click(function () {
		$('.results > li').hide();
		$('div.tags').find('input:checked').each(function () {
			$('.results > li.' + $(this).attr('rel')).show();
		});
	});
	return true;
});


