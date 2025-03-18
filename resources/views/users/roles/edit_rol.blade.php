@extends('adminlte::page')

@section('title', 'Rol-permiso')

@section('content_header')
    <h1>Asignar permisos a rol</h1>
@stop

@section('content')
    
    <div class="card">
        <div class="card-bod">
            <form action="{{route('cliente.update',$clients)}}" method="post" class="p-3">
                @csrf  {{-- token --}}
                @method('put')
                <div class="text-center card-header">
                    <h5>Modificar cliente</h5>
                </div>
                <div class="inputs mt-5">
    
    
                    <div class="group-input d-flex my-2">
                        <div class="input-group flex-nowrap">
                            <span class="input-group-text" id="addon-wrapping"><i class="fas fa-user"></i></span>
                            <input type="number" name="dni_cliente" class="form-control"
                            value="{{ $rol->dni }}" readonly aria-label="Nro DNI" aria-describedby="addon-wrapping">
                        </div>
                    </div> 
                    <div class="group-input d-flex my-2">
                        <div class="input-group flex-nowrap">
                            <span class="input-group-text" id="addon-wrapping"><i class="fas fa-user"></i></span>
                            <input type="text" name="nombre_cliente" class="form-control" placeholder="Nombre del cliente" aria-label="Nombre del cliente" aria-describedby="addon-wrapping"  value="{{ $clients->nombre }}" >
                        </div>
                        <div class="input-group flex-nowrap ml-2">
                            <span class="input-group-text" id="addon-wrapping"><i class="fas fa-user"></i></span>
                            <input type="text" name="apellido_cliente" class="form-control" placeholder="Apellido del cliente" aria-label="Apellido del cliente" aria-describedby="addon-wrapping" value="{{ $clients->apellido }}">
                        </div>
                          
                    </div> 
                    <div class="group-input d-flex my-2">
                        <div class="input-group flex-nowrap">
                            <span class="input-group-text" id="addon-wrapping"><i class="fas fa-envelope-open"></i></span>
                            <input type="email" name="email_cliente" class="form-control" placeholder="Email del cliente" aria-label="Email del cliente" aria-describedby="addon-wrapping" value="{{ $clients->email }}">
                        </div>
                        <div class="input-group flex-nowrap ml-2">
                            <span class="input-group-text" id="addon-wrapping"><i class="fa fa-phone"></i></span>
                            <input type="number" name="tlf_cliente" class="form-control" placeholder="Teléfono del cliente" aria-label="Teléfono del cliente" aria-describedby="addon-wrapping" value="{{ $clients->telefono }}">
                        </div>
                          
                    </div> 
                    <div class="group-input d-flex my-2">
                        <div class="input-group flex-nowrap">
                            <span class="input-group-text" id="addon-wrapping"><i class="fa fa-street-view"></i></span>
                            <input type="text" name="direccion_cliente" class="form-control" placeholder="Dirección del cliente" aria-label="Dirección del cliente" aria-describedby="addon-wrapping" value="{{ $clients->direccion }}">
                        </div>
                        <div class="input-group form-select form-select-lg ml-2">
                            <select name="estado_cliente" class="form-control form-select " aria-label="Default select example">
                                <option selected value="{{$clients->estado}}">{{$clients->estado}}</option>
                                <option value="soltero">Soltero</option>
                                <option value="casado">Casado</option>
                                <option value="no decirlo">prefiero no decirlo</option>
                            </select>
                        </div>
                        
                    </div>
                    
                </div>
                <div class="mt-5 ">
                    <input id="submit_cliente" type="submit" class="w-100 btn btn-success" value="Modificar cliente">
                </div>
            </form>
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
    
    
@stop