<div class="modal fade" id="editarModal" tabindex="-1" aria-labelledby="editarModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editarModalLabel">Editar registro</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="./CRUD/actualizarDatos.php" method="post">
                    <input type="hidden" name="id" id="id">
        
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre:</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="apellidos" class="form-label">Apellidos:</label>
                        <input type="text" name="apellidos" id="apellidos" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="tel" class="form-label">Teléfono:</label>
                        <input type="tel" name="tel" id="tel" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>

                    <div class="container d-flex justify-content-center">
                        <button type="button" class="btn btn-secondary mx-2" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary mx-2"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>