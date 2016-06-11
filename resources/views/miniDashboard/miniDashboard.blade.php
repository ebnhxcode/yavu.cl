<div class="list-group">
  <div class="list-group-item list-group-item-success" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
    Men&uacute;
  </div><!-- /div .list-group-item .success -->
  <div class="list-group-item">
    <div class="collapse" id="collapseExample">
      <div class="row">
        <div class="col-md-4 col-sm-4 col-xs-6">
          <div class='list-group' >
            <div align="center">
              <a style="padding: 2px 2px 2px 2px;" href='{!!URL::to('/usuarios/'.Auth::user()->get()->id.'/edit')!!}' style="text-align:center;" class="list-group-item list-group-item-info">
                <img width="80%" src= "{!!URL::to('img/newGraphics/neo_icono_config.png')!!}"/>
              </a><!-- /a .list-group-item .info styled -->
            </div><!-- /div aligned -->
            <div align="center"><small>Configuraciones</small></div>
          </div><!-- /div .list-group -->
        </div><!-- /div .col-md4-sm-4-xs6 -->

        @if(Request::path() != 'feeds')
          <div class="col-md-4 col-sm-4 col-xs-6">
            <div class="list-group" >
              <div align="center">
                <a style="padding: 2px 2px 2px 2px;" href="{!!URL::to('/feeds')!!}" style="text-align:center;" class="list-group-item list-group-item-info">
                  <img width="80%" src= "{!!URL::to('img/newGraphics/neo_icono_publicaciones.png')!!}"/>
                </a><!-- /a .list-group-item .info styled -->
              </div><!-- /div aligned -->
              <div align="center"><small>Publicaciones</small></div>
            </div><!-- /div .list-group -->
          </div><!-- /div .col-md4-sm-4-xs6 -->
        @endif

        @if(Request::path() != 'empresas')
          <div class="col-md-4 col-sm-4 col-xs-6">
            <div class="list-group" >
              <div align="center">
                <a style="padding: 2px 2px 2px 2px;" href="{!!URL::to('/empresas')!!}" style="text-align:center;" class="list-group-item list-group-item-info">
                  <img width="80%" src= "{!!URL::to('img/newGraphics/neo_icono_empresa.png')!!}"/>
                </a><!-- /a .list-group-item .info styled -->
              </div><!-- /div aligned -->
              <div align="center"><small>Empresas</small></div>
            </div><!-- /div .list-group -->
          </div><!-- /div .col-md4-sm-4-xs6 -->
        @endif

        @if(Request::path() != 'sorteos')
          <div class="col-md-4 col-sm-4 col-xs-6">
            <div class="list-group" >
              <div align="center">
                <a style="padding: 2px 2px 2px 2px;" href="{!!URL::to('/sorteos')!!}" style="text-align:center;" class="list-group-item list-group-item-info">
                  <img width="80%" src= "{!!URL::to('img/newGraphics/neo_icono_sorteo.png')!!}"/>
                </a><!-- /a .list-group-item .info styled -->
              </div><!-- /div aligned -->
              <div align="center"><small>Sorteos</small></div>
            </div><!-- /div .list-group -->
          </div><!-- /div .col-md4-sm-4-xs6 -->
        @endif

        @if(Request::path() != 'tickets')
          <div class="col-md-4 col-sm-4 col-xs-6">
            <div class="list-group" >
              <div align="center">
                <a style="padding: 2px 2px 2px 2px;" href="{!!URL::to('/tickets')!!}" style="text-align:center;" class="list-group-item list-group-item-info">
                  <img width="80%" src= "{!!URL::to('img/newGraphics/neo_icono_tickets.png')!!}"/>
                </a><!-- /a .list-group-item .info styled -->
              </div><!-- /div aligned -->
              <div align="center"><small>Tickets</small></div>
            </div><!-- /div .list-group -->
          </div><!-- /div .col-md4-sm-4-xs6 -->
        @endif

        @if((Request::path() != 'tickets/history') && (Request::path() != 'coins' && Request::path() != 'coins/history'))
          <div class="col-md-4 col-sm-4 col-xs-6">
            <div class='list-group' >
              <div align="center">
                <a style="padding: 2px 2px 2px 2px;"  style="text-align:center;" data-toggle="modal" data-target="#myModal" class="list-group-item list-group-item-info">
                  <img width="80%" src= "{!!URL::to('img/newGraphics/neo_icono_informe.png')!!}"/>
                </a><!-- /a .list-group-item .info styled -->
              </div><!-- /div aligned -->
              <div align="center"><small>Informes</small></div>
            </div><!-- /div .list-group -->
          </div><!-- /div .col-md4-sm-4-xs6 -->
        @endif

        @if(Request::path() != 'sorteos/create')
          <div style="display: none;" class="col-md-4 col-sm-4 col-xs-6 hasoneempresa">
            <div class="list-group" >
              <div align="center">
                <a style="padding: 2px 2px 2px 2px;" href="{!!URL::to('/sorteos/create')!!}" style="text-align:center;" class="list-group-item list-group-item-info">
                  <img width="80%" src= "{!!URL::to('img/newGraphics/neo_icono_sorteo.png')!!}"/>
                </a><!-- /a .list-group-item .info styled -->
              </div><!-- /div aligned -->
              <div align="center"><small>Crear sorteo</small></div>
            </div><!-- /div .list-group -->
          </div><!-- /div .col-md4-sm-4-xs6 .hasoneempresa -->
        @endif
      </div><!-- /row -->
    </div><!-- /div #collapseExample .collapse -->
    <small>Haz click en Men&uacute;</small>
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
          <div class="col-md-4 col-sm-4 col-xs-4">
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
          <div class="col-md-4 col-sm-4 col-xs-4">
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
          <div style="display: none;" class="col-md-4 col-sm-4 col-xs-4 hasoneempresa">
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
        </div><!-- /div .row -->
      </div><!-- /div .modal-body -->
      <div class="modal-footer">
      </div><!-- /div .modal-footer -->
    </div><!-- /div .modal-content -->
  </div><!-- /div .modal-dialog -->
</div><!-- /div .modal-fade -->
