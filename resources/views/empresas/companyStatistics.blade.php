@extends('layouts.front')
@section('content')

  <div class="jumbotron">
    <div id="contentMiddle">
      <div class="row">
        <div class="col-md-4 col-sm-12 col-xs-12">
          <div>
            <div>
              <div class="list-group">

                @include('miniDashboard.miniDashboard')

              </div> <!-- /list group -->
            </div> <!-- /panel body -->
          </div> <!-- /panel -->
        </div>

        <div class="col-md-8 col-sm-12 col-xs-12">

          <div class="list-group">
            <div class="list-group-item list-group-item-success">
              ESTADISTICAS B&Aacute;SICAS
            </div>
              <br>
            <div class="list-group-item">

            VISITAS <i class="glyphicon glyphicon-eye-open"></i>
            <hr>
              <div class="row">
               
                <div class="col-sm-6">
                  <div class="hero-widget well well-sm">
                    <div>
                     <i class="glyphicon glyphicon-eye-open"></i>
                    </div>

                  <div>
                    <label class="text-muted">Total de visitas:<br></label>
                    <var>{!! $statistics[3] !!}</var>
                  </div>
                </div>
                </div>

                <div class="col-sm-6">
                  <div class="hero-widget well well-sm">
                    <div>
                      <i class="glyphicon glyphicon-user"></i>
                    </div>
                      <div>
                        <label class="text-muted">Total de visitas por sexo:<br></label>
                            <div>
                              <var>Visitas de sexo Masculino : {!! $statistics[0] !!}</var><br>
                              <var>Visitas de sexo Femenino: {!! $statistics[1] !!}</var><br>
                              <var>Visitas sin sexo definido : {!! $statistics[2] !!}</var>                              
                            </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="list-group-item">
            ALCANCE <i class="glyphicon glyphicon-plane"></i>
            <hr>
              <div class="row">
                <div class="col-sm-12">
                  <div class="hero-widget well well-sm">
                    <div>
                     <i class="glyphicon glyphicon-plane"></i>
                    </div>
                  <div>
                    <label class="text-muted">Total de alcance publicitario:<br></label>
                    <var>{!! $statistics[4] !!}</var>
                  </div>
                </div>
                </div>
              </div>
            </div>

            <div class="list-group-item">
            BENEFICIOS OTORGADOS <i class="glyphicon glyphicon-plane" ></i>
            <hr>
              <div class="row">
                <div class="col-sm-12">
                  <div class="hero-widget well well-sm">
                    <div>
                     <i class="glyphicon glyphicon-plane"></i>
                    </div>
                  <div>
                    <label class="text-muted">Total Coins Otorgadas:<br></label>
                    <var>{!! (int) $statistics[4] * 10 !!}</var>
                  </div>
                </div>
                </div>
              </div>
            </div>


          </div>
        </div>
      </div>
    </div>
  </div>






                  



@stop