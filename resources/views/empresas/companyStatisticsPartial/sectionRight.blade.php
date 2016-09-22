<div class="list-group">
  <div class="list-group-item list-group-item-success">
    <h6>
      MENÚ
    </h6>
  </div><!-- /div .list-group-item .list-group-item-success -->

  <div class="list-group-item">

    <div>
      <a href="{{url('/estadisticas/'.$userCompany->id).'/followers'}}" class="btn btn-link">
        <img width="16" src="{{url('/img/glyphicons/glyphicons/png/glyphicons-44-group.png')}}" alt="">&nbsp;Seguidores
      </a><!-- /a .btn .btn-link -->
    </div>

    <div>
      <a href="{{url('/estadisticas/'.$userCompany->id).'/visits'}}"  class="btn btn-link">
        <img width="16" src="{{url('/img/glyphicons/glyphicons/png/glyphicons-35-old-man.png')}}" alt="">&nbsp;Visitas
      </a><!-- /a .btn .btn-link -->
    </div>

    <div>
      <a href="{{url('/estadisticas/'.$userCompany->id).'/banners'}}" class="btn btn-link">
        <img width="16" src="{{url('/img/glyphicons/glyphicons/png/glyphicons-139-picture.png')}}" alt="">&nbsp;Banners
      </a><!-- /a .btn .btn-link-->
    </div>

    <div>
      <a href="{{url('/estadisticas/'.$userCompany->id).'/raffles'}}" class="btn btn-link">
        <img width="16" src="{{url('/img/glyphicons/glyphicons/png/glyphicons-70-gift.png')}}" alt="">&nbsp;Sorteos
      </a><!-- /a .btn .btn-link -->
    </div>

    <div>
      <a href="{{url('/estadisticas/'.$userCompany->id).'/feeds'}}" class="btn btn-link">
        <img width="16" src="{{url('/img/glyphicons/glyphicons/png/glyphicons-248-note.png')}}" alt="">&nbsp;Publicaciones
      </a><!-- /a .btn .btn-link -->
    </div>

    <div>

      <a href="{{url('/estadisticas/'.$userCompany->id).'/charges'}}" class="btn btn-link">
        <img width="16" src="{{url('/img/glyphicons/glyphicons/png/glyphicons-38-coins.png')}}" alt="">&nbsp;Cobros de coins
      </a><!-- /a .btn .btn-link -->
    </div>

  </div><!-- /div .list-group-item -->
  {{--
  <div class="list-group-item">
  </div><!-- /div .list-group-item -->
  --}}

</div> <!-- /div .list-group -->