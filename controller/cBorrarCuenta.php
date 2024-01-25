<?php

//Si el usuario pulsa cancelar  lo envia a miCuenta
if (isset($_REQUEST['cancelar'])) {
    $_SESSION['paginaActiva'] = 'miCuenta';
    header('Location: index.php');
    exit;
}
//Si pulsa el boton borrarCuenta, se borra la cuenta y redirige a inicioPublico
if (isset($_REQUEST['borrarCuenta'])) { 
    $oUsuarioAEliminar = $_SESSION['user208DWESLoginLogout']->getcodUsuario();
    
    if (UsuarioPDO::borrarUsuario($oUsuarioAEliminar)) {
        session_destroy();
        $_SESSION['paginaActiva'] = 'inicioPublico';
        header('Location: index.php');
        exit;
    }
}
require_once $view['layout'];
?>
