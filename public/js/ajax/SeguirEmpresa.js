$(document).ready(function(){
/*DECLARACIÓN DE VARIABLES GLOBALES*/
/*DECLARACIÓN DE VARIABLES GLOBALES*/

/*MÉTODOS CONSTRUCTORES*/
	$(function () {
		VerificarSeguidores($("#company_id").val());
		ContarSeguidores($("#company_id").val());
		return true;
	})
/*MÉTODOS CONSTRUCTORES*/

	
/*SELECTORES*/

	$(function () {
		$( seguir ).click(function(){
			if($(seguir).text()==='Seguir'){
				$( seguir ).text('Siguiendo');
				return Seguir( company_id.value );
			}else{
				$( seguir ).text('Seguir');
				return NoSeguir( company_id.value );
			}
		});
		return true;
	});

/*SELECTORES*/

/*FUNCIONES Y PROCEDIMIENTOS*/
	function Seguir(company_id){
		var user_id = $("#user_id").val();
		var company_id = $("#company_id").val();
		var token = $("#token").val();
		var route = "http://localhost:8000/seguirempresa/"+company_id+"/"+user_id;
		$.ajax({
			url: route,
			headers: {'X-CSRF-TOKEN': token},
			type: 'GET',
			dataType: 'json',
			data: {
				user_id: user_id,
				empresa_id: company_id,
			},
			success:function(){
				$(seguir).text('Siguiendo');
				ContarSeguidores($("#company_id").val());
			}
		});	
		ContarSeguidores(company_id);
		return true;
	}

	function NoSeguir(company_id){
		var user_id = $("#user_id").val();
		var company_id = $("#company_id").val();
		var token = $("#token").val();
		var route = "http://localhost:8000/noseguirempresa/"+company_id+"/"+user_id;
		$.ajax({
			url: route,
			headers: {'X-CSRF-TOKEN': token},
			type: 'GET',
			dataType: 'json',
			data: {
				user_id: user_id,
				empresa_id: company_id,
			},
			success:function(){
				$( seguir ).text('Seguir');
				ContarSeguidores($("#company_id").val());
			}
		});	
		ContarSeguidores(company_id);
		return true;
	}
	function ContarSeguidores(company_id){
		var user_id = $("#user_id").val();
		var company_id = $("#company_id").val();
		$.ajax({
			url: "http://localhost:8000/contarseguidores/"+company_id+"/"+user_id,
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
	function VerificarSeguidores(company_id){
		var user_id = $("#user_id").val();
		var company_id = $("#company_id").val();
		$.ajax({
			url: "http://localhost:8000/verificarseguidores/"+company_id+"/"+user_id,
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