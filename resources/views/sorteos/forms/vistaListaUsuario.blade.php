<div id="SorteoListThumb">

	@foreach($sorteos as $sorteo)
		@if($sorteo->estado_sorteo == 'Activo')
			<div class="list-group-item">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-1 col-lg-1">
            <img class='media-object' src='/img/users/{!! ($companyProfileImage = $sorteo->companyAuthorRaffle->imagen_perfil)?$companyProfileImage:'usuario_nuevo.png' !!}' data-holder-rendered='true' style='width: 48px; height: 48px; border-radius: 10%; float:left;'/>
					</div><!-- /div .col-xs12-sm12-md1-lg1 -->
					<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
						<div class="row">
              <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 softText-descriptions">

                <div style="padding: 4px;">
                  <strong>Empresa</strong><br>
                  <span class="glyphicon glyphicon-chevron-right"></span>
                  <a href="{!! URL::to('/empresas/'.$sorteo->empresa_id) !!}">{!! $sorteo->nombre_empresa !!}</a><br>
                </div>

                <div style="padding: 4px;">
                  <strong>Sorteo</strong><br>
                  <span class="glyphicon glyphicon-chevron-right"></span>
                  <span class="text-info">{!!$sorteo->nombre_sorteo!!}</span><br>
                </div>

                <div style="padding: 4px;">
                  <strong>Descripci&oacute;n</strong><br>
                  <span class="glyphicon glyphicon-chevron-right"></span>
                  <span class="text-info">{!!$sorteo->descripcion!!}</span><br>
                </div>

                <div style="padding: 4px;">
                  <strong>Fecha del premiaci&oacute;n</strong><br>
                  <span class="glyphicon glyphicon-chevron-right"></span>
                  <small> Este sorteo se realizara dentro de
                    <abbr class='timeago text-danger' id='timeago{!! $sorteo->id !!}' value='{!! $sorteo->fecha_inicio_sorteo !!}' title='{!! $sorteo->fecha_inicio_sorteo !!}'>{!! $sorteo->fecha_inicio_sorteo !!}</abbr>
                  </small>
                </div>

                <div style="padding: 4px;">
                  <strong>Estado del sorteo</strong><br>
                  <span class="glyphicon glyphicon-chevron-right"></span>
                  <span class="text-success">{!!$sorteo->estado_sorteo!!}</span><br>
                </div>

                <input id="sorteo_id" value="{!! $sorteo->id !!}" type="hidden" />
                <input type="hidden" name="_token" value="{!!csrf_token()!!}" id="token" />
                <div id="msjs{!! $sorteo->id !!}" class="alert alert-info alert-dismissible" style="display: none;" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div><!-- /div #msjs+sorteo_id .alert .alert-info .alert-dismissible -->
              </div> <!-- /div .col-md4-sm12-xs12 -->
							<div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
								<a class="thumbnail">
									<img class="img-responsive" src='{!! isset($sorteo)?($sorteo->imagen_sorteo!='')?'/img/users/'.$sorteo->imagen_sorteo:'https://tiendas-asi.com/wp-content/uploads/2015/04/sorteo-diariodebodas.jpg':'' !!}' >
								</a> <!-- /div .thumbnail -->
                <div class="amplio">
                  <div style="" class="row">
                    <div align="center" class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                      <span class="glyphicon glyphicon-user"></span><br>
                      <span class="TicketsEnSorteo" id="{!! $sorteo->id !!}"></span>
                      <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    </div><!-- /div .col-md3-sm3-xs3 -->
                    <div align="center" class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                      <span class="glyphicon glyphicon-tag"></span><br>
                      <span class="MisTicketsUsados" id="{!! $sorteo->id !!}"></span>
                    </div><!-- /div .col-md3-sm3-xs3 -->
                    <div align="center" class="col-md-6 col-sm-6 col-xs-6">
                      <span class="glyphicon glyphicon-time"></span><br>
                      <small>
                        <abbr title="{!! $sorteo->fecha_inicio_sorteo !!}">21:00 hrs</abbr>
                      </small>
                    </div><!-- /div .col-md6-sm6-xs6 -->
                  </div> <!-- /div .row -->
                </div><!-- /div .amplio -->
                <div class="">
                  <button class="btn btn-success btn-lg UsarTicket" value="{!! $sorteo->id !!}" type="button"   style="display: none; width: 100%;" data-dismiss="modal">¡¡ Participar !!</button>
                </div><!-- /div .semi-amplio -->
                <div class="row softText-descriptions">
                  <div align="" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <span class="glyphicon glyphicon-user"></span>
                    <small>Total de tickets en juego</small>
                    <br>
                    <span class="glyphicon glyphicon-tag"></span>
                    <small>Mis tickets usados para este sorteo</small>
                    <br>
                    <span class="glyphicon glyphicon-time"></span>
                    <small>Hora del sorteo</small>
                    <br>
                    <small>
                      <span id="estado"></span><!-- /div #estado -->
                    </small>
                  </div><!-- /div .col-md12-sm12-xs12 -->
                </div><!-- /div .row -->

							</div> <!-- /div .col-md8-sm12-xs12 -->
						</div><!-- /div .row -->
					</div>
          <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1">

            <div style="z-index: auto;" class="dropup">
              <button class="btn btn-default btn-xs dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="glyphicon glyphicon-chevron-down"></span>
              </button><!-- /div .btn .btn-default .btn-xs .dropdown-toggle -->
              <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                <li><a href="{!! URL::to('empresa/'.$sorteo->nombre_empresa.'/sorteos') !!}">Ver m&aacute;s sorteos de {!! $sorteo->nombre_empresa !!}</a></li>
                <li>{!!link_to_route('sorteos.show', $title = 'Ver mas detalles', $parameters = $sorteo->id, $attributes = [])!!}</li>
                @if(Auth::user()->get()->id == $sorteo->user_id && $sorteo->estado_sorteo == 'Activo')
                  <li role="separator" class="divider"></li>
                  <li>{!!link_to_route('sorteos.show', $title = 'Ir a sortear', $parameters = $sorteo->id, $attributes = [])!!}</li>
                @elseif($sorteo->estado_sorteo == 'Pendiente')
                  <li><a href="{!! URL::to('sorteos/'.$sorteo->id.'/edit') !!}">Editar</a></li>
                @endif
              </ul><!-- /ul .dropdown-menu -->
            </div><!-- /div .dropup -->

          </div><!-- /div .col-md1-sm12-xs12 -->

				</div><!-- /div .row -->
			</div><!-- /div .list-group-item -->
		@endif
	@endforeach

  <div class="list-group-item" style="text-align: center;">
    <div>
      {!!$sorteos->render()!!}
    </div><!-- /div -->
    <small class="text-info">
      Navega entre p&aacute;ginas para encontrar m&aacute;s sorteos
    </small><!-- /small .text-info -->
  </div><!-- /div .list-group-item styled -->

</div><!-- /div #SorteoListThumb -->
