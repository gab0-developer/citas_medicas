<style>
    .select2-container {
        width: 100% !important;
    }
    .select2-selection {
        width: 100% !important;
    }
</style>
   <!-- Modal -->
<div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="detailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header" id="modal-header-css">
                <h5 class="modal-title" id="detailsModalLabel">Más información</h5>
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
                        <input type="text" name="user_id_show" id="user_id_show" class="form-control" placeholder="permiso-paciente" aria-label="id user" aria-describedby="basic-addon1" style="display:none" hidden>
                    </div>
                    <div class="sub-title">
                        <h6><strong>Datos personales</strong></h6>
                        <hr>
                    </div>

                    <div class="container-inputs d-flex">
                        <div class="input-group mb-3" style="display:none">
                            <input type="text" name="rol_useradmin" class="form-control" placeholder="rol-useradmin" aria-label="rol useradmin" aria-describedby="basic-addon1" value="3" style="display:none" hidden>
                        </div>
                        <div class="input-group mb-3 mr-3">
                            <div class="input-group mb-3 d-block">
                                <label for="cedula_useradmin_show" class="text-info">Cédula:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="number" name="cedula_useradmin_show" id="cedula_useradmin_show" class="form-control" placeholder="Cédula" aria-label="Cédula" aria-describedby="basic-addon1" value="{{ old('cedula_useradmin_show') }}" readonly>
                                </div>
                                {{-- <p>message error</p> --}}
                                @error('cedula_useradmin_show') {{-- indicamos el nombre del campo --}}
                                    {{-- indicamos el mensaje de error  --}}
                                    <p style="color:red;">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="input-group mb-3 mr-3">
                            <div class="input-group mb-3 d-block">
                                <label for="nombre_useradmin_show" class="text-info">Nombre completo:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" name="nombre_useradmin_show" id="nombre_useradmin_show" class="form-control" placeholder="Nombre completo" aria-label="Nombre completo" aria-describedby="basic-addon1" value="{{ old('nombre_useradmin_show') }}" readonly>
                                </div>
                                {{-- <p>message error</p> --}}
                                @error('nombre_useradmin_show') {{-- indicamos el nombre del campo --}}
                                    {{-- indicamos el mensaje de error  --}}
                                    <p style="color:red;">{{$message}}</p>
                                    @enderror
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group mb-3 d-block">
                                <label for="apellido_useradmin_show" class="text-info">Apellido completo:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" name="apellido_useradmin_show" id="apellido_useradmin_show" class="form-control" placeholder="Apellido completo" aria-label="Apellido completo" aria-describedby="basic-addon1" value="{{ old('apellido_useradmin_show') }}" readonly>
                                </div>
                                {{-- <p>message error</p> --}}
                                @error('apellido_useradmin_show') {{-- indicamos el nombre del campo --}}
                                    {{-- indicamos el mensaje de error  --}}
                                    <p style="color:red;">{{$message}}</p>
                                    @enderror
                            </div>
                        </div>
                        
                    </div>
        
                    <div class="container-inputs d-flex">
                        <div class="input-group mb-3 mr-3">
                            <div class="input-group mb-3 d-block">
                                <label for="sexo_useradmin_show" class="text-info">Sexo :</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" name="sexo_useradmin_show" id="sexo_useradmin_show" class="form-control" aria-label="sexo" aria-describedby="basic-addon1" readonly>
                                </div>
                                {{-- <p>message error</p> --}}
                                @error('sexo_useradmin_show') {{-- indicamos el nombre del campo --}}
                                    {{-- indicamos el mensaje de error  --}}
                                    <p style="color:red;">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            
                            <div class="input-group mb-3 d-block">
                                <label for="fecha_nacimiento_useradmin_show" class="text-info">Fecha de nacimiento :</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-calendar"></i></span>
                                    </div>
                                    <input type="date" name="fecha_nacimiento_useradmin_show" id="fecha_nacimiento_useradmin_show" class="form-control"  aria-label="Fecha de nacimiento" aria-describedby="basic-addon1" value="{{ old('fecha_nacimiento_useradmin_show') }}" readonly>
                                </div>
                                {{-- <p>message error</p> --}}
                                @error('fecha_nacimiento_useradmin_show') {{-- indicamos el nombre del campo --}}
                                    {{-- indicamos el mensaje de error  --}}
                                    <p style="color:red;">{{$message}}</p>
                                    @enderror
                            </div>
                        </div>
                    </div>
                    {{-- CONTACTO useradmin --}}
                    <div class="sub-title">
                        <h6><strong>Su contacto</strong></h6>
                        <hr>
                    </div>
                    <div class="container-inputs d-flex">
                        <div class="input-group mb-3 mr-2">
                            <div class="input-group mb-3 d-block">
                                <label for="email_useradmin_show" class="text-info">Correo electronico válido :</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope-open-text"></i></span>
                                    </div>
                                    <input type="email" name="email_useradmin_show" id="email_useradmin_show" class="form-control"  aria-label="email useradmin" aria-describedby="basic-addon1" value="{{ old('email_useradmin_show') }}" readonly>
                                </div>
                                {{-- <p>message error</p> --}}
                                @error('email_useradmin_show') {{-- indicamos el nombre del campo --}}
                                    {{-- indicamos el mensaje de error  --}}
                                    <p style="color:red;">{{$message}}</p>
                                    @enderror
                            </div>
                        </div>
                        <div class="input-group mb-3 mr-2">
                            <div class="input-group mb-3 d-block">
                                <label for="tlf_useradmin_show" class="text-info">Nro de teléfono :</label>
                                <div class="input-group mb-3 mr-2">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-phone"></i></span>
                                    </div>
                                    <input type="text" name="tlf_useradmin_show" id="tlf_useradmin_show" class="form-control"  aria-label="Primer teléfono useradmin" aria-describedby="basic-addon1" value="{{ old('tlf_useradmin_show') }}" readonly>
                                </div>
                                {{-- <p>message error</p> --}}
                                @error('tlf_useradmin_show') {{-- indicamos el nombre del campo --}}
                                    {{-- indicamos el mensaje de error  --}}
                                    <p style="color:red;">{{$message}}</p>
                                    @enderror
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group mb-3 d-block">
                                <label for="tlf_second_useradmin_show" class="text-info">Segundo nro de teléfono :</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-phone"></i></span>
                                    </div>
                                    <input type="text" name="tlf_second_useradmin_show" id="tlf_second_useradmin_show" class="form-control"  aria-label="Segundo teléfono" aria-describedby="basic-addon1" value="{{ old('tlf_second_useradmin_show') }}" readonly>
                                </div>
                                {{-- <p>message error</p> --}}
                                @error('tlf_second_useradmin_show') {{-- indicamos el nombre del campo --}}
                                    {{-- indicamos el mensaje de error  --}}
                                    <p style="color:red;">{{$message}}</p>
                                    @enderror
                            </div>
                        </div>
                    </div>
                
                    {{-- UBICACION useradmin --}}
                    <div class="sub-title">
                        <h6><strong>Su ubicación</strong></h6>
                        <hr>
                    </div>
                    <div class="container-inputs d-flex">
                        <div class="input-group mb-3 mr-3">
                            <div class="input-group mb-3 d-block">
                                <label for="estado_useradmin_show" class="text-info">Estado :</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" name="estado_useradmin_show" id="estado_useradmin_show" class="form-control" aria-label="sexo" aria-describedby="basic-addon1" readonly>
                                </div>
                                {{-- <p>message error</p> --}}
                                @error('estado_useradmin_show') {{-- indicamos el nombre del campo --}}
                                    {{-- indicamos el mensaje de error  --}}
                                    <p style="color:red;">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="input-group mb-3 mr-3">
                            <div class="input-group mb-3 d-block">
                                <label for="parroquia_useradmin_show" class="text-info">Parroquia :</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" name="parroquia_useradmin_show" id="parroquia_useradmin_show" class="form-control" aria-label="sexo" aria-describedby="basic-addon1" readonly>
                                </div>
                                {{-- <p>message error</p> --}}
                                @error('parroquia_useradmin_show') {{-- indicamos el nombre del campo --}}
                                    {{-- indicamos el mensaje de error  --}}
                                    <p style="color:red;">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="input-group mb-3 mr-3">
                            <div class="input-group mb-3 d-block">
                                <label for="municipio_useradmin_show" class="text-info">Municipio :</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" name="municipio_useradmin_show" id="municipio_useradmin_show" class="form-control" aria-label="sexo" aria-describedby="basic-addon1" readonly>
                                </div>
                                {{-- <p>message error</p> --}}
                                @error('municipio_useradmin_show') {{-- indicamos el nombre del campo --}}
                                    {{-- indicamos el mensaje de error  --}}
                                    <p style="color:red;">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        
                        
                        
                    </div>
    
            
                </div>
    
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>


    {{-- script en el index --}}
