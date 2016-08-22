<div class="list-group">
  <div class="list-group-item list-group-item-success">
    Test de consultas
  </div><!-- /div .list-group-item .list-group-item-success -->

  <div class="list-group-item">
    Seguidores : {{count($userCompany->followers)}}
    <br>
    Visitas : {{count($userCompany->visits)}}
    <div class="softText-descriptions-middle">
      Visitas sin sexo definido : {{count($userCompany->otherVisits)}}
      <br>
      Visitas del sexo Masculino : {{count($userCompany->menVisits)}}
      <br>
      Visitas del sexo Femenino : {{count($userCompany->womenVisits)}}
    </div>
    <br>
    Despliegues de banner : <br>
    <div class="softText-descriptions-middle">
      @foreach($userCompany->banners as $key => $banner)
        Banner {{$key+1}} : {{count($banner->displays)}}
      @endforeach
    </div>
    <br>
    Peticiones de sorteos : {{count($userCompany->raffleRequests)}}
    <br>
    Publicaciones : {{count($userCompany->feeds)}}
    <br>
    Cobros : {{$cobros = count($userCompany->charges)}} ~ {{'('.'$ '.number_format( (int)$cobros*40, 0, '', ',').')'}}
    <br>
    <br>
    <br>
    {{count($userCompany->ff)}}
  </div><!-- /div .list-group-item -->
  <div class="list-group-item">

  </div><!-- /div .list-group-item -->
</div> <!-- /div .list-group -->