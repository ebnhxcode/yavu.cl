<!-- Modal -->
<div class="modal fade card" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Ticket's</h4><!-- /h4 #myModalLabel .modal-title -->
			</div><!-- /div .modal-header -->
			<div class="modal-body">
				Transforma tus yavucoins a tickets para participar!
				<div class="list-group">
					<div class="list-group-item">
						<h6>MIS COINS</h6>
					</div><!-- /div .list-group-item -->
					<div class="list-group-item">
						<img src="http://i601.photobucket.com/albums/tt93/tbg8904/Gaia%20Icon/Coins.png" width="16px" height="16px">
						<span id="" class="label label-warning CantidadCoins"></span><!-- /span .label .label-warning .CantidadCoins -->
						<a class="btn btn-sm btn-success" style="float:right;" href="{!! URL::to("/feeds") !!}" id="">
							Mirar publicaciones
							<img src="http://i601.photobucket.com/albums/tt93/tbg8904/Gaia%20Icon/Coins.png" width="16px" height="16px">
						</a><!-- /a .btn btn-sm .btn-success -->
					</div><!-- /div .list-group-item -->
				</div><!-- /div .list-group -->
				<div class="list-group">
					<div class="list-group-item">
						<h6>MIS TICKETS</h6>
					</div><!-- /div .list-group-item -->
					<div class="list-group-item">
						<img src="{!!URL::to('images/ticket.png')!!}" width="16px" height="16px" />
						<span id="CantidadTickets" class="label label-info"></span><!-- /span #CantidadTickets -->
						<!--<span class="btn btn-sm btn-primary" style="float:right;" href="#!" id="ComprarMasTickets">Comprar más</span>-->
					</div><!-- /div .list-group-item -->
				</div><!-- /div .list-group -->
			</div><!-- /div .modal-body -->
			<div class="modal-footer">
				<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">No</button>
				<button type="button" id='siquiero' class="btn btn-primary btn-sm">Comprar 1 ticket</button>
			</div><!-- /div .modal-footer -->
		</div><!-- /div .modal-content -->
	</div><!-- /div .modal-dialog -->
</div><!-- /div #myModal .modal .fade .card -->
<!-- /Modal -->