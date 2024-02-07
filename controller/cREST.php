<?php

/**
 * @author Ismael Ferreras García
 * @version 1.0
 * @since 23/01/2024
 */
$aVistaRest = [
    'AEMET' => [],
    'NASA' => []
];
//Variable con la fecha de hoy
$hoy = date("Y-m-d");
if (empty($_SESSION['user208DWESLoginLogout'])) {
    // Redirige a la página de inicio
    $_SESSION['paginaActiva'] = 'inicioPublico';
    header('Location: index.php');
    exit();
}

if (isset($_REQUEST['volver'])) {
    // Redirige a la página principal del programa
    $_SESSION['paginaActiva'] = 'inicioPrivado';
    header('Location: index.php');
    exit();
}

//Guardamos en sesion la provincia
if (isset($_REQUEST['provincia'])) {
    $_SESSION['provinciaSeleccionada'] = $_REQUEST['provincia'];
}
//Guardamos en sesion la fecha
if (isset($_REQUEST['fecha'])) {
    $_SESSION['nasaFecha'] = $_REQUEST['fecha'];
}

//Llamada a api AEMET
$aVistaRest['AEMET'] = REST::tiempoProvincia(isset($_SESSION['provinciaSeleccionada']) ? $_SESSION['provinciaSeleccionada'] : '01');
//Llamada a api Nasa
$aVistaRest['NASA'] = REST::pedirFotoNasa(isset( $_SESSION['nasaFecha']) ?  $_SESSION['nasaFecha'] : $hoy);
require_once $view['layout'];
?>