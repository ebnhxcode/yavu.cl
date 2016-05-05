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
            <div class="list-group-item">
              <div class="row">



                  <div class="col-md-4">
                    Total de visitas : {!! $statistics[3] !!}<br>
                  </div>

                  <div class="col-md-8">
                    Visitas por parte de Hombres : {!! $statistics[0] !!}<br>
                    Visitas por parte de Mujeres : {!! $statistics[1] !!}<br>
                    Visitas sin sexo definido : {!! $statistics[2] !!}<br>
                  </div>


                  <div class="col-md-4">
                    Alcance publicitario : {!! $statistics[4] !!}<br>
                  </div>

                  <div class="col-md-8">
                    a
                  </div>



                  <div class="col-md-4">
                    Coins Otorgadas : {!! (int) $statistics[4] * 10 !!}<br>
                  </div>

                  <div class="col-md-8">
                    a

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