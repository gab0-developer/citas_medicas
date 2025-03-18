 <!-- Button trigger modal -->
 <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#staticBackdrop-modal-xl">
    Registrar doctor
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop-modal-xl" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header" id="modal-header-css">
            <h5 class="modal-title" id="staticBackdropLabel">Registrar Nuevo doctor</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>                  
        </div>
        <form action="{{route('doctor.store')}}" method="post" class="w-100">
            @csrf
            
            <div class="modal-body">
                
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
                            <label for="cedula_doctor" class="text-info">Ingresar cédula</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="number" name="cedula_doctor" class="form-control" placeholder="Cédula" aria-label="Cédula" aria-describedby="basic-addon1" value="{{ old('cedula_doctor') }}">
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
                            <label for="nombre_doctor" class="text-info">Ingresar nombre completo</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" name="nombre_doctor" class="form-control" placeholder="Nombre completo" aria-label="Nombre completo" aria-describedby="basic-addon1" value="{{ old('nombre_doctor') }}">
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
                            <label for="apellido_doctor" class="text-info">Ingresar apellido completo</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" name="apellido_doctor" class="form-control" placeholder="Apellido completo" aria-label="Apellido completo" aria-describedby="basic-addon1" value="{{ old('apellido_doctor') }}">
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
                            <label for="sexo_doctor" class="text-info">Ingresar sexo</label>
                            <div class="form-group w-100">
                                <select class="form-control form-select " name="sexo_doctor" id="sexo" value="{{ old('sexo_doctor') }}">
                                  <option readonly >Seleccionar sexo</option>
                                  <option value="M">Masculino</option>
                                  <option value="F">Femenino</option>
                                 
                                </select>
                                {{-- <p>message error</p> --}}
                                @error('sexo_doctor') {{-- indicamos el nombre del campo --}}
                                {{-- indicamos el mensaje de error  --}}
                                <p style="color:red;">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group mb-3 d-block">
                            <label for="fecha_nacimiento_doctor" class="text-info">Ingresar fecha de nacimiento</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-calendar"></i></span>
                                </div>
                                <input type="date" name="fecha_nacimiento_doctor" class="form-control"  aria-label="Fecha de nacimiento" aria-describedby="basic-addon1" value="{{ old('fecha_nacimiento_doctor') }}">
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
                            <label for="email_doctor" class="text-info">Ingresar correo electronico válido</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope-open-text"></i></span>
                                </div>
                                <input type="email" name="email_doctor" class="form-control"  aria-label="email doctor" aria-describedby="basic-addon1" value="{{ old('email_doctor') }}">
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
                            <label for="tlf_doctor" class="text-info">Ingresar nro de teléfono</label>
                            <div class="input-group mb-3 mr-2">
                                <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-phone"></i></span>
                                </div>
                                <input type="text" name="tlf_doctor" class="form-control"  aria-label="Primer teléfono doctor" aria-describedby="basic-addon1" value="{{ old('tlf_doctor') }}">
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
                            <label for="tlf_second_doctor" class="text-info">Ingresar segundo nro de teléfono</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-phone"></i></span>
                                </div>
                                <input type="text" name="tlf_second_doctor" class="form-control"  aria-label="Segundo teléfono" aria-describedby="basic-addon1" value="{{ old('tlf_second_doctor') }}">
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
                            <label for="estado_doctor" class="text-info">Ingresar estado</label>
                            <div class="form-group w-100">
                                <select class="form-control" name="estado_doctor" id="estado_doctor" value="{{ old('estado_doctor') }}">
                                    <option selected disabled>Seleccionar estado</option>
                                    @foreach ($estados as $estado)
                                        <option value={{$estado->id}}>{{$estado->estados}}</option>
                                        
                                    @endforeach
                                    
                                </select>
                                {{-- <p>message error</p> --}}
                                @error('estado_doctor') {{-- indicamos el nombre del campo --}}
                                {{-- indicamos el mensaje de error  --}}
                                <p style="color:red;">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3 mr-3">
                        <div class="input-group mb-3 d-block">
                            <label for="municipio_doctor" class="text-info">Ingresar municipio</label>
                            <div class="form-group w-100">
                                <select class="form-control" name="municipio_doctor" id="municipio_doctor" value="{{ old('municipio_doctor') }}">
                                    
                                </select>
                                {{-- <p>message error</p> --}}
                                @error('municipio_doctor') {{-- indicamos el nombre del campo --}}
                                {{-- indicamos el mensaje de error  --}}
                                <p style="color:red;">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3 mr-3">
                        <div class="input-group mb-3 d-block">
                            <label for="parroquia_doctor" class="text-info">Ingresar parroquia</label>
                            <div class="form-group w-100">
                                <select class="form-control" name="parroquia_doctor" id="parroquia_doctor" value="{{ old('parroquia_doctor') }}">
            
                                </select>
                                {{-- <p>message error</p> --}}
                                @error('parroquia_doctor') {{-- indicamos el nombre del campo --}}
                                {{-- indicamos el mensaje de error  --}}
                                <p style="color:red;">{{$message}}</p>
                                @enderror
                            </div>
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
                            <label for="mpps_doctor" class="text-info">Ingresar mpps del doctor</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" name="mpps_doctor" class="form-control" placeholder="mpps del doctor" aria-label="mpps del doctor" aria-describedby="basic-addon1" value="{{ old('mpps_doctor') }}">
                            </div>
                            {{-- <p>message error</p> --}}
                            @error('mpps_doctor') {{-- indicamos el nombre del campo --}}
                                {{-- indicamos el mensaje de error  --}}
                                <p style="color:red;">{{$message}}</p>
                                @enderror
                        </div>
                    </div>
                    <div class="input-group mb-3 d-block">
                        <label for="mpps_doctor" class="class="text-info"">Ingresar especialidad del doctor</label>
                        <div class="input-group mb-3 mr-3">
                            <div class="form-group w-100">
                                <select class="form-control" name="especialidad_doctor" id="especialidad_doctor" value="{{ old('especialidad_doctor') }}">
                                    <option selected disabled>Seleccionar especilidad medica</option>
                                    @foreach ($especialidades as $especialidad)
                                        <option value={{$especialidad->id}}>{{$especialidad->especialidad}}</option>
                                        
                                    @endforeach
                                 
                                </select>
                                {{-- <p>message error</p> --}}
                                @error('especialidad_doctor') {{-- indicamos el nombre del campo --}}
                                {{-- indicamos el mensaje de error  --}}
                                <p style="color:red;">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                {{-- CONTACTO doctor --}}
                <div class="sub-title">
                    <h6><strong>Ingresar su contraseña temporal</strong></h6>
                    <hr>
                </div>
                <div class="container-inputs d-flex">
                    <div class="input-group mb-3 mr-2">
                        <div class="input-group mb-3 d-block">
                            <label for="mpps_doctor" class="text-info">Ingresar contraseña</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-unlock-alt"></i></span>
                                </div>
                                <input type="password" name="password" class="form-control"  aria-label="contraseña doctor" aria-describedby="basic-addon1" value="{{ old('password') }}">
                            </div>
                            {{-- <p>message error</p> --}}
                        </div>
                    </div>
                    <div class="input-group mb-3 mr-2">
                        <div class="input-group mb-3 d-block">
                            <label for="mpps_doctor" class="text-info">Confirmar contraseña</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-unlock-alt"></i></span>
                                </div>
                                <input type="password" name="password_confirmation" class="form-control"  aria-label="contraseña doctor" aria-describedby="basic-addon1" value="{{ old('password_confirmation') }}">
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
                <input type="submit" name="submit_doctor" class="btn btn-success w-100" value="Realizar cita">
            </div> --}}
            <div class="modal-footer">
                <button type="button" class="btn btn-danger " data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-success">Registrar doctor</button>
            </div>
            
        </form>
        
    </div>
    </div>
</div>


{{-- script js --}}
<script>


    let estado_doctor = document.getElementById('estado_doctor');
    let municipio_doctor = document.getElementById('municipio_doctor');
    let parroquia_doctor = document.getElementById('parroquia_doctor');


    const municipios = async (estadoId) =>{

        const url = `/municipio/${estadoId}`
        let response = await fetch(url)
        let response_data = await response.json()
        
        municipio_doctor.innerHTML = ''

        let option = `<option selected disabled>Seleccionar municipio</option>`
        municipio_doctor.innerHTML = option

        for (const [id, municipio] of Object.entries(response_data)) {
            const option = document.createElement('option');
            municipio_doctor.insertAdjacentHTML(
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
        
        parroquia_doctor.innerHTML = ''
        let option = `<option selected disabled>Seleccionar parroquia</option>`
        parroquia_doctor.innerHTML = option
        for (const [id, parroquia] of Object.entries(response_data)) {
            const option = document.createElement('option');
            parroquia_doctor.insertAdjacentHTML(
                "beforeend",
                `   
                    <option value="${id}">${parroquia}</option>
                `
            );
        }
        
    }

    // EVENTO CHANGE
    estado_doctor.addEventListener('change', () =>{
        let estado_id = estado_doctor.value
        municipios(estado_id)
        parroquia_doctor.innerHTML = ''
    })
    municipio_doctor.addEventListener('change', () =>{
        let municipio_id = municipio_doctor.value
        parroquias(municipio_id)
        parroquia_doctor.innerHTML = ''
    })


</script>
