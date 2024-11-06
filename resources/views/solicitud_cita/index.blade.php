@extends('adminlte::page')

@section('title', 'Cita medica')

@section('content_header')
    <h1>Cita medica</h1>
@stop

@section('content')

    @role('paciente')
        <div>
            @include('solicitud_cita.register_solicitudcita')
        </div>
    @endrole
    
    {{-- CITAS REALIZADAS --}}

    <div class="card">
        <div class="card-body">
            {{-- <div class="mb-3">
                <button class="btn btn-primary text-white"><a href="{{route('roles.create')}}" class="text-white" >Nuevo rol</a></button>
            </div> --}}
            {{-- Setup data for datatables --}}
            @php
            $heads = [
                // 'ID',
                'NOMBRE DE CITA',
                'FECHA DE CITA',
                'HORA DE CITA',
                'ESTADO DE CITA',
                ['label' => 'Actions', 'no-export' => true, 'width' => 5],
            ];

            $btnEdit = '<button class="btn btn-xs btn-default text-primary  shadow" title="Edit">
                            <i class="fa fa-lg fa-fw fa-pen"></i>
                        </button>';
            $btnDelete = '<button type="submit" class="btn btn-xs btn-default text-danger  shadow" title="Delete">
                            <i class="fa fa-lg fa-fw fa-trash"></i>
                        </button>';
            $btnDetails = '<button class="btn btn-xs btn-default text-teal  shadow" title="Details">
                            <i class="fa fa-lg fa-fw fa-eye"></i>
                        </button>';

            $config = [
                
            ];
            @endphp

            {{-- Minimal example / fill data using the component slot --}}
            
            <x-adminlte-datatable id="table1" class="text text-center" :heads="$heads">
                @foreach($data_citas_view as $citas)
                    <tr>
                        <td>{{$citas->nombre_cita}}</td>
                        <td>{{$citas->fecha_cita}}</td>
                        <td>{{$citas->hora_cita}}</td>
                        @if ($citas->estatu == 'PENDIENTE')
                            <td class="text text-danger">{{$citas->estatu}}</td>
                            @else
                            <td class="text text-success">{{$citas->estatu}}</td>
                        @endif
                        <td class="d-flex"> 
                            
                            {{-- <a href="{{route('permisos.edit',$citas)}}">{!! $btnEdit !!}</a>
                            
                            <form action="{{route('permisos.destroy',$citas)}}" method="post" class="form_eliminar">
                                @csrf
                                @method('delete')
                                {!! $btnDelete !!}
                            </form>
                            {!! $btnDetails !!} --}}
                            {{-- {{$client->id}} --}}
                        </td>
                    </tr>
                @endforeach
            </x-adminlte-datatable>
        </div>
    </div>
    
     {{--has: verifica si existe la clave, en este caso success y devuelve true o false dependiendo   --}}
    @if (Session::has('success')) 
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    icon: 'success',
                    title: '¡Éxito!',
                    text: '{{ Session::get('success') }}',
                    confirmButtonText: 'Aceptar'
                });
            });
        </script>
    @endif

@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="{{asset('assets/css/app.css')}}"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
    </script>
@stop