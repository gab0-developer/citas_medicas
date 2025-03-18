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
                <h5 class="modal-title" id="editModalLabel">Editar informaición del administrador</h5>
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
                        <h6><strong>Editar datos personales</strong></h6>
                        <hr>
                    </div>

                    <div class="container-inputs d-flex">
                        <div class="input-group mb-3" style="display:none">
                            <input type="text" name="rol_useradmin" class="form-control" placeholder="rol-useradmin" aria-label="rol useradmin" aria-describedby="basic-addon1" value="1" style="display:none" hidden>
                        </div>
                        <div class="input-group mb-3 mr-3">
                            <div class="input-group mb-3 d-block">
                                <label for="cedula_useradmin" class="text-info">Cédula:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="number" name="cedula_useradmin" id="cedula_useradmin" class="form-control" placeholder="Cédula" aria-label="Cédula" aria-describedby="basic-addon1" value="{{ old('cedula_useradmin') }}" readonly required>
                                </div>
                                {{-- <p>message error</p> --}}
                                @error('cedula_useradmin') {{-- indicamos el nombre del campo --}}
                                    {{-- indicamos el mensaje de error  --}}
                                    <p style="color:red;">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="input-group mb-3 mr-3">
                            <div class="input-group mb-3 d-block">
                                <label for="nombre_useradmin" class="text-info">Nombre completo:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" name="nombre_useradmin" id="nombre_useradmin" class="form-control" placeholder="Nombre completo" aria-label="Nombre completo" aria-describedby="basic-addon1" value="{{ old('nombre_useradmin') }}">
                                </div>
                                {{-- <p>message error</p> --}}
                                @error('nombre_useradmin') {{-- indicamos el nombre del campo --}}
                                    {{-- indicamos el mensaje de error  --}}
                                    <p style="color:red;">{{$message}}</p>
                                    @enderror
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group mb-3 d-block">
                                <label for="apellido_useradmin" class="text-info">Apellido completo:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" name="apellido_useradmin" id="apellido_useradmin" class="form-control" placeholder="Apellido completo" aria-label="Apellido completo" aria-describedby="basic-addon1" value="{{ old('apellido_useradmin') }}">
                                </div>
                                {{-- <p>message error</p> --}}
                                @error('apellido_useradmin') {{-- indicamos el nombre del campo --}}
                                    {{-- indicamos el mensaje de error  --}}
                                    <p style="color:red;">{{$message}}</p>
                                    @enderror
                            </div>
                        </div>
                        
                    </div>
                    {{-- CONTACTO useradmin --}}
                    <div class="sub-title">
                        <h6><strong>Editar contacto</strong></h6>
                        <hr>
                    </div>
                    <div class="container-inputs d-flex">
                        <div class="input-group mb-3 mr-2">
                            <div class="input-group mb-3 d-block">
                                <label for="tlf_useradmin" class="text-info">Nro de teléfono :</label>
                                <div class="input-group mb-3 mr-2">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-phone"></i></span>
                                    </div>
                                    <input type="text" name="tlf_useradmin" id="tlf_useradmin" class="form-control"  aria-label="Primer teléfono useradmin" aria-describedby="basic-addon1" value="{{ old('tlf_useradmin') }}">
                                </div>
                                {{-- <p>message error</p> --}}
                                @error('tlf_useradmin') {{-- indicamos el nombre del campo --}}
                                    {{-- indicamos el mensaje de error  --}}
                                    <p style="color:red;">{{$message}}</p>
                                    @enderror
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group mb-3 d-block">
                                <label for="tlf_second_useradmin" class="text-info">Segundo nro de teléfono :</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-phone"></i></span>
                                    </div>
                                    <input type="text" name="tlf_second_useradmin" id="tlf_second_useradmin" class="form-control"  aria-label="Segundo teléfono" aria-describedby="basic-addon1" value="{{ old('tlf_second_useradmin') }}">
                                </div>
                                {{-- <p>message error</p> --}}
                                @error('tlf_second_useradmin') {{-- indicamos el nombre del campo --}}
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
