<div class="list-group">
  <div class="list-group-item list-group-item-success">
    Estad&iacute;stica de yavüposts
    <a style="float:right;" href="{{url('empresas/'.$userCompany->id)}}">
      <img width='32' style="border-radius: 10%;" id='ImagenPerfil' src='/img/users/{!! isset($userCompany)?($userCompany->imagen_perfil!='')?$userCompany->imagen_perfil:'banner.png':'banner.png' !!}'>
      <b>{{$userCompany->nombre}}</b>
    </a>
  </div><!-- /div .list-group-item -->
  <div class="list-group-item">

    <div class="row">
      <div class="list-group">
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
          <div class="">




          </div><!-- /div .list-group-item -->
        </div><!-- /div .col-xs12-sm6-md6-lg6 -->
      </div><!-- /div .list-group -->
    </div><!-- /div .row -->
  </div><!-- /div .list-group-item -->
</div><!-- /div .list-group -->