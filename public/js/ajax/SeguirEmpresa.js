$(document).ready(function(){
/*DECLARACIÓN DE VARIABLES GLOBALES*/
/*DECLARACIÓN DE VARIABLES GLOBALES*/

/*MÉTODOS CONSTRUCTORES*/
	$(function () {
		VerificarSeguidores($("#empresa_id").val());
		ContarSeguidores($("#empresa_id").val());
		return true;
	})
/*MÉTODOS CONSTRUCTORES*/

	
/*SELECTORES*/

	$(function () {
		$( seguir ).click(function(){
			if($(seguir).text()==='Seguir'){
				$( seguir ).text('Siguiendo');
				return Seguir( empresa_id.value );
			}else{
				$( seguir ).text('Seguir');
				return NoSeguir( empresa_id.value );
			}
		});
		return true;
	});

/*SELECTORES*/

/*FUNCIONES Y PROCEDIMIENTOS*/
	function Seguir(empresa_id){
		var user_id = $("#user_id").val();
		var empresa_id = $("#empresa_id").val();
		var token = $("#token").val();
		var route = "http_//yavu.cl/seguirempresa/"+empresa_id+"/"+user_id;
		$.ajax({
			url: route,
			headers: {'X-CSRF-TOKEN': token},
			type: 'GET',
			dataType: 'json',
			data: {
				user_id: user_id,
				empresa_id: empresa_id,
			},
			success:function(){
				$(seguir).text('Siguiendo');
				ContarSeguidores($("#empresa_id").val());
			}
		});	
		ContarSeguidores(empresa_id);
		return true;
	}

	function NoSeguir(empresa_id){
		var user_id = $("#user_id").val();
		var empresa_id = $("#empresa_id").val();
		var token = $("#token").val();
		var route = "http_//yavu.cl/noseguirempresa/"+empresa_id+"/"+user_id;
		$.ajax({
			url: route,
			headers: {'X-CSRF-TOKEN': token},
			type: 'GET',
			dataType: 'json',
			data: {
				user_id: user_id,
				empresa_id: empresa_id,
			},
			success:function(){
				$( seguir ).text('Seguir');
				ContarSeguidores($("#empresa_id").val());
			}
		});	
		ContarSeguidores(empresa_id);
		return true;
	}
	function ContarSeguidores(empresa_id){
		var user_id = $("#user_id").val();
		var empresa_id = $("#empresa_id").val();
		$.ajax({
			url: "http_//yavu.cl/contarseguidores/"+empresa_id+"/"+user_id,
			type: 'GET',
			dataType: 'json',
			cache: false,
			async: true,
			success: function success(data, status) {
        if(data.length>0){

          $("#seguidores").val(data.length+" seguidor"+(data.length>1?'es':''));
        }else{
          $("#seguidores").val("sin seguidores");
        }

			},
			error: function error(xhr, textStatus, errorThrown) {
			  //console.log('Remote sever unavailable. Please try later');
			}
		});		
		return true;	
	}
	function VerificarSeguidores(empresa_id){
		var user_id = $("#user_id").val();
		var empresa_id = $("#empresa_id").val();
		$.ajax({
			url: "http_//yavu.cl/verificarseguidores/"+empresa_id+"/"+user_id,
			type: 'GET',
			dataType: 'json',
			cache: false,
			async: true,
			success: function success(data, status) {
				$(data).each(function(key,value){
					if (value.follow > 0){
						$( seguir ).text('Siguiendo'); 
					}else{
						$( seguir ).text('Seguir'); 	
					}
				});
			},
			error: function error(xhr, textStatus, errorThrown) {
			  //console.log('Remote sever unavailable. Please try later');
			}
		});		
		return true;
	}
	/*FUNCIONES Y PROCEDIMIENTOS*/
	return true;
});