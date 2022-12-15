<!-- Modal -->
<div class="modal fade" id="modalArchivo" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Subir archivo</h5>
                <a href="index.php"> <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></a>
            </div>
            <!-- Formulario -->
            <form action="../Controlador/file.php" method="POST">
                <div class="modal-body">
                    <input type="hidden" id="equipo" name="equipo">
                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input class="form-control" type="text" name="nomdocumento">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Comentario</label>
                        <input class="form-control" type="text" name="comentario">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Subir archivo</label>
                        <input class="form-control" type="file" name="archivo">
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="index.php"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> Cerrar</button></a> 
                    <button type="submit" id="btnGuardar" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>