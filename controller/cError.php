<?php

/**
 * @author Ismael Ferreras García
 * @version 1.0
 * @since 17/01/2024
 */
// Si pulsa salir manda a el usuario a la pagina anterior
if (isset($_REQUEST['volver'])) {
    // Asigna a la página en curso la página anterior
    $_SESSION['paginaActiva'] = $_SESSION['paginaAnterior'];
    // Cierra la sesión de error
    unset($_SESSION['error']);
    header('Location: index.php');
    exit;
}
// Asigna a cada variable los datos almacenamos en la sesion error
$sCodError = $_SESSION['error']->getCodError();
$sDescError = $_SESSION['error']->getDescError();
$sArchivoError = $_SESSION['error']->getArchivoError();
$iLineaError = $_SESSION['error']->getLineaError();

require_once $view['layout'];
