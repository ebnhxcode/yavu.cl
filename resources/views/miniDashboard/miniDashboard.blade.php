<div class="list-group-item">
  <div class="row">

    @if(Request::path() != 'login')
    @endif

    <div class="col-md-4 col-sm-2 col-xs-3">
      <div class='list-group' >
        <div align="center">
          <a style="padding: 2px 2px 2px 2px;" href='{!!URL::to('/usuarios/'.Auth::user()->get()->id.'/edit')!!}' style="text-align:center;" class="list-group-item list-group-item-info">
            <span>
              <img width="80%" src= "{!!URL::to('img/dash/ico_configurar_dash02.png')!!}"/>
            </span>
          </a>
        </div>
        <div align="center"><small>Configuraciones</small></div>
      </div>
    </div>

    @if(Request::path() != 'feeds')
      <div class="col-md-4 col-sm-2 col-xs-3">
        <div class="list-group" >
          <div align="center">
            <a style="padding: 2px 2px 2px 2px;" href="{!!URL::to('/feeds')!!}" style="text-align:center;" class="list-group-item list-group-item-info">
              <span>
                <img width="80%" src= "{!!URL::to('img/dash/ico_pin03.png')!!}"/>
              </span>
            </a>
          </div>
          <div align="center"><small>Publicaciones</small></div>
        </div>
      </div>
    @endif
    @if(Request::path() != 'empresas')
    <div class="col-md-4 col-sm-2 col-xs-3">
      <div class="list-group" >
        <div align="center">
          <a style="padding: 2px 2px 2px 2px;" href="{!!URL::to('/empresas')!!}" style="text-align:center;" class="list-group-item list-group-item-info">
            <span>
              <img width="80%" src= "{!!URL::to('img/dash/ico_empresa.png')!!}"/>
            </span>
          </a>
        </div>
        <div align="center"><small>Empresas</small></div>
      </div>
    </div>
    @endif

    @if(Request::path() != 'empresas')
      <div style="display: none;" class="col-md-4 col-sm-2 col-xs-3 hasoneempresa">
        <div class="list-group" >
          <div align="center">
            <a style="padding: 2px 2px 2px 2px;" href="{!!URL::to('/estadisticasdemiempresa')!!}" style="text-align:center;" class="list-group-item list-group-item-info">
          <span>
            <img width="80%" src= "{!!URL::to('img/dash/icono_informe01.png')!!}"/>
          </span>
            </a>
          </div>
          <div align="center"><small>Estad&iacute;sticas de mi empresa</small></div>
        </div>
      </div>
    @endif

    @if(Request::path() != 'sorteos')
    <div class="col-md-4 col-sm-2 col-xs-3">
      <div class="list-group" >
        <div align="center">
          <a style="padding: 2px 2px 2px 2px;" href="{!!URL::to('/sorteos')!!}" style="text-align:center;" class="list-group-item list-group-item-info">
            <span>
              <img width="80%" src= "{!!URL::to('img/dash/ico_sorteo01.png')!!}"/>
            </span>
          </a>
        </div>
        <div align="center"><small>Sorteos</small></div>
      </div>
    </div>
    @endif
    @if(Request::path() != 'tickets')
    <div class="col-md-4 col-sm-2 col-xs-3">
      <div class="list-group" >
        <div align="center">
          <a style="padding: 2px 2px 2px 2px;" href="{!!URL::to('/tickets')!!}" style="text-align:center;" class="list-group-item list-group-item-info">
            <span>
              <img width="80%" src= "{!!URL::to('img/dash/ico_ticket01.png')!!}"/>
            </span>
          </a>
        </div>
        <div align="center"><small>Tickets</small></div>
      </div>
    </div>
    @endif
    {{--
    @if(Request::path() != 'coins' || Request::path() != 'coins/history')
    <div class="col-md-4 col-sm-2 col-xs-3">
      <div class='list-group' >
        <div align="center">
          <a style="padding: 2px 2px 2px 2px;" href='{!!URL::to('/coins/history')!!}' style="text-align:center;" class="list-group-item list-group-item-info">
            <span>
              <img width="80%" src= "{!!URL::to('img/dash/ico_notificacion004.png')!!}"/>
            </span>
          </a>
        </div>
        <div align="center"><small>Informes</small></div>
      </div>
    </div>
    @endif
    --}}
    @if((Request::path() != 'tickets/history') && (Request::path() != 'coins' && Request::path() != 'coins/history'))
    <div class="col-md-4 col-sm-2 col-xs-3">
      <div class='list-group' >
        <div align="center">
          <a style="padding: 2px 2px 2px 2px;"  style="text-align:center;" data-toggle="modal" data-target="#myModal" class="list-group-item list-group-item-info">
            <span>
              <img width="80%" src= "{!!URL::to('img/dash/icono_informe01.png')!!}"/>
            </span>
          </a>
        </div>
        <div align="center"><small>Informes</small></div>
      </div>
    </div>
    @endif

    @if(Request::path() != 'sorteos/create')
    <div style="display: none;" class="col-md-4 col-sm-2 col-xs-3 hasoneempresa">
      <div class="list-group" >
        <div align="center">
          <a style="padding: 2px 2px 2px 2px;" href="{!!URL::to('/sorteos/create')!!}" style="text-align:center;" class="list-group-item list-group-item-info">
            <span>
              <img width="80%" src= "{!!URL::to('img/dash/ico_sorteo01.png')!!}"/>
            </span>
          </a>
        </div>
        <div align="center"><small>Crear sorteo</small></div>
      </div>
    </div>
    @endif












  </div><!-- /row -->
</div> <!-- /list group item -->

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Seleccione tipo de informe que desea ver</h4>
      </div>
      <div class="modal-body">

        <div class="row">

          <div class="col-md-6 col-sm-6 col-xs-6">
            <div class='list-group' >
              <div align="center">
                <a style="padding: 2px 2px 2px 2px;" href='{!!URL::to('/coins/history')!!}' style="text-align:center;" class="list-group-item list-group-item-info">
                <span>
                  <img width="80%" src= "{!!URL::to('img/dash/ico_notificacion004.png')!!}"/>
                </span>
                </a>
              </div>
              <div align="center"><small>Informe de Coins</small></div>
            </div>
          </div>

          <div class="col-md-6 col-sm-6 col-xs-6">
            <div class="list-group" >
              <div align="center">
                <a style="padding: 2px 2px 2px 2px;" href="{!!URL::to('/tickets/history')!!}" style="text-align:center;" class="list-group-item list-group-item-info">
            <span>
              <img width="80%" src= "{!!URL::to('img/dash/ico_ticket01.png')!!}"/>
            </span>
                </a>
              </div>
              <div align="center"><small>Informe de Tickets</small></div>
            </div>
          </div>

        </div>


      </div>
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>