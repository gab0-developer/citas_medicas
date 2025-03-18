<!-- Large modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Registrar permiso</button>


<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header" id="modal-header-css">
            <h5 class="modal-title" id="exampleModalLabel">Nuevo permiso</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>                  
        </div>
        
        <form action="{{route('permisos.store')}}" method="post">
            <div class="modal-body">
                @csrf  {{-- token --}}
                <div class="inputs">
    
                    <div class="group-input d-flex my-2">
                        <div class="input-group mr-2">
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping"><i class="fas fa-user"></i></span>
                                <input type="text" name="nombre_permiso" class="form-control" placeholder="Nombre de permiso" aria-label="Nombre del rol" aria-describedby="addon-wrapping"  value="{{ old('nombre_permiso') }}" >
                            </div>
                            @error('nombre_permiso') {{-- indicamos el nombre del campo --}}
                                {{-- indicamos el mensaje de error  --}}
                                <p style="color:red;">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="input-group">
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping"><i class="fas fa-user"></i></span>
                                <input type="text" name="descripcion_permiso" class="form-control" placeholder="Descripción del permiso" aria-label="Descripción del permiso" aria-describedby="addon-wrapping"  value="{{ old('descripcion_permiso') }}" >
                            </div>
                            @error('descripcion_permiso') {{-- indicamos el nombre del campo --}}
                                {{-- indicamos el mensaje de error  --}}
                                <p style="color:red;">{{$message}}</p>
                            @enderror
                        </div>
                        
                        
                        
                    </div> 
                    
                </div>
                {{-- <div class="mt-5 ">
                    <input id="submit_cliente" type="submit" class="w-100 btn btn-success" value="Registrar rol">
                </div> --}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger " data-dismiss="modal">Cerrar</button>
                <button type="submit" id="submit-permiso" class="btn btn-success">Registrar permiso</button>
            </div>
        </form>
    </div>
    </div>
</div>