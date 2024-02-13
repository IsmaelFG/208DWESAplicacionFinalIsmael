<?php

/**
 * @author Ismael Ferreras García
 * @version 1.0
 * @since 12/02/2024
 */
// Redirige a el inicio privado de la aplicacion si pulsa volver
if (isset($_REQUEST['volver'])) {
    // Redirige a la página de inicio
    $_SESSION['paginaActiva'] = 'inicioPrivado';
    header('Location: index.php');
    exit();
}

$entradaOK = true;

// Almacena los errores
$aErrores['modeloVehiculo'] = '';

//Comprobamos si se ha pulsado el boton de buscar
if (isset($_REQUEST['buscarModeloVehiculo'])) {

    //Validamos el criterio de busqueda
    $aErrores['modeloVehiculo'] = validacionFormularios::comprobarAlfabetico($_REQUEST['modeloVehiculo'], 255, 1, 0);

    //Recorremos el array de errores
    foreach ($aErrores as $campo => $error) {
        // Si hay errores limpia el campo del formulario y cambia el valor de entradaOK a false
        if ($error != null) {
            $_REQUEST[$campo] = '';
            $entradaOK = false;
        }
    }
    //Si no ha pulsado el botón de buscar ponemos entradaOK a false
} else {
    $entradaOK = false;
}

//Si la entrada es Ok almacenamos el criterio de busqueda en sesion
if ($entradaOK) {
    //Almacenamos el valor en el array en la session
    $_SESSION['busqueda'] = $_REQUEST['modeloVehiculo'];
}

//Iniciamos el array de la vista
$aVehiculosVista = [];

//Contador para el num de registros
$cRegistros = 0;

$aVehiculos = VehiculoPDO::buscarModeloVehiculo(isset($_SESSION['busqueda']) ? $_SESSION['busqueda'] : '');

if ($aVehiculos) {

    //Recorro el array del resultante
    foreach ($aVehiculos as $vehiculo) {
        //Metemos mediante array_push los campos 
        array_push($aVehiculosVista, [
            'matricula' => $vehiculo->getMatricula(),
            'modelo' => $vehiculo->getModelo(),
            'fechaCompra' => $vehiculo->getFechaCompra(),
            'numPuertas' => $vehiculo->getNumPuertas(),
            'color' => $vehiculo->getColor(),
            'valor' => $vehiculo->getValor(),
            'fechaBaja' => !is_null($vehiculo->getFechaBaja()) ? $vehiculo->getFechaBaja() : ''
        ]);

        //Incremento el contador
        $cRegistros++;
    }
} else {

    //Mostramos los errores
    $aErrores['modeloVehiculo'] = "No hay vehiculos de este modelo";
}

// Cargo la vista
require_once $view['layout'];
