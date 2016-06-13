@section('favicon') {!!Html::favicon('favicons/feed.png')!!} @stop
{!!Html::script('js/jquery.js')!!}
{!!Html::script('js/ajax/ParticiparSorteo.js')!!}
@if(isset($feed))
@section('title') Show a feed @stop
@extends('layouts.front')
@section('content')
  <div class="jumbotron">
    <div id="contentMiddle">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          @include('alerts.allAlerts')
        </div><!-- /div .col-md12-sm12-xs12 -->

        <div class="col-md-3 col-sm-12 col-xs-12">
          @include('feeds.indexPartial.sectionLeft')
        </div><!-- /div .col-md4-sm12-xs12 -->







        <div class="col-md-6 col-sm-12 col-xs-12">

          <div class="list-group">

            <div class="list-group-item">

              <div class="row">
                <div class="col-md-1 col-offset-0 col-xs-offset-0 ">


                  <div class="">
                    <div class="">
                      <a href="/empresa/{!! $EmpresaEstado[0]->nombre !!}">
                        <img class='media-object' src='/img/users/{!! $EmpresaEstado[0]->imagen_perfil !!}' data-holder-rendered='true' style='width: 40px; height: 40px; border-radius: 10%;'/>
                      </a>
                    </div><!-- /div .media-left -->
                  </div><!-- /div .media -->


                </div>

                <div class="col-md-11 col-sm-12 col-xs-12">
                  <div class="dropdown">
                    <div style="float: right;" class="dropdown">
                      <button class="btn btn-default btn-xs dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        <span class="caret"></span>
                      </button><!-- /button .btn .btn-default .dropdown-toggle -->
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li><a onclick="eliminarEstado({!!  $feed->id.','.$feed->user_id!!})" href="#!">{!! (Auth::user()->get()->id==$feed->user_id?"Eliminar":"Ocultar") !!} publicación</a></li>
                        <!--(user_id==value.user_id?"<li><a onclick='eliminarEstado("+value.id+",0)' href='#!'>Ocultar estado</a></li>":"")-->
                        <!--(user_id==value.user_id?"<li><a href='/feeds/"+value.id+"/edit'>Editar publicaci&oacute;n</a></li>":"")-->
                      </ul><!-- /ul .dropdown-menu -->
                    </div><!-- /div dropdown -->
                  </div><!-- /div dropdown -->

                  <div class="media-heading">
                    <strong><a href="/empresa/{!! $EmpresaEstado[0]->nombre !!}" style="color: #3C5B28;">{!! $EmpresaEstado[0]->nombre !!}</a></strong>
                    · <small style="font-size: .7em; color: grey;"><abbr class='timeago' id='timeago{!! $feed->id !!}' value='{!! $feed->created_at !!}' title='{!! $feed->created_at !!}'>{!! $feed->created_at !!}</abbr></small>
                  </div>



                  <div id='publicacion{!! $feed->id !!}' class=''>
                    <div style='padding: 0px 2px 2px 2px;' class=''>


                      {!! $feed->status !!}
                      <hr>

                  <span name='megusta' class='' onclick='Interactuar({!! $feed->id !!})' id='estado_{!! $feed->id !!}' value='e{!! $feed->empresa_id !!}'>
                    <!--<img id='imgcoin{!! $feed->id !!}' src='/img/newGraphics/cobrar_coins.png' />-->
                    <small>Cobrar mis coins</small>
                  </span><!-- /span #estado_+feed_id -->

                    </div><!-- /div .list-group-item .success -->



                    <!--<div class='list-group-item'>-->

                    <!--<span role='button' class='' href='#!' style='color:#3C5B28'>-->



                    <!--</span>-->

                    <!--</div><!-- /div .list-group-item .panel-footer -->
                  </div><!-- /div .list-group -->


                </div>




              </div>

            </div>

          </div>








        </div><!-- /div .col-md8-sm12-xs12 -->




        <div class="col-md-3 col-sm-12 col-xs-12">
          @include('feeds.indexPartial.sectionRight')
        </div><!-- /div .col-md3-sm12-xs12 -->

      </div><!-- /div .row -->
    </div><!-- /div #contentMiddle -->
  </div><!-- /div .jumbotron -->
@stop
@else
  404
@endif
