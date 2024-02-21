<?php

// Redirige a mtoVehiculo
if (isset($_REQUEST['cancelar'])) {
    $_SESSION['paginaActiva'] = 'mtoVehiculo';
    header('Location: index.php');
    exit();
}
require_once $view['layout'];
