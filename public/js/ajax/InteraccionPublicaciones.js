$(document).ready(function(){	
	$("a[name='like']").click(function(e) {
		console.log('Like');
	/*   
		var id_publicacin = $(this).val();
		var region = $("input[name=seleccion2]:checked").val();
		$.ajax({
			type:"post",
			url:"http://milahorros.cl/wp-content/plugins/milahorros-custom-code/class/filtracat.php",
			data:"region="+region+"&categoria="+categoria,
			success:function(data){
				$("#mostrar").html(data);
			}
		});				
	*/
	e.preventDefault();
	});	
});

