$(document).ready(function(){
/*DECLARACIÓN DE VARIABLES GLOBALES*/
/*DECLARACIÓN DE VARIABLES GLOBALES*/

/*MÉTODOS CONSTRUCTORES*/
	$(function () {
		//VerificarSeguidores($("#company_id").val());
		//ContarSeguidores($("#company_id").val());
		return true;
	});
/*MÉTODOS CONSTRUCTORES*/

	
/*SELECTORES*/

	$(function () {
		$( ".seguir" ).click(function(){
			$( this ).text('Siguiendo');
			Seguir( $(this).attr('value'), $(this));
		});
		return true;
	});

/*SELECTORES*/

/*FUNCIONES Y PROCEDIMIENTOS*/
	function Seguir(company_id, btn){
		company_id = company_id || 0;
		var token = $("#token").val();

		var route = "http://localhost:8000/seguirempresa";
		$.ajax({
			url: route,
			headers: {'X-CSRF-TOKEN': token},
			type: 'POST',
			dataType: 'json',
			data: {
				empresa_id: company_id
			},
			success:function(result){
        if(result.estado==='not-followed'){
          btn.text('Seguir');
					$( '#seguidores'+company_id ).val(result.followers*8);
					$( '#seguidores'+company_id ).text(result.followers*8);
        }else{
					console.log((result.followers * (result.followers*Math.random() ) * Math.random()*100 ) );
					$( '#seguidores'+company_id ).val(	Math.round( (result.followers * (result.followers*Math.random() ) ) ) );
					$( '#seguidores'+company_id ).text(	Math.round( (result.followers * (result.followers*Math.random() ) ) ) );
					return $("#company-item-"+company_id).fadeOut(2500);
				}


			}
		});	
		return true;
	}

	function NoSeguir(company_id){
		var user_id = $("#user_id").val();
		var company_id = $("#company_id").val();
		var token = $("#token").val();
		var route = "http://localhost:8000/noseguirempresa/";
		$.ajax({
			url: route,
			headers: {'X-CSRF-TOKEN': token},
			type: 'POST',
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