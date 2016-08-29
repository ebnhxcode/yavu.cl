<div id="EmpresaListThumb">
  <div class="list-group">
    @foreach($empresas as $key => $empresa)
      <div class="list-group-item">
        <div class="row">

          <div class="col-xs-5 col-sm-5 col-md-4 col-lg-4">
            <a href="/empresas/{!!$empresa->id!!}" class="thumbnail">
              <img id="ImagenPerfil" src="/img/users/{!!($empresa->imagen_perfil!='')?$empresa->imagen_perfil:'banner.png'!!}" alt="..." style="height: 150px;">
            </a><!-- /a .thumbnail -->
          </div><!-- /div col-lg6-md6-sm12-xs12 -->

          <div class="col-xs-7 col-sm-7 col-md-8 col-lg-8">

            <div style="float: right;" class="dropup">

              <button class="btn btn-default btn-xs dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="glyphicon glyphicon-chevron-down"></span>
              </button><!-- /div .btn .btn-default .btn-xs .dropdown-toggle -->

              <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
                <li><a href="{!! URL::to('/empresas/'.$empresa->id.'/') !!}">Ver perfil</a></li>
              </ul><!-- /ul .dropdown-menu -->

            </div><!-- /div .dropup -->

            <b><a class="" href="/empresas/{!!$empresa->id!!}" style="color: #3C5B28;">{!! $empresa->nombre!!}</a></b><br/>
            <div class="softText-descriptions">

              <b>Ciudad :</b> {!!$empresa->ciudad!!}<br>
              <b>Contacto :</b> <b> <a href="mailto:#">{!!$empresa->email!!}</a></b><br>
              {{--<b>Fono :</b> <abbr title="Phone"></abbr> {!!$empresa->fono!!}<br>--}}
              {{($fCounts=round( count($empresa->followers)*(int)("1.".rand(1,9999)) ) )}} seguidor{{($fCounts>1||$fCounts==0?'es':'')}}.<br>

              {{--
              <span class="btn btn-primary btn-xs">{!! count($userSession->follow($empresa->id)->get())>0?'Seguida':'seguir' !!}</span>
              --}}

            </div><!-- /div .softText-descriptions -->
            <br/>

            <span class="btn btn-xs btn-warning request" value="{{$empresa->id}}">
              {{(count( $userSession->hasRequested(addslashes($empresa->id)) )>0)?'Petición enviada':'Pedir sorteo'}}
              · <span> {{ $rR = count($empresa->raffleRequests) }} </span>
            </span>










            @if($empresa->sorteos()->count()>0)
            <div class="btn-group" role="group" aria-label="...">
              <a href="{!! URL::to('/empresas/'.$empresa->id.'/sorteos') !!}" class="btn btn-success btn-xs">
                <img src="{!! asset('img/yavu019.png') !!}" width="20" alt=""/>
                Ver sorteos
              </a>
            </div><!-- /div .btn-group -->
            @endif

            <input type="hidden" name="_token" id="token" value="{{csrf_token()}}">



            @if(Auth::user()->get()->id == $empresa->user_id)
              <ul class="dropdown-menu">
                <li><a href="{!! URL::to('/empresas/'.$empresa->id.'/edit') !!}">Editar empresa</a></li>
                <li><a href="{!! URL::to('/sorteos/create') !!}">Crear sorteo</a></li>
              </ul><!-- /ul .dropdown-menu -->
              <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Mi empresa
                <span class="glyphicon glyphicon-cog"></span>
                <span class="caret"></span>
              </button><!-- /button .btn .btn-default .btn-xs .dropdown-toggle -->
            @endif

          </div><!-- /div .col-lg6-md6-sm12-xs12 -->
{{--
          <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
          </div><!-- /div .col-lg1-md1-sm1-xs1 -->
--}}

        </div><!-- /div .row -->
      </div><!-- /div .list-group-item -->
    @endforeach
  </div><!-- /div .list-group -->
</div> <!-- /div #EmpresaListThumb -->


<script>
  $('.request').click(function(){
    var token = $("#token").val();
    var companyRequested = this;
    var route = "http://localhost:8000/requestaraffle";
    $.ajax({
      url: route,
      headers: {'X-CSRF-TOKEN': token},
      type: 'POST',
      dataType: 'json',
      data: {
        empresa_id: $(this).attr('value')
      },
      success:function(requestCount){

        if (parseInt(requestCount.requests) > 0) {
          $(companyRequested).text("Pedido · " + requestCount.requests).fadeIn(2000);
        }else {
          $(companyRequested).text("Ya enviaste una petición");
        }

      },
    });
    return true;

  });
</script>
