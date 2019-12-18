@extends('layouts.master')
@section('title', 'Actividades')
@section('header-title','Grafico en barras')

@section('header-content')
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

