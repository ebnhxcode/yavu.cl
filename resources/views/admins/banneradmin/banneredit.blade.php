@section('favicon') {!!Html::favicon('favicons/config.png')!!} @stop
@section('title') Edit banner @stop
@extends('layouts.frontadm')
@section('content')
  {!!Html::script('/js/admins/admins.js')!!}
  <div class="jumbotron">
    <div class="contentMiddle">
      <div class="row">

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          @include('alerts.allAlerts')
        </div><!-- /div .col-lg12-md12-sm12-xs12 -->

        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
          <!-- section left --> section left
        </div><!-- /div .col-lg3-md3-sm3-xs12 -->

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">


          {!!Form::model($bannerdata, ['method'=>'PUT', 'route' => ['admins_banner_put_path', $bannerdata->id], 'files' => true , 'id' => 'FormBanner'])!!}

            <input type="hidden" name="banner_data_id" value="{!! $bannerdata->id !!}">

            @include('admins.banneradmin.forms.fieldsBanner')

            {!!Form::submit('Guardar', ['class'=>'btn btn-primary btn-success'])!!}

          {!!Form::close()!!}



        </div><!-- /div .col-lg6-md6-sm6-xs12 -->

        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
          <!-- section right --> section right
        </div><!-- /div .col-lg3-md3-sm3-xs12 -->

      </div>
  </div>
</div>
@stop