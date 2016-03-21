{!!Html::script('js/jquery.js')!!}
{!!Html::script('js/ajax/BuscarUsuario.js')!!}
{!!Html::script('js/ajax/GestionarCoins.js')!!}
@extends('layouts.front')
@section('content')
<div class="jumbotron">
	<div id="contentMiddle">
		@include('alerts.alertFields')
		@include('alerts.errorsMessage')
		@include('alerts.successMessage')
		@include('alerts.warningMessage')
		<h2>Reportes de información</h2>	
		<div class="row">
			<div class="col-md-8">
				<div class="list-group">
					<div class="list-group-item">
						<h6>HISTORIAL DE USO DE COINS</h6>
					</div>
					<div class="list-group-item wrap">
						<table id="UserList" class="table table-hover" style="font-size: 0.8em;">
							<thead>
								<th>Motivo</th>
								<th>Cantidad</th>
								<th>Fecha</th>
							@if(Auth::admin()->check())
								<th>Operaciones</th>
							@endif
							</thead>
						@foreach($historialcoins as $hcoin)	
							<tbody>
								<td>{{$hcoin->motivo}}</td>
								<td>{{$hcoin->cantidad}}</td>
								<td id="date{{$hcoin->id}}" title="{{$hcoin->created_at}}" class="timeago"></td>
							@if(Auth::admin()->check())
								<td>
									{!!link_to_route('coins.edit', $title = 'Editar', $parameters = $hcoin->id, $attributes = ['class'=>'', 'style' => 'color:#000;'])!!}
								</td>
							@endif
							</tbody>
						@endforeach
						</table>	
					</div>
					<a class="list-group-item list-group-item-info" href="#!"><small>CARGAR MÁS</small></a>
				</div>				
			</div>			
         <div class="col-sm-4"><!--style="position:fixed;z-index:1000;"-->
             <div class="list-group">
                 <div class="list-group-item-full-header">
                     <h6>INFORMACIÓN</h6>
                 </div>
                 <div class="list-group-item">
                     Coins 
                     <span id="CantidadCoins" style="float:right;" class="label label-warning">
                         <img src="http://i601.photobucket.com/albums/tt93/tbg8904/Gaia%20Icon/Coins.png" width="16px" height="16px">    
                     </span>
                 </div>
             </div>
         </div>
		</div>
	</div>
</div>
@stop
<script>
	var Control = true;
	setInterval(function(){
		if(Control){
			var a = $(".timeago");
			for(var i = 0; i < a.length ; i++){
				var elemento = document.getElementById( a[i].id );
				$('#'+a[i].id).text( humanTiming( elemento.title ) );
			}		
			Control = false;				
		}
	},100);

	function humanTiming(time)
	{
		var now = new Date();
		var nowTime = now.getTime()
		nowTime = nowTime - Date.parse(time);
	    var tokens = [
	    	[1, 'segundo'],
	    	[60, 'minuto'],
	    	[3600, 'hora'],
	    	[86400, 'día'],
	    	[604800, 'semana'],
	    	[2592000, 'mes'],
	    	[31536000, 'año']
	   ];
	   //console.log(JSON.stringify(tokens[0][1])); //unidad
	   //console.log(JSON.stringify(tokens[0][0])); //cantidad
	   	var numberOfUnits = 0;
		for(var i = 0, len = tokens.length; i < len; i++){

			if (nowTime < tokens[i][0]) {	

				if (tokens[i][1] === "día"){
					numberOfUnits = nowTime/(tokens[i-1][0])*10;
				}else{
					//numberOfUnits = nowTime/(tokens[i-2][0])*10;
					//console.log(tokens[i][1]+"/"+tokens[i][0]+"/"+numberOfUnits);
					numberOfUnits = nowTime*tokens[i][0]*10;
					//console.log(numberOfUnits);
				}

				if(Math.floor(numberOfUnits) > 356 && tokens[i][1] === 'año'){
					var anio = Math.floor((numberOfUnits/tokens[i][0]/12));
					if ( anio === 0 ){ anio = 1; }
					return "hace "+anio+" "+tokens[i][1]+((anio>1)?'s':'');

				}else if(Math.floor(numberOfUnits) >= 30 && Math.floor(numberOfUnits) < 356){
					return "hace "+Math.floor(numberOfUnits/12)+" "+tokens[i+3][1]+((Math.floor(numberOfUnits/12)>1)?'es':'');

				}else if(Math.floor(numberOfUnits) >= 7 && Math.floor(numberOfUnits) < 30){
					return "hace "+Math.floor(numberOfUnits/7)+" "+tokens[i+1][1]+((Math.floor(numberOfUnits/7)>1)?'s':'');

				}else if(Math.floor(numberOfUnits) >= 1 && Math.floor(numberOfUnits) < 7){
					return "hace "+Math.floor(numberOfUnits)+" "+tokens[i][1]+((Math.floor(numberOfUnits)>1)?'s':'');						

				}else if(Math.floor(numberOfUnits) < 1){

					if (numberOfUnits > 0.0416 ){
						return "hace "+Math.floor(24*numberOfUnits)+" "+tokens[i-1][1]+((Math.floor(24*numberOfUnits)>1)?'s':'');				

					}else if(numberOfUnits < 0.0416 && numberOfUnits > 0.000693333 ){
						numberOfUnits = Math.floor(((numberOfUnits*100)/4.)*60);
						return "hace "+numberOfUnits+" "+tokens[i-2][1]+((numberOfUnits>1)?'s':'');

					}else if(numberOfUnits < 0.000293333 ){
						return 'hace pocos minutos';

					}
				}	
			}else{	
				nowTime = Math.floor(nowTime/tokens[i][0]);					
			}
		}	    	
	}
</script>