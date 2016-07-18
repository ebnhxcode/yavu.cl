<section id="adminList" class="list-group">
  <div class="list-group-item">
    LISTA DE ADMINISTRADORES
  </div><!-- /div .list-group-item -->
  @foreach($admins as $admin)
    <div class="list-group-item">
      <span data-toggle="tooltip" data-placement="top" title="{!!$admin->email!!}">
        {!!$admin->nombre.' '.$admin->apellido!!}
      </span>
      {!!link_to_route('admins.edit', $title = 'Editar', $parameters = $admin->id, $attributes = ['class'=>'btn btn-primary btn-xs', 'style' => 'float:right;'])!!}
    </div><!-- /div .list-group-item -->
  @endforeach
</section><!-- /div .list-group -->

<section id="fastStatistics" class="list-group">
  <div class="list-group-item">
    ESTAD&Iacute;STICAS R&Aacute;PIDAS
  </div><!-- /div .list-group-item -->
  <div class="list-group-item">
    Usuarios Registrados <b style="float:right;">{!! count($users) !!}</b>
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
    Sorteos Pendientes de Aprovaci&oacute;n <b style="float:right;">{!! count($raffles->where('estado_sorteo','Pendiente')) !!}</b>
  </div><!-- /div .list-group-item -->
  <div class="list-group-item">
    Publicaciones <b style="float:right;">{!! count($feeds) !!} <small>({!! count($feeds)*40 !!} en coins)</small></b>
  </div><!-- /div .list-group-item -->
</section><!-- /div .list-group -->

<section id="economy" class="list-group">
  <div class="list-group-item">
    COINS Y TICKETS
  </div><!-- /div .list-group-item -->
  <div class="list-group-item">
    Econom&iacute;a de coins <b style="float:right;">{!! $coins->sum('cantidad') !!}</b>
  </div><!-- /div .list-group-item -->
  <div class="list-group-item">
    Econom&iacute;a de tickets <b style="float:right;">{!! $tickets->sum('cantidad_tickets') !!}</b>
  </div><!-- /div .list-group-item -->
</section><!-- /div .list-group -->