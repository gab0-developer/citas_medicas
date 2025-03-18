<style>
    .container-form-paciente{
        max-width: 100%;
        min-height: 100vh;
        /* background-color: red; */
        background: url("{{ asset('assets/img/fondocita-register.png')}}");
        background-size: cover;
        background-repeat: no-repeat;
    }
    .form-paciente .card-body{
        filter: blur(5);
        background-color: #ffffff;
        border-radius: 12px;
    }
    .title-form{
        width: 100%;
        padding: 1rem;
        /* background: #fff; */
    }
    .card-form-paciente{
        box-shadow: 2px 2px 8px #07284b46;
        /* margin-top: 5rem; */
    }
</style>

<div class="container form-paciente">
    <div class="card-form-paciente">
        <!-- <div class="title-form w-100  d-flex justify-content-center" id="modal-encabezado">
            <h3 class="">Registrarse</h3>
        </div> -->
        <div class="card-body">
            <div class="title-form-paci d-flex flex-column justify-content-center align-items-center ">
                <div class="img-logo">
                    <img src="{{ asset('assets/img/Logo-Medical-G.png')}}" style="width: 50px;" alt="">
                </div>
                <h3 class="" style="color: #008ae4;"><strong>Registrarse</strong></h3>
            </div>
            <form action="{{route('paciente.store')}}" method="post" class="w-100">
                @csrf
                <div class="sub-title">
                    <h6><strong>Ingresar datos personales</strong></h6>
                    <hr>
                </div>
                <div class="container-inputs d-flex">
                    <div class="input-group mb-3" style="display:none">
                        <input type="text" name="permiso_paciente" class="form-control" placeholder="permiso-paciente" aria-label="Nombre completo" aria-describedby="basic-addon1" value="2" style="display:none" hidden>
                    </div>
                    
                    <div class="input-group mb-3 mr-3">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" name="nombre_paciente" class="form-control" placeholder="Nombre completo" aria-label="Nombre completo" aria-describedby="basic-addon1" value="{{ old('nombre_paciente') }}">
                        </div>
                        @error('nombre_paciente') {{-- indicamos el nombre del campo --}}
                            {{-- indicamos el mensaje de error  --}}
                            <p style="color:red;">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" name="apellido_paciente" class="form-control" placeholder="Apellido completo" aria-label="Apellido completo" aria-describedby="basic-addon1" value="{{ old('apellido_paciente') }}">
                        </div>
                        @error('apellido_paciente') {{-- indicamos el nombre del campo --}}
                            {{-- indicamos el mensaje de error  --}}
                            <p style="color:red;">{{$message}}</p>
                        @enderror
                    </div>
                    
                </div>
    
                <div class="container-inputs d-flex">
                    <div class="input-group mb-3 mr-3">
                            <div class="form-group w-100">
                                <select class="form-control form-select " name="sexo_paciente" id="sexo" value="{{ old('sexo_paciente') }}">
                                    <option readonly >Seleccionar sexo</option>
                                    <option value="M">Masculino</option>
                                    <option value="F">Femenino</option>
                                    
                                </select>
                                @error('sexo_paciente') {{-- indicamos el nombre del campo --}}
                                    {{-- indicamos el mensaje de error  --}}
                                    <p style="color:red;">{{$message}}</p>
                                @enderror
                            </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-calendar"></i></span>
                            </div>
                            <input type="date" name="fecha_nacimiento_paciente" class="form-control"  aria-label="Fecha de nacimiento" aria-describedby="basic-addon1" value="{{ old('fecha_nacimiento_paciente') }}">
                        </div>
                        @error('fecha_nacimiento_paciente') {{-- indicamos el nombre del campo --}}
                            {{-- indicamos el mensaje de error  --}}
                            <p style="color:red;">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                {{-- CONTACTO PACIENTE --}}
                <div class="sub-title">
                    <h6><strong>Ingresar contacto</strong></h6>
                    <hr>
                </div>
                <div class="container-inputs d-flex">
                    <div class="input-group mb-3 mr-2">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope-open-text"></i></span>
                            </div>
                            <input type="email" name="email_paciente" class="form-control"  aria-label="email paciente" aria-describedby="basic-addon1" value="{{ old('email_paciente') }}">
                        </div>
                        @error('email_paciente') {{-- indicamos el nombre del campo --}}
                            {{-- indicamos el mensaje de error  --}}
                            <p style="color:red;">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group mb-3 mr-2">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-phone"></i></span>
                            </div>
                            <input type="text" name="tlf_paciente" class="form-control"  aria-label="Primer teléfono paciente" aria-describedby="basic-addon1" value="{{ old('tlf_paciente') }}">
                        </div>
                        @error('tlf_paciente') {{-- indicamos el nombre del campo --}}
                            {{-- indicamos el mensaje de error  --}}
                            <p style="color:red;">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-phone"></i></span>
                            </div>
                            <input type="text" name="tlf_second_paciente" class="form-control"  aria-label="Segundo teléfono paciente" aria-describedby="basic-addon1" value="{{ old('tlf_second_paciente') }}">
                        </div>
                        @error('tlf_second_paciente') {{-- indicamos el nombre del campo --}}
                            {{-- indicamos el mensaje de error  --}}
                            <p style="color:red;">{{$message}}</p>
                        @enderror
                    </div>
                </div>
            
                {{-- UBICACION PACIENTE --}}
                <div class="sub-title">
                    <h6><strong>Ingresar su ubicación</strong></h6>
                    <hr>
                </div>
                <div class="container-inputs d-flex">
                    <div class="input-group mb-3 mr-3">
                            <div class="form-group w-100">
                                <select class="form-control" name="estado_paciente" id="estado_paciente" value="{{ old('estado_paciente') }}">
                                    <option selected disabled>Seleccionar estado</option>
                                    @foreach ($estados as $estado)
                                        <option value={{$estado->id}}>{{$estado->estados}}</option>
                                        
                                    @endforeach
                                    
                                </select>
                                @error('estado_paciente') {{-- indicamos el nombre del campo --}}
                            {{-- indicamos el mensaje de error  --}}
                            <p style="color:red;">{{$message}}</p>
                        @enderror
                            </div>
                    </div>
                    <div class="input-group mb-3 mr-3">
                            <div class="form-group w-100">
                                <select class="form-control" name="municipio_paciente" id="municipio_paciente" value="{{ old('municipio_paciente') }}">
                                    
                                </select>
                                @error('municipio_paciente') {{-- indicamos el nombre del campo --}}
                                    {{-- indicamos el mensaje de error  --}}
                                    <p style="color:red;">{{$message}}</p>
                                @enderror
                            </div>
                    </div>
                    <div class="input-group mb-3 mr-3">
                            <div class="form-group w-100">
                                <select class="form-control" name="parroquia_paciente" id="parroquia_paciente" value="{{ old('parroquia_paciente') }}">
            
                                </select>
                                @error('parroquia_paciente') {{-- indicamos el nombre del campo --}}
                                    {{-- indicamos el mensaje de error  --}}
                                    <p style="color:red;">{{$message}}</p>
                                @enderror
                            </div>
                    </div>
                    
                    
                </div>
    
                {{-- CONTACTO PACIENTE --}}
                <div class="sub-title">
                    <h6><strong>Ingresar su contraseña</strong></h6>
                    <hr>
                </div>
                <div class="container-inputs d-flex">
                    <div class="input-group mb-3 mr-2">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-unlock-alt"></i></span>
                            </div>
                            <input type="password" name="password" class="form-control"  aria-label="contraseña paciente" aria-describedby="basic-addon1" value="{{ old('password') }}">
                        </div>
                        @error('password') {{-- indicamos el nombre del campo --}}
                            {{-- indicamos el mensaje de error  --}}
                            <p style="color:red;">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="input-group mb-3 mr-2">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-unlock-alt"></i></span>
                            </div>
                            <input type="password" name="password_confirmation" class="form-control"  aria-label="contraseña paciente" aria-describedby="basic-addon1" value="{{ old('password_confirmation') }}">
                        </div>
                        @error('password') {{-- indicamos el nombre del campo --}}
                            {{-- indicamos el mensaje de error  --}}
                            <p style="color:red;">{{$message}}</p>
                        @enderror
                    </div>
                    
                </div>
    
                <div class="btn-submit btn-success w-100">
                    <input type="submit" name="submit_paciente" class="btn btn-primary w-100" value="Registrarse">
                </div>
                
            </form>
            <div class="w-100 d-flex justify-content-center ">
                <p>¿Ya tienes una cuenta?</p> 
                <a href="{{route('login')}}" class="pl-1 text-success">Iniciar Sesión</a>
            </div>
        </div>
    </div>
</div>



<link rel="stylesheet" href="{{ asset('assets/css/app.css')}}"> 

{{-- script js --}}
<script>


    let estado_paciente = document.getElementById('estado_paciente');
    let municipio_paciente = document.getElementById('municipio_paciente');
    let parroquia_paciente = document.getElementById('parroquia_paciente');


    const municipios = async (estadoId) =>{

        const url = `/municipio/${estadoId}`
        let response = await fetch(url)
        let response_data = await response.json()
        
        municipio_paciente.innerHTML = ''

        let option = `<option selected disabled>Seleccionar municipio</option>`
        municipio_paciente.innerHTML = option

        for (const [id, municipio] of Object.entries(response_data)) {
            const option = document.createElement('option');
            municipio_paciente.insertAdjacentHTML(
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
        
        parroquia_paciente.innerHTML = ''
        let option = `<option selected disabled>Seleccionar parroquia</option>`
        parroquia_paciente.innerHTML = option
        for (const [id, parroquia] of Object.entries(response_data)) {
            const option = document.createElement('option');
            parroquia_paciente.insertAdjacentHTML(
                "beforeend",
                `   
                    <option value="${id}">${parroquia}</option>
                `
            );
        }
        
    }

    // EVENTO CHANGE
    estado_paciente.addEventListener('change', () =>{
        let estado_id = estado_paciente.value
        municipios(estado_id)
        parroquia_paciente.innerHTML = ''
    })
    municipio_paciente.addEventListener('change', () =>{
        let municipio_id = municipio_paciente.value
        parroquias(municipio_id)
        parroquia_paciente.innerHTML = ''
    })


</script>