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
      </div><!-- /div .col-lg12-md12-sm6-xs12 -->
      <div class='col-lg-3 col-md-3 col-sm-12 col-xs-12'>
        <div class="list-group">
          <div class="list-group-item">

            <div class="thumbnail">
              <img id='ImagenPerfil' src='/img/users/{!! isset($user)?($user->imagen_perfil!='')?$user->imagen_perfil:'usuario_nuevo.png':'' !!}' class='center-block'>
            </div><!-- /div .thumbnail -->

            <h3>{!! $user->nombre.' '.$user->apellido !!}</h3>
            <div class="dropdown">
              <button class="btn btn-default btn-sm dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                <span class="caret"></span>
              </button><!-- /div .btn .btn-default .btn-sm .dropdown-toggle -->
              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li>
                  <a href="{!! route('usuarios_edit_path', $user->id) !!}">Editar Perfil de Usuario</a>
                </li>
              </ul><!-- /div .dropdown-menu -->
            </div><!-- /div .dropdown -->

          </div><!-- /div .list-group-item -->
        </div><!-- /div .list-group -->

        @include('miniDashboard.miniDashboard')

      </div><!-- .div-col-md4-sm6-xs12 -->
      <div class='col-lg-6 col-md-6 col-sm-12 col-xs-12'>
        <div class="list-group">
          <div class="list-group-item">
            <div>
              <div id="IPortada">
                <a class='thumbnail'>
                  <img id='ImagenPortada' src='/img/users/{!! isset($user)?($user->imagen_portada!='')?$user->imagen_portada:'banner.png':'' !!}'>
                </a><!-- /div .thumbnail -->
              </div><!-- div #IPortada -->
            </div>
          </div><!-- /div .list-group-item -->
          <div class="softText-descriptions">
            <div>
            <!-- Nav tabs -->
            <ul id="TabUserProfile" class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Historial coins</a></li>
              <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Hitorial tickets</a></li>
              <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Información</a></li>
              <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Imagenes</a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane fade active list-group wrap" id="home">
              @foreach($userSession->history_moves_of_coins as $movement)
                <div class="list-group-item">
                  Actividad : {!! ($movement->motivo) !!} hace 
                  <abbr class='timeago' id='timeago' value='{!! $movement->created_at !!}' title='{!! $movement->created_at !!}'>{!! $movement->created_at !!}</abbr>
                </div><!-- /div .list-group-item -->
              @endforeach

              </div><!-- /div .tab-pane .fade .active .list-group .wrap -->

              <div role="tabpanel" class="tab-pane fade list-group wrap" id="profile">
                @foreach($userSession->history_moves_of_tickets as $movement)
                  <div class="list-group-item">
                    Actividad : Compra de ticket ${!! ($movement->monto) !!} hace
                    <abbr class='timeago' id='timeago' value='{!! $movement->created_at !!}' title='{!! $movement->created_at !!}'>{!! $movement->created_at !!}</abbr>
                  </div><!-- /div .list-group-item -->
                @endforeach
              </div><!-- /div .tab-pane .fade .active .list-group .wrap -->
              <div role="tabpanel" class="tab-pane fade" id="messages">qwe
              </div><!-- /div .tab-pane .fade .active .list-group .wrap -->
              <div role="tabpanel" class="tab-pane fade" id="settings">ewq
              </div><!-- /div .tab-pane .fade .active .list-group .wrap -->
            </div><!-- /div .tab-content -->

          </div>
            {{--{!! ($userSession->registro_coins()->sum('cantidad')) !!}--}}

          </div><!-- /div .softText-descriptions -->
        </div><!-- /div .list-group -->
      </div>
      <div class='col-lg-3 col-md-3 col-sm-6 col-xs-12'>
        <div class="list-group">
          <div class="list-group-item">
            <h6>TUS EMPRESAS</h6>
          </div>
          @foreach($userSession->userCompanies as $key => $company)
            <div class="list-group-item">
              <small class="softText">Ver perfil de</small>
              <a href="{!!URL::to('/empresas/'.$company->id)!!}">
                <img id="ImagenPerfil" src="/img/users/{!!($company->imagen_perfil!='')?$company->imagen_perfil:'banner.png'!!}" alt="..." style="width: 30px; height: 30px; border-radius: 10%;">
                <strong>{!! $company->nombre !!}</strong>
              </a>
              <br/>
              {!!($fCounts=count($company->followers))!!} seguidor{!!($fCounts>1||$fCounts==0?'es':'')!!}.
            </div>
          @endforeach

        </div>
      </div>
		</div><!-- /div .row -->
	</div><!-- /div #contentIn -->
</div><!-- /div .jumbotron -->
@stop<!-- /section content -->
