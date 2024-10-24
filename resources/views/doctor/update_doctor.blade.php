<style>
    .select2-container {
        width: 100% !important;
    }
    .select2-selection {
        width: 100% !important;
    }
</style>
   <!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header" id="modal-header-css">
                <h5 class="modal-title" id="editModalLabel">Editar informaición del doctor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{-- el atributo action lo aplico con jquery  --}}
            <form id="editForm" method="post">
                @csrf
                @method('put')
                <div class="modal-body">
            
                    <div class="input-group mb-3" style="display:none">
                        <input type="text" name="user_id" id="user_id" class="form-control" placeholder="permiso-paciente" aria-label="id user" aria-describedby="basic-addon1" style="display:none" hidden>
                    </div>
                    <div class="sub-title">
                        <h6><strong>Ingresar datos personales</strong></h6>
                        <hr>
                    </div>

                    <div class="container-inputs d-flex">
                        <div class="input-group mb-3" style="display:none">
                            <input type="text" name="rol_doctor" class="form-control" placeholder="rol-doctor" aria-label="rol doctor" aria-describedby="basic-addon1" value="3" style="display:none" hidden>
                        </div>
                        <div class="input-group mb-3 mr-3">
                            <div class="input-group mb-3 d-block">
                                <label for="cedula_doctor" class="text-info">Cédula:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="number" name="cedula_doctor" id="cedula_doctor" class="form-control" placeholder="Cédula" aria-label="Cédula" aria-describedby="basic-addon1" value="{{ old('cedula_doctor') }}" readonly required>
                                </div>
                                {{-- <p>message error</p> --}}
                                @error('cedula_doctor') {{-- indicamos el nombre del campo --}}
                                    {{-- indicamos el mensaje de error  --}}
                                    <p style="color:red;">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="input-group mb-3 mr-3">
                            <div class="input-group mb-3 d-block">
                                <label for="nombre_doctor" class="text-info">Nombre completo:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" name="nombre_doctor" id="nombre_doctor" class="form-control" placeholder="Nombre completo" aria-label="Nombre completo" aria-describedby="basic-addon1" value="{{ old('nombre_doctor') }}">
                                </div>
                                {{-- <p>message error</p> --}}
                                @error('nombre_doctor') {{-- indicamos el nombre del campo --}}
                                    {{-- indicamos el mensaje de error  --}}
                                    <p style="color:red;">{{$message}}</p>
                                    @enderror
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group mb-3 d-block">
                                <label for="apellido_doctor" class="text-info">Apellido completo:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" name="apellido_doctor" id="apellido_doctor" class="form-control" placeholder="Apellido completo" aria-label="Apellido completo" aria-describedby="basic-addon1" value="{{ old('apellido_doctor') }}">
                                </div>
                                {{-- <p>message error</p> --}}
                                @error('apellido_doctor') {{-- indicamos el nombre del campo --}}
                                    {{-- indicamos el mensaje de error  --}}
                                    <p style="color:red;">{{$message}}</p>
                                    @enderror
                            </div>
                        </div>
                        
                    </div>
        
                    <div class="container-inputs d-flex">
                        <div class="input-group mb-3 mr-3">
                            <div class="input-group mb-3 d-block">
                                <label for="sexo_doctor" class="text-info">Sexo :</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" name="sexo_doctor" id="sexo_doctor" class="form-control" aria-label="sexo" aria-describedby="basic-addon1" readonly required>
                                </div>
                                {{-- <p>message error</p> --}}
                                @error('sexo_doctor') {{-- indicamos el nombre del campo --}}
                                    {{-- indicamos el mensaje de error  --}}
                                    <p style="color:red;">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            
                            <div class="input-group mb-3 d-block">
                                <label for="fecha_nacimiento_doctor" class="text-info">Fecha de nacimiento :</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-calendar"></i></span>
                                    </div>
                                    <input type="date" name="fecha_nacimiento_doctor" id="fecha_nacimiento_doctor" class="form-control"  aria-label="Fecha de nacimiento" aria-describedby="basic-addon1" value="{{ old('fecha_nacimiento_doctor') }}">
                                </div>
                                {{-- <p>message error</p> --}}
                                @error('fecha_nacimiento_doctor') {{-- indicamos el nombre del campo --}}
                                    {{-- indicamos el mensaje de error  --}}
                                    <p style="color:red;">{{$message}}</p>
                                    @enderror
                            </div>
                        </div>
                    </div>
                    {{-- CONTACTO doctor --}}
                    <div class="sub-title">
                        <h6><strong>Ingresar contacto</strong></h6>
                        <hr>
                    </div>
                    <div class="container-inputs d-flex">
                        <div class="input-group mb-3 mr-2">
                            <div class="input-group mb-3 d-block">
                                <label for="email_doctor" class="text-info">Correo electronico válido :</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope-open-text"></i></span>
                                    </div>
                                    <input type="email" name="email_doctor" id="email_doctor" class="form-control"  aria-label="email doctor" aria-describedby="basic-addon1" value="{{ old('email_doctor') }}">
                                </div>
                                {{-- <p>message error</p> --}}
                                @error('email_doctor') {{-- indicamos el nombre del campo --}}
                                    {{-- indicamos el mensaje de error  --}}
                                    <p style="color:red;">{{$message}}</p>
                                    @enderror
                            </div>
                        </div>
                        <div class="input-group mb-3 mr-2">
                            <div class="input-group mb-3 d-block">
                                <label for="tlf_doctor" class="text-info">Nro de teléfono :</label>
                                <div class="input-group mb-3 mr-2">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-phone"></i></span>
                                    </div>
                                    <input type="text" name="tlf_doctor" id="tlf_doctor" class="form-control"  aria-label="Primer teléfono doctor" aria-describedby="basic-addon1" value="{{ old('tlf_doctor') }}">
                                </div>
                                {{-- <p>message error</p> --}}
                                @error('tlf_doctor') {{-- indicamos el nombre del campo --}}
                                    {{-- indicamos el mensaje de error  --}}
                                    <p style="color:red;">{{$message}}</p>
                                    @enderror
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group mb-3 d-block">
                                <label for="tlf_second_doctor" class="text-info">Segundo nro de teléfono :</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-phone"></i></span>
                                    </div>
                                    <input type="text" name="tlf_second_doctor" id="tlf_second_doctor" class="form-control"  aria-label="Segundo teléfono" aria-describedby="basic-addon1" value="{{ old('tlf_second_doctor') }}">
                                </div>
                                {{-- <p>message error</p> --}}
                                @error('tlf_second_doctor') {{-- indicamos el nombre del campo --}}
                                    {{-- indicamos el mensaje de error  --}}
                                    <p style="color:red;">{{$message}}</p>
                                    @enderror
                            </div>
                        </div>
                    </div>
                
                    {{-- UBICACION doctor --}}
                    <div class="sub-title">
                        <h6><strong>Ingresar su ubicación</strong></h6>
                        <hr>
                    </div>
                    <div class="container-inputs d-flex">
                        <div class="input-group mb-3 mr-3">
                            <div class="input-group mb-3 d-block">
                                <label for="estado_doctores" class="text-info">Estado :</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" name="estado_doctores" id="estado_doctores" class="form-control" aria-label="sexo" aria-describedby="basic-addon1" readonly required>
                                </div>
                                {{-- <p>message error</p> --}}
                                @error('estado_doctores') {{-- indicamos el nombre del campo --}}
                                    {{-- indicamos el mensaje de error  --}}
                                    <p style="color:red;">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="input-group mb-3 mr-3">
                            <div class="input-group mb-3 d-block">
                                <label for="parroquia_doctores" class="text-info">Parroquia :</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" name="parroquia_doctores" id="parroquia_doctores" class="form-control" aria-label="sexo" aria-describedby="basic-addon1" readonly required>
                                </div>
                                {{-- <p>message error</p> --}}
                                @error('parroquia_doctores') {{-- indicamos el nombre del campo --}}
                                    {{-- indicamos el mensaje de error  --}}
                                    <p style="color:red;">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="input-group mb-3 mr-3">
                            <div class="input-group mb-3 d-block">
                                <label for="municipio_doctores" class="text-info">Municipio :</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" name="municipio_doctores" id="municipio_doctores" class="form-control" aria-label="sexo" aria-describedby="basic-addon1" readonly required>
                                </div>
                                {{-- <p>message error</p> --}}
                                @error('municipio_doctores') {{-- indicamos el nombre del campo --}}
                                    {{-- indicamos el mensaje de error  --}}
                                    <p style="color:red;">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        
                        
                        
                    </div>
        
                    {{-- INFORMACION PROFESIONAL --}}
                    <div class="sub-title">
                        <h6><strong>Ingresar información profesional</strong></h6>
                        <hr>
                    </div>
                    <div class="container-inputs d-flex">
                        <div class="input-group mb-3 mr-3">
                            <div class="input-group mb-3 d-block">
                                <label for="mpps_doctor" class="text-info">Mpps:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" name="mpps_doctor" id="mpps_doctor" class="form-control" placeholder="mpps del doctor" aria-label="mpps del doctor" aria-describedby="basic-addon1" value="{{ old('mpps_doctor') }}" readonly required>
                                </div>
                                {{-- <p>message error</p> --}}
                                @error('mpps_doctor') {{-- indicamos el nombre del campo --}}
                                    {{-- indicamos el mensaje de error  --}}
                                    <p style="color:red;">{{$message}}</p>
                                    @enderror
                            </div>
                        </div>
                    </div>
            
                </div>
    
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success">Guardar cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>


    {{-- script en el index --}}
