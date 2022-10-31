function modalAñadir(){
    $('#myModal').modal('show');
}

function modalEditar(codigo){

    alert(codigo);

    $.ajax({
        url: "../../../General/Queries/infocomplejo.php",
        type: "POST",
        dataType: "JSON",
        data: {codigo: codigo}
    })
    .done(function(info){
        var descripcion = info[0].descripcion;

        $("#codigo").val(codigo);
        $("#descripcion").val(descripcion);
        $('#myModalEditar').modal('show');
    });
}

function modalEliminar(codigo){
    alert(codigo);
    // document.getElementById("ideliminar").value = ideliminar;
    $("#codigo").val(codigo);
    $('#myModal3').modal('show');
}