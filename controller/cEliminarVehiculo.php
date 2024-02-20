<?php

// Redirige a inicioPrivado
if (isset($_REQUEST['cancelar'])) {
    $_SESSION['paginaActiva'] = 'mtoVehiculo';
    header('Location: index.php');
    exit();
}

// Guarda los cambios realizados
if (isset($_REQUEST['eliminarVehiculo'])) {
        VehiculoPDO::eliminarVehiculo($_SESSION['vehiculoEliminar']['matricula']);
        //Redireccionamos a el inicio privado
        $_SESSION['paginaActiva'] = 'mtoVehiculo';
        header('Location: index.php');
        exit();
    }


// Cargo la vista
require_once $view['layout'];

