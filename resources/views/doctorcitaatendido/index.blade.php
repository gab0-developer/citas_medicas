@extends('adminlte::page')

@section('title', 'Citas medicas atendidas')

@section('content_header')
    <h1>Gestión de citas medicas atendidas</h1>
@stop

@section('content')

    {{-- <div>
        @include('doctor.register_doctor')
    </div> --}}

    {{-- CITAS REALIZADAS --}}
    <div class="btn-cita-pendientes my-2">
        <button class="btn btn-danger"><a href="{{route('doctorcitapendiente.index')}}" class="text text-white">Ver citas pendientes</a></button>
    </div>
    <div class="card">
        <div class="card-body">
            {{-- <div class="mb-3">
                <button class="btn btn-primary text-white"><a href="{{route('roles.create')}}" class="text-white" >Nuevo rol</a></button>
            </div> --}}
            {{-- Setup data for datatables --}}
            @php
            $heads = [
                'NOMBRE DE CITA',
                'PACIENTE',
                'FECHA DE LA CITA',
                'JORA DE ATENCION',
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
                @foreach($citasmedicas_view as $citamedica)
                    <tr>
                        <td>{{$citamedica->nombre_cita	}}</td>
                        <td>{{$citamedica->paciente}}</td>
                        <td>{{$citamedica->fecha_cita}}</td>
                        <td>{{$citamedica->hora_cita}}</td>
                        @if ($citamedica->estatu == 'PENDIENTE')
                            <td class="text text-danger">{{$citamedica->estatu}}</td>
                            @elseif ($citamedica->estatu == 'AUSENTE')
                                <td style="color: orangered">{{$citamedica->estatu}}</td>
                            @else
                            <td class="text text-success">{{$citamedica->estatu}}</td>
                        @endif
                        <td class="d-flex"> 
                            
                            {{-- data-url: Permite mantener la URL asociada con cada botón --}}
                            <button class="btn btn-xs btn-default text-primary shadow btn-edit" 
                            
                                data-target="#editModal-modal-xl"
                                data-url="{{ route('doctorcitaatendido.edit', $citamedica->id) }}" 
                                data-update="{{ route('doctorcitaatendido.update', $citamedica->id) }}" >
                                <i class="fa fa-lg fa-fw fa-pen"></i>
                                
                            </button> 

                            {{-- <button class="btn btn-xs btn-default text-primary shadow btn-details" 
=======
                            <form action="{{route('doctor.destroy',$doctor->id_ciudadano)}}" method="post" class="form_eliminater">
                                @csrf
                                @method('delete')
                                {!! $btnDelete !!}
                            </form>

                            <button class="btn btn-xs btn-default text-primary shadow btn-details" 
                                
                                data-url="{{ route('doctor.show', $doctor->id_ciudadano) }}" 
                                title="Details">
                                <i class="fa fa-lg fa-fw fa-eye"></i>
                            </button> --}}
                            {{-- {!! $btnDetails !!} --}}
                            {{-- {{$client->id}} --}}
                        </td>
                    </tr>
                @endforeach
            </x-adminlte-datatable>
        </div>
    </div>

    <div>
        @include('doctorcitaatendido.update_estatus')
        {{-- @include('doctor.show_doctor') --}}
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

            $('#estatus_cita').on('change', function(event){
                console.log('evento change',event.target.value)
                if (event.target.value == "3") {
                    $('#mesagge_delete_cita').show()
                    console.log('La cita eliminada ')
                }else{
                    $('#mesagge_delete_cita').hide()
                    console.log('La cita no eliminada')
                }
            })
            // ---------EVENTO BOTON DE EDITAR--------------------------
            $('.btn-edit').on('click', function(event) {
                event.preventDefault();
                var url = $(this).data('url');
                var update = $(this).data('update');
                // console.log('update',update)
    
                // Realiza una solicitud AJAX para obtener los datos del rol
                $.get(url, function(data) {
                    let data_cita = data.data_cita[0]; // Array de todos los datos del doctor disponibles
                    let estatus = data.estatus; // Array de todos los estatus
                    console.log('data_cita: ',data_cita)
                    
                    $('#nombre_cita').val(data_cita.nombre_cita);
                    $('#fecha_cita').val(data_cita.fecha_cita);
                    $('#hora_cita').val(data_cita.hora_cita);
                    $('#paciente').val(data_cita.paciente);
                    $('#paciente_id').val(data_cita.paciente_id);

                    let estatusActual = data_cita.estatu_id;
        
                    function updateSelectOptions() {
                        // Limpiar las opciones existentes
                        $('#estatus_cita').empty();

                        // Agregar nuevas opciones
                        estatus.forEach(element => {
                            $('#estatus_cita').append(
                                $('<option>').val(element.id).text(element.estatu)
                            );
                        });

                        // Seleccionar el valor 2
                        $('#estatus_cita').val(estatusActual);
                    }

                    // Llamar a la función para actualizar las opciones
                    updateSelectOptions();

                    

                    let observacion_cita = $('.observacion_cita').val()
                    if (observacion_cita.length  < 0 || observacion_cita.length == 0 || observacion_cita == null) {
                        $('#observacion_cita').val('NINGUNA OBSERVACIÓN POR EL MOMENTO')
                    }else{
                        $('#observacion_cita').val(data_cita.observacion)
                        
                    }
                        
                    // Establece la acción del formulario al URL para la actualización
                    $('#editForm').attr('action', update); 

                    // Muestra el modal
                    $('#editModal').modal('show'); 
                });
            });

            // ELIMIMNAR DOCTOR
            // $('.form_eliminater').submit(function(e){
            //     e.preventDefault();
            //     Swal.fire({
            //         title: "Esta seguro de eliminar el doctor?",
            //         text: "Este doctor será eliminado permanentemente!",
            //         icon: "warning",
            //         showCancelButton: true,
            //         confirmButtonColor: "#3085d6",
            //         cancelButtonColor: "#d33",
            //         confirmButtonText: "Si, eliminar!"
            //         }).then((result) => {
            //         if (result.isConfirmed) {
            //             this.submit();
            //         }
            //     });
            // });
            // ---------EVENTO BOTON DE EDITAR--------------------------
            // $('.btn-details').on('click', function(event) {
            //     event.preventDefault();
            //     var url = $(this).data('url');
    
            //     // Realiza una solicitud AJAX para obtener los datos del rol
            //     $.get(url, function(data) {
            //         let data_doctor = data.data_doctor[0]; // Array de todos los datos del doctor disponibles
            //         console.log(data_doctor.cedula)
            //         $('#cedula_doctor_show').val(data_doctor.cedula);
            //         $('#nombre_doctor_show').val(data_doctor.nombre_completo);
            //         $('#apellido_doctor_show').val(data_doctor.apellido_completo);
            //         $('#sexo_doctor_show').val(data_doctor.sexo);
            //         $('#fecha_nacimiento_doctor_show').val(data_doctor.fecha_nacimiento);
            //         $('#email_doctor_show').val(data_doctor.correo);
            //         $('#tlf_doctor_show').val(data_doctor.nro_telefono);
            //         $('#tlf_second_doctor_show').val(data_doctor.nro_tlf_secundario);
            //         $('#estado_doctores_show').val(data_doctor.estados);
            //         $('#municipio_doctores_show').val(data_doctor.municipios);
            //         $('#parroquia_doctores_show').val(data_doctor.parroquias);
            //         $('#mpps_doctor_show').val(data_doctor.mpps);
            //         $('#especialidad_doctor_show').val(data_doctor.especialidad);
            //         $('#user_id_show').val(data_doctor.user_id);
                    
                    

            //         // Muestra el modal
            //         $('#detailsModal').modal('show'); 
            //     });
            // });

        })
    </script>
    
    
@stop