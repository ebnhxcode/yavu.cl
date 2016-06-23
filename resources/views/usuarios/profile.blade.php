@section('favicon') {!!Html::favicon('favicons/user.png')!!} @stop
@section('title') {!! $user->nombre !!} profile @stop
@extends('layouts.front')
@section('content')
<div class='jumbotron'>

	<div id='contentMiddle'>
		<div class='row' style='margin-top:-35px;'>

      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        @include('alerts.allAlerts')
      </div><!-- /div .col-md12-sm12-xs12 -->

      <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
        {!!Form::hidden('user_id', $user->id, ['id'=>'user_id'])!!}
      </div><!-- /div .col-lg12-md12-sm12-xs12 -->

      <div class='col-lg-3 col-md-3 col-sm-12 col-xs-12'>

        @include('usuarios.profilePartial.sectionLeft')

      </div><!-- /div .col-lg3-md3-sm12-xs12 -->

      <div class='col-lg-6 col-md-6 col-sm-12 col-xs-12'>

        @include('usuarios.profilePartial.sectionCenter')

      </div><!-- /div .col-lg6-md6-sm12-xs12 -->

      <div class='col-lg-3 col-md-3 col-sm-6 col-xs-12'>

        @include('usuarios.profilePartial.sectionRight')

      </div><!-- /div .col-lg3-md3-sm12-xs12 -->

		</div><!-- /div .row -->
	</div><!-- /div #contentIn -->
</div><!-- /div .jumbotron -->
@stop<!-- /section content -->
