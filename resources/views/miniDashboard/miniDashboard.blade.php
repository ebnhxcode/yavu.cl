<div class="list-group-item">
  <div class="row">
    <!--
     sorteos
     crear sorteo
     tickets
     feeds
     empresas
     crear empresa
     informes
     configuraciones

     -->

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

    <div class="col-md-4 col-sm-2 col-xs-3">
      <div class='list-group' >
        <div align="center">
          <a style="padding: 2px 2px 2px 2px;" href='{!!URL::to('/coins/history')!!}' style="text-align:center;" class="list-group-item list-group-item-info">
            <span>
              <img width="80%" src= "{!!URL::to('img/dash/ico_notificacion004.png')!!}"/>
            </span>
          </a>
        </div>
        <div align="center"><small>Informe Coins</small></div>
      </div>
    </div>

    <div class="col-md-4 col-sm-2 col-xs-3">
      <div class='list-group' >
        <div align="center">
          <a style="padding: 2px 2px 2px 2px;" href='{!!URL::to('/tickets/history')!!}' style="text-align:center;" class="list-group-item list-group-item-info">
            <span>
              <img width="80%" src= "{!!URL::to('img/dash/icono_informe01.png')!!}"/>
            </span>
          </a>
        </div>
        <div align="center"><small>Informe Ticket's</small></div>
      </div>
    </div>

    <div class="col-md-4 col-sm-2 col-xs-3">
      <div class='list-group' >
        <div align="center">
          <a style="padding: 2px 2px 2px 2px;" href='{!!URL::to('/tickets/history')!!}' style="text-align:center;" class="list-group-item list-group-item-info">
            <span>
              <img width="80%" src= "{!!URL::to('img/dash/icono_informe01.png')!!}"/>
            </span>
          </a>
        </div>
        <div align="center"><small>Informe Ticket's</small></div>
      </div>
    </div>

    <div class="col-md-4 col-sm-2 col-xs-3">
      <div class='list-group' >
        <div align="center">
          <a style="padding: 2px 2px 2px 2px;" href='{!!URL::to('/usuarios/'.Auth::user()->get()->id.'/edit')!!}' style="text-align:center;" class="list-group-item list-group-item-info">
            <span>
              <img width="80%" src= "{!!URL::to('img/dash/ico_configurar_dash02.png')!!}"/>
            </span>
          </a>
        </div>
        <div align="center"><small>Modificar perfil</small></div>
      </div>
    </div>




  </div><!-- /row -->
</div> <!-- /list group item -->