@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>

    <div class="cards-dashboard d-flex">

        @component('components.dashboard.cards')
            @slot('title','Cantidad de pacientes')
            @slot('cantidad',$cantidadPacientes)
            {{-- @slot('title','Cantidad de pacientes') --}}
        @endcomponent
        @component('components.dashboard.cards')
            @slot('title','Cantidad de pacientes')
            @slot('cantidad',$cantidadDoctores)
            {{-- @slot('title','Cantidad de pacientes') --}}
        @endcomponent
        @component('components.dashboard.cards')
            @slot('title','Cantidad de pacientes')
            @slot('cantidad',$cantidadCitasMedicas)
            {{-- @slot('title','Cantidad de pacientes') --}}
        @endcomponent
    </div>
    
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    
    {{-- <link rel="stylesheet" href="{{asset('assets/css/app.css')}}"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
    <script> 
        Swal.fire({
  title: "Good job!",
  text: "You clicked the button!",
  icon: "success"
});
    </script>
@stop