<!-- Modal -->
<div class="modal fade card" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Ticket's</h4>
			</div>
			<div class="modal-body">
				Transforma tus yavucoins a tickets para participar!
				<div class="list-group">
					<div class="list-group-item-full-header">
						<h6>MIS COINS</h6>
					</div>
					<div class="list-group-item">
						<img src="http://i601.photobucket.com/albums/tt93/tbg8904/Gaia%20Icon/Coins.png" width="16px" height="16px">
						<span id="CantidadCoins" class="label label-warning"></span>
						<span class="btn btn-sm btn-success" style="float:right;" href="#!" id="">
							Mirar publicaciones
							<img src="http://i601.photobucket.com/albums/tt93/tbg8904/Gaia%20Icon/Coins.png" width="16px" height="16px">
						</span>
					</div>
				</div>
				<div class="list-group">
					<div class="list-group-item-full-header">
						<h6>MIS TICKETS</h6>
					</div>
					<div class="list-group-item">
						<img src="{!!URL::to('images/ticket.png')!!}" width="16px" height="16px" />
						<span id="CantidadTickets" class="label label-info"></span>
						<span class="btn btn-sm btn-primary" style="float:right;" href="#!" id="ComprarMasTickets">Comprar más</span>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				@if(isset($sorteo))
					<button id="UsarTicket" value="{!! $sorteo->id !!}" type="button" class="btn btn-success btn-sm" style="display: none;" data-dismiss="modal">Usar ticket</button>
				@endif
				<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">No</button>
				<button type="button" id='siquiero' class="btn btn-primary btn-sm">Comprar 1 ticket</button>
			</div>
		</div>
	</div>
</div>
<!-- /Modal -->