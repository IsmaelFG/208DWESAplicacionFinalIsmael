<?php

/**
 * @author Ismael Ferreras García
 * @version 1.0
 * @since 10/01/2024
 */
require_once 'core/231018libreriaValidacion.php';
require_once 'model/DB.php';
require_once 'model/DBPDO.php';
require_once 'model/ErrorApp.php';
require_once 'model/Usuario.php';
require_once 'model/UsuarioDB.php';
require_once 'model/UsuarioPDO.php';
require_once 'model/REST.php';
require_once 'model/Departamento.php';
require_once 'model/DepartamentoPDO.php';
require_once 'model/Vehiculo.php';
require_once 'model/VehiculoPDO.php';

$controller = [
    'inicioPublico' => 'controller/cInicioPublico.php',
    'login' => 'controller/cLogin.php',
    'inicioPrivado' => 'controller/cInicioPrivado.php',
    'rss' => 'controller/cRSS.php',
    'registro' => 'controller/cRegistro.php',
    'miCuenta' => 'controller/cMiCuenta.php',
    'borrarCuenta' => 'controller/cBorrarCuenta.php',
    'wip' => 'controller/cWIP.php',
    'error' => 'controller/cError.php',
    'detalle' => 'controller/cDetalle.php',
    'rest' => 'controller/cREST.php',
    'borrarCuenta' => 'controller/cBorrarCuenta.php',
    'cambiarPassword' => 'controller/cCambiarPassword.php',
    'mtoDepartamento' => 'controller/cMtoDepartamento.php',
    'mtoVehiculo' => 'controller/cMtoVehiculo.php'
];

$view = [
    'layout' => 'view/Layout.php',
    'inicioPublico' => 'view/vInicioPublico.php',
    'login' => 'view/vLogin.php',
    'inicioPrivado' => 'view/vInicioPrivado.php',
    'rss' => 'view/vRSS.php',
    'registro' => 'view/vRegistro.php',
    'miCuenta' => 'view/vMiCuenta.php',
    'borrarCuenta' => 'view/vBorrarCuenta.php',
    'wip' => 'view/vWIP.php',
    'error' => 'view/vError.php',
    'detalle' => 'view/vDetalle.php',
    'rest' => 'view/vREST.php',
    'borrarCuenta' => 'view/vBorrarCuenta.php',
    'cambiarPassword' => 'view/vCambiarPassword.php',
    'mtoDepartamento' => 'view/vMtoDepartamento.php',
    'mtoVehiculo' => 'view/vMtoVehiculo.php'
];
