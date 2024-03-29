<?php

/**
 * @author Ismael Ferreras García
 * @version 1.0
 * @since 12/02/2024
 */
// Redirige al inicio privado de la aplicación si se pulsa volver
if (isset($_REQUEST['volver'])) {
    // Redirige a la página de inicioPrivado
    $_SESSION['paginaActiva'] = 'inicioPrivado';
    unset($_SESSION['busqueda']);
    header('Location: index.php');
    exit();
}

// Redirige a altaVehiculo
if (isset($_REQUEST['altaVehiculo'])) {
    $_SESSION['paginaAnterior'] = 'mtoVehiculo';
    $_SESSION['paginaActiva'] = 'altaVehiculo';
    header('Location: index.php');
    exit();
}


if (isset($_REQUEST['editar'])) {
    // Redirige a editarVehiculo
    $_SESSION['paginaAnterior'] = 'mtoVehiculo';
    $_SESSION['paginaActiva'] = 'editarVehiculo';
    $_SESSION['matriculaVehiculoActivo'] = $_REQUEST['editar'];
    header('Location: index.php');
    exit();
}

if (isset($_REQUEST['mostrar'])) {
    // Redirige a mostrarVehiculo
    $_SESSION['paginaAnterior'] = 'mtoVehiculo';
    $_SESSION['paginaActiva'] = 'mostrarVehiculo';
    $_SESSION['matriculaVehiculoActivo'] = $_REQUEST['mostrar'];
    header('Location: index.php');
    exit();
}

if (isset($_REQUEST['eliminar'])) {
    // Redirige a eliminarVehiculo
    $_SESSION['paginaAnterior'] = 'mtoVehiculo';
    $_SESSION['paginaActiva'] = 'eliminarVehiculo';
    //json_decode decodificamos el valor del request compviertiendolo en un array asociativo
    $_SESSION['matriculaVehiculoActivo'] = $_REQUEST['eliminar'];
    header('Location: index.php');
    exit();
}

$entradaOK = true;

// Almacena los errores
$aErrores['modeloVehiculo'] = '';

//Comprobamos si se ha pulsado el boton de buscar
if (isset($_REQUEST['buscarModeloVehiculo'])) {

    //Validamos el criterio de busqueda
    $aErrores['modeloVehiculo'] = validacionFormularios::comprobarAlfabetico($_REQUEST['modeloVehiculo'], 50, 1, 0);

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

// Detecta si se ha pulsado uno de los botones de ordenamiento
if (isset($_REQUEST['ordenAscendente'])) {
    $_SESSION['orden'] = 'ASC';
} elseif (isset($_REQUEST['ordenDescendente'])) {
    $_SESSION['orden'] = 'DESC';
}
// Obtener la dirección del ordenamiento o establecer un valor predeterminado
$orden = isset($_SESSION['orden']) ? $_SESSION['orden'] : 'ASC';
//Si la entrada es Ok almacenamos el criterio de busqueda en sesion
if ($entradaOK) {
    //Almacenamos el valor en el array en la session
    $_SESSION['busqueda'] = $_REQUEST['modeloVehiculo'];
}

//Iniciamos el array de la vista
$aVehiculosVista = [];
//Realiza la busqueda en la base de datos y lo mete en un array
$aVehiculos = VehiculoPDO::buscarModeloVehiculo(isset($_SESSION['busqueda']) ? $_SESSION['busqueda'] : '', $orden);

if ($aVehiculos) {

    //Recorro el array resultante
    foreach ($aVehiculos as $vehiculo) {
        //Metemos mediante array_push los campos en aVista
        array_push($aVehiculosVista, [
            'matricula' => $vehiculo->getMatricula(),
            'modelo' => $vehiculo->getModelo(),
            'fechaCompra' => $vehiculo->getFechaCompra(),
            'numPuertas' => $vehiculo->getNumPuertas(),
            'color' => $vehiculo->getColor(),
            'valor' => $vehiculo->getValor(),
            'fechaBaja' => !is_null($vehiculo->getFechaBaja()) ? $vehiculo->getFechaBaja() : ''
        ]);
    }
} else {

    //Mostramos los errores
    $aErrores['modeloVehiculo'] = "No hay vehiculos de este modelo";
}

if (isset($_REQUEST['flechaAbajo'])) {
    // Agregar la fecha de baja actual
    VehiculoPDO::agregarFechaBaja($_REQUEST['flechaAbajo']);
    header('Location: index.php');
    exit();
}

if (isset($_REQUEST['flechaArriba'])) {
    // Eliminar la fecha de baja
    VehiculoPDO::eliminarFechaBaja($_REQUEST['flechaArriba']);
    header('Location: index.php');
    exit();
}

// Cargo la vista
require_once $view['layout'];
