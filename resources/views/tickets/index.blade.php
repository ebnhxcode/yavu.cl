{!!Html::script('js/jquery.js')!!}
{!!Html::script('js/ajax/BuscarUsuario.js')!!}
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
	                    El valor de cada ticket es de <span class="text-success">$100</span>
	                </div>		                		
					<div class="list-group-item">
						<img alt="Ticket ya!" src= "{!!URL::to('images/ticket.png')!!}" height="100px" width="100px"/>
						{!!Form::select('size', array('1' => '1'), null, ['placeholder' => 'Seleciona la cantidad...','id' => 'cantidadtickets', 'class' => 'form-control']);!!}
						<button type="button" id='comprar' class="btn btn-primary btn-sm comprar">Comprar ticket</button>
						<input type="hidden" name="_token" value="{!!csrf_token()!!}" id="token" />
						<input type="hidden" value="{!!Auth::user()->get()->id!!}" id="user_id" />
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
	                     <span id="" style="float:right;" class="label label-warning CantidadCoins">
	                            
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
