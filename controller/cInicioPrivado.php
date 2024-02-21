<?php

/**
 * @author Ismael Ferreras García
 * @version 1.0
 * @since 15/01/2024
 */
if (empty($_SESSION['user208DWESLoginLogout'])) {
// Redirige a la página de inicio
    $_SESSION['paginaActiva'] = 'inicioPublico';
    header('Location: index.php');
    exit();
}

// Cerrar sesión al hacer clic en el botón
if (isset($_REQUEST['cerrar_sesion'])) {
    session_destroy();
// Redirige a la página de inicio
    $_SESSION['paginaActiva'] = 'inicioPublico';
    header('Location: index.php');
    exit();
}

// Ir a detalle al pulsar el boton
if (isset($_REQUEST['detalle'])) {
    $_SESSION['paginaAnterior'] = 'inicioPrivado';
    $_SESSION['paginaActiva'] = 'detalle';
    header('Location: index.php');
    exit();
}

// Ir a MiCuenta al pulsar el boton
if (isset($_REQUEST['editarPerfil'])) {
    $_SESSION['paginaAnterior'] = 'inicioPrivado';
    $_SESSION['paginaActiva'] = 'miCuenta';
    header('Location: index.php');
    exit();
}

// Ir a rest al pulsar el boton
if (isset($_REQUEST['rest'])) {
    $_SESSION['paginaAnterior'] = 'inicioPrivado';
    $_SESSION['paginaActiva'] = 'rest';
    header('Location: index.php');
    exit();
}

// Ir a Mto Departamento al pulsar el boton
if (isset($_REQUEST['mtoDepartamento'])) {
    $_SESSION['paginaAnterior'] = 'inicioPrivado';
    $_SESSION['paginaActiva'] = 'mtoDepartamento';
    header('Location: index.php');
    exit();
}

// Ir a Mto Vehiculo al pulsar el boton
if (isset($_REQUEST['mtoVehiculo'])) {
    $_SESSION['paginaAnterior'] = 'inicioPrivado';
    $_SESSION['paginaActiva'] = 'mtoVehiculo';
    header('Location: index.php');
    exit();
}

// Define los mensajes según el idioma
if ($_COOKIE['idioma'] == 'es') {
    $bienvenida = "Bienvenido, {$_SESSION['user208DWESLoginLogout']->getdescUsuario()}.<br>";
    $numConexiones = "Esta es tu {$_SESSION['user208DWESLoginLogout']->getnumAcceso()} vez conectándote.<br>";
    if ($_SESSION['user208DWESLoginLogout']->getnumAcceso() == 1) {
        $ultimaConexion = "Esta es la primera vez que te conectas";
    } else {
        $ultimaConexion = "Te conectaste por última vez {$_SESSION['user208DWESLoginLogout']->getfechaHoraUltimaConexionAnterior()}.";
    }
} elseif ($_COOKIE['idioma'] == 'en') {
    $bienvenida = "Welcome, {$_SESSION['user208DWESLoginLogout']->getdescUsuario()}.<br>";
    $numConexiones = "This is your {$_SESSION['user208DWESLoginLogout']->getnumAcceso()} time logging in.<br>";
    if ($_SESSION['user208DWESLoginLogout']->getnumAcceso() == 1) {
        $ultimaConexion = "This is the first time you connect";
    } else {
        $ultimaConexion = "You last logged in on {$_SESSION['user208DWESLoginLogout']->getfechaHoraUltimaConexionAnterior()}.";
    }
}
// Meter el mensaje en un array
$avInicioPrivado = [
    'bienvenida' => $bienvenida,
    'numConexiones' => $numConexiones,
    'ultimaConexion' => $ultimaConexion
];

require_once $view['layout'];
?>
