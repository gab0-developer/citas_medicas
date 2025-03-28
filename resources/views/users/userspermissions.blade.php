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
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" id="modal-header-css">
                    <h5 class="modal-title" id="editModalLabel">Asignar permiso a Rol</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{-- el atributo action lo aplico con jquery  --}}
                <form id="editForm" method="post">
                    @csrf
                    @method('put')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="roleName">Nombre</label>
                            <input type="text" class="form-control" id="roleName" name="nombre_rol" readonly required>
                        </div>
                        
                        <div class="">
                            <label for="selec2_permiso">Selecionar rol:</label>
                            <select class="js-example-basic-multiple w-100" id="select2_permiso" name="roles[]" multiple="multiple">
                                {{-- <option value="AL">registrar</option>
                                <option value="WY">eliminar</option> --}}
                            </select>
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

