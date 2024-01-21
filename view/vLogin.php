<?php
/**
 * @author Ismael Ferreras García
 * @version 1.0
 * @since 14/01/2024
 */
?>
<a class="navbar-brand text-white">Login</a>
</div>
</nav>
<form class="login" action="<?php echo $_SERVER ['PHP_SELF']; ?>" method="post">
    <table>
        <tr>
            <td><label for="usuario">Usuario:</label></td>
            <td><input class="obligatorio" type="text" id="usuario" name="usuario" value="<?php echo (isset($_REQUEST['usuario']) ? $_REQUEST['usuario'] : ''); ?>"></td>
        </tr>
        <tr>
            <td><laorio" type="password" id="contrasena" name="contrasena" value="bel for="contrasena">Contraseña:</label></td>
            <td><input class="obligatorio" type="password" id="contrasena" name="contrasena" value="<?php echo (isset($_REQUEST['contrasena']) ? $_REQUEST['contrasena'] : ''); ?>"></td>
        </tr>
    </table>
    <p class='error'><?php echo (!empty($aErrores["usuario"]) ? $aErrores["usuario"] : ''); ?></p>
    <input name="enviar" type="submit" value="Iniciar Sesion">
    <input class="volver" type="submit" name="volver" value="Volver">
</form>
