<!-- Modal -->
<div class="modal fade" id="modalEditarAmbiente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Añadir Ambiente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="myModal" aria-label="Close"></button>
            </div>
            <!-- Formulario -->
            <form action="../Controlador/edit.php" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <input class="form-control" type="number" placeholder="Codigo..." name="codigo" id="codigo" required="" aria-label="Codigo">
                    </div>
                    <div class="mb-3">
                        <input class="form-control" type="text" placeholder="Descripción..." name="descripcion" id="descripcion" required="" aria-label="Descripcion">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Complejo</label>
                        <select class="form-select" aria-label="Default select example" name="centro_costo" id="centro_costo">
                            <option value="">Seleccione</option>
                            <?php
                            $complejos= $modeloAmbiente->getComplejo();

                            if($complejos != null){
                                foreach($complejos as $complejo){
                                ?>
                                <option value="<?php echo $complejo['codigo']; ?>"><?php echo $complejo['descripcion']; ?></option>
                                <?php
                                }
                            }
                            ?>  
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tipo de ambiente</label>
                        <select class="form-select" aria-label="Default select example" name="tipo_ubicacion" id="tipo_ubicacion"> 
                            <option value="">Seleccione</option>
                            <?php
                            $tipoAmbientes= $modeloAmbiente->getTipoA();

                            if($tipoAmbientes != null){
                                foreach($tipoAmbientes as $tipoAmbiente){
                                ?>
                                <option value="<?php echo $tipoAmbiente['id']; ?>"><?php echo $tipoAmbiente['descripcion']; ?></option>
                                <?php
                                }
                            }
                            ?> 
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="myModal"> Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>






