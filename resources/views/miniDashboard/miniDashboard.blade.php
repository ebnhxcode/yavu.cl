<div class="list-group-item">
  <div class="row">
    <!--
     empresas
     sorteos
     tickets
     feeds

     crear sorteo


     crear empresa
     informes
     configuraciones

     -->

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
    @if(Request::path() != 'sorteos*')
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
    @if(Request::path() != 'tickets*')
    <div class="col-md-4 col-sm-2 col-xs-3">
      <div class="list-group" >
        <div align="center">
          <a style="padding: 2px 2px 2px 2px;" href="{!!URL::to('/tickets/history')!!}" style="text-align:center;" class="list-group-item list-group-item-info">
            <span>
              <img width="80%" src= "{!!URL::to('img/dash/ico_ticket01.png')!!}"/>
            </span>
          </a>
        </div>
        <div align="center"><small>Tickets</small></div>
      </div>
    </div>
    @endif
    @if(Request::path() != 'coins*')
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
    @if(Request::path() != 'coins*')
    <div class="col-md-4 col-sm-2 col-xs-3">
      <div class='list-group' >
        <div align="center">
          <a style="padding: 2px 2px 2px 2px;" href='{!!URL::to('/tickets/history')!!}' style="text-align:center;" class="list-group-item list-group-item-info">
            <span>
              <img width="80%" src= "{!!URL::to('img/dash/icono_informe01.png')!!}"/>
            </span>
          </a>
        </div>
        <div align="center"><small>Informes</small></div>
      </div>
    </div>
    @endif


    <div class="col-md-4 col-sm-2 col-xs-3">
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











  </div><!-- /row -->
</div> <!-- /list group item -->