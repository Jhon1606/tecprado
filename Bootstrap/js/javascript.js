function modalAgregar(pagina){
    $('#myModal' + pagina).modal('show');
}

function modalEditarComplejo(codigo){

    $.ajax({
        url: "../../General/Queries/infocomplejo.php",
        type: "POST",
        dataType: "JSON",
        data: {codigo: codigo}
    })
    .done(function(info){

        var descripcion = info[0].descripcion;

        $("#ideditar").val(codigo);
        $("#descripcion").val(descripcion);
        $('#modalEditarComplejo').modal('show');
    });
}

function modalEditarAmbiente(ideditar){

    $.ajax({
        url: "../../General/Queries/infoambiente.php",
        type: "POST",
        dataType: "JSON",
        data: {ideditar: ideditar}
    })
    .done(function(info){
        var codigo = info[0].codigo;
        var descripcion = info[0].descripcion;
        var tipo_ubicacion = info[0].tipo_ubicacion;
        var centro_costo = info[0].centro_costo;

        $("#ideditar").val(codigo);
        $("#descripcion").val(descripcion);
        $("#tipo_ubicacion").val(tipo_ubicacion);
        $("#centro_costo").val(centro_costo);
        $('#modalEditarAmbiente').modal('show');
    });
}

function modalEditarEquipo(ideditar){
    
    $.ajax({
        url: "../../General/Queries/infoequipo.php",
        type: "POST",
        dataType: "JSON",
        data: {ideditar: ideditar}
    })
    .done(function(info){
        var codigo_eqp = info[0].codigo_eqp;
        var centro_costo = info[0].centro_costo;
        var ambiente = info[0].ambiente;
        var descripcion = info[0].descripcion;
        var codigo_grupo = info[0].codigo_grupo;
        var codigo_linea = info[0].codigo_linea;
        var serie = info[0].serie;
        var modelo = info[0].modelo;
        var marca = info[0].marca;
        var observaciones = info[0].observaciones;
        var codigo_und = info[0].codigo_und;
        var estandar_combustible = info[0].estandar_combustible;
        

        $("#ideditar").val(codigo_eqp);
        $("#centro_costo").val(centro_costo);
        cargarAmbienteEditar(centro_costo,ambiente);
        $("#descripcion").val(descripcion);
        $("#codigo_grupo").val(codigo_grupo);
        $("#codigo_linea").val(codigo_linea);
        $("#serie").val(serie);
        $("#modelo").val(modelo);
        $("#marca").val(marca);
        $("#observaciones").val(observaciones);
        $("#codigo_und").val(codigo_und);
        $("#estandar_combustible").val(estandar_combustible);
        $('#modalEditarEquipo').modal('show');
    });
}


function cargarAmbiente(complejo){

    $.ajax({
        url: "../../General/Queries/filtroambiente.php",
        type: "POST",
        dataType: "HTML",
        data: {complejo: complejo},
        success: function(selectAmbiente){
            $('#crearAmbiente').html(selectAmbiente);
        }
    });
}

function cargarAmbienteEditar(complejo,ambiente){

    $.ajax({
        url: "../../General/Queries/filtroambiente.php",
        type: "POST",
        dataType: "HTML",
        data: {complejo: complejo, ambiente: ambiente},
        success: function(selectAmbiente){
            $('#editarAmbiente').html(selectAmbiente);
        }
    });
}


function modalEliminar(codigo){

    $("#codigo").val(codigo);
    $('#myModalEliminar').modal('show');
}

