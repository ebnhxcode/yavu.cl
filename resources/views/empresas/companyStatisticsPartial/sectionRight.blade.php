<div class="list-group">
  <div class="list-group-item list-group-item-success">
    Test de consultas
  </div><!-- /div .list-group-item .list-group-item-success -->

  <div class="list-group-item">
    <div>
      Seguidores : {{count($userCompany->followers)}}
      <a href="{{url('/estadisticas/'.$userCompany->id).'/followers'}}" style="float:right;" class="btn btn-xs btn-info">
        <small>
          ver m&aacute;s
        </small>
      </a><!-- /a .btn .btn-xs .btn-info -->
    </div>
    <hr>

    <div>
      Visitas : {{count($userCompany->visits)}}
      <a href="{{url('/estadisticas/'.$userCompany->id).'/visits'}}" style="float:right;" class="btn btn-xs btn-info">
        <small>
          ver m&aacute;s
        </small>
      </a><!-- /a .btn .btn-xs .btn-info -->
      <div class="softText-descriptions-middle">
        Visitas sin sexo definido : {{count($userCompany->otherVisits)}}
        <br>
        Visitas del sexo Masculino : {{count($userCompany->menVisits)}}
        <br>
        Visitas del sexo Femenino : {{count($userCompany->womenVisits)}}
      </div>
    </div>
    <hr>
    <div>
      <a href="{{url('/estadisticas/'.$userCompany->id).'/banners'}}" style="float:right;" class="btn btn-xs btn-info">
        <small>
          ver m&aacute;s
        </small>
      </a><!-- /a .btn .btn-xs .btn-info -->
      Despliegues de banner : <br>
      <div class="softText-descriptions-middle">
        @foreach($userCompany->banners as $key => $banner)
          Banner {{ $key + 1 }} <img width='32' style="border-radius: 10%;" id='ImagenPerfil' src='/img/users/{!! isset($banner)?($banner->banner!='')?$banner->banner:'banner.png':'banner.png' !!}'> :
          {{$banner->titulo_banner}} <small>{{count($banner->displays)}} despliegues.</small>
        @endforeach
      </div>
    </div>
    <hr>

    <div>
      Peticiones de sorteos : {{count($userCompany->raffleRequests)}}
      <a href="{{url('/estadisticas/'.$userCompany->id).'/raffles-requests'}}" style="float:right;" class="btn btn-xs btn-info">
        <small>
          ver m&aacute;s
        </small>
      </a><!-- /a .btn .btn-xs .btn-info -->
    </div>
    <hr>

    <div>
      Publicaciones : {{count($userCompany->feeds)}}
      <a href="{{url('/estadisticas/'.$userCompany->id).'/feeds'}}" style="float:right;" class="btn btn-xs btn-info">
        <small>
          ver m&aacute;s
        </small>
      </a><!-- /a .btn .btn-xs .btn-info -->
    </div>
    <hr>

    <div>
      Cobros : {{$cobros = count($userCompany->charges)}} ~ {{'('.'$ '.number_format( (int)$cobros*40, 0, '', ',').')'}}
      <a href="{{url('/estadisticas/'.$userCompany->id).'/charges'}}" style="float:right;" class="btn btn-xs btn-info">
        <small>
          ver m&aacute;s
        </small>
      </a><!-- /a .btn .btn-xs .btn-info -->
    </div>

  </div><!-- /div .list-group-item -->
  {{--
  <div class="list-group-item">
  </div><!-- /div .list-group-item -->
  --}}

</div> <!-- /div .list-group -->