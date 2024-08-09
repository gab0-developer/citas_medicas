@extends('adminlte::page')

@section('title', 'Permisos')

@section('content_header')
    <h1>Aministración de permisos</h1>
@stop

@section('content')

<div class="container">
        <div class="mb-3">
            @include('users.permiso.register')
        </div>

        <div class="card">
            <div class="card-body">
                {{-- <div class="mb-3">
                    <button class="btn btn-primary text-white"><a href="{{route('roles.create')}}" class="text-white" >Nuevo rol</a></button>
                </div> --}}
                {{-- Setup data for datatables --}}
                @php
                $heads = [
                    'ID',
                    'NOMBRE',
                    'DESCRIPCIÓN',
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
                <x-adminlte-datatable id="table1" :heads="$heads">
                    @foreach($permisos as $permiso)
                        <tr>
                            <td>{{$permiso->id}}</td>
                            <td>{{$permiso->name}}</td>
                            <td>{{$permiso->description}}</td>
                            <td class="d-flex"> 
                                
                                <a href="{{route('permisos.edit',$permiso)}}">{!! $btnEdit !!}</a>
                                
                                <form action="{{route('permisos.destroy',$permiso)}}" method="post" class="form_eliminar">
                                    @csrf
                                    @method('delete')
                                    {!! $btnDelete !!}
                                </form>
                                {!! $btnDetails !!}
                                {{-- {{$client->id}} --}}
                            </td>
                        </tr>
                    @endforeach
                </x-adminlte-datatable>
            </div>
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
    <script> 

        $(document).ready(function(){
            $('.form_eliminar').submit(function(e){
                e.preventDefault();
                Swal.fire({
                    title: "Esta seguro de eliminar el cliente?",
                    text: "Este cliente será eliminado permanentemente!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Si, eliminar!"
                    }).then((result) => {
                    if (result.isConfirmed) {
                        this.submit();
                        // if (this.submit()) {
                        //     Swal.fire({
                        //     title: "Eliminado!",
                        //     text: "Cliente eliminado exitosamente.",
                        //     icon: "success"
                        //     });
                            
                        // }
                        
                    }
                });
            });
        })

        // let form_eliminar = document.querySelectorAll('.form_eliminar');
        // form_eliminar.addEventListener('submit', (e) =>{
        //     e.preventDefault();
        //     Swal.fire({
        //         title: "Esta seguro de eliminar el cliente?",
        //         text: "Este cliente será eliminado permanentemente!",
        //         icon: "warning",
        //         showCancelButton: true,
        //         confirmButtonColor: "#3085d6",
        //         cancelButtonColor: "#d33",
        //         confirmButtonText: "Si, eliminar!"
        //         }).then((result) => {
        //         if (result.isConfirmed) {
        //             this.submit();
        //             // Swal.fire({
        //             // title: "Eliminado!",
        //             // text: "Cliente eliminado exitosamente.",
        //             // icon: "success"
        //             // });
        //         }
        //     });
        // })
    </script>
@stop