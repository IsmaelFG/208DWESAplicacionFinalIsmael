<?php

// Redirige a inicioPrivado
if (isset($_REQUEST['volver'])) {
    $_SESSION['paginaActiva'] = 'mtoVehiculo';
    header('Location: index.php');
    exit();
}
// Cargo la vista
require_once $view['layout'];

