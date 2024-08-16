@extends('adminlte::page')

@section('title', 'Gestión de doctores')

@section('content_header')
    <h1>Administración de doctores</h1>
@stop

@section('content')

    <div>
        @include('doctor.register_doctor')
    </div>
    
    {{-- CITAS REALIZADAS --}}

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
                'ESPECIALIDAD',
                'MPPS',
                'CORREO',
                'SEXO',
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
                @foreach($data_doctores_view as $doctor)
                    <tr>
                        <td>{{$doctor->nombre_completo}}</td>
                        <td>{{$doctor->apellido_completo}}</td>
                        <td>{{$doctor->especialidad}}</td>
                        <td>{{$doctor->mpps}}</td>
                        <td>{{$doctor->correo}}</td>
                        <td>{{$doctor->sexo}}</td>
                        <td class="d-flex"> 
                            
                            {{-- data-url: Permite mantener la URL asociada con cada botón --}}
                            <button class="btn btn-xs btn-default text-primary shadow btn-edit" 
                                
                                data-url="{{ route('doctor.edit', $doctor->id_ciudadano) }}" 
                                data-update="{{ route('doctor.update', $doctor->id_ciudadano) }}" 
                                title="Edit">
                                <i class="fa fa-lg fa-fw fa-pen"></i>
                            </button>
                            
                            <form action="{{route('doctor.destroy',$doctor->id_ciudadano)}}" method="post" class="form_eliminater">
                                @csrf
                                @method('delete')
                                {!! $btnDelete !!}
                            </form>

                            <button class="btn btn-xs btn-default text-primary shadow btn-details" 
                                
                                data-url="{{ route('doctor.show', $doctor->id_ciudadano) }}" 
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
        @include('doctor.update_doctor')
        @include('doctor.show_doctor')
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
            // color clasico en select multiple
            $('.js-example-basic-multiple').select2({
                theme: "classic"
            });
            // ---------EVENTO BOTON DE EDITAR--------------------------
            $('.btn-edit').on('click', function(event) {
                event.preventDefault();
                var url = $(this).data('url');
                var update = $(this).data('update');
    
                // Realiza una solicitud AJAX para obtener los datos del rol
                $.get(url, function(data) {
                    let data_doctor = data.data_doctor[0]; // Array de todos los datos del doctor disponibles

                    $('#cedula_doctor').val(data_doctor.cedula);
                    $('#nombre_doctor').val(data_doctor.nombre_completo);
                    $('#apellido_doctor').val(data_doctor.apellido_completo);
                    $('#sexo_doctor').val(data_doctor.sexo);
                    $('#fecha_nacimiento_doctor').val(data_doctor.fecha_nacimiento);
                    $('#email_doctor').val(data_doctor.correo);
                    $('#tlf_doctor').val(data_doctor.nro_telefono);
                    $('#tlf_second_doctor').val(data_doctor.nro_tlf_secundario);
                    $('#estado_doctores').val(data_doctor.estados);
                    $('#municipio_doctores').val(data_doctor.municipios);
                    $('#parroquia_doctores').val(data_doctor.parroquias);
                    $('#mpps_doctor').val(data_doctor.mpps);
                    $('#especialidad_doctor').val(data_doctor.especialidad);
                    $('#user_id').val(data_doctor.user_id);
                    
                    // Establece la acción del formulario al URL para la actualización
                    $('#editForm').attr('action', update); 

                    // Muestra el modal
                    $('#editModal').modal('show'); 
                });
            });

            // ELIMIMNAR DOCTOR
            $('.form_eliminater').submit(function(e){
                e.preventDefault();
                Swal.fire({
                    title: "Esta seguro de eliminar el doctor?",
                    text: "Este doctor será eliminado permanentemente!",
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
                    let data_doctor = data.data_doctor[0]; // Array de todos los datos del doctor disponibles
                    console.log(data_doctor.cedula)
                    $('#cedula_doctor_show').val(data_doctor.cedula);
                    $('#nombre_doctor_show').val(data_doctor.nombre_completo);
                    $('#apellido_doctor_show').val(data_doctor.apellido_completo);
                    $('#sexo_doctor_show').val(data_doctor.sexo);
                    $('#fecha_nacimiento_doctor_show').val(data_doctor.fecha_nacimiento);
                    $('#email_doctor_show').val(data_doctor.correo);
                    $('#tlf_doctor_show').val(data_doctor.nro_telefono);
                    $('#tlf_second_doctor_show').val(data_doctor.nro_tlf_secundario);
                    $('#estado_doctores_show').val(data_doctor.estados);
                    $('#municipio_doctores_show').val(data_doctor.municipios);
                    $('#parroquia_doctores_show').val(data_doctor.parroquias);
                    $('#mpps_doctor_show').val(data_doctor.mpps);
                    $('#especialidad_doctor_show').val(data_doctor.especialidad);
                    $('#user_id_show').val(data_doctor.user_id);
                    
                    

                    // Muestra el modal
                    $('#detailsModal').modal('show'); 
                });
            });

        })
    </script>
    
    
@stop