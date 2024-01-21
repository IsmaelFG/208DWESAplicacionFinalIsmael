<?php

/**
 * @author Ismael Ferreras García
 * @version 1.0
 * @since 10/01/2024
 */
// Incluyo la configuracion de la app y BD
require_once 'config/confAPP.php';
require_once 'config/confDB.php';

//Recupero la sesión
session_start();

// Comprueba si hay una pagina activa
if (!isset($_SESSION['paginaActiva'])) {
    //Asigna como pagina activa inicioPublico
    $_SESSION['paginaActiva'] = 'inicioPublico';
}
// Carga la pagina en curso
require_once $controller[$_SESSION['paginaActiva']];
