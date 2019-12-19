@extends('layouts.master')
@section('title', 'Solicitudes')
@section('header-title','Grafico en Pie')

@section('header-content')
<table id="ubicacionTable" class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>Nombre</th>
        <th>Cantidad</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>{{$array[0]}}</td>
        <td>{{$array1[0]}}</td>
    </tr>
    <tr>
        <td>{{$array[1]}}</td>
        <td>{{$array1[1]}}</td>
    </tr>
    </tbody>
</table>

@endsection
@section('content')
{!! $chart->container() !!}
<script src="https://unpkg.com/vue"></script>
        <script>
            var app = new Vue({
                el: '#app',
            });
        </script>
        <script src=https://cdnjs.cloudflare.com/ajax/libs/echarts/4.0.2/echarts-en.min.js charset=utf-8></script>
        {!! $chart->script() !!}
@endsection

