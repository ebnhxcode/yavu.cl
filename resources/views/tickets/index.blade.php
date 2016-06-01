@section('title') Tickets @stop
{!!Html::script('js/jquery.js')!!}
{!!Html::script('js/ajax/BuscarUsuario.js')!!}
@extends('layouts.front')
@section('content')
<div class="jumbotron">
	<div id="contentMiddle">
		@include('alerts.allAlerts')
		<div class="" style="font-size: 3em;">
			<img id="img" style="padding-bottom: 20px;" width="8%" src= "{!!URL::to('img/newGraphics/neo_icono_tickets.png')!!}"/><span>Ticket's</span>
		</div>
		<div class="row">

			<div class="col-md-4 col-sm-12 col-xs-12"><!--style="position:fixed;z-index:1000;"-->
				<div>
					<div>
						<div class="list-group">

							@include('miniDashboard.miniDashboard')

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
