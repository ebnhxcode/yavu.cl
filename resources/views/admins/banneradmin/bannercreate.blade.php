@section('favicon') {!!Html::favicon('favicons/changeFaviconNameHere.png')!!} @stop
@section('title') New banner @stop
@extends('layouts.frontadm')
@section('content')
{!!Html::script('/js/admins/admins.js')!!}
<div class="jumbotron">
  <div class="contentMiddle">
    <div class="row">

      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        @include('alerts.allAlerts')
      </div><!-- /div .col-lg12-md12-sm12-xs12 -->


      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <!-- section left --> section left
      </div><!-- /div .col-lg4-md4-sm4-xs12 -->

      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

        {!!Form::open(['route'=>'admins_banner_create_path', 'method'=>'POST', 'files' => true])!!}
        <input type="hidden" name="banner_data_id" value="{!! $bannerdata->id !!}">
        @include('admins.banneradmin.forms.fieldsBanner')
        {!!Form::submit('Crear', ['class'=>'btn btn-primary btn-success'])!!}
        {!!Form::close()!!}

      </div><!-- /div .col-lg4-md4-sm4-xs12 -->

      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <!-- section right --> section right
      </div><!-- /div .col-lg4-md4-sm4-xs12 -->

    </div><!-- /div .row -->
  </div><!-- /div .contentMiddle -->
</div><!-- /div .jumbotron -->
@stop