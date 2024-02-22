<?php
$vehiculoAñadido ='';
// Redirige a mtoVehiculo
if (isset($_REQUEST['cancelar'])) {
    $_SESSION['paginaActiva'] = 'mtoVehiculo';
    header('Location: index.php');
    exit();
}

// Redirige a mtoVehiculo
if (isset($_REQUEST['añadirVehiculo'])) {
    $entradaOK = true;
    $aErrores['matricula'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['matricula'], 7, 7, 1);
    if(VehiculoPDO::buscarVehiculoPorMatricula($_REQUEST['matricula'])){
        $aErrores['matricula'] = "Ya existe un vehiculo con esta matricula";
    }
    $aErrores['modelo'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['modelo'], 50, 3, 1);
    $aErrores['fechaCompra'] = validacionFormularios::validarFechaHora($_REQUEST['fechaCompra'], '2100-01-01 00:00:00', '1886-01-01 00:00:00',1);
    $aErrores['numPuertas'] = validacionFormularios::comprobarEntero($_REQUEST['numPuertas'], 5, 2, 1);
    $aErrores['color'] = validacionFormularios::comprobarAlfabetico($_REQUEST['color'], 50, 3, 1);
    $aErrores['valor'] = validacionFormularios::comprobarFloat($_REQUEST['valor'], 1000000000, 1, 1);
    foreach ($aErrores as $campo => $error) {
        if ($error != null) {
            $entradaOK = false;
            $_REQUEST[$campo] = "";
        }
    }
    if ($entradaOK) {
        VehiculoPDO::añadirVehiculo($_REQUEST['matricula'], $_REQUEST['modelo'], $_REQUEST['fechaCompra'], $_REQUEST['numPuertas'], $_REQUEST['color'], $_REQUEST['valor']);
        $vehiculoAñadido ='Vehiculo añadido con exito';
    }
}
require_once $view['layout'];
