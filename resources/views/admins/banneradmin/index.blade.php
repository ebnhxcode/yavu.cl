@section('favicon') {!!Html::favicon('favicons/changeFaviconNameHere.png')!!} @stop
@section('title') Company Banner's @stop
@extends('layouts.frontadm')
@section('content')
  {!!Html::script('/js/admins/admins.js')!!}
  <div class="jumbotron">
    <div class="contentMiddle">
      @include('alerts.allAlerts')

      <div class="row">
        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
        </div><!-- col-xs12-sm3-md3-lg3 -->

        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

            <div class="list-group">

              <div class="list-group-item list-group-item-success">
                <h5>Lista de empresas con banner<span id="resizePendingCourses" name="small" class="glyphicon glyphicon-resize-full" style="float: right;"></span> </h5>
              </div><!-- /div .list-group-item -->

              <script>
                $('#resizePendingCourses').click(function(){
                  if($(this).attr('name') == 'small'){
                    $('#insidePendingCourses').removeClass('wrap');
                    $('#insidePendingCourses').addClass('wrap-long-vertical');
                    $(this).removeClass('glyphicon-resize-full');
                    $(this).addClass('glyphicon-resize-small');
                    $(this).attr('name', 'long');
                    return true;
                  }else{
                    $('#insidePendingCourses').removeClass('wrap-long-vertical');
                    $('#insidePendingCourses').addClass('wrap');
                    $(this).removeClass('glyphicon-resize-small');
                    $(this).addClass('glyphicon-resize-full');
                    $(this).attr('name', 'small');
                    return true;
                  }
                });
              </script>

              <div id="insidePendingCourses" class="list-group-item wrap">


                <table id="CoursesList" class="table table-hover" style="font-size: 0.8em;">

                  <thead>
                  <th>Titulo Banner</th>
                  <th>Descripción Banner</th>
                  <th>Despliegues</th>
                  <th>Imagen</th>
                  @if(Auth::admin()->check())
                    <th>Operaciones</th>
                  @endif
                  </thead>
                  <input id="token" type="hidden" name="_token" value="{!! csrf_token() !!}">
                  @if(isset($banners))

                    @foreach($banners as $banner)
                      <tbody>
                      <td>{!! $banner->titulo_banner!!}</td>
                      <td>{!! $banner->descripcion_banner !!}</td>
                      <td>{{count($banner->displays)}}</td>
                      @if($banner->banner != null)
                        <td><img width="100" src="/img/users/{!! $banner->banner !!}" alt=""></td>
                      @else
                        <td>Sin imagen</td>
                      @endif

                      <td>{!!link_to_route('admins_banner_edit_path', $title = 'Editar', $parameters = $banner->companyId, $attributes = ['class'=>'btn btn-primary btn-sm'])!!}</td>


                      </thead>
                      </tbody>
                    @endforeach
                  @endif

                </table>

              </div> <!-- /div inside courses -->
            </div> <!-- /list group -->
        </div>

        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
        </div><!-- col-xs12-sm3-md3-lg3 -->

      </div><!-- div .row -->
    </div><!-- /div contentMiddle -->
  </div><!-- /div .jumbotron -->
@stop