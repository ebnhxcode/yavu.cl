@section('title') Dashboard @stop
{{--{!!Html::script('js/jquery.js')!!}--}}
{{--{!!Html::script('js/ajax/HistorialCoins.js')!!}--}}
{{--{!!Html::script('js/ajax/EmpresasDashboardUsuario.js')!!}--}}
@extends('layouts.front')
@section('content')
<div class='jumbotron'>
	<div id='fullWidth'>
		<h4 style='margin-top:-40px;'></h4>
		<div class='row'>
			<div class='col-md-3 col-sm-3 col-xs-12'>

        @include('alerts.allAlerts')

        <div id='EstadoEmpresa'></div>
			</div>

			<div class='col-md-9 col-sm-9 col-xs-12 '>
				<div class='row'>
          {{--
					@if(Auth::user()->check())
						<input type='hidden' value='{!!Auth::user()->get()->id!!}' />
					@endif
          --}}
					<div class='col-md-4 col-sm-6 col-xs-12'>
						<div class='list-group' >
              <a href='{!!URL::to('/feeds')!!}' style='text-align:center;' class='list-group-item list-group-item-info'>
                <span>
                  <h4>PUBLICACIONES</h4>
                  <img src= '{!!URL::to('img/newGraphics/neo_icono_publicaciones.png')!!}'/>
                </span>
              </a>
						</div>
					</div>

          <div class='col-md-4 col-sm-6 col-xs-12'>
            <div class='list-group' >
              <a href='{!!URL::to('/empresas')!!}' style='text-align:center;' class='list-group-item list-group-item-warning'>
                <span>
                  <h4>EMPRESAS</h4>
                  <img  src= '{!!URL::to('img/newGraphics/neo_icono_empresa.png')!!}' class=''/>
                </span>
              </a>
            </div>
          </div>

					<div class='col-md-4 col-sm-6 col-xs-12'>
						<div class='list-group' >
							<a href='{!!URL::to('/empresas/create')!!}' style='text-align:center;' class='list-group-item list-group-item-warning'>
                <span>
                  <h4>CREAR EMPRESA</h4>
                  <img  src= '{!!URL::to('img/newGraphics/neo_icono_empresa_crear.png')!!}' class=''/>
                </span>
							</a>
						</div>
					</div>

					<div class='col-md-4 col-sm-6 col-xs-12'>
						<div class='list-group' >
							<a href='{!!URL::to('/tickets/history')!!}' style='text-align:center;' class='list-group-item list-group-item-info'>
                <span>
                  <h4>TICKETS</h4>
                  <img  src= '{!!URL::to('img/newGraphics/neo_icono_tickets.png')!!}' class=''/>
                </span>
							</a>
						</div>
					</div>

          <div id="sorteo" class='col-md-4 col-sm-6 col-xs-12' style="display: none;">
            <div class='list-group' >
              <a href='{!!URL::to('/sorteos')!!}' style='text-align:center;' class='list-group-item list-group-item-warning'>
                <span>
                  <h4>SORTEOS</h4>
                  <img  src= '{!!URL::to('img/newGraphics/neo_icono_sorteo.png')!!}' class=''/>
                </span>
              </a>
            </div>
          </div>

          <div class='col-md-4 col-sm-6 col-xs-12'>
            <div class='list-group' >
              <a href='{!!URL::to('/sorteos/create')!!}' style='text-align:center;display: none;' class='list-group-item list-group-item-warning'>
                <span>
                  <h4>CREAR SORTEO</h4>
                  <img  src= '{!!URL::to('img/newGraphics/neo_icono_sorteo.png')!!}' class=''/>
                </span>
              </a>
            </div>
          </div>

				</div><!-- Fin del div id contentIn -->
			</div><!-- /div col-md-9 -->

		</div><!-- /div row -->
	</div><!-- /div fullwidth -->
</div><!-- /div jumbotron -->
@stop




