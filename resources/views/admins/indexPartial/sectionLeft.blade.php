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
</section><!-- /section #adminList .list-group -->

<!-- esto incluye de la sección izquierda las estadisticas rápidas y vistas asociadas -->
@include('admins.indexPartial.sectionLeftPartial.fastStatistics')

{{--
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
</section><!-- /section #economy .list-group -->
--}}

<section id="userSessions" class="list-group">
  <div class="list-group-item">
    SESIONES
  </div><!-- /div .list-group-item -->
  <div class="list-group-item">
    Sesiones totales <b style="float:right;">{!! count($sessions) !!}</b>
  </div><!-- /div .list-group-item -->
</section><!-- /section #userSessions -->