@if(isset($sorteo))



  {!! $sorteo->nombre_sorteo !!}
  {!! $sorteo->descripcion !!}
  {!! $sorteo->fecha_inicio_sorteo !!}
  {!! $sorteo->estado_sorteo !!}
  {!! $sorteo->imagen_sorteo !!}



@else
  404
@endif