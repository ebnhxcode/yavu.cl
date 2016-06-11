@section('favicon') {!!Html::favicon('favicons/feed.png')!!} @stop
{!!Html::script('js/jquery.js')!!}
{!!Html::script('js/ajax/ParticiparSorteo.js')!!}
@if(isset($feed))
@section('title') Show a feed @stop
@extends('layouts.front')
@section('content')
  <div class="jumbotron">
    <div id="contentMiddle">
      @include('alerts.allAlerts')
      <!--
      <div style="font-size: 3em;">
        <img width="64px" style="padding-bottom: 20px;" src= "{!!URL::to('img/newGraphics/neo_icono_publicaciones.png')!!}" />
        <span>
          <a href="{!! URL::to('/feeds') !!}">Publicaciones</a>
        </span>
      </div>
      -->

      <div class="row">
        <div class="col-md-8 col-sm-12 col-xs-12">
          <div class="list-group">
            <div id='publicacion"+value.id+"' class='list-group'>
              <div style='padding: 0px 2px 2px 2px;' class='list-group-item list-group-item-success'>
                <div class="dropdown">
                  <div style="float: right; padding-top: 8px; padding-right: 5px" class="dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                      <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                      <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                      <li><a onclick="eliminarEstado({!!  $feed->id.','.$feed->user_id!!})" href="#!">{!! (Auth::user()->get()->id==$feed->user_id?"Eliminar":"Ocultar") !!} publicación</a></li>
                      <!--(user_id==value.user_id?"<li><a onclick='eliminarEstado("+value.id+",0)' href='#!'>Ocultar estado</a></li>":"")-->
                      <!--(user_id==value.user_id?"<li><a href='/feeds/"+value.id+"/edit'>Editar publicaci&oacute;n</a></li>":"")-->
                    </ul>
                  </div><!-- /div dropdown -->
                </div><!-- /div dropdown -->

                <div class="media">
                  <div style="padding-left: 8px;" class="media-left">
                    <a href="/empresa/{!! $EmpresaEstado[0]->nombre !!}">
                      <img class='media-object' src='{!! $EmpresaEstado[0]->imagen_perfil !!}' data-holder-rendered='true' style='width: 32px; height: 32px;'/>
                    </a>
                  </div><!-- /div .media-left -->
                  <div class="media-body">
                    <h4 class="media-heading"><a href="/empresa/{!! $EmpresaEstado[0]->nombre !!}" style="color:#3C5B28;">{!! $EmpresaEstado[0]->nombre !!}</a></h4>
                    <small>Publicó <abbr class='timeago' id='timeago{!! $feed->id !!}' value='{!! $feed->created_at !!}' title='{!! $feed->created_at !!}\'>{!! $feed->created_at !!}</abbr></small>
                  </div><!-- /div .media-body -->
                </div><!-- /div .media -->
              </div><!-- /div .list-group-item .success -->

              <div class="list-group-item">
                <p>{!! $feed->status !!}</p>
              </div><!-- /div list-group-item -->

              <div class='list-group-item panel-footer'>

                <span role='button' class='' href='#!' style='color:#3C5B28'>
                  <span name='megusta' class='' onclick='Interactuar({!! $feed->id !!})' id='estado_{!! $feed->id !!}' value='e{!! $feed->empresa_id !!}'>
                    <img id='imgcoin{!! $feed->id !!}' src='/img/newGraphics/cobrar_coins.png' />
                  </span><!-- /span #estado_+feed_id -->
							  </span>

              </div><!-- /div list-group-item panel footer -->
            </div><!-- /div list-group -->
          </div><!-- /div list-group -->

          <div class="list-group">

          </div><!-- /div list-group -->

        </div><!-- /div col-md-8 col-sm-12 col-xs-12 -->
        <div class="col-md-4 col-sm-12 col-xs-12">
          <div class="list-group">

          </div><!-- /div list-group-item -->

        </div><!-- /div col-md-4 -->
      </div><!-- /div row -->
    </div><!-- /div contentMiddle -->
  </div><!-- /div jumbotron -->
@stop
@else
  404
@endif
