<!-- Banner Random -->

<div style="padding: 30px 30px 5px 30px;" class="list-group-item">
  <div class="row">
           <div id="EmpresaListThumb">
            <div class="row">
           
              @foreach($empresas as $empresa)
                <div class="col-md-12 col-sm-12 col-xs-12">
            
                    <img id="ImagenPortada" src="{!! ($empresa->imagen_portada!="")?'/img/users/'.$empresa->imagen_portada:"/img/users/banner.png" !!}" alt="..." style="height: 170px;">
                    <div class="row">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                        <address>
                          <h4><a class="btn-link" href="/empresa/{!!$empresa->nombre!!}">{!! $empresa->nombre!!}</a></h4>
                          <strong>Titulo :</strong> {!!$empresa->titulo_banner!!}<br>
                          <strong>Link :<strong><a href="mailto:#">{!!$empresa->link!!}</a></strong><br>
                        </address>
                      </div>
                    </div><!-- /div row -->
        
                </div>
              @endforeach
            </div>
          </div> <!-- /Empresa list thumb -->

              @if(Request::path() != 'sorteos')
      <div class="col-md-4 col-sm-4 col-xs-6">
        <div class="list-group" >
          <div align="center">
            <a style="padding: 2px 2px 2px 2px;" href="{!!URL::to('/sorteos')!!}" style="text-align:center;" class="list-group-item list-group-item-info">
              <span>
                <img width="80%" src= "{!!URL::to('img/newGraphics/neo_icono_sorteo.png')!!}"/>
              </span>
            </a>
          </div>
          <div align="center"><small>Sorteos</small></div>
        </div>
      </div><!-- /div col -->
    @endif
  </div><!-- /row -->
</div> <!-- /list group item -->

