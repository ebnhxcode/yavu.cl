@section('favicon') {!!Html::favicon('favicons/config.png')!!} @stop
@section('title') Edit feed @stop
@extends('layouts.front')
@section('content')
<div class="jumbotron">
	<div id="contentMiddle">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        @include('alerts.allAlerts')
      </div><!-- /div .col-md12-sm12-xs12 -->

      <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
        @include('feeds.indexPartial.sectionLeft')
      </div><!-- /div .col-md4-sm12-xs12 -->

      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

        <div class="list-group">
          <div class="list-group-item">
            <div class="row">
              <div class="col-md-1 col-sm-offset-0 col-xs-offset-0">
                <a href="/empresas/{!! ($postAuthor = $feed->companyPostAuthor)?$postAuthor->id:'' !!}">
                  <img class='media-object' src='/img/users/{!! ($postAuthor->imagen_perfil!='')?$postAuthor->imagen_perfil:'usuario_nuevo.png' !!}' data-holder-rendered='true' style='width: 36px; height: 36px; border-radius: 10%;'/>
                </a>
              </div><!-- /div .col-md1-sm-offset-12-xs-offset-12 -->

              <div class="col-xs-12 col-sm-12 col-md-11 col-lg-11">
                <div class="dropdown">
                  <div style="float: right;" class="dropdown">
                    <button class="btn btn-default btn-xs dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                      <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                      <span class="caret"></span>
                    </button><!-- /button .btn .btn-default .dropdown-toggle -->
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                      @if($userSession->id==$feed->user_id)
                        <li><a href='/feeds/{!!$feed->id!!}'>Volver a la publicaci&oacute;n</a></li>
                        {!!Form::open(['action'=> ['FeedController@destroy', $feed->id], 'method'=>'DELETE'])!!}
                        <li>
                          <a href="#!">
                            {!!Form::hidden('status', isset($feed)?($feed->status!=null)?$feed->status:null:'')!!}
                            {!!Form::submit('Eliminar publicacion', ['class'=>'btn-link', 'id'=>'eliminar'])!!}﻿
                          </a>
                        </li>
                        {!!Form::close()!!}
                        @endif
                    </ul><!-- /ul .dropdown-menu -->

                  </div><!-- /div .dropdown -->
                </div><!-- /div .dropdown -->

                <div class="media-heading">
                  <strong><a href="/empresas/{!! $postAuthor->id !!}" style="color: #3C5B28;">{!! $postAuthor->nombre !!}</a></strong>
                  <strong>·</strong>
                  <small style="font-size: .7em; color: grey;"><abbr class='timeago' id='timeago{!! $feed->id !!}' value='{!! $feed->created_at !!}' title='{!! $feed->created_at !!}'>{!! $feed->created_at !!}</abbr></small>
                </div>
                <input type="hidden" name="_token" value="{!!csrf_token()!!}" id="token" />
                <div id='publicacion{!! $feed->id !!}'>
                  {!! $feed->status !!}
                  <hr>
                  {!!Form::model($feed, ['method'=>'PUT', 'route' => ['feeds.update', $feed->id] ])!!}
                  @include('feeds.forms.fieldsFeed')
                  <div align="right" style="padding-top:10px">
                    {!!Form::submit('Guardar', ['class'=>'btn btn-sm btn-success', 'id'=>'guardar'])!!}
                    <br>
                    {!!Form::close()!!}
                  </div>
                  <div style="padding-top: 15px;" name='megusta' class=''>
                    <span class="text-info" style="float: right;font-size: 0.7em;">
                      <small>(Author : <a href="/empresas/{!! $postAuthor->id !!}">{!! $postAuthor->nombre !!}</a>)</small>
                    </span>
                  </div><!-- /div -->
                </div><!-- /div #publicacion -->
              </div><!-- /div .col-md11-sm12-xs12 -->
            </div><!-- /div .row -->
          </div><!-- /div .list-group-item -->
          <a href="/feeds" class="list-group-item panel-footer">
            <small>
                <span class="glyphicon glyphicon-chevron-left">
                </span><!-- /span .glyphicon .glyphicon-chevron-left -->
              volver a publicaciones
            </small>
          </a><!-- /div .list-group-item -->
        </div><!-- /div .list-group -->

      </div><!-- /div .col-md8-sm12-xs12 -->






      <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
        <div class="list-group">
          <div class="list-group-item">
            <div class="form-group has-feedback has-feedback-left">

            </div><!-- /div .form-group .has-feedback .has-feedback-left -->
          </div><!-- /div .list-group-item -->
          <div class="list-group-item">
            <div class="form-group has-feedback has-feedback-left">

            </div><!-- /div .form-group .has-feedback .has-feedback-left -->
          </div><!-- /div .list-group-item -->
        </div><!-- /div .list-group -->
      </div><!-- /div .col-md4-sm12-xs12 -->
    </div><!-- /div .row -->
  </div><!-- /div #contentMiddle -->
</div><!-- /div .jumbotron -->
@stop