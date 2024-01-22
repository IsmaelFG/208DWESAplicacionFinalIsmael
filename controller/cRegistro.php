<?php

// Redirige a la página principal de la aplicacion si pulsa volver
if (isset($_REQUEST['volver'])) {
    // Redirige a la página de inicio
    $_SESSION['paginaActiva'] = 'inicioPublico';
    header('Location: index.php');
    exit();
}
$aErrores = [
    'usuario' => '',
    'descUsuario' => '',
    'contrasena' => '',
    'contrasena2' => ''
];
$entradaOK = true; // Indica si todas las respuestas son correctas
if (isset($_REQUEST['registrar'])) {
    $_SESSION['paginaAnterior'] = 'registro';
    // Validar los campos
    $aErrores = [
        'usuario' => (!$_REQUEST['usuario']) ? 'Error de autentificacion. Vuelve a introducir las credenciales.' : validacionFormularios::comprobarAlfaNumerico($_REQUEST['usuario'], 32, 4, 1),
        'descUsuario' => (!$_REQUEST['descUsuario']) ? 'Error de autentificacion. Vuelve a introducir las credenciales.' : validacionFormularios::comprobarAlfaNumerico($_REQUEST['descUsuario'], 32, 4, 1),
        'contrasena' => (!$_REQUEST['contrasena']) ? 'Error de autentificacion. Vuelve a introducir las credenciales.' : validacionFormularios::validarPassword($_REQUEST['contrasena'], 32, 4, 2, 1)
    ];

    //Comprobamos si existe un usuario con ese codigo
    if (UsuarioPDO::comprobarCodUSuario($_REQUEST['usuario'])) {
        $aErrores['usuario'] = "Ya existe un usuario con este codigo";
    }
    //Comprobamos que las 2 contraseñas son iguales
    if ($_REQUEST['contrasena'] != $_REQUEST['contrasena2']) {
        $aErrores['contrasena2'] = "Las contraseñas no son iguales";
    }

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

if ($entradaOK) {
    $oUsuarioActivo = UsuarioPDO::altaUsuario($_REQUEST['usuario'], $_REQUEST['contrasena'], $_REQUEST['descUsuario']);
    $_SESSION['user208DWESLoginLogout'] = $oUsuarioActivo;
    //Redireccionamos a el inicio privado
    $_SESSION['paginaActiva'] = 'inicioPrivado';
    //Redirecciono al index
    header('Location: index.php');
    exit;
}

require_once $view['layout'];
