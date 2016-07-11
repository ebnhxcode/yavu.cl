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

        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
          <div class="list-group" >
            {!!Form::model($bannerdata, ['method'=>'PUT', 'route' => ['admins_banner_put_path', $bannerdata->id], 'files' => true , 'id' => 'FormBanner'])!!}

              <input type="hidden" name="banner_data_id" value="{!! $bannerdata->id !!}">

              @include('admins.banneradmin.forms.fieldsBannerPartial.bannerdataFields')

              {!!Form::submit('Guardar', ['class'=>'btn btn-primary btn-success'])!!}

            {!!Form::close()!!}
          </div><!-- /div .list-group -->
        </div><!-- /div .col-lg4-md4-sm4-xs12 -->

        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">




        </div><!-- /div .col-lg4-md4-sm4-xs12 -->

        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
          <!-- section right --> section right
        </div><!-- /div .col-lg4-md4-sm4-xs12 -->

      </div>
  </div>
</div>
@stop