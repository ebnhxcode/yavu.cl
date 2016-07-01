<div id="EmpresaListThumb">
  <div class="list-group">


    <div class="list-group-item">
      {!!Form::open(['action'=>'EmpresaController@BuscarEmpresas', 'method'=>'GET'])!!}
      <div class="input-group input-group-sm">
        {!!Form::text('nombre',null,['class' => 'form-control', 'placeholder' => 'Buscar empresas', 'aria-describedby' => 'sizing-addon1', 'required'])!!}
        <span class="input-group-addon" id="sizing-addon1">
          <span class="glyphicon glyphicon-search">
          </span><!-- /span .glyphicon .glyphicon-search -->
        </span><!-- /span .input-group-addon #sizing-addon1 -->
      </div><!-- /div .input-group .input-group-lg -->
      {!! csrf_field() !!}
      <div class="softText-descriptions">
        Filtros de b&uacute;squeda
      </div>
      {!!Form::select('ciudad',
        ['Tarapacá' => 'Tarapacá',
        'Parinacota' => 'Parinacota',
        'Arica' => 'Arica',
        'Antofagasta' => 'Antofagasta',
        'Atacama' => 'Atacama',
        'La Serena' => 'La Serena',
        'Coquimbo' => 'Coquimbo',
        'Valparaiso' => 'Valparaiso',
        'Aconcagua' => 'Aconcagua',
        'Región Metropolitana' => 'Región Metropolitana',
        'O Higgins' => 'O Higgins',
        'Curicó' => 'Curicó',
        'Talca' => 'Talca',
        'Linares' => 'Linares',
        'Maule' => 'Maule',
        'Ñuble' => 'Ñuble',
        'Concepción' => 'Concepción',
        'Arauco' => 'Arauco',
        'Biobío' => 'Biobío',
        'Malleco' => 'Malleco',
        'Cautín' => 'Cautín',
        'Araucanía' => 'Araucanía',
        'Los Ríos' => 'Los Ríos',
        'Valdivia' => 'Valdivia',
        'Osorno' => 'Osorno',
        'Los Lagos' => 'Los Lagos',
        'Llanquihue' => 'Llanquihue',
        'Chiloé' => 'Chiloé',
        'Aysen' => 'Aysen',
        'Magallanes' => 'Magallanes',
        'otra' => 'otras...'],
        $selected = null, ['class' => 'form-control input-sm', 'maxlength' => '100'])
        !!}
      {!!Form::close()!!}
    </div>


    @foreach($empresas as $empresa)
      <div class="list-group-item">
        <div class="row">
          <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <a href="/empresas/{!!$empresa->id!!}" class="thumbnail">
              <img id="ImagenPortada" src="/img/users/{!!($empresa->imagen_portada!='')?$empresa->imagen_portada:'banner.png'!!}" alt="..." style="height: 150px;">
            </a><!-- /a .thumbnail -->
          </div><!-- /div col-lg6-md6-sm12-xs12 -->
          <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
            <strong><a class="" href="/empresas/{!!$empresa->id!!}" style="color: #3C5B28;">{!! $empresa->nombre!!}</a></strong><br/>
            <div class="softText-descriptions">

              <strong>Ciudad :</strong> {!!$empresa->ciudad!!}<br>
              <strong>Contacto :<strong><a href="mailto:#">{!!$empresa->email!!}</a></strong><br>
                <strong>Fono :</strong> <abbr title="Phone"></abbr> {!!$empresa->fono!!}</strong><br>
              {!!($fCounts=count($empresa->followers))!!} seguidor{!!($fCounts>1||$fCounts==0?'es':'')!!}.


              <span class="btn btn-default btn-xs">{!! count($userSession->follow($empresa->id)->get())>0?'Seguida':'seguir' !!}</span>


            </div>
            <br/>
            <div class="btn-group" role="group" aria-label="...">
              <a href="{!! URL::to('/empresa/'.$empresa->nombre.'/') !!}" class="btn btn-default btn-xs">Ver perfil</a>
              <a href="{!! URL::to('/empresa/'.$empresa->nombre.'/sorteos') !!}" class="btn btn-default btn-xs">Ver sorteos</a>
            </div><!-- /div .btn-group -->

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
          <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
            <div class="dropup">
              <a href="/empresas/{!! $empresa->id !!}" class="btn btn-default btn-xs">
                <span class="glyphicon glyphicon-chevron-down"></span>
              </a><!-- /a .btn .btn-default .btn-xs -->
            </div><!-- /div .dropup -->

          </div><!-- /div .col-lg1-md1-sm1-xs1 -->
        </div><!-- /div .row -->
      </div><!-- /div .list-group-item -->
    @endforeach
  </div><!-- /div .list-group -->
</div> <!-- /div #EmpresaListThumb -->