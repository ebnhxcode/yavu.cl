<div class='list-group'>

  <div class='list-group-item'>
    <small>{!! ($userActive = Auth::user()->check())?'Finalizar':'¡Eso es todo!' !!}</small>
  </div><!-- /div .list-group-item -->
  <div class='list-group-item'>
    <button type="submit" class="btn btn-success" style="width:100%;">
      ¡ {!!$userActive?'Guardar':'Reg&iacute;strate en' !!} <img width="64px" src="/img/yavu004.png" alt=""/> !
    </button><!-- /button .btn .btn .success -->
  </div><!-- /div .list-group-item -->

</div><!-- /div .list-group -->
