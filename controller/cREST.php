<?php

/**
 * @author Ismael Ferreras García
 * @version 1.0
 * @since 23/01/2024
 */
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

//Si la se sesion no esta inicializada la inicializamos a 01
if (!isset($_SESSION['provinciaSeleccionada'])) {
    $_SESSION['provinciaSeleccionada'] = '01';
}
//Si la se sesion no esta inicializada la inicializamos a hoy
if (!isset($_SESSION['nasaFecha'])) {
    $_SESSION['nasaFecha'] = $hoy;
}

//Llamada a api AEMET
$aPrevision = REST::tiempoProvincia(isset($_REQUEST['provincia']) ? $_REQUEST['provincia'] : $_SESSION['provinciaSeleccionada']);
$previsionUtf8 = utf8_encode(file_get_contents($aPrevision['datos']));
//Llamada a api Nasa
$aNasa = REST::pedirFotoNasa(isset($_REQUEST['fecha']) ? $_REQUEST['fecha'] : $_SESSION['nasaFecha']);
require_once $view['layout'];
?>