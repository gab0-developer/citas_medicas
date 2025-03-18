<style>
    .select2-container {
        width: 100% !important;
    }
    .select2-selection {
        width: 100% !important;
    }
    textarea{
        min-width: auto;
        max-width: auto;
        min-height: 150px;
        max-height: 300px;
    }
    .modal-header{
        /* text-align: center; */
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>
   <!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <center>
                <div class="modal-header" id="modal-header-css">
                    <h5 class="modal-title" id="editModalLabel">Editar estado del paciente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </center>
            {{-- el atributo action lo aplico con jquery  --}}
            <form id="editForm" method="post">
                @csrf
                @method('put')
                <div class="modal-body">
            
                    <div class="input-group mb-3" style="display:none">
                        <input type="text" name="paciente_id" id="paciente_id" class="form-control" placeholder="permiso-paciente" aria-label="id user" aria-describedby="basic-addon1" style="display:none" hidden>
                    </div>
                    <div class="sub-title">
                        <h6><strong class="text text-success">Información de la cita del paciente</strong></h6>
                        <hr>
                    </div>

                    <div class="container-inputs d-flex">
                        {{-- <div class="input-group mb-3" style="display:none">
                            <input type="text" name="paciente_id" id="paciente_id" class="form-control" placeholder="rol-doctor" aria-label="rol doctor" aria-describedby="basic-addon1" value="3" style="display:none" hidden>
                        </div> --}}
                        <div class="input-group mb-3 mr-3">
                            <div class="input-group mb-3 d-block">
                                <label for="nombre_cita" class="text-info">Tipo de cita:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" name="nombre_cita" id="nombre_cita" class="form-control" placeholder="Cédula" aria-label="Cédula" aria-describedby="basic-addon1" value="{{ old('nombre_cita') }}" readonly>
                                </div>
                                {{-- <p>message error</p> --}}
                                @error('nombre_cita') {{-- indicamos el nombre del campo --}}
                                    {{-- indicamos el mensaje de error  --}}
                                    <p style="color:red;">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        
                    </div>
        
                    <div class="container-inputs d-flex">
                        {{-- <div class="input-group mb-3" style="display:none">
                            <input type="text" name="rol_doctor" class="form-control" placeholder="rol-doctor" aria-label="rol doctor" aria-describedby="basic-addon1" value="3" style="display:none" hidden>
                        </div> --}}
                        <div class="input-group mb-3 mr-3">
                            <div class="input-group mb-3 d-block">
                                <label for="fecha_cita" class="text-info">Fecha de la cita:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="date" name="fecha_cita" id="fecha_cita" class="form-control" placeholder="Cédula" aria-label="Cédula" aria-describedby="basic-addon1" value="{{ old('fecha_cita') }}" readonly>
                                </div>
                                {{-- <p>message error</p> --}}
                                @error('fecha_cita') {{-- indicamos el nombre del campo --}}
                                    {{-- indicamos el mensaje de error  --}}
                                    <p style="color:red;">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="input-group mb-3 mr-3">
                            <div class="input-group mb-3 d-block">
                                <label for="hora_cita" class="text-info">Hora de la cita:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" name="hora_cita" id="hora_cita" class="form-control" placeholder="Nombre completo" aria-label="Nombre completo" aria-describedby="basic-addon1" value="{{ old('hora_cita') }}" readonly>
                                </div>
                                {{-- <p>message error</p> --}}
                                @error('hora_cita') {{-- indicamos el nombre del campo --}}
                                    {{-- indicamos el mensaje de error  --}}
                                    <p style="color:red;">{{$message}}</p>
                                    @enderror
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group mb-3 d-block">
                                <label for="paciente" class="text-info">Paciente:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" name="paciente" id="paciente" class="form-control" placeholder="Apellido completo" aria-label="Apellido completo" aria-describedby="basic-addon1" value="{{ old('paciente') }}" readonly>
                                </div>
                                {{-- <p>message error</p> --}}
                                @error('paciente') {{-- indicamos el nombre del campo --}}
                                    {{-- indicamos el mensaje de error  --}}
                                    <p style="color:red;">{{$message}}</p>
                                    @enderror
                            </div>
                        </div>
                        
                    </div>
        
                    <div class="container-inputs d-flex">
                        <div class="input-group mb-3 mr-3">
                            <div class="input-group mb-3 d-block">
                                <label for="estatus_cita" class="text-info">Estado de la cita:</label>
                                <div class="input-group">
                                    {{-- AIGNANDO VALOR CON JQUERY DEL INDEX --}}
                                    <select class="form-control" name="estatus_cita" id="estatus_cita" readonly>
                                        
                                    </select>
                                </div>
                                {{-- <p>message error</p> --}}
                                <div id="mesagge_delete_cita" style="display: none">
                                    <p class="text text-danger"><strong>La cita será eliminada por la ausencia del paciente</strong></p>
                                </div>
                                @error('estatus_cita') {{-- indicamos el nombre del campo --}}
                                    {{-- indicamos el mensaje de error  --}}
                                    <p style="color:red;">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        
                    </div>
                    <div class="container-inputs d-flex">
                        <div class="input-group mb-3">
                            <div class="input-group mb-3 d-block">
                                <label for="observacion_cita" class="text-info">Observación :</label>
                                <div class="input-group">
                                    <textarea class="form-control observacion_cita" name="observacion_cita" id="observacion_cita" rows="3"></textarea>
                                </div>
                                {{-- <p>message error</p> --}}
                                @error('observacion_cita') {{-- indicamos el nombre del campo --}}
                                    {{-- indicamos el mensaje de error  --}}
                                    <p style="color:red;">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        
                    </div>
            
                </div>
    
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success">Guardar cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>


    {{-- script en el index --}}
