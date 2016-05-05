@extends('layouts.front')
@section('content')

  Visitas por parte de Hombres : {!! $statistics[0] !!}<br>
  Visitas por parte de Mujeres : {!! $statistics[1] !!}<br>
  Visitas sin sexo definido : {!! $statistics[2] !!}<br>

@stop