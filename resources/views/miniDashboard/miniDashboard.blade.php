<div class="hidden-xs">
  <div class="">
    <div {{-- class="collapse" id="collapseExample" --}}>

      <?php
        $menu = json_decode(json_encode([
          [
            'title' => Auth::user()->get()->nombre,
            'url' => 'profile/',
            'image' => 'glyphicons-522-user-lock.png',
            'icon' => 'glyphicon glyphicon-link',
            'prefix' => 'prof',
            'group' => 'user_group',
          ],

          [
            'title' => 'Dashboard',
            'url' => 'dashboard/',
            'image' => 'glyphicons-332-dashboard.png',
            'icon' => 'glyphicon glyphicon-link',
            'prefix' => 'dash',
            'group' => 'user_group',
          ],

          [
            'title' => 'Notificaciones',
            'url' => 'pops/',
            'image' => 'glyphicons-341-globe.png',
            'icon' => 'glyphicon glyphicon-link',
            'prefix' => 'pops',
            'group' => 'user_group',
          ],

          [
            'title' => 'Publicaciones',
            'url' => 'feeds/',
            'image' => 'glyphicons-248-note.png',
            'icon' => 'glyphicon glyphicon-link',
            'prefix' => 'feed',
            'group' => '',
          ],

          [
            'title' => 'Empresas',
            'url' => 'empresas/',
            'image' => 'glyphicons-342-briefcase.png',
            'icon' => 'glyphicon glyphicon-link',
            'prefix' => 'empr',
            'group' => '',
          ],

          [
            'title' => 'Sorteos Activos',
            'url' => 'sorteos/',
            'image' => 'glyphicons-70-gift.png',
            'icon' => 'glyphicon glyphicon-link',
            'prefix' => 'sort',
            'group' => '',
          ],

          [
            'title' => 'Sorteos Finalizados',
            'url' => 'sorteos/ended',
            'image' => 'glyphicons-70-gift.png',
            'icon' => 'glyphicon glyphicon-link',
            'prefix' => 'sort',
            'group' => '',
          ],

          [
            'title' => 'Tickets',
            'url' => 'tickets/',
            'image' => 'glyphicons-354-nameplate-alt.png',
            'icon' => 'glyphicon glyphicon-link',
            'prefix' => 'tick',
            'group' => 'user_group',
          ],

          [
            'title' => 'Informes',
            'url' => '#!/',
            'image' => 'glyphicons-41-stats.png',
            'icon' => 'glyphicon glyphicon-link',
            'prefix' => 'esta',
            'group' => '',
          ],

          [
            'title' => 'Crear Sorteos',
            'url' => 'sorteos/create/',
            'image' => 'glyphicons-70-gift.png',
            'icon' => 'glyphicon glyphicon-link',
            'prefix' => 'sort',
            'group' => '',
          ],

          [
            'title' => 'Crear Empresas',
            'url' => 'empresas/create/',
            'image' => 'glyphicons-342-briefcase.png',
            'icon' => 'glyphicon glyphicon-link',
            'prefix' => 'empr',
            'group' => '',
          ],

          [
            'title' => 'Actualizar Intereses',
            'url' => 'i/',
            'image' => 'glyphicons-342-briefcase.png',
            'icon' => 'glyphicon glyphicon-link',
            'prefix' => 'i',
            'group' => 'user_group',
          ],
        ]));
      ?>

      <ul class="nav nav-pills nav-stacked" role="tablist">
        @foreach($menu as $key => $item)
          <li role="presentation" class="{{ (substr(Request::path(),0,4)==$item->prefix) ? 'active box-shadow':'' }} " >

            <a class="link-nav-item" href="/{{$item->url}}" style="margin: 0px;padding: 1px 20px;" {{$item->title!="Informes"?:'data-toggle=modal data-target=#myModal'}} >
              <div class="row">

                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                  <img width="16" src="{{url('/img/glyphicons/glyphicons/png/'.$item->image.'')}}" alt="">
                </div><!-- .col-xs-sm-md-lg -->

                <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                  <small>
                    {{$item->title}}
                  </small>
                </div><!-- .col-xs-sm-md-lg -->
              </div><!-- .row -->
            </a><!-- .link-nav-item -->

          </li><!-- ?'.active .box-shadow' -->
        @endforeach
      </ul><!-- .nav .nav-pills .nav-stacked -->


      <script>
        $('.link-nav-item').hover(function(){
          $(this).css({'box-shadow':'1px 2px 3px #B7B7B7','-moz-transition':'.2s','-webkit-transition':'.2s'}).fadeIn('slow');
        },function(){
          $(this).css({'box-shadow':'1px 1px 1px #E9E9E9','-moz-transition':'.2s','-webkit-transition':'.2s'}).fadeIn('slow');
        });
      </script>
      <br>
    </div><!-- /div #collapseExample .collapse -->
    {{-- <span data-toggle="collapse" data-target="#collapseExample"  class="glyphicon glyphicon-chevron-up btn"></span> --}}
  </div><!-- /div .list-group-item -->
</div><!-- /div .list-group -->

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Seleccione tipo de informe que desea ver</h4>
      </div><!-- /div .modal-header -->
      <div class="modal-body">
        <div class="row">
          <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <div class='list-group' >
              <div align="center">
                <a style="padding: 2px 2px 2px 2px;" href='{!!URL::to('/coins/history')!!}' style="text-align:center;" class="list-group-item list-group-item-info">
                <span>
                  <img width="80%" src= "{!!URL::to('img/newGraphics/yavucoin_neo02a.png')!!}"/>
                </span>
                </a><!-- /a .list-group-item .success -->
              </div><!-- /div aligned -->
              <div align="center">
                <small>Informe de Coins</small>
              </div><!-- /div aligned -->
            </div><!-- /div .list-group -->
          </div><!-- /div .col-md4-sm4-xs4 -->
          <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <div class="list-group">
              <div align="center">
                <a style="padding: 2px 2px 2px 2px;" href="{!!URL::to('/tickets/history')!!}" style="text-align:center;" class="list-group-item list-group-item-info">
                  <span>
                    <img style="padding-bottom: 10px;" width="80%"src= "{!!URL::to('img/newGraphics/neo_icono_tickets.png')!!}"/>
                  </span>
                </a>
              </div><!-- /div aligned -->
              <div align="center">
                <small>Informe de Tickets</small>
              </div><!-- /div aligned -->
              <br>
            </div><!-- /div .list-group -->
          </div><!-- /div .col-md4-sm4-xs4 -->


          @if(count($userSession->empresas)>0)
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
              <div class="list-group">
                <div align="center">
                  <a style="padding: 2px 2px 2px 2px;" href="{!!URL::to('/estadisticas/'.$userSession->empresas[0]->id)!!}" style="text-align:center;" class="list-group-item list-group-item-info">
                  <span>
                    <img width="80%" src= "{!!URL::to('img/dash/icono_informe01.png')!!}"/>
                  </span>
                  </a>
                </div><!-- /div aligned -->
                <div align="center">
                  <small>Estad&iacute;sticas de mi empresa</small>
                </div><!-- /div aligned -->
              </div><!-- /div .list-group -->
            </div><!-- /div .col-md4-sm4-xs4 -->
          @endif


        </div><!-- /div .row -->
      </div><!-- /div .modal-body -->
      <div class="modal-footer">
      </div><!-- /div .modal-footer -->
    </div><!-- /div .modal-content -->
  </div><!-- /div .modal-dialog -->
</div><!-- /div .modal-fade -->
