<div class="col-md-4 col-sm-12 col-xs-12">
  <div class="panel panel-default">
    <div class="panel-body">
      <div id="sticky" class="list-group">
        <div class="list-group-item list-group-item-success">
          FILTROS DE BÚSQUEDA
        </div>
        <div class="list-group-item">
          <input id="user_id" value="{!! Auth::user()->get()->id !!}" type="hidden" />
          {!!Form::text('nombre',null,['class' => 'form-control buscar', 'placeholder' => 'buscar publicaciones','id'=>'feedsearch', 'aria-describedby' => 'sizing-addon1'])!!}
        </div>

        <div class="list-group-item">
          Categorias
          {!! Form::checkbox('name', 'value') !!}
          {!! Form::checkbox('name', 'value') !!}
          {!! Form::checkbox('name', 'value') !!}
          {!! Form::checkbox('name', 'value') !!}
          {!! Form::checkbox('name', 'value') !!}
          {!! Form::checkbox('name', 'value') !!}
          {!! Form::checkbox('name', 'value') !!}
          {!! Form::checkbox('name', 'value') !!}
          {!! Form::checkbox('name', 'value') !!}
          {!! Form::checkbox('name', 'value') !!}
          {!! Form::checkbox('name', 'value') !!}
          {!! Form::checkbox('name', 'value') !!}
          {!! Form::checkbox('name', 'value') !!}
          {!! Form::checkbox('name', 'value') !!}
          {!! Form::checkbox('name', 'value') !!}
        </div>

        <div class="list-group-item">
          <div class="row">

            <div class="col-md-4 col-sm-4 col-xs-4">
              <div class="list-group" >
                <div>
                  <a href="{!!URL::to('/sorteos/create')!!}" style="text-align:center;" class="list-group-item list-group-item-info">
                        <span>
                          <img width="80%" src= "{!!URL::to('img/dash/ico_sorteo01.png')!!}"/>
                        </span>
                  </a>
                </div>
                <div align="center"><small>Crear sorteo</small></div>
              </div>
            </div>

            <div class="col-md-4 col-sm-4 col-xs-4">
              <div class="list-group" >
                <div>
                  <a href="{!!URL::to('/tickets/history')!!}" style="text-align:center;" class="list-group-item list-group-item-info">
                        <span>
                          <img width="80%" src= "{!!URL::to('img/dash/ico_ticket01.png')!!}"/>
                        </span>
                  </a>
                </div>
                <div align="center"><small>Tickets</small></div>
              </div>
            </div>

            <div class="col-md-4 col-sm-4 col-xs-4">
              <div class="list-group" >
                <div>
                  <a href="{!!URL::to('/sorteos')!!}" style="text-align:center;" class="list-group-item list-group-item-info">
                        <span>
                          <img width="80%" src= "{!!URL::to('img/dash/ico_sorteo01.png')!!}"/>
                        </span>
                  </a>
                </div>
                <div align="center"><small>Sorteos</small></div>
              </div>
            </div>
            <div class='col-md-4 col-sm-4 col-xs-4'>
              <div class='list-group' >
                <div>
                  <a href='{!!URL::to('/coins/history')!!}' style="text-align:center;" class="list-group-item list-group-item-info">
												<span>
													<img width="80%" src= "{!!URL::to('img/dash/ico_notificacion004.png')!!}"/>
												</span>
                  </a>
                </div>
                <div align="center"><small>Informe Coins</small></div>
              </div>
            </div>

            <div class='col-md-4 col-sm-4 col-xs-4'>
              <div class='list-group' >
                <div>
                  <a href='{!!URL::to('/tickets/history')!!}' style="text-align:center;" class="list-group-item list-group-item-info">
												<span>
													<img width="80%" src= "{!!URL::to('img/dash/icono_informe01.png')!!}"/>
												</span>
                  </a>
                </div>
                <div align="center"><small>Informe Ticket's</small></div>
              </div>
            </div>

            {{--
            <div class="col-md-4 col-sm-4 col-xs-4">
              <div class="list-group">

                <div class="row">
                  <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="list-group" >
                      <div>
                        <a href="{!!URL::to('/feeds')!!}" style="text-align:center;" class="list-group-item list-group-item-info">
                        <span>
                          <img width="20%" src= "{!!URL::to('img/dash/ico_pin03.png')!!}"/>
                        </span>
                        </a>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="list-group" >
                      <a href="{!!URL::to('/empresas')!!}" style="text-align:center;" class="list-group-item list-group-item-warning">
                      <span>
                        <img width="20%" src= "{!!URL::to('img/dash/ico_empresa.png')!!}" class=""/>
                      </span>
                      </a>
                    </div>
                  </div>

                  <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="list-group" >
                      <a href="{!!URL::to('/empresas/create')!!}" style="text-align:center;" class="list-group-item list-group-item-warning">
                      <span>
                        <img width="20%" src= "{!!URL::to('img/dash/ico_empresa.png')!!}" class=""/>
                      </span>
                      </a>
                    </div>
                  </div>

                  <div class="col-md-4 col-sm-4 col-xs-4">

                    <div class="list-group" >
                      <a href="{!!URL::to('/sorteos')!!}" style="text-align:center;" class="list-group-item list-group-item-warning">
                      <span>
                        <img width="20%" src= "{!!URL::to('img/dash/ico_sorteo01.png')!!}" class=""/>
                      </span>
                      </a>
                    </div>
                  </div>

                  <div class="col-md-4 col-sm-4 col-xs-4">

                    <div class="list-group" >
                      <a href="{!!URL::to('/sorteos/create')!!}" style="text-align:center;" class="list-group-item list-group-item-warning">
                      <span>
                        <img width="20%" src= "{!!URL::to('img/dash/ico_sorteo01.png')!!}" class=""/>
                      </span>
                      </a>
                    </div>

                  </div>

                  <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="list-group" >
                      <a href="{!!URL::to('/pops')!!}" style="text-align:center;" class="list-group-item list-group-item-danger">
                      <span>
                        <img width="20%" src= "{!!URL::to('img/dash/ico_notificacion004.png')!!}" class=""/>
                      </span>
                      </a>
                    </div>
                  </div>
                  <!-- <div class="col-md-12 col-sm-12 col-xs-12"><!--style="position:fixed;z-index:1000;"

           <div class="list-group" >
             <div class="list-group-item-full-header">
               <h1>CONFIGURACION</h1>
             </div>
             <a href="#" style="text-align: center;" class="list-group-item list-group-item-info">
               <span><img  src= "{!!URL::to('img/dash/ico_configurar_dash02.png')!!}" class=""/></span>

              </a>
           </div> -->

                  <div class="col-md-4 col-sm-4 col-xs-4">


                    <div class="list-group" >
                      <a href="{!!URL::to('/reports')!!}" style="text-align:center;" class="list-group-item list-group-item-success">
               <span>
                 <img width="20%" src= "{!!URL::to('img/dash/icono_informe01.png')!!}" class=""/></span>
                      </a>

                    </div>


                  </div>

                  <div class="col-md-4 col-sm-4 col-xs-4">

                    <div class="list-group" >
                      <a href="{!!URL::to('/tickets')!!}" style="text-align:center;" class="list-group-item list-group-item-info">
               <span>
                 <img width="20%" src= "{!!URL::to('img/dash/ico_ticket01.png')!!}" class=""/></span>
                      </a>

                    </div>

                  </div>

                  <div class="col-md-4 col-sm-4 col-xs-4">

                    <div class="list-group" >
                      <a href="{!!URL::to('/tickets/create')!!}" style="text-align:center;" class="list-group-item list-group-item-info">
               <span>
                 <img width="20%" src= "{!!URL::to('img/dash/ico_ticket01.png')!!}" class=""/></span>
                      </a>

                    </div>

                  </div>

                </div>


              </div>
            </div>
            --}}
          </div>
        </div>




      </div> <!-- /list group -->
    </div> <!-- /panel body -->
  </div> <!-- /panel -->
</div><!-- fin del col md 4 -->
<script>


</script>