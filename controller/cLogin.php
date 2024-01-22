<?php

/**
 * @author Ismael Ferreras García
 * @version 1.0
 * @since 14/01/2024
 */
// Redirige a la página principal de la aplicacion si pulsa volver
if (isset($_REQUEST['volver'])) {
    // Redirige a la página de inicio
    $_SESSION['paginaActiva'] = 'inicioPublico';
    header('Location: index.php');
    exit();
}

if (isset($_REQUEST['registrar'])) {
    // Redirige a la página de inicio
    $_SESSION['paginaActiva'] = 'registro';
    header('Location: index.php');
    exit();
}

$entradaOK = true; // Indica si todas las respuestas son correctas
// Almacena los errores
$aErrores = [
    'usuario' => '',
    'contrasena' => '',
];
if (isset($_REQUEST['inicioSesion'])) {
    $_SESSION['paginaAnterior'] = 'login';

    // Validamos si el usuario existe y es oUsuarioActivo utilizando el metodo 'validarUsuario()' de la clase 'UsuarioPDO'
    $oUsuarioActivo = UsuarioPDO::validarUsuario($_REQUEST['usuario'], $_REQUEST['contrasena']);
    // Comprobamos si '$oUsuarioActivo' no esta declarado o es 'null'
    if (!isset($oUsuarioActivo)) {
        $entradaOK = false; // En caso verdadero cambiamos el valor de '$entradaOK' a 'false'
    }
    // Validar los campos
    $aErrores = [
        'usuario' => (!$oUsuarioActivo) ? 'Error de autentificacion. Vuelve a introducir las credenciales.' : validacionFormularios::comprobarAlfaNumerico($_REQUEST['usuario'], 32, 4, 1),
        'contrasena' => (!$oUsuarioActivo) ? 'Error de autentificacion. Vuelve a introducir las credenciales.' : validacionFormularios::validarPassword($_REQUEST['contrasena'], 32, 4, 2, 1)
    ];

    // Recorre aErrores para ver si hay alguno
    foreach ($aErrores as $campo => $valor) {
        if ($valor != null) {
            $entradaOK = false;
            // Limpiamos el campo
            $_REQUEST[$campo] = '';
        }
    }
} else {
    $entradaOK = false;
}
// En caso de que '$entradaOK' sea true, cargamos las respuestas en el array '$aRespuestas' 
if ($entradaOK) {
    // Actualizamos la fecha y hora de la última conexión
    $oUsuarioActivo = UsuarioPDO::registrarUltimaConexion($oUsuarioActivo);
    //Redireccionamos a el inicio privado
    $_SESSION['user208DWESLoginLogout'] = $oUsuarioActivo;
    $_SESSION['paginaActiva'] = 'inicioPrivado';
    header('Location: index.php');
    exit();
}
require_once $view['layout'];
?>
