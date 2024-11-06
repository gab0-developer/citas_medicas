 <!-- Button trigger modal -->
 <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#staticBackdrop-modal-xl">
    Registrar administrador
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop-modal-xl" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header" id="modal-header-css">
            <h5 class="modal-title" id="staticBackdropLabel">Registrar Nuevo administrador</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>                  
        </div>
        <form action="{{route('administrador.store')}}" method="post" class="w-100">
            @csrf
            
            <div class="modal-body">
                
                <div class="sub-title">
                    <h6><strong>Ingresar datos personales</strong></h6>
                    <hr>
                </div>
                <div class="container-inputs d-flex">
                    <div class="input-group mb-3" style="display:none">
                        <input type="text" name="rol_useradmin" class="form-control" placeholder="rol-useradmin" aria-label="rol useradmin" aria-describedby="basic-addon1" value="1" style="display:none" hidden>
                    </div>
                    <div class="input-group mb-3 mr-3">
                        <div class="input-group mb-3 d-block">
                            <label for="cedula_useradmin" class="text-info">Ingresar cédula</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="number" name="cedula_useradmin" class="form-control" placeholder="Cédula" aria-label="Cédula" aria-describedby="basic-addon1" value="{{ old('cedula_useradmin') }}">
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
                            <label for="nombre_useradmin" class="text-info">Ingresar nombre completo</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" name="nombre_useradmin" class="form-control" placeholder="Nombre completo" aria-label="Nombre completo" aria-describedby="basic-addon1" value="{{ old('nombre_useradmin') }}">
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
                            <label for="apellido_useradmin" class="text-info">Ingresar apellido completo</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" name="apellido_useradmin" class="form-control" placeholder="Apellido completo" aria-label="Apellido completo" aria-describedby="basic-addon1" value="{{ old('apellido_useradmin') }}">
                            </div>
                            {{-- <p>message error</p> --}}
                            @error('apellido_useradmin') {{-- indicamos el nombre del campo --}}
                                {{-- indicamos el mensaje de error  --}}
                                <p style="color:red;">{{$message}}</p>
                                @enderror
                        </div>
                    </div>
                    
                </div>
    
                <div class="container-inputs d-flex">
                    <div class="input-group mb-3 mr-3">
                        <div class="input-group mb-3 d-block">
                            <label for="sexo_useradmin" class="text-info">Ingresar sexo</label>
                            <div class="form-group w-100">
                                <select class="form-control form-select " name="sexo_useradmin" id="sexo" value="{{ old('sexo_useradmin') }}">
                                  <option readonly >Seleccionar sexo</option>
                                  <option value="M">Masculino</option>
                                  <option value="F">Femenino</option>
                                 
                                </select>
                                {{-- <p>message error</p> --}}
                                @error('sexo_useradmin') {{-- indicamos el nombre del campo --}}
                                {{-- indicamos el mensaje de error  --}}
                                <p style="color:red;">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group mb-3 d-block">
                            <label for="fecha_nacimiento_useradmin" class="text-info">Ingresar fecha de nacimiento</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-calendar"></i></span>
                                </div>
                                <input type="date" name="fecha_nacimiento_useradmin" class="form-control"  aria-label="Fecha de nacimiento" aria-describedby="basic-addon1" value="{{ old('fecha_nacimiento_useradmin') }}">
                            </div>
                            {{-- <p>message error</p> --}}
                            @error('fecha_nacimiento_useradmin') {{-- indicamos el nombre del campo --}}
                                {{-- indicamos el mensaje de error  --}}
                                <p style="color:red;">{{$message}}</p>
                                @enderror
                        </div>
                    </div>
                </div>
                {{-- CONTACTO useradmin --}}
                <div class="sub-title">
                    <h6><strong>Ingresar contacto</strong></h6>
                    <hr>
                </div>
                <div class="container-inputs d-flex">
                    <div class="input-group mb-3 mr-2">
                        <div class="input-group mb-3 d-block">
                            <label for="email_useradmin" class="text-info">Ingresar correo electronico válido</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope-open-text"></i></span>
                                </div>
                                <input type="email" name="email_useradmin" class="form-control"  aria-label="email useradmin" aria-describedby="basic-addon1" value="{{ old('email_useradmin') }}">
                            </div>
                            {{-- <p>message error</p> --}}
                            @error('email_useradmin') {{-- indicamos el nombre del campo --}}
                                {{-- indicamos el mensaje de error  --}}
                                <p style="color:red;">{{$message}}</p>
                                @enderror
                        </div>
                    </div>
                    <div class="input-group mb-3 mr-2">
                        <div class="input-group mb-3 d-block">
                            <label for="tlf_useradmin" class="text-info">Ingresar nro de teléfono</label>
                            <div class="input-group mb-3 mr-2">
                                <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-phone"></i></span>
                                </div>
                                <input type="text" name="tlf_useradmin" class="form-control"  aria-label="Primer teléfono useradmin" aria-describedby="basic-addon1" value="{{ old('tlf_useradmin') }}">
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
                            <label for="tlf_second_useradmin" class="text-info">Ingresar segundo nro de teléfono</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-phone"></i></span>
                                </div>
                                <input type="text" name="tlf_second_useradmin" class="form-control"  aria-label="Segundo teléfono" aria-describedby="basic-addon1" value="{{ old('tlf_second_useradmin') }}">
                            </div>
                            {{-- <p>message error</p> --}}
                            @error('tlf_second_useradmin') {{-- indicamos el nombre del campo --}}
                                {{-- indicamos el mensaje de error  --}}
                                <p style="color:red;">{{$message}}</p>
                                @enderror
                        </div>
                    </div>
                </div>
            
                {{-- UBICACION useradmin --}}
                <div class="sub-title">
                    <h6><strong>Ingresar su ubicación</strong></h6>
                    <hr>
                </div>
                <div class="container-inputs d-flex">
                    <div class="input-group mb-3 mr-3">
                        <div class="input-group mb-3 d-block">
                            <label for="estado_useradmin" class="text-info">Ingresar estado</label>
                            <div class="form-group w-100">
                                <select class="form-control" name="estado_useradmin" id="estado_useradmin" value="{{ old('estado_useradmin') }}">
                                    <option selected disabled>Seleccionar estado</option>
                                    @foreach ($estados as $estado)
                                        <option value={{$estado->id}}>{{$estado->estados}}</option>
                                        
                                    @endforeach
                                    
                                </select>
                                {{-- <p>message error</p> --}}
                                @error('estado_useradmin') {{-- indicamos el nombre del campo --}}
                                {{-- indicamos el mensaje de error  --}}
                                <p style="color:red;">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3 mr-3">
                        <div class="input-group mb-3 d-block">
                            <label for="municipio_useradmin" class="text-info">Ingresar municipio</label>
                            <div class="form-group w-100">
                                <select class="form-control" name="municipio_useradmin" id="municipio_useradmin" value="{{ old('municipio_useradmin') }}">
                                    
                                </select>
                                {{-- <p>message error</p> --}}
                                @error('municipio_useradmin') {{-- indicamos el nombre del campo --}}
                                {{-- indicamos el mensaje de error  --}}
                                <p style="color:red;">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3 mr-3">
                        <div class="input-group mb-3 d-block">
                            <label for="parroquia_useradmin" class="text-info">Ingresar parroquia</label>
                            <div class="form-group w-100">
                                <select class="form-control" name="parroquia_useradmin" id="parroquia_useradmin" value="{{ old('parroquia_useradmin') }}">
            
                                </select>
                                {{-- <p>message error</p> --}}
                                @error('parroquia_useradmin') {{-- indicamos el nombre del campo --}}
                                {{-- indicamos el mensaje de error  --}}
                                <p style="color:red;">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                   
                </div>
    
                {{-- CONTACTO useradmin --}}
                <div class="sub-title">
                    <h6><strong>Ingresar su contraseña temporal</strong></h6>
                    <hr>
                </div>
                <div class="container-inputs d-flex">
                    <div class="input-group mb-3 mr-2">
                        <div class="input-group mb-3 d-block">
                            <label for="password" class="text-info">Ingresar contraseña</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-unlock-alt"></i></span>
                                </div>
                                <input type="password" name="password" class="form-control"  aria-label="contraseña useradmin" aria-describedby="basic-addon1" value="{{ old('password') }}">
                            </div>
                            {{-- <p>message error</p> --}}
                        </div>
                    </div>
                    <div class="input-group mb-3 mr-2">
                        <div class="input-group mb-3 d-block">
                            <label for="password" class="text-info">Confirmar contraseña</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-unlock-alt"></i></span>
                                </div>
                                <input type="password" name="password_confirmation" class="form-control"  aria-label="contraseña useradmin" aria-describedby="basic-addon1" value="{{ old('password_confirmation') }}">
                            </div>
                            {{-- <p>message error</p> --}}
                            @error('password') {{-- indicamos el nombre del campo --}}
                                {{-- indicamos el mensaje de error  --}}
                                <p style="color:red;">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    
                </div>

            </div>

            {{-- <div class="btn-submit btn-success w-100">
                <input type="submit" name="submit_useradmin" class="btn btn-success w-100" value="Realizar cita">
            </div> --}}
            <div class="modal-footer">
                <button type="button" class="btn btn-danger " data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-success">Registrar administrador</button>
            </div>
            
        </form>
        
    </div>
    </div>
</div>


{{-- script js --}}
<script>


    let estado_useradmin = document.getElementById('estado_useradmin');
    let municipio_useradmin = document.getElementById('municipio_useradmin');
    let parroquia_useradmin = document.getElementById('parroquia_useradmin');


    const municipios = async (estadoId) =>{

        const url = `/municipio/${estadoId}`
        let response = await fetch(url)
        let response_data = await response.json()
        
        municipio_useradmin.innerHTML = ''

        let option = `<option selected disabled>Seleccionar municipio</option>`
        municipio_useradmin.innerHTML = option

        for (const [id, municipio] of Object.entries(response_data)) {
            const option = document.createElement('option');
            municipio_useradmin.insertAdjacentHTML(
                "beforeend", // antes del final de la etiqueta 
                `   
                    <option value="${id}">${municipio}</option>
                `
            );
        }
        
    }
    const parroquias = async (municipioId) =>{

        const url = `/parroquia/${municipioId}`
        let response = await fetch(url)
        let response_data = await response.json()
        
        parroquia_useradmin.innerHTML = ''
        let option = `<option selected disabled>Seleccionar parroquia</option>`
        parroquia_useradmin.innerHTML = option
        for (const [id, parroquia] of Object.entries(response_data)) {
            const option = document.createElement('option');
            parroquia_useradmin.insertAdjacentHTML(
                "beforeend",
                `   
                    <option value="${id}">${parroquia}</option>
                `
            );
        }
        
    }

    // EVENTO CHANGE
    estado_useradmin.addEventListener('change', () =>{
        let estado_id = estado_useradmin.value
        municipios(estado_id)
        parroquia_useradmin.innerHTML = ''
    })
    municipio_useradmin.addEventListener('change', () =>{
        let municipio_id = municipio_useradmin.value
        parroquias(municipio_id)
        parroquia_useradmin.innerHTML = ''
    })


</script>
