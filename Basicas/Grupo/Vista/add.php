<!-- Modal -->
<div class="modal fade" id="myModalGrupo" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Añadir Grupo</h5>
                <a href="index.php"> <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></a>
            </div>
            <!-- Formulario -->
            <form action="../Controlador/add.php" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <input class="form-control" type="text" placeholder="Codigo..." name="codigo">
                    </div>
                    <div class="mb-3">
                        <input class="form-control" type="text" placeholder="Descripción..." name="descripcion">
                    </div>
                    <div class="mb-3">
                        <input class="form-control" type="text" placeholder="Consecutivo..." name="consecutivo">
                    </div>

                    <div class="mb-3 row">
                        <label class="form-label">Tipo de medición: </label>
                        <div class="col">
                            <input class="form-control" type="text" name="tipo">
                        </div>
                        <div class="col">
                            <input class="form-control" type="text" name="tipoa">
                        </div>
                    </div>

                    <div class="mb-3">
                    <label class="form-label">Frecuencia de medición: </label>
                        <select class="form-select">
                            <option selected>Seleccione</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
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