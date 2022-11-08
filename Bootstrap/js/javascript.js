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

    alert(ideditar);

    $.ajax({
        url: "../General/Queries/infoambiente.php",
        type: "POST",
        dataType: "JSON",
        data: {ideditar: ideditar}
    })
    .done(function(info){
        var descripcion = info[0].descripcion;

        $("#ideditar").val(ideditar);
        $("#descripcion").val(descripcion);
        $('#modalEditarAmbiente').modal('show');
    });
}

function modalEliminar(codigo){

    $("#codigo").val(codigo);
    $('#myModalEliminar').modal('show');
}

// $("#btnGuardar").click(function(){
//     swal({
//         title: "Buen trabajo!",
//         text: "Registro exitoso!",
//         icon: "success",
//         timer: 3000,
//       });
// });