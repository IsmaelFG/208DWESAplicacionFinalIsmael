<?php

/**
 * @author Ismael Ferreras García
 * @version 1.0
 * @since 10/01/2024
 */
// Comprobamos si la cookie esta declarada
if (!isset($_COOKIE['idioma'])) {
    // En caso negativo la creamos y ponemos el valor por defecto
    setcookie("idioma", "es", time() + (30 * 24 * 60 * 60), "/");
}
//Comprobamos si pulsa el boton login
if (isset($_REQUEST['login'])) {
    // Redirige a la página de login
    $_SESSION['paginaActiva'] = 'login';
    header('Location: index.php');
    exit();
}
//Comprobamos si pulsa algun boton de idioma
if (isset($_REQUEST['espanol'])) {
//Cambiamos la cookie al idioma seleccionado y refrescamos la pagina
    setcookie("idioma", "es", time() + 2592000);
    header('Location: index.php');
    exit();
}
if (isset($_REQUEST['ingles'])) {
//Cambiamos la cookie al idioma seleccionado y refrescamos la pagina
    setcookie("idioma", "en", time() + 2592000);
    header('Location: index.php');
    exit();
}
require_once $view['layout'];
