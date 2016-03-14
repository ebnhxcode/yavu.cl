{!!Html::script('js/jquery.js')!!}
{!!Html::script('js/ajax/BuscarSorteo.js')!!}
{!!Html::script('js/ajax/ParticiparSorteo.js')!!}
{!!Html::script('js/ajax/GestionarCoins.js')!!}
{!!Html::script('js/ajax/GestionarCompraTicket.js')!!}
@extends('layouts.front') 
@section('content')
<div class="jumbotron">
  <div id="contentMiddle">
    @include('alerts.alertFields')
    @include('alerts.errorsMessage')
    @include('alerts.successMessage')
    @include('alerts.warningMessage')
    <h1>Sorteos</h1>   
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="form-group">
          @if(Auth::admin()->check())

            <div class="input-group input-group-lg">
              <span class="glyphicon glyphicon-search input-group-addon" id="sizing-addon1"></span>
              {!!Form::text('nombre',null,['class' => 'form-control buscar', 'placeholder' => 'buscar...','id'=>'nombre_sorteo', 'aria-describedby' => 'sizing-addon1'])!!}
            </div>

          @elseif(Auth::user()->check() || !Auth::user()->check())

            <div class="input-group input-group-lg">
              <span class="glyphicon glyphicon-search input-group-addon" id="sizing-addon1"></span>
              {!!Form::text('nombre',null,['class' => 'form-control buscar', 'placeholder' => 'buscar...','id'=>'sorteothumb', 'aria-describedby' => 'sizing-addon1'])!!}
            </div>

          @endif
        </div>
        @if(Auth::admin()->check())
          <table class="table table-hover" id="SorteoList">
            <thead>
              <th>Nombre</th>
              <th>Descripcion</th>
              <th>Estado Sorteo</th>
            </thead>
            @foreach($sorteos as $sorteo) 
              <tbody>
                <td>{{$sorteo->nombre_sorteo}}</td>
                <td>{{$sorteo->descripcion}}</td>
                <td>{{$sorteo->estado_sorteo}}</td>
                <td>{!!link_to_route('sorteos.edit', $title = 'Editar', $parameters = $sorteo->id, $attributes = ['class'=>'btn btn-primary'])!!}</td>
              </tbody>
            @endforeach
          </table>  
          {!! $sorteos->render() !!}
        @elseif(Auth::user()->check() || !Auth::user()->check())
          <div id="SorteoListThumb">
            {!! $ImagenSorteo = ""; !!}
            @foreach($sorteos as $sorteo)
              <div class="col-md-4">
                <div class="thumbnail">
                  @if($sorteo->imagen_sorteo === "")
                    <img src="https://tiendas-asi.com/wp-content/uploads/2015/04/sorteo-diariodebodas.jpg" alt="" />
                  @else
                    <img src="/img/users/{!! $sorteo->imagen_sorteo !!}" alt="" />  
                  @endif                
                  <div class="card-content card">
                    <h5>Nombre Sorteo:</h5> {{$sorteo->nombre_sorteo}}
                    <h5>Descripción del Sorteo:</h5>
                    {{$sorteo->descripcion}}
                    <h5>Estado del Sorteo:</h5>  
                    {{$sorteo->estado_sorteo}}
                  </div>
                  
                  @if(Auth::user()->check())                  
                    <input id="user_id" value="{!! Auth::user()->get()->id !!}" type="hidden" />
                    <input id="sorteo_id" value="{!! $sorteo->id !!}" type="hidden" />
                    <input type="hidden" name="_token" value="{{csrf_token()}}" id="token" />
                    <br>
                    <a  id='participar' href="{!! URL::to('#!') !!}" class="btn btn-primary participar btn-sm" data-toggle="modal" data-target="#myModal" value="{!! $sorteo->id !!}" role="button">Participar<a> 
  
                    <!-- Modal -->
                    <div class="modal fade card" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Ticket's</h4>
                          </div>
                          <div class="modal-body">
                            Transforma tus yavucoins a tickets para participar!

                           <div class="list-group">
                               <div class="list-group-item-full-header">
                                   <h6>MIS COINS</h6>
                               </div>
                               <div class="list-group-item">
                                   <img src="http://i601.photobucket.com/albums/tt93/tbg8904/Gaia%20Icon/Coins.png" width="16px" height="16px"> 
                                   <span id="CantidadCoins" class="label label-warning">
                                          
                                   </span>
                               </div>
                           </div>

                           <div class="list-group">
                               <div class="list-group-item-full-header">
                                   <h6>MIS TICKETS</h6>
                               </div>
                               <div class="list-group-item">
                                   <img src="{!!URL::to('images/ticket.png')!!}" width="16px" height="16px" /> 
                                   <span id="CantidadTickets" class="label label-info">
                                    
                                   </span>                                   
                                   <span class="btn btn-sm btn-primary" style="float:right;" href="#!" id="ComprarMasTickets">Comprar más</span>  
                               </div>                               
                           </div>


                          </div>
                          <div class="modal-footer">

                            <button id="UsarTicket" value="{!! $sorteo->id !!}" type="button" class="btn btn-success btn-sm" style="display: none;" data-dismiss="modal">Usar ticket</button>  

                            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">No</button>
                            <button type="button" id='siquiero' class="btn btn-primary btn-sm">Comprar 1 ticket</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                  @else 
                    <a href="{!! URL::to('usuarios/create') !!}" class="btn btn-primary btn-sm" role="button">Participar!</a>
                  @endif
                </div>
              </div>
            
            @endforeach
            {!!$sorteos->render()!!}
          </div>
        @endif
        {!!$sorteos->render()!!}
      </div>
    </div>
  </div>
</div>

@stop