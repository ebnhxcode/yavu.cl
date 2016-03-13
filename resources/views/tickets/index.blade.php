{!!Html::script('js/jquery.js')!!}
{!!Html::script('js/ajax/BuscarUsuario.js')!!}
{!!Html::script('js/ajax/GestionarCoins.js')!!}
{!!Html::script('js/ajax/GestionarCompraTicket.js')!!}
@extends('layouts.front')
@section('content')
<div class="jumbotron">
	<div id="contentMiddle">
		@include('alerts.alertFields')
		@include('alerts.errorsMessage')
		@include('alerts.successMessage')
		@include('alerts.warningMessage')
		<h1>Compra tus ticket's para participar!</h1>	

		<div class="row">
			<div class="col-md-8">
				<div class="list-group">
	                <div class="list-group-item-full-header">
	                    <h6>COMPRA TUS TICKET</h6>
	                </div>		
	                <div class="list-group-item-full-header">
	                    El valor de cada ticket es de <span class="text-success">$1.000</span>
	                </div>		                		
					<div class="list-group-item">
						<img alt="Ticket ya!" src= "{!!URL::to('images/ticket.png')!!}" height="100px" width="100px"/>
						{!!Form::select('size', array('1' => '1'), null, ['placeholder' => 'Seleciona la cantidad...','id' => 'cantidadtickets', 'class' => 'form-control']);!!}
						<button type="button" id='comprar' class="btn btn-primary btn-sm">Comprar ticket</button>
						<input type="hidden" name="_token" value="{{csrf_token()}}" id="token" />
						<input type="hidden" value="{{Auth::user()->get()->id}}" id="user_id" />
					</div>
					<div class="list-group-item">
						Total :
						<span id="ValorCompra">0</span>
					</div>	
				</div>				
			</div>		

	         <div class="col-sm-4"><!--style="position:fixed;z-index:1000;"-->

	             <div class="list-group">
	                 <div class="list-group-item-full-header">
	                     <h6>MIS COINS</h6>
	                 </div>
	                 <div class="list-group-item">
	                     <img src="http://i601.photobucket.com/albums/tt93/tbg8904/Gaia%20Icon/Coins.png" width="16px" height="16px"> 
	                     <span id="CantidadCoins" style="float:right;" class="label label-warning">
	                            
	                     </span>
	                 </div>
	             </div>

	             <div class="list-group">
	                 <div class="list-group-item-full-header">
	                     <h6>MIS TICKETS</h6>
	                 </div>
	                 <div class="list-group-item">
	                     <img src="{!!URL::to('images/ticket.png')!!}" width="16px" height="16px"> 
	                     <span id="CantidadTickets" style="float:right;" class="label label-info">
	                            
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