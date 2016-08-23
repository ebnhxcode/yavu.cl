<div class="list-group">
  <div class="list-group-item list-group-item-success">
    Estad&iacute;stica de visitas al perfil
    <a style="float:right;" href="{{url('empresas/'.$userCompany->id)}}">
      <img width='32' style="border-radius: 10%;" id='ImagenPerfil' src='/img/users/{!! isset($userCompany)?($userCompany->imagen_perfil!='')?$userCompany->imagen_perfil:'banner.png':'banner.png' !!}'>
      <b>{{$userCompany->nombre}}</b>
    </a>
  </div><!-- /div .list-group-item -->
  <div class="list-group-item">


    @foreach($followers = $userCompany->followers as $key => $follower)

      @if( $user = $follower->getUserFollow )

        <b>{{$user->nombre}}</b> : <br>

        @foreach($user->interests as $key => $interest)

          {{($interest->categoryList->category)}}

        @endforeach
        <hr>

      @endif

    @endforeach

  </div><!-- /div .list-group-item -->
</div><!-- /div .list-group -->