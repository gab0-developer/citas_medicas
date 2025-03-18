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
                <div class="modal-header">
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
                            <input type="text" class="form-control" id="roleName" name="nombre_rol" required>
                        </div>
                        
                        <div class="">
                            <label for="selec2_permiso">Selecionar permiso:</label>
                            <select class="js-example-basic-multiple w-100" id="select2_permiso" name="permisos[]" multiple="multiple">
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

@section('js')
    <script> 

        $(document).ready(function(){
            // color clasico en select multiple
            $('.js-example-basic-multiple').select2({
                theme: "classic"
            });
            // ---------BOTON DE EDITAR
            $('.btn-edit').on('click', function(event) {
                event.preventDefault();
                var url = $(this).data('url');
                var update = $(this).data('update');
    
                // Realiza una solicitud AJAX para obtener los datos del rol
                $.get(url, function(data) {
                    let roles = data.roles; // Array de todos los roles disponibles
                    let permisos = data.permisos; // Array de todos los permisos disponibles
                    let permisosAsignados = data.permisosAsignados; // Array de IDs de permisos asignados

                    // Suponiendo que `data` contiene los datos del rol
                    $('#roleName').val(roles.name); // Asigna el nombre del rol al campo correspondiente

                    // Limpia las opciones previas del select
                    $('#select2_permiso').empty();

                    // Itera sobre el array de permisos y agrega cada uno al select
                    permisos.map((permiso) =>  {
                        // Crea una nueva opción
                        let option = $('<option></option>').attr('value', permiso.id).text(permiso.name);

                        // Marca la opción como seleccionada si está en el array de permisos asignados
                        if (permisosAsignados.includes(permiso.id)) {
                            option.prop('selected', true);
                        }

                        // Añade la opción al select
                        $('#select2_permiso').append(option);
                    });

                    // Inicializa Select2 o actualiza el estado si ya está inicializado
                    $('#select2_permiso').select2({theme: "classic"});

                    // Establece la acción del formulario al URL para la actualización
                    $('#editForm').attr('action', update); 

                    // Muestra el modal
                    $('#editModal').modal('show'); 
                });
            });
            
            
        })

    </script>
@stop