@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Panel de control</h1>
@stop

@section('content')

    <div class="cards-dashboard d-flex">

        @component('components.dashboard.cards')
            @slot('title','Cantidad de pacientes')
            @slot('cantidad',$cantidadPacientes)
        @endcomponent
        @component('components.dashboard.cards')
            @slot('title','Cantidad de Doctores')
            @slot('cantidad',$cantidadDoctores)
        @endcomponent
        @component('components.dashboard.cards')
            @slot('title','Cantidad de citas')
            @slot('cantidad',$cantidadCitasMedicas)
        @endcomponent
        
    </div>
    <div class="chartjs-dashboard mt-2">
        <div class="chartjs">
            <canvas  id="solicitudMonth"></canvas>
        </div>
        <br>
        <div class="chartjs">
            <canvas  id="solicitudyears"></canvas>
        </div>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    
    {{-- <link rel="stylesheet" href="{{asset('assets/css/app.css')}}"> --}}
@stop

@section('js')
    <script src="{{asset('assets/js/chart.js')}}"></script>
    <script> 
        document.addEventListener('DOMContentLoaded', () => {
            const months = ['none','Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio','Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre']
            const solicitudMonth = document.getElementById('solicitudMonth').getContext('2d');
            const solicitudyears = document.getElementById('solicitudyears').getContext('2d');
            // data de laravel:
            let solicitudesMonth = {!! json_encode($solicitudesMonth->pluck('mes')) !!}
            let solicitudesMonthCantidad = {!! json_encode($solicitudesMonth->pluck('cantidad')) !!}

            let solicitudesYearAnno = {!! json_encode($solicitudesYear->pluck('year')) !!}
            let solicitudesYearCantidad = {!! json_encode($solicitudesYear->pluck('cantidad')) !!}

            let MesesNombre = solicitudesMonth.map((item) => months[parseInt(item)])

            Bar_Chartjs(solicitudMonth,MesesNombre,'Solicitudes mensual',solicitudesMonthCantidad,'Solicitud mensual')

            Bar_Chartjs(solicitudyears,solicitudesYearAnno,'Solicitudes anuales',solicitudesYearCantidad,'Solicitud anual')
            
            

            
        })
        
    </script>
@stop