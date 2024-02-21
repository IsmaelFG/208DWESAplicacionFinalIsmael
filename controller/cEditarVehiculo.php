<?php

// Redirige a inicioPrivado
if (isset($_REQUEST['cancelar'])) {
    $_SESSION['paginaActiva'] = 'mtoVehiculo';
    header('Location: index.php');
    exit();
}
$aErrores['modelo'] = "";
$aErrores['numPuertas'] = "";
$aErrores['color'] = "";
$aErrores['valor'] = "";

$entradaOK = true;
// Guarda los cambios realizados
if (isset($_REQUEST['guardarCambios'])) {
    $aErrores['modelo'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['modelo'], 50, 3, 1);
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
        VehiculoPDO::editarVehiculo($_SESSION['matriculaVehiculoActivo'], $_REQUEST['modelo'], $_REQUEST['numPuertas'], $_REQUEST['color'], $_REQUEST['valor']);
        //Redireccionamos a el inicio privado
        $_SESSION['paginaActiva'] = 'mtoVehiculo';
        header('Location: index.php');
        exit();
    }
}
$oVehiculo = VehiculoPDO::buscarVehiculoPorMatricula($_SESSION['matriculaVehiculoActivo']);
if ($oVehiculo) {
    $matricula = $oVehiculo->getMatricula();
    $modelo = $oVehiculo->getModelo();
    $fechaCompra = $oVehiculo->getFechaCompra();
    $numPuertas = $oVehiculo->getNumPuertas();
    $color = $oVehiculo->getColor();
    $valor = $oVehiculo->getValor();
    $fechaBaja = $oVehiculo->getFechaBaja();
}
// Cargo la vista
require_once $view['layout'];

