<div class="list-group">
  <div class="list-group-item list-group-item-success">
    Estad&iacute;stica de seguidores
    <a style="float:right;" href="{{url('empresas/'.$userCompany->id)}}">
      <img width='32' style="border-radius: 10%;" id='ImagenPerfil' src='/img/users/{!! isset($userCompany)?($userCompany->imagen_perfil!='')?$userCompany->imagen_perfil:'banner.png':'banner.png' !!}'>
      <b>{{$userCompany->nombre}}</b>
    </a>
  </div><!-- /div .list-group-item -->
  <div class="list-group-item">
    {{--
    @foreach($followers = $userCompany->followers as $key => $follower)

      @if( $user = $follower->getUserFollow )

        <b>{{$user->nombre}}</b> : <br>

        @foreach($user->interests as $key => $interest)

          {{($interest->categoryList->category)}}

        @endforeach
        <hr>

      @endif

    @endforeach
    --}}

    {{--$categories--}}
    <!-- cuantos de sus usuarios escogieron esta categoria -->
    <!-- por cada vuelta del foreach traer los usuarios que escogieron esta categoría -->
    <!-- -->

    {{--
    De los usuarios que siguen a <b>{{$userCompany->nombre}}</b>
    Dentro de las categor&iacute;as registradas en Yavü : <br>
    Los usuarios de cada categoria que siguen a la empresa
    --}}

    <!--
     Traigo a los usuarios que siguen a esta empresa
     -->

    @foreach($categories as $key => $category)

      <b>{{$category->category}}</b> <br>
      <div class="softText-descriptions-middle">
        {{$category->description}}
      </div>
      <div class="softText-descriptions">
        <br>


        <?php $interesteds=0; ?>
        @foreach($userCompany->followers as $key => $follower)
          <!-- $followe has one where category = category -->
        <?php ( count($follower->interestedIn($category->id))>0?$interesteds++:0 ) ?>
        @endforeach

        {{$interesteds++}} de tus seguidores les interesa esta categor&iacute;a
      </div><!-- /div .softText-descriptions -->



    <hr>

    @endforeach

{{--
    @foreach($categories as $key => $category)

      <b>{{$category->category}}</b> <br>
      <div class="softText-descriptions">
        {{$category->description}}
      </div><!-- /div .softText-descriptions -->

      @foreach($category->categorizedUsers as $key => $userCategorized)

      @endforeach
      <hr>


    @endforeach
--}}

  </div><!-- /div .list-group-item -->
</div><!-- /div .list-group -->