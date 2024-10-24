 <!-- Button trigger modal -->
 <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal-modal-lg">
    Realizar cita
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal-modal-lg" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header" id="modal-header-css">
            <h5 class="modal-title" id="exampleModalLabel">Nueva cita medica</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>                  
        </div>
        <form action="{{route('solicitudcita.store')}}" method="post" class="w-100">
            @csrf
            
            <div class="modal-body">
                {{-- TIPO DE CITA PACIENTE --}}
                <div class="sub-title">
                    <h6><strong>Seleccionar Tipo de cita</strong></h6>
                    <hr>
                </div>
                <div class="container-inputs d-flex">
                    <div class="input-group mb-3 mr-3">
                            <div class="form-group w-100">
                                <select class="form-control" name="tipocita" id="tipocita" value="{{ old('tipocita') }}">
                                    <option selected disabled>Seleccionar tipo de cita medica</option>
                                    @foreach ($tipocitas as $tipocita)
                                        <option value={{$tipocita->id}}>{{$tipocita->nombre_cita}}</option>
                                        
                                    @endforeach
                                 
                                </select>
                                @error('tipocita') {{-- indicamos el nombre del campo --}}
                                    {{-- indicamos el mensaje de error  --}}
                                    <p style="color:red;">{{$message}}</p>
                                @enderror
                            </div>
                    </div>
                   
                </div>
    
                {{-- ATENCION DE CITA DEL PACIENTE --}}
                <div class="sub-title">
                    <h6><strong>Ingresar fecha de atención de su cita medica</strong></h6>
                    <hr>
                </div>
                <div class="container-inputs d-flex">
                    <div class="input-group mb-3 mr-2">
                        <div class="input-group">
                            <input type="date" name="fecha_cita" class="form-control"  aria-label="fecha de cita" aria-describedby="basic-addon1" value="{{ old('fecha_cita') }}">
                        </div>
                        @error('fecha_cita') {{-- indicamos el nombre del campo --}}
                            {{-- indicamos el mensaje de error  --}}
                            <p style="color:red;">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="input-group mb-3 mr-3">
                        <div class="form-group w-100">
                            <select class="form-control" name="hora_cita" id="hora_cita" value="{{ old('hora_cita') }}">
                                <option selected disabled readonly>Seleccionar Hora de su cita</option>
                                <option value="8:00 AM">8:00 AM</option>
                                <option value="9:00 AM">9:00 AM</option>
                                <option value="10:00 AM">10:00 AM</option>
                                <option value="11:30 AM">11:30 AM</option>
                                <option value="1:30 PM">1:30 PM</option>
                                <option value="2:30 PM">2:30 PM</option>
                                <option value="3:30 PM">3:30 PM</option>
                                <option value="4:30 PM">4:30 PM</option>
                                <option value="5:30 PM">5:30 PM</option>
                            </select
                            @error('hora_cita') {{-- indicamos el nombre del campo --}}
                            {{-- indicamos el mensaje de error  --}}
                                <p style="color:red;">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                </div>

            </div>

            {{-- <div class="btn-submit btn-success w-100">
                <input type="submit" name="submit_paciente" class="btn btn-success w-100" value="Realizar cita">
            </div> --}}
            <div class="modal-footer">
                <button type="button" class="btn btn-danger " data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-success">Registrar cita</button>
            </div>
            
        </form>
        
    </div>
    </div>
</div>


{{-- script js --}}
