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

function modalEliminar(codigo){
    alert(codigo);

    $("#codigo").val(codigo);
    $('#myModalEliminar').modal('show');
}

