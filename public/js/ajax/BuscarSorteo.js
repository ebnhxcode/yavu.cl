$(document).ready(function(){
/*DECLARACIÓ DE VARIABLES GLOBALES*/
	//var Busqueda = "";
	var letter = "";
  var Refresh = 100;
/*DECLARACIÓN DE VARIABLES GLOBALES*/


/*MÉTODOS CONSTRUCTORES*/
	//BuscarUsuariosEnSorteos();

  ContarTicketsEnSorteos();
  ContarMisTicketsUsados();

/*
 var Limitador = 0;
 setInterval(function () {
 Limitador += 10;
 if(Limitador >= 500){
 if(Limitador === 1050){
 ContarTicketsEnSorteos();
 ContarMisTicketsUsados();
 Limitador = 0;
 $('.progress-bar').css('width', 0+'%').attr('aria-valuenow', 0);
 }
 }
 if(Limitador >= 100){
 $('.progress-bar').css('width', Limitador/10+'%').attr('aria-valuenow', Limitador/10);
 }
 }, Refresh);


	$("#BuscarSorteo").click(function(e){
		//BuscarSorteo();
		e.preventDefault();
	});
 */
/*MÉTODOS CONSTRUCTORES*/

/*SELECTORES*/
	/*
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
			//BuscarSorteoThumb(Busqueda);
		}
	});

	$('#nombre_sorteo').keydown(function (e){
		if(e.keyCode == 13 && $("#nombre_sorteo").val()){
			//BuscarSorteo();
		}
		return true;
	})

	$('#sorteothumb').keydown(function (e){
		if(e.keyCode == 13 && $("#sorteothumb").val()){
			//BuscarSorteoThumb();
		}
		return true;
	})
	*/
/*SELECTORES*/

/*FUNCIONES Y PROCEDIMIENTOS*/
	/*
	function BuscarSorteo(Busqueda){
		var route = "http://186.64.123.143/buscarsorteo/"+Busqueda+"";
		$("#SorteoList").text("");
		$.get(route, function(res){
			$("#SorteoList").append(
				"<thead>"
					+"<th>Nombre</th>"
					+"<th>Descripcion</th>"
					+"<th>Estado Sorteo</th>"
					+"<th>Operaciones</th>"
				+"</thead>");
			$(res).each(function(key, value){
				$("#SorteoList").append(
					"<tbody><td>"+value.nombre_sorteo+"</td>"
					+"<td>"+value.descripcion+"</td>"
					+"<td>"+value.estado_sorteo+"</td>"
					+"<td> <a href='sorteos/" + value.id + "/edit' class='btn btn-primary'>Editar</a> </td>");
			});
		});						
	}

	function BuscarUsuariosEnSorteos(){

		var Usuarios = [];
		$(".UsuariosEnSorteo").each(function(){
			Usuarios.push($(this).attr('value'));
		});
		var UsuariosJson; //= JSON.stringify(yourArray);
		UsuariosJson = JSON.stringify(Usuarios);
		return true;
	}
	*/

	function ContarTicketsEnSorteos(){
		var Tickets = [];
		var ctes = $(".TicketsEnSorteo");
		ctes.each(function(){
			var CantidadTicketsPorSorteo = $(this);
			var CantidadActual = $(this).attr('value');
			CantidadActual = CantidadActual | 0;
			var route = "http://186.64.123.143/contarticketsensorteo/"+$(this).attr('id');
			$.ajax({
				url: route,
				type: 'GET',
				dataType: 'json',
				cache: false,
				async: true,
				success:function(data){
					var j = 0;
					$(data).each(function(key, index){
						var user_id = $("#user_id");
						if(index.user_id === user_id.val()){
							j += 1;
						}
					});
					CantidadTicketsPorSorteo.attr('value', data.length);
					if(CantidadActual < data.length){
						CantidadTicketsPorSorteo.fadeOut(function() {
							CantidadTicketsPorSorteo.text(data.length).fadeIn(50); // + "\n (Haz usado " + j + " tickets para este sorteo)").fadeIn(50);

						});
					}else{
						if(data.length > 0){
							CantidadTicketsPorSorteo.text(data.length).fadeIn(50); // + "\n (Haz usado " + j + " tickets para este sorteo)");
						}else{
							CantidadTicketsPorSorteo.text(data.length);

						}
					}
				}
			});
		});
		return true;
	}

	function ContarMisTicketsUsados(){
		var mtu = $('.MisTicketsUsados');

		mtu.each(function(){
			var MisTicketsUsados = $(this);

			var CantidadActual = $(this).attr('value');
			CantidadActual = CantidadActual | 0;
			var route = "http://186.64.123.143/contarticketsensorteo/"+$(this).attr('id');
			$.ajax({
				url: route,
				type: 'GET',
				dataType: 'json',
				cache: false,
				async: true,
				success:function(data){
					var j = 0;
					$(data).each(function(key, index){
						var user_id = $("#user_id");
						if(index.user_id === user_id.val()){
							j += 1;
						}
					});

					MisTicketsUsados.attr('value', j);
					if(CantidadActual < j){
						MisTicketsUsados.fadeOut(function() {
							MisTicketsUsados.text(j).fadeIn(50); // + "\n (Haz usado " + j + " tickets para este sorteo)").fadeIn(50);

						});
					}else{
						if(data.length > 0){
							MisTicketsUsados.text(j).fadeIn(50); // + "\n (Haz usado " + j + " tickets para este sorteo)");
						}else{
							MisTicketsUsados.text(j);

						}
					}
				}
			});
		});
		return true;
	}
	/*
	function BuscarSorteoThumb(Busqueda){
		var route = "http://186.64.123.143/buscarsorteo/"+Busqueda+"";
		$("#SorteoListThumb").text("");
		$.get(route, function(res){
			var ImagenSorteo = "";
			var TarjetaSorteo = "";
			TarjetaSorteo = '<div class="container" id="tourpackages-carousel">'+'<div class="row">';
			$(res).each(function(key,value){
				ImagenSorteo = '/img/users/'+value.imagen_sorteo;
				if (value.imagen_sorteo === "" || value.imagen_sorteo === null){
					ImagenSorteo = "/images/empresa.png";
				}
				TarjetaSorteo +=
				'<div class="col-md-4">'
					+'<div class="thumbnail">'
						+'<img src="'+ImagenSorteo+'" alt="" />'
						+'<div class="caption">'
							+'<strong>Nombre Sorteo</strong>'
							+'<input class="form-control" type="text" disabled="disabled" value="'+value.nombre_sorteo+'">'
							+'<strong>Estado Sorteo</strong>'
							+'<input class="form-control" type="text" disabled="disabled" value="'+value.estado_sorteo+'">'
							+'<strong>Descripción</strong>'
							+'<textarea disabled class="form-control">'+value.descripcion+'</textarea>'
							+'<a class="btn btn-primary btn-sm col-md-12 col-sm-12 col-xs-12" href="/sorteos/'+value.id+'">Ver sorteo</a>'
						+'</div><!-- /div caption -->'
						+'<br><span id="CantidadParticipantes"></span>'
					+'</div><!-- /div thumbnail -->'
				+'</div><!-- /div col-md-4 -->';
			});
			TarjetaSorteo += '</div>'+'</div>';
			$("#SorteoListThumb").hide().append(TarjetaSorteo).show('slow');
		});
		ContarParticipantes();				
	}	

	*/
	function ContarParticipantes(){
		var sorteo_id = $("#sorteo_id").val();
		var route = "http://186.64.123.143/contarparticipantes/"+sorteo_id;
		$.ajax({
			url: route,
			type: 'GET',
			dataType: 'json',
			cache: false,
			async: true,			
			success:function(data){
				 //$("#CantidadParticipantes").text();
				$(data).each(function(key,value){
					console.log(value.participantes);
				}); 
			}
		});			
	}

	/*FUNCIONES Y PROCEDIMIENTOS*/
	return true;
});

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


