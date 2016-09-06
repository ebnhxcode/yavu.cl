<div class="list-group-item">
  <a href="/main/sorteos/activos" class="btn btn-default btn-xs text-danger">VER LISTA DE SORTEOS ACTIVOS</a>
</div>

<div id="SorteoListThumb">

  @foreach($sorteos as $key => $sorteo)
    @if($sorteo->estado_sorteo == 'Finalizado')
      <div class="list-group-item">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1">
            <a href="#!">
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
                      {{-- <li><a href="{!! URL::to('empresas/'.$sorteo->empresa_id.'/sorteos') !!}">Ver m&aacute;s sorteos de {!! $sorteo->nombre_empresa !!}</a></li> --}}
                      <li>{!!link_to_route('sorteos.show', $title = 'Ver mas detalles', $parameters = $sorteo->id, $attributes = [])!!}</li>
                      <li><a href="/main/sorteo/{{$sorteo->id}}">Ver m&aacute;s detalles</a></li>

                    </ul><!-- /ul .dropdown-menu -->
                  </div><!-- /div .dropup -->

                </div>



                <div>
                  <h3><b><a style="padding-left: 5px;" href="/main/sorteo/{!! $sorteo->id !!}"><span>{!!$sorteo->nombre_sorteo!!}</span><br></a></b></h3>
                </div>


                <div class="">
                  <a style="padding-left: 5px;" href="/main/sorteo/{!! $sorteo->id !!}"><span>{!!$sorteo->descripcion!!}</span></a>
                </div>
                <br>
                <div class=" softText-descriptions-middle">
                  <a style="padding-left: 5px;" href="/main/sorteo/{!! $sorteo->id !!}">
                    <small> Este sorteo se realiz&oacute; el d&iacute;a
                      <abbr class='timeago text-danger' id='timeago{!! $sorteo->id !!}' value='{!! $sorteo->fecha_inicio_sorteo !!}' title='{!! $sorteo->fecha_inicio_sorteo !!}'>{!! $sorteo->fecha_inicio_sorteo !!}</abbr>
                    </small>
                  </a>
                </div>

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
    <small class="text-info">
      Navega entre p&aacute;ginas para encontrar m&aacute;s sorteos
    </small><!-- /small .text-info -->
  </div><!-- /div .list-group-item styled -->

</div><!-- /div #SorteoListThumb -->
