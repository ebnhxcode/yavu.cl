{!!Html::script('js/jquery.js')!!}
{!!Html::script('js/ajax/ParticiparSorteo.js')!!}
@if(isset($feed))
@section('title') Show a feed @stop
@extends('layouts.front')
@section('content')
  <div class="jumbotron">
    <div id="contentMiddle">
      @include('alerts.allAlerts')
      <div style="font-size: 3em;">
        <img width="64px" style="padding-bottom: 20px;" src= "{!!URL::to('img/newGraphics/neo_icono_publicaciones.png')!!}" />
        <span>
          <a href="{!! URL::to('/feeds') !!}">Publicaciones</a>
        </span>
      </div>


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
                      <li><a onclick="eliminarEstado('+value.id+','+value.user_id+')" href="#!">'+(user_id==value.user_id?"Eliminar":"Ocultar")+' publicación</a></li>
                      (user_id==value.user_id?"<li><a onclick='eliminarEstado("+value.id+",0)' href='#!'>Ocultar estado</a></li>":"")
                      (user_id==value.user_id?"<li><a href='/feeds/"+value.id+"/edit'>Editar publicaci&oacute;n</a></li>":"")
                    </ul>
                  </div><!-- /div dropdown -->
                </div><!-- /div dropdown -->

                <div class="media">
                  <div style="padding-left: 8px;" class="media-left">
                    <a href="#">
                      <img class='media-object' src='"+ImagenPerfilEmpresa+"' data-holder-rendered='true' style='width: 32px; height: 32px;'/>
                    </a>
                  </div>
                  <div class="media-body">
                    <h4 class="media-heading"><a href="/empresa/'+value.nombreEmp+'" style="color:#3C5B28;">'+value.nombreEmp+'</a></h4>
                    <small>Publicó <abbr class='timeago' id='timeago"+value.id+"' value='"+TimeAgo+"' title='"+TimeAgo+"\'>"+TimeAgo+"</abbr></small>
                  </div>
                </div><!-- /div media -->
              </div><!-- /div list-group-item-success -->

              <div class="list-group-item">
                <p>"+value.status+"</p>
              </div><!-- /div list-group-item -->

              <div class='list-group-item panel-footer'>

                <span role='button' class='' href='#!' style='color:#3C5B28'>
                  <span name='megusta' class='' onclick='Interactuar(this.id)' id='estado_"+value.id+"' value='e"+value.idEmpresa+"'>
                    <img id='imgcoin"+value.id+"' src='/img/newGraphics/cobrar_coins.png' />
                  </span>
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
