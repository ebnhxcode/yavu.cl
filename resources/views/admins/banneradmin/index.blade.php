@section('title') Company Banner's @stop
@extends('layouts.frontadm')
@section('content')
  {!!Html::script('/js/admins/admins.js')!!}
  <div class="jumbotron">
    <div id="contentMiddle">
      @include('alerts.allAlerts')

      <div class="" style="font-size: 3em;">
        <img id="img" style="padding-bottom: 20px;" width="8%" src= "{!!URL::to('img/newGraphics/neo_icono_config02.png')!!}"/><span> <a href="{!! URL::to('/admins') !!}">Administraci&oacute;n</a></span><span class="requerido"> \ </span><span>Empresas con Banner</span>
      </div>


      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">

            <div class="list-group">

              <div class="list-group-item list-group-item-success">
                <h5>Lista de empresas con banner<span id="resizePendingCourses" name="small" class="glyphicon glyphicon-resize-full" style="float: right;"></span> </h5>
              </div>

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
                  <th>Nombre Empresa</th>
                  <th>Id banner</th>
                  <th>Titulo Banner</th>
                  <th>Descripción Banner</th>
                  <th>Estado</th>  
                  <th>Imagen</th>
                     @if(Auth::admin()->check())
                    <th>Operaciones</th>
                  @endif
                  </thead>
                  <input id="token" type="hidden" name="_token" value="{!! csrf_token() !!}">
           @if(isset($empresas))

                  @foreach($empresas as $empresa)
                    <tbody>
                      <td>{!! $empresa->nombre!!}</td>
                      <td>{!! $empresa->id!!}</td>
                      <td>{!! $empresa->titulo_banner!!}</td>
                      <td>{!! $empresa->descripcion_banner !!}</td>
                      <td>{!! $empresa->estado_banner !!}</td>
                       @if($empresa->banner != null)
                      <td><img width="100" src="/img/users/{!! $empresa->banner !!}" alt=""></td>
                      @else
                      <td>Sin imagen</td>
                      @endif

                       <td>{!!link_to_route('admins_banner_edit_path', $title = 'Editar', $parameters = $empresa->id, $attributes = ['class'=>'btn btn-primary btn-sm'])!!}</td>
                      
                      
                  </thead>
                    </tbody>
                  @endforeach
            @endif
                </table>
              </div> <!-- /div inside courses -->
            </div> <!-- /list group -->
        </div>
      </div>
    </div>
  </div>



@stop