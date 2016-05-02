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
		<div class="" style="font-size: 3em;">
			<img id="img" width="8%" src= "{!!URL::to('img/dash/ico_sorteo01.png')!!}"/><span>Ticket's</span>
		</div>
		<div class="row">
			<div class="col-md-4 col-sm-12 col-xs-12"><!--style="position:fixed;z-index:1000;"-->
				<div>
					<div>
						<div class="list-group">
							<div class="list-group-item list-group-item-success">
								FILTRO DE BÚSQUEDA
							</div>
							<div class="list-group-item">
                @if(Auth::admin()->check())
                  {!!Form::text('nombre',null,['class' => 'form-control buscar', 'placeholder' => 'buscar sorteo','id'=>'nombre_sorteo', 'aria-describedby' => 'sizing-addon1'])!!}
                @elseif(Auth::user()->check() || !Auth::user()->check())
                  <input id='user_id' value='{!! Auth::user()->get()->id !!}' type='hidden' />
                  {!!Form::text('nombre',null,['class' => 'form-control buscar', 'placeholder' => 'buscar sorteo','id'=>'sorteothumb', 'aria-describedby' => 'sizing-addon1'])!!}
                @endif
							</div><!-- /div list-group-item -->
							<div class='list-group-item'>
								<div class='row'>

									<div class='col-md-4 col-sm-4 col-xs-4'>
										<div class='list-group'>
											<div align="center">
												<a style="padding: 1px 1px 1px 1px;" href='{!!URL::to('/sorteos/create')!!}' style='text-align:center;' class='list-group-item list-group-item-info'>
												<span>
													<img width='80%' src= '{!!URL::to('img/dash/ico_sorteo01.png')!!}'/>
												</span>
												</a>
											</div>
											<div align='center'><small>Crear sorteo</small></div>
										</div>
									</div>

									<div class='col-md-4 col-sm-4 col-xs-4'>
										<div class='list-group'>
											<div align="center">
												<a style="padding: 1px 1px 1px 1px;" href='{!!URL::to('/sorteos')!!}' style='text-align:center;' class='list-group-item list-group-item-info'>
												<span>
													<img width='80%' src= '{!!URL::to('img/dash/ico_sorteo01.png')!!}'/>
												</span>
												</a>
											</div>
											<div align='center'><small>Sorteos</small></div>
										</div>
									</div>

									<div class='col-md-4 col-sm-4 col-xs-4'>
										<div class='list-group' >
											<div align="center">
												<a style="padding: 1px 1px 1px 1px;" href='{!!URL::to('/feeds')!!}' style="text-align:center;" class="list-group-item list-group-item-info">
												<span>
													<img width="80%" src= "{!!URL::to('img/dash/ico_pin03.png')!!}"/>
												</span>
												</a>
											</div>
											<div align="center"><small>Publicaciones</small></div>
										</div>
									</div>

									<div class='col-md-4 col-sm-4 col-xs-4'>
										<div class='list-group' >
											<div align="center">
												<a style="padding: 1px 1px 1px 1px;" href='{!!URL::to('/coins/history')!!}' style="text-align:center;" class="list-group-item list-group-item-info">
												<span>
													<img width="80%" src= "{!!URL::to('img/dash/ico_notificacion004.png')!!}"/>
												</span>
												</a>
											</div>
											<div align="center"><small>Informe Coins</small></div>
										</div>
									</div>

									<div class='col-md-4 col-sm-4 col-xs-4'>
										<div class='list-group' >
											<div align="center">
												<a style="padding: 1px 1px 1px 1px;" href='{!!URL::to('/tickets/history')!!}' style="text-align:center;" class="list-group-item list-group-item-info">
												<span>
													<img width="80%" src= "{!!URL::to('img/dash/icono_informe01.png')!!}"/>
												</span>
												</a>
											</div>
											<div align="center"><small>Informe Ticket's</small></div>
										</div>
									</div>


								</div><!-- /div row -->
							</div><!-- /div list-group-item -->

							<div class="list-group-item">

								<div class="alert alert-warning alert-dismissible" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									Atento al usar tus tickets participar <br>
									<span class="glyphicon glyphicon-tag" style="font-size: 1em; color: #BEF781;"></span>
									<span class="glyphicon glyphicon-resize-horizontal"></span>
									<span class="label label-info">#14</span>&nbsp;(<small class="requerido">Tickets de ejemplo</small>)
								</div>

							</div><!-- /div list-group-item -->
						</div><!-- /div list-group -->
					</div><!-- /div panel body -->
				</div><!-- /panel -->

			</div>
      <div class="col-md-8 col-sm-12 col-xs-12">
        <div>
          <div>

            <div class="list-group">
              <div class="list-group-item list-group-item-success">
                COMPRA TUS TICKET'S A <span class="label label-warning">$ 100</span>
              </div>
              <div class="list-group-item">
                {!!Form::select('size', [1=>1,5=>5,10=>10,15=>15], null, ['placeholder' => 'Seleciona la cantidad...','id' => 'cantidadtickets', 'class' => 'form-control'])!!}
                <br>
                <button type="button" style="width: 100%" id='comprar' class="btn btn-primary btn-md comprar">Comprar ticket</button>
                <input type="hidden" name="_token" value="{!!csrf_token()!!}" id="token" />
                <input type="hidden" value="{!!Auth::user()->get()->id!!}" id="user_id" />
              </div>

            </div><!-- /div list-group -->
          </div><!-- /div panel body -->
        </div><!-- /div panel -->
			</div><!-- /div col-md-8 col-sm-12 col-xs-12 -->

		</div><!-- /div row -->
	</div>
</div>
@stop
