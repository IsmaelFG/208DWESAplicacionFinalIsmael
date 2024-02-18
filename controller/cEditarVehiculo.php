<?php

// Redirige a inicioPrivado
if (isset($_REQUEST['cancelar'])) {
    $_SESSION['paginaActiva'] = 'mtoVehiculo';
    header('Location: index.php');
    exit();
}
$aErrores['color'] = "";
$aErrores['valor'] = "";
$entradaOK = true;
// Guarda los cambios realizados
if (isset($_REQUEST['guardarCambios'])) {
    $aErrores['color'] = validacionFormularios::comprobarAlfabetico($_REQUEST['color'], 50, 3, 1);
    $aErrores['valor'] = validacionFormularios::comprobarFloat($_REQUEST['valor'], PHP_FLOAT_MAX, 1, 1);
    foreach ($aErrores as $campo => $error) {
        if ($error != null) {
            $entradaOK = false;
            $_REQUEST[$campo] = "";
        }
    }

    if ($entradaOK) {
        VehiculoPDO::editarVehiculo($_SESSION['vehiculoEditar']['matricula'], $_REQUEST['color'], $_REQUEST['valor']);
        //Redireccionamos a el inicio privado
        $_SESSION['paginaActiva'] = 'mtoVehiculo';
        header('Location: index.php');
        exit();
    }
}

// Cargo la vista
require_once $view['layout'];

