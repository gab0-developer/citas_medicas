@extends('adminlte::page')

@section('title', 'Administradores')

@section('content_header')
    <h1>Administradores</h1>
@stop

@section('content')
    <div>
        @include('users.admin.register_admin')
    </div>

    {{-- ADMINISTRADORES DEL SISTEMA REGISTRADOS --}}

    <div class="card">
        <div class="card-body">
            {{-- <div class="mb-3">
                <button class="btn btn-primary text-white"><a href="{{route('roles.create')}}" class="text-white" >Nuevo rol</a></button>
            </div> --}}
            {{-- Setup data for datatables --}}
            @php
            $heads = [
                'NOMBRE',
                'APELLDO',
                'CORREO',
                'SEXO',
                'TELÉFONO',
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
                @foreach($administradores as $administrador)
                    <tr>
                        <td>{{$administrador->nombre_completo}}</td>
                        <td>{{$administrador->apellido_completo}}</td>
                        <td>{{$administrador->correo}}</td>
                        <td>{{$administrador->sexo}}</td>
                        <td>{{$administrador->nro_telefono}}</td>
                        <td class="d-flex"> 
                            
                            {{-- data-url: Permite mantener la URL asociada con cada botón --}}
                            <button class="btn btn-xs btn-default text-primary shadow btn-edit" 
                                
                                data-url="{{ route('administrador.edit', $administrador->id_ciudadano) }}" 
                                data-update="{{ route('administrador.update', $administrador->id_ciudadano) }}" 
                                title="Edit">
                                <i class="fa fa-lg fa-fw fa-pen"></i>
                            </button>
                            
                            <form action="{{route('administrador.destroy',$administrador->id_ciudadano)}}" method="post" class="form_eliminater">
                                @csrf
                                @method('delete')
                                {!! $btnDelete !!}
                            </form>

                            <button class="btn btn-xs btn-default text-primary shadow btn-details" 
                                
                                data-url="{{ route('administrador.show', $administrador->id_ciudadano) }}" 
                                title="Details">
                                <i class="fa fa-lg fa-fw fa-eye"></i>
                            </button>
                            {{-- {!! $btnDetails !!} --}}
                            {{-- {{$client->id}} --}}
                        </td>
                    </tr>
                @endforeach
            </x-adminlte-datatable>
        </div>
    </div>

    <div>
        @include('users.admin.update_admin')
        @include('users.admin.show_admin')
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
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script>
        // ---------EVENTO BOTON DE EDITAR--------------------------
        $('.btn-edit').on('click', function(event) {
            event.preventDefault();
            var url = $(this).data('url');
            var update = $(this).data('update');

            // Realiza una solicitud AJAX para obtener los datos del rol
            $.get(url, function(data) {
                let data_useradmin = data.data_useradmin[0]; // Array de todos los datos del administrador disponibles

                $('#cedula_useradmin').val(data_useradmin.cedula);
                $('#nombre_useradmin').val(data_useradmin.nombre_completo);
                $('#apellido_useradmin').val(data_useradmin.apellido_completo);
                $('#tlf_useradmin').val(data_useradmin.nro_telefono);
                $('#tlf_second_useradmin').val(data_useradmin.nro_tlf_secundario);
                $('#user_id').val(data_useradmin.user_id);
                
                // Establece la acción del formulario al URL para la actualización
                $('#editForm').attr('action', update); 

                // Muestra el modal
                $('#editModal').modal('show'); 
            });
        });

        // ELIMIMNAR administrador
        $('.form_eliminater').submit(function(e){
                e.preventDefault();
                Swal.fire({
                    title: "Esta seguro de eliminar el administrador del sistema?",
                    text: "Este usuario administrativo será eliminado permanentemente!",
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
        // ---------EVENTO BOTON DE EDITAR--------------------------
        $('.btn-details').on('click', function(event) {
                event.preventDefault();
                var url = $(this).data('url');
    
                // Realiza una solicitud AJAX para obtener los datos del rol
                $.get(url, function(data) {
                    let data_useradmin = data.data_useradmin[0]; // Array de todos los datos del useradmin disponibles
                    console.log(data_useradmin.cedula)
                    $('#cedula_useradmin_show').val(data_useradmin.cedula);
                    $('#nombre_useradmin_show').val(data_useradmin.nombre_completo);
                    $('#apellido_useradmin_show').val(data_useradmin.apellido_completo);
                    $('#sexo_useradmin_show').val(data_useradmin.sexo);
                    $('#fecha_nacimiento_useradmin_show').val(data_useradmin.fecha_nacimiento);
                    $('#email_useradmin_show').val(data_useradmin.correo);
                    $('#tlf_useradmin_show').val(data_useradmin.nro_telefono);
                    $('#tlf_second_useradmin_show').val(data_useradmin.nro_tlf_secundario);
                    $('#estado_useradmin_show').val(data_useradmin.estados);
                    $('#municipio_useradmin_show').val(data_useradmin.municipios);
                    $('#parroquia_useradmin_show').val(data_useradmin.parroquias);
                    $('#user_id_show').val(data_useradmin.user_id);
                    
                    

                    // Muestra el modal
                    $('#detailsModal').modal('show'); 
                });
            });
    </script>
@stop