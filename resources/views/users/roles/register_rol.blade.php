 <!-- Button trigger modal -->
 <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">
    Registrar nuevo rol
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header" id="modal-header-css">
            <h5 class="modal-title" id="exampleModalLabel">Nuevo rol</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>                  
        </div>
        
        <form action="{{route('roles.store')}}" method="post">
            <div class="modal-body">
                @csrf  {{-- token --}}
                <div class="inputs">
    
                    <div class="input-group mb-3 mr-2">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" name="nombre_rol" class="form-control" placeholder="Nombre del rol" aria-label="Nombre del rol" aria-describedby="addon-wrapping"  value="{{ old('nombre_rol') }}" >
                        </div>
                        @error('nombre_rol') {{-- indicamos el nombre del campo --}}
                            {{-- indicamos el mensaje de error  --}}
                            <p style="color:red;">{{$message}}</p>
                        @enderror
                    </div>
                    
                </div>
                {{-- <div class="mt-5 ">
                    <input id="submit_cliente" type="submit" class="w-100 btn btn-success" value="Registrar rol">
                </div> --}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger " data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-success">Registrar rol</button>
            </div>
        </form>
    </div>
    </div>
</div>