<div class='list-group'>
	@foreach($pops as $pop)
		<div id='notificacion{!! $pop->id !!}' class='list-group-item'>
			@if($pop->tipo == "coins")
				<img src="/img/newGraphics/yavucoin_neo01_small01.png" style="width: 32px;" />&nbsp;
				{!! $pop->contenido !!}
			@elseif($pop->tipo == "ticket")
				<img src="/img/newGraphics/neo_icono_tickets.png" style="width: 32px;" />&nbsp;
				{!! $pop->contenido !!}
			@elseif($pop->tipo == "activacion")
				<img src="/img/newGraphics/neo_icono_empresa_crear.png" style="width: 32px;" />&nbsp;
				<a class="btn btn-default btn-xs" href="/empresas/{!! $pop->empresa_id !!}">
					{!! $pop->contenido !!} <small>(haz click para ver tu empresa)</small>
				</a><!-- /a .btn .btn-default .btn-xs -->
			@elseif($pop->tipo == "sorteo")
				<img src="/img/newGraphics/neo_icono_sorteo.png" style="width: 32px;" />&nbsp;
				<a class="btn btn-default btn-xs" href="/sorteos/{!! $pop->poptype_id_helper !!}">
					{!! $pop->contenido !!} <small>(haz click para ir al sorteo)</small>
				</a><!-- /a .btn .btn-default .btn-xs -->
			@endif
		</div><!-- /div #notificacion .list-group-item -->
		<div class='list-group-item'>
			<small>
				<a href="/pops/{!! $pop->id !!}">
					<abbr class="timeago" id="timeago{!! $pop->id !!}" value="{!! $pop->created_at !!}" title="{!! $pop->created_at !!}" datetime="{!! $pop->created_at !!}">
						{!! $pop->created_at !!}
					</abbr><!-- /abbr #timeago+pop_id .timeago -->
				</a>
			</small>
		</div><!-- /div .list-group-item -->
	@endforeach
	{!! $pops->render() !!}
</div><!-- /div .list-group -->

