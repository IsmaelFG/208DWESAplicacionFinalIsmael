<?php

/**
 * @author Ismael Ferreras García
 * @version 1.0
 * @since 25/01/2024
 */
//Array con la informacion del usuario
$aUsuario = [
    'codUsuario' => $_SESSION['user208DWESLoginLogout']->getcodUsuario(),
    'contraseña' => $_SESSION['user208DWESLoginLogout']->getpassword(),
    'descUsuario' => $_SESSION['user208DWESLoginLogout']->getdescUsuario(),
    'nConexiones' => $_SESSION['user208DWESLoginLogout']->getnumAcceso(),
    'fechaHoraUltimaConexionAnterior' => $_SESSION['user208DWESLoginLogout']->getfechaHoraUltimaConexionAnterior()
];

// Redirige a inicioPrivado
if (isset($_REQUEST['cancelar'])) {
    $_SESSION['paginaActiva'] = 'inicioPrivado';
    header('Location: index.php');
    exit();
}

// Redirige a cambiarPassword
if (isset($_REQUEST['cambiarContraseña'])) {
    $_SESSION['paginaActiva'] = 'cambiarPassword';
    header('Location: index.php');
    exit();
}

// Redirige a borrarCuenta
if (isset($_REQUEST['eliminarCuenta'])) {
    $_SESSION['paginaActiva'] = 'borrarCuenta';
    header('Location: index.php');
    exit();
}
$aErrores['descUsuario'] = "";
$entradaOK = true;
// Guarda los cambios realizados y envia a inicioPrivado
if (isset($_REQUEST['guardarCambios'])) {
    if ($_REQUEST['descUsuario'] != $aUsuario['descUsuario']) {
        $aErrores['descUsuario'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['descUsuario'], 255, 3, 0);
    } else {
        $aErrores['descUsuario'] = "Este usuario ya tiene esta descripcion";
    }
    foreach ($aErrores as $campo => $error) {
        if ($error != null) {
            $entradaOK = false;
            $_REQUEST[$campo] = "";
        }
    }

    if ($entradaOK) {
        $_SESSION['user208DWESLoginLogout'] = UsuarioPDO::modificarUsuario($_SESSION['user208DWESLoginLogout'], $_REQUEST['descUsuario']);
        //Redireccionamos a el inicio privado
        $_SESSION['paginaActiva'] = 'inicioPrivado';
        header('Location: index.php');
        exit();
    }
}

require_once $view['layout'];
?>