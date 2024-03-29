<div class="list-group">
  <div id="SorteoListThumb">

    @foreach($sorteos as $sorteo)
      @if($sorteo->estado_sorteo == 'Finalizado')
        <div class="list-group-item">
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1">
              <a href="/empresas/{!! $sorteo->empresa_id !!}">
                <img data-toggle="tooltip" data-placement="top" title="{!! $sorteo->nombre_empresa !!}" class='media-object' src='/img/users/{!! ($companyProfileImage = $sorteo->companyAuthorRaffle->imagen_perfil)?$companyProfileImage:'usuario_nuevo.png' !!}' data-holder-rendered='true' style='width: 48px; height: 48px; border-radius: 10%; float:left;'/>
              </a>
            </div><!-- /div .col-xs12-sm12-md1-lg1 -->
            <div class="col-xs-12 col-sm-12 col-md-11 col-lg-11">
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">

                  <div style="float:right;">

                    <div style="z-index: auto;" class="dropup">
                      <button class="btn btn-default btn-xs dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="glyphicon glyphicon-chevron-down"></span>
                      </button><!-- /div .btn .btn-default .btn-xs .dropdown-toggle -->
                      <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
                        <li><a href="{!! URL::to('empresas/'.$sorteo->empresa_id.'/sorteos') !!}">Ver m&aacute;s sorteos de {!! $sorteo->nombre_empresa !!}</a></li>
                        <li>{!!link_to_route('sorteos.show', $title = 'Ver mas detalles', $parameters = $sorteo->id, $attributes = [])!!}</li>
                        @if(Auth::user()->get()->id == $sorteo->user_id && $sorteo->estado_sorteo == 'Activo')
                          <li role="separator" class="divider"></li>
                          <li>{!!link_to_route('sorteos.show', $title = 'Ir a sortear', $parameters = $sorteo->id, $attributes = [])!!}</li>
                        @elseif($sorteo->estado_sorteo == 'Pendiente')
                          <li><a href="{!! URL::to('sorteos/'.$sorteo->id.'/edit') !!}">Editar</a></li>
                        @endif
                      </ul><!-- /ul .dropdown-menu -->
                    </div><!-- /div .dropup -->

                  </div>



                  <div>
                    <h3><b><a style="padding-left: 5px;" href="/sorteos/{!! $sorteo->id !!}"><span>{!!$sorteo->nombre_sorteo!!}</span><br></a></b></h3>
                  </div>

                  <small>
                    Este sorteo se realiz&oacute;
                    @if(date('m/d/Y') != $sorteo->fecha_inicio_sorteo)
                      hace <abbr class='timeago text-danger' id='timeago{!! $sorteo->id !!}' value='{!! $sorteo->fecha_inicio_sorteo !!}' title='{!! $sorteo->fecha_inicio_sorteo !!}'>{!! $sorteo->fecha_inicio_sorteo !!}</abbr>
                    @endif
                  </small>
                  <br><br>
                  @foreach($sorteo->winners as $key => $winner)
                    @if($key == 0)
                      <img src="{!! asset('img/yavu019.png') !!}" width="20" alt=""/>
                      <span class="btn btn-xs btn-default">GANADOR : {!! $winner->nombre.' '.$winner->apellido !!}</span>
                      <br /><br />


                      @if(count($userSession->userCompanies)>0)
                        @if($userSession->userCompanies[0]->id==$sorteo->empresa_id)
                          <div class="list-group">
                            <div class="list-group-item"><small class="text-success">ADMINISTRADOR: </small>
                              <div style="font-size:0.75em;float:right;" class="text-info">
                                info
                              </div>
                              <br><small class="softText-descriptions">Contactar con el ganador</small></div>
                            <div class="list-group-item">
                              @if($winnerInfo = $winner->winnerInfo)
                                {!! $winnerInfo->email !!}<br>
                                {!! $winnerInfo->fono !!}<br>
                                {!! $winnerInfo->fono_2 !!}<br>
                              @endif
                            </div>
                          </div>
                        @endif
                      @endif



                    @endif
                  @endforeach

                  <!--
                <div class="amplio">
                  <span class="text-success">{!!$sorteo->estado_sorteo!!}</span><br>
                </div>
                -->

                  <input id="sorteo_id" value="{!! $sorteo->id !!}" type="hidden" />
                  <input type="hidden" name="_token" value="{!!csrf_token()!!}" id="token" />
                  <div id="msjs{!! $sorteo->id !!}" class="alert alert-info alert-dismissible" style="display: none;" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div><!-- /div #msjs+sorteo_id .alert .alert-info .alert-dismissible -->
                  <br>
                </div> <!-- /div .col-md4-sm12-xs12 -->
                <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">


                  <div class="list-group">
                    <div class="list-group-item">
                      <small>IMAGEN DEL SORTEO</small>
                    </div><!-- /div .list-group-item -->
                    <div class="list-group-item">
                      <a class="thumbnail">
                        <img class="img-responsive" src='{!! isset($sorteo)?($sorteo->imagen_sorteo!='')?'/img/users/'.$sorteo->imagen_sorteo:'https://tiendas-asi.com/wp-content/uploads/2015/04/sorteo-diariodebodas.jpg':'' !!}' >
                      </a> <!-- /div .thumbnail -->
                    </div><!-- /div list-group-item -->


                  </div><!-- /div .list-group -->




                  <div class="softText-descriptions-middle">
                    Sorteo finalizado <a style="float:right;" class="text-warning" href="/sorteos/{!! $sorteo->id !!}">Ver m&aacute;s detalles</a>
                  </div><!-- /div .amplio -->


                </div> <!-- /div .col-md8-sm12-xs12 -->
              </div><!-- /div .row -->


            </div>



          </div><!-- /div .row -->
        </div><!-- /div .list-group-item -->
      @endif
    @endforeach

    <div class="list-group-item" style="text-align: center;">
      <div>
        {!!$sorteos->render()!!}
      </div><!-- /div -->
    </div><!-- /div .list-group-item styled -->

  </div><!-- /div #SorteoListThumb -->



</div><!-- /div .list-group -->