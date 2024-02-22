<?php

// Redirige a inicioPrivado
if (isset($_REQUEST['volver'])) {
    $_SESSION['paginaActiva'] = 'mtoVehiculo';
    header('Location: index.php');
    exit();
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

