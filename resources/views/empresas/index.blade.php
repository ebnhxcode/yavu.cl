@section('favicon') {!!Html::favicon('favicons/company.png')!!} @stop
@section('title') Empresas @stop
@extends('layouts.front')
@section('content')
{!!Html::script('js/ajax/BuscarEmpresa.js')!!}
<div class="jumbotron">
	<div id="contentMiddle">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        @include('alerts.allAlerts')
      </div><!-- /div col-lg12-md12-sm12-xs12 -->
      <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
        @include('sorteos.indexPartial.sectionLeft')
      </div><!-- /div col-lg3-md3-sm12-xs12 -->

      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        @if(Auth::user()->check() || !Auth::user()->check())
          <div id="EmpresaListThumb">
            <div class="list-group">
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
        @endif
      </div><!-- /div col-lg6-md6-sm12-xs12 -->

      <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
        @include('sorteos.indexPartial.sectionRight')
      </div></div><!-- /div col-lg3-md3-sm12-xs12 -->

      <div class="text-center">{!!$empresas->render()!!}</div>
    </div><!-- /div .row -->

	</div><!-- /contentMiddle -->
</div><!-- /jumbotron -->


@stop