<div class="hidden-xs">
  <div class="">
    <div {{-- class="collapse" id="collapseExample" --}}>
      <div class="">


        <ul class="nav nav-pills nav-stacked" role="tablist">
          <li role="presentation">
            <a href="{!!URL::to('/usuarios/'.Auth::user()->get()->id.'/edit')!!}" style="margin: 0px;padding: 2px 15px;">Mi cuenta</a>
          </li>

            <li role="presentation" {{(Request::path() == 'feeds')?'class=active':''}}>
              <a href="/feeds" style="margin: 0px;padding: 2px 15px;" >
                Publicaciones
              </a>
            </li>


            <li role="presentation" {{(Request::path() != 'empresas')?'':'class=active'}}>
              <a href="/empresas" style="margin: 0px;padding: 2px 15px;" >
                Empresas
              </a>
            </li>


            <li role="presentation" {{(Request::path() != 'sorteos')?'':'class=active'}}>
              <a href="/sorteos" style="margin: 0px;padding: 2px 15px;" >
                Sorteos
              </a>
            </li>


            <li role="presentation" {{(Request::path() != 'tickets')?'':'class=active'}}>
              <a href="/tickets" style="margin: 0px;padding: 2px 15px;">Ticktes</a>
            </li>

          @if((Request::path() == 'tickets/history') && (Request::path() != 'coins' && Request::path() != 'coins/history'))
            <li role="presentation" class="active">
              <a href="#!" data-toggle="modal" data-target="#myModal" style="margin: 0px;padding: 2px 15px;">Informes</a>
            </li>
          @endif
          @if(Request::path() == 'sorteos/create' && count($userSession->empresas)>0)
            <li role="presentation" class="active">
              <a href="/sorteos/create" style="margin: 0px;padding: 2px 15px;">Crear Sorteos</a>
            </li>
          @endif
        </ul>



      </div><!-- /row -->
    </div><!-- /div #collapseExample .collapse -->
    {{-- <span data-toggle="collapse" data-target="#collapseExample"  class="glyphicon glyphicon-chevron-up btn"></span> --}}
  </div><!-- /div .list-group-item -->
</div><!-- /div .list-group -->

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
                <a style="padding: 2px 2px 2px 2px;" href='{!!URL::to('/coins/history')!!}' style="text-align:center;" class="list-group-item list-group-item-info">
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
                <a style="padding: 2px 2px 2px 2px;" href="{!!URL::to('/tickets/history')!!}" style="text-align:center;" class="list-group-item list-group-item-info">
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
              <div class="list-group">
                <div align="center">
                  <a style="padding: 2px 2px 2px 2px;" href="{!!URL::to('/estadisticas/'.$userSession->empresas[0]->id)!!}" style="text-align:center;" class="list-group-item list-group-item-info">
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
