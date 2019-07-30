// Validacion de los formularios
// Declaro nombres de los inputs



function ValidarStep(Id) {
    var $Error = false;
    var $Descripcion = '';
    var nombres = $('#nombres').val();
    var apellidos = $('#apellidos').val();
    var tipodocumento = $('#tipodocumento').val();
    var numerodocumento = $('#numerodocumento').val();
    var fechanacimiento = $('#fechanacimiento').val();
    var ciudadnacimiento = $('#ciudadnacimiento').val();
    var genero = $('#genero').val();
    var idbarrio = $('#idbarrio').val();
    var idsede = $('#idsede').val();
    var correo = $('#correo').val();

    switch (Id) {
        case 1:
            //var documento = $('#tipodocumetno option:selected').text();

            // Realizo las validaciones.
            if (nombres == null || nombres.length == 0 || /^\s+$/.test(nombres)) {
                $Error = true;
                $Descripcion = $Descripcion + 'Debe Indicar el nombre de la persona. \n';
            }
            if (apellidos == null || apellidos.length == 0 || /^\s+$/.test(apellidos)) {
                $Error = true;
                $Descripcion = $Descripcion + 'Debe Indicar los Apellidos de la persona. \n';
            }
            if (tipodocumento == -1) {
                $Error = true;
                $Descripcion = $Descripcion + 'Debe Indicar el Tipo de Documento de la persona. \n';
            }
            if (numerodocumento == null || numerodocumento.length == 0) {
                $Error = true;
                $Descripcion = $Descripcion + 'Debe Indicar el Número de documento de la persona. \n';
            }
            if (fechanacimiento == null || fechanacimiento.length == 0) {
                $Error = true;
                $Descripcion = $Descripcion + 'Debe Indicar la fecha de nacimiento  de la persona. \n';
            }
            if (ciudadnacimiento == null || ciudadnacimiento.length == 0) {
                $Error = true;
                $Descripcion = $Descripcion + 'Debe Indicar la ciudad de nacimiento  de la persona. \n';
            }
            if (genero == -1) {
                $Error = true;
                $Descripcion = $Descripcion + 'Debe Indicar el tipo de Genero de la persona. \n';
            }
            if (idbarrio == null || idbarrio.length == 0) {
                $Error = true;
                $Descripcion = $Descripcion + 'Debe Seleccionar el Barrio. \n';
            }
            if (idsede == -1) {
                $Error = true;
                $Descripcion = $Descripcion + 'Debe Indicar la sede. \n';
            }
            if (!(/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i.test(correo))) {
                $Error = true;
                $Descripcion = $Descripcion + 'Debe Indicar una direccion de correo Valida para la persona. \n';
            }
            var $Array = [$Error, $Descripcion];
            return $Array;

        case 2:
            if (CantContac <= 0) {
                $Error = true;
                $Descripcion = $Descripcion + 'Debe Agregar por lo menos un contacto. \n';
            }
            var $Array = [$Error, $Descripcion];
            return $Array;

        case 3:
            if (CantDoc <= 0) {
                $Error = true;
                $Descripcion = $Descripcion + 'Debe Agregar por lo menos un Documento. \n';
            }
            var $Array = [$Error, $Descripcion];
            return $Array;
        default:
            alert('Error no se reconoce el Id del formulario' + Id);
            break;
    }
}