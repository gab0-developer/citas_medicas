@extends('adminlte::page')

@section('title', 'Roles')

@section('content_header')
    <h1>Aministración de usuarios</h1>
@stop

@section('content')

    <div class="container">
        {{-- <div>
            @include('users.roles.register_rol')
        </div> --}}
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
                    'CORERO',
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
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td class="d-flex"> 

                                {{-- data-url: Permite mantener la URL asociada con cada botón --}}
                                <button class="btn btn-xs btn-default text-primary shadow btn-edit" 
                                        data-url="{{ route('userspermisos.edit', $user) }}" 
                                        data-update="{{ route('userspermisos.update', $user) }}" 
                                        title="Edit">
                                    <i class="fa fa-lg fa-fw fa-pen"></i>
                                </button>

                                {{-- <a href="{{ route('roles.edit', $user) }}">{!! $btnEdit !!}</a>                                 --}}
                                <form action="{{route('userspermisos.destroy',$user)}}" method="post" class="form_eliminar">
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

    {{-- MODAL PARA AGREGAR PERMISOS A ROLES --}}
    <div>
        @include('users.userspermissions')
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
        $(document).ready(function() {

             // color clasico en select multiple
             $('.js-example-basic-multiple').select2({
                theme: "classic"
            });
            // ---------BOTON DE EDITAR
            $('.btn-edit').on('click', function(event) {
                event.preventDefault();
                var url = $(this).data('url');
                var update = $(this).data('update');
    
                // Realiza una solicitud AJAX para obtener los datos del rol
                $.get(url, function(data) {
                    let user = data.user; // Array de todos los user disponibles
                    let roles = data.roles; // Array de todos los permisos disponibles
                    let rolesAsignadosuser = data.rolesAsignadosuser; // Array de IDs de permisos asignados
                    
                    // Suponiendo que 'data' contiene los datos del rol
                    $('#roleName').val(user.name); // Asigna el nombre del rol al campo correspondiente

                    // Limpia las opciones previas del select
                    $('#select2_permiso').empty();

                    // Itera sobre el array de permisos y agrega cada uno al select
                    roles.map((rol) =>  {
                        // Crea una nueva opción
                        let option = $('<option></option>').attr('value', rol.id).text(rol.name);

                        // Marca la opción como seleccionada si está en el array de permisos asignados
                        if (rolesAsignadosuser.includes(rol.id)) {
                            option.prop('selected', true);
                        }

                        // Añade la opción al select
                        $('#select2_permiso').append(option);
                    });

                    // Inicializa Select2 o actualiza el estado si ya está inicializado
                    $('#select2_permiso').select2({theme: "classic"});

                    // Establece la acción del formulario al URL para la actualización
                    $('#editForm').attr('action', update); 

                    // Muestra el modal
                    $('#editModal').modal('show'); 
                });
            });

            // ELIMINAR LIBRO
            $('.form_eliminar').submit(function(e){
                e.preventDefault()
                console.log('eliminar')
                Swal.fire({
                    title: "Esta seguro de eliminar el libro?",
                    text: "Este libro será eliminado permanentemente!",
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
            })
            
        });
    </script>
@stop