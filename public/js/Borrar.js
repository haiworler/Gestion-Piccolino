function BorrarContacto(id) {
    $.get('../../BorrarContacto/' + id + '/Contacto');
}

function BorrarDocumento(id) {
    $.get('../../BorrarDocumento/' + id + '/Documento');
}

function BorrarCorteSemestre(id) {
    $.get('../../BorrarCorteSemestre/' + id + '/CorteSemestre');
}