<section id="fastStatistics" class="list-group">
  <div class="list-group-item">
    ESTAD&Iacute;STICAS R&Aacute;PIDAS
  </div><!-- /div .list-group-item -->
  <div class="list-group-item">
    Usuarios Registrados
    <b style="float:right; padding: 2px;">{!! count($users) !!}</b>
    <a href="/admins/usersadmin/index" class="btn btn-default btn-xs" style="float:right;"><small>ver m&aacute;s</small></a>

  </div><!-- /div .list-group-item -->
  <div class="list-group-item">
    Empresas Registradas <b style="float:right;">{!! count($companies) !!}</b>
  </div><!-- /div .list-group-item -->
  <div class="list-group-item">
    Sorteos Activos <b style="float:right;">{!! count($raffles->where('estado_sorteo','Activo')) !!}</b>
  </div><!-- /div .list-group-item -->
  <div class="list-group-item">
    Sorteos Finalizados <b style="float:right;">{!! count($raffles->where('estado_sorteo','Finalizado')) !!}</b>
  </div><!-- /div .list-group-item -->
  <div class="list-group-item">
    Sorteos Pendientes de Aprobaci&oacute;n <b style="float:right;">{!! count($raffles->where('estado_sorteo','Pendiente')) !!}</b>
  </div><!-- /div .list-group-item -->
  <div class="list-group-item">
    Publicaciones <b style="float:right;">{!! count($feeds) !!} <small>({!! count($feeds)*40 !!} en coins)</small></b>
  </div><!-- /div .list-group-item -->
  <div class="list-group-item">
    Alcance Emails Registro <b style="float:right;">{!! count($registers) !!}</b>
  </div><!-- /div .list-group-item -->
</section><!-- /section #fastStatistics .list-group -->