@section('favicon') {!!Html::favicon('favicons/dashboard.png')!!} @stop
@section('title') Dashboard @stop
{{--{!!Html::script('js/jquery.js')!!}--}}
{{--{!!Html::script('js/ajax/HistorialCoins.js')!!}--}}
{{--{!!Html::script('js/ajax/EmpresasDashboardUsuario.js')!!}--}}
@extends('layouts.front')
@section('content')

<div class='jumbotron'>
	<div class='contentMiddle'>
		<h4 style='margin-top:-40px;'></h4>
		<div class='row'>

      <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
        @include('alerts.allAlerts')
      </div><!-- /div .col-xs12-sm12-md12-lg12 -->

			<div class='col-xs-12 col-sm-3 col-md-3 col-lg-3'>
        @include('usuarios.dashboardPartial.sectionCompanyInfo')
        @include('sorteos.showPartial.sectionLeft')
      </div><!-- /div .col-md3-sm3-xs12 -->

			<div class='col-xs-12 col-sm-6 col-md-6 col-lg-6'>
				<div class='row'>
					<div class='col-md-4 col-sm-6 col-xs-12'>

						<div class='list-group' >
              <a href='{!!URL::to('/feeds')!!}' style='text-align:center;' class='list-group-item'>
                <span>
                  <h4>YAVÜPOSTS!</h4>
                  <img width="90%" class="img-responsive-centered" src="{!!URL::to('img/newGraphics/neo_icono_comercio02.png')!!}" />
                </span>
              </a><!-- /a .list-group-item .success -->
            </div><!-- /div .list-group -->
          </div><!-- /div .col-md9-sm9-xs12 -->

          <div class='col-md-4 col-sm-6 col-xs-12'>
            <div class='list-group' >
              <a href='{!!URL::to('/empresas')!!}' style='text-align:center;' class='list-group-item'>
                <span>
                  <h4>EMPRESAS</h4>
                  <img class='img-responsive-centered' src= '{!!URL::to('img/newGraphics/icono_empresa.png')!!}'/>
                </span>
              </a><!-- /a .list-group-item .success -->
            </div><!-- /div .list-group -->
          </div><!-- /div .col-md4-sm6-xs12 -->

          <div class='col-md-4 col-sm-6 col-xs-12 hideifhasone'>
              <div class='list-group' >
                  <a href='{!!URL::to('/empresas/create')!!}' style='text-align:center;' class='list-group-item'>
                <span>
                  <h4>CREAR EMPRESA</h4>
                  <img class='img-responsive-centered' src= '{!!URL::to('img/newGraphics/icono_crea_empresa.png')!!}'/>
                </span>
              </a><!-- /a .list-group-item .success -->
            </div><!-- /div .list-group -->
          </div><!-- /div .col-md4-sm6-xs12 -->

          <div id="sorteo" class='col-md-4 col-sm-6 col-xs-12' {{--style="display: none;"--}}>
            <div class='list-group' >
              <a href='{!!URL::to('/sorteos')!!}' style='text-align:center;' class='list-group-item'>
                <span>
                  <h4>SORTEOS</h4>
                  <img class='img-responsive-centered' src= '{!!URL::to('img/newGraphics/icofinal_sorteos_premios.png')!!}'/>
                </span>
              </a><!-- /a .list-group-item .success -->
            </div><!-- /div .list-group -->
          </div><!-- /div .col-md4-sm6-xs12 -->

          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class='list-group' >
              <a style="text-align:center;" data-toggle="modal" data-target="#myModal" class="list-group-item btn">
                <span>
                  <h4>INFORMES</h4>
                  <img class='img-responsive-centered' src="{!!URL::to('img/newGraphics/icofinal_informes.png')!!}"/>
                </span>
              </a><!-- /a .list-group-item .info styled -->
            </div><!-- /div .list-group -->
          </div><!-- /div .col-md4-sm-4-xs6 -->

          {{--
					<div class='col-md-4 col-sm-6 col-xs-12'>
						<div class='list-group' >
							<a href='{!!URL::to('/tickets/history')!!}' style='text-align:center;' class='list-group-item list-group-item-info'>
                <span>
                  <h4>TICKETS</h4>
                  <img  src= '{!!URL::to('img/newGraphics/neo_icono_tickets.png')!!}' class=''/>
                </span>
              </a><!-- /a .list-group-item .success -->
            </div><!-- /div .list-group -->
          </div><!-- /div .col-md4-sm6-xs12 -->
          --}}




          @if(count($userSession->empresas)>0)<!-- cuenta si es que tiene alguna empresa -->
            <div class='col-md-4 col-sm-6 col-xs-12'>
              <div class='list-group'>
                <a href='{!!URL::to('/sorteos/create')!!}' style='text-align:center;' class='list-group-item'>
                  <span>
                    <h4>CREAR SORTEO</h4>
                    <img class='img-responsive-centered' src= '{!!URL::to('img/newGraphics/icofinal_sorteos_premios.png')!!}'/>
                  </span>
                </a><!-- /a .list-group-item .success -->
              </div><!-- /div .list-group -->
            </div><!-- /div .col-md4-sm6-xs12 -->
          @endif

				</div><!-- /div .row -->
			</div><!-- /div col-md9-sm9-xs12 -->

      <div class='col-xs-12 col-sm-3 col-md-3 col-lg-3'>
        @include('empresas.indexPartial.sectionRight')
      </div><!-- /div .col-md3-sm3-xs12 -->

		</div><!-- /div .row -->
	</div><!-- /div #fullwidth -->
</div><!-- /div .jumbotron -->

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Seleccione tipo de informe que desea ver</h4>
      </div><!-- /div .modal-header -->
      <div class="modal-body">
        <div class="row">
          <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <div class='list-group' >
              <div align="center">
                <a style="padding: 2px 2px 2px 2px;" href='{!!URL::to('/coins/history')!!}' style="text-align:center;" class="list-group-item">
                <span>
                  <img width="80%" src= "{!!URL::to('img/newGraphics/yavucoin_neo02a.png')!!}"/>
                </span>
                </a><!-- /a .list-group-item .success -->
              </div><!-- /div aligned -->
              <div align="center">
                <small>Informe de Coins</small>
              </div><!-- /div aligned -->
            </div><!-- /div .list-group -->
          </div><!-- /div .col-md4-sm4-xs4 -->
          <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <div class="list-group">
              <div align="center">
                <a style="padding: 2px 2px 2px 2px;" href="{!!URL::to('/tickets/history')!!}" style="text-align:center;" class="list-group-item">
                  <span>
                    <img style="padding-bottom: 10px;" width="80%"src= "{!!URL::to('img/newGraphics/neo_icono_tickets.png')!!}"/>
                  </span>
                </a>
              </div><!-- /div aligned -->
              <div align="center">
                <small>Informe de Tickets</small>
              </div><!-- /div aligned -->
              <br>
            </div><!-- /div .list-group -->
          </div><!-- /div .col-md4-sm4-xs4 -->

          @if(count($userSession->empresas)>0)
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
              <div class="list-group" >
                <div align="center">
                  <a style="padding: 2px 2px 2px 2px;" href="{!!URL::to('/estadisticasdemiempresa')!!}" style="text-align:center;" class="list-group-item list-group-item-info">
                  <span>
                    <img width="80%" src= "{!!URL::to('img/dash/icono_informe01.png')!!}"/>
                  </span>
                  </a>
                </div><!-- /div aligned -->
                <div align="center">
                  <small>Estad&iacute;sticas de mi empresa</small>
                </div><!-- /div aligned -->
              </div><!-- /div .list-group -->
            </div><!-- /div .col-md4-sm4-xs4 -->
          @endif

        </div><!-- /div .row -->
      </div><!-- /div .modal-body -->
      <div class="modal-footer">
      </div><!-- /div .modal-footer -->
    </div><!-- /div .modal-content -->
  </div><!-- /div .modal-dialog -->
</div><!-- /div .modal-fade -->

@stop




