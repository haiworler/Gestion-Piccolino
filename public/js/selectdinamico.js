//$(function() {
//  alert('Aqui'); es para validar que realmente se integro bien el archivo
//});

$(function() {
    //  alert('Aqui'); es para validar que realmente se integro bien el archivo
    $('#idlocalidad').on('change',
        selectbarrios);
});

function selectbarrios() {
    var idlocalidad = $(this).val();
    $.get('../listabarrio/' + idlocalidad + '/barrios', function(data) {
        $("#idbarrio").empty();
        var html_select = '<option  value="">Seleccione Barrio</option>';
        for (var i = 0; i < data.length; ++i) {
            html_select += '<option  value="' + data[i].id + '">' + data[i].nombre + '</option>';
        }
        $('#idbarrio').html(html_select);
    })
}