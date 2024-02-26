<?php
/**
 * @author Ismael Ferreras García
 * @version 1.0
 * @since 14/01/2024
 */
?>
<a class="navbar-brand text-white">Registro</a>
</div>
</nav>
<div class="position-absolute top-0 start-50 translate-middle login" style="margin-top: 350px; width: 700px;">
    <form method="post" action="">
        <table>
            <tr>
                <td><label for="usuario">Usuario:</label></td>
                <td><input class="obligatorio" type="text" id="usuario" name="usuario" value="<?php echo (isset($_REQUEST['usuario']) ? $_REQUEST['usuario'] : ''); ?>"></td>
                <td class='error'><?php echo (!empty($aErrores["usuario"]) ? $aErrores["usuario"] : ''); ?></td>
            </tr>
            <tr>
                <td><label for="descUsuario">Descripcion Usuario:</label></td>
                <td><input class="obligatorio" type="text" id="descUsuario" name="descUsuario" value="<?php echo (isset($_REQUEST['descUsuario']) ? $_REQUEST['descUsuario'] : ''); ?>"></td>
                <td class='error'><?php echo (!empty($aErrores["descUsuario"]) ? $aErrores["descUsuario"] : ''); ?></td>
            </tr>
            <tr>
                <td><label for="contrasena">Contraseña:</label></td>
                <td><input class="obligatorio" type="password" id="contrasena" name="contrasena" value="<?php echo (isset($_REQUEST['contrasena']) ? $_REQUEST['contrasena'] : ''); ?>"></td>
                <td class='error'><?php echo (!empty($aErrores["contrasena"]) ? $aErrores["contrasena"] : ''); ?></td>
            </tr>
            <tr>
                <td><label for="contrasena2">Repetir contraseña:</label></td>
                <td><input class="obligatorio" type="password" id="contrasena2" name="contrasena2" value="<?php echo (isset($_REQUEST['contrasena2']) ? $_REQUEST['contrasena2'] : ''); ?>"></td>
                <td class='error'><?php echo (!empty($aErrores["contrasena2"]) ? $aErrores["contrasena2"] : ''); ?></td>
            </tr>
        </table>

        <input name="registrar" type="submit" value="Regístrate">
        <input class="volver" type="submit" name="volver" value="Volver">
    </form>
</div>
