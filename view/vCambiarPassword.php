<?php
/**
 * @author Ismael Ferreras García
 * @version 1.0
 * @since 25/01/2024
 */
?>
<a class="navbar-brand text-white">Cambiar Password</a>
</div>
</nav>
<form class="position-absolute top-0 start-50 translate-middle login" style="margin-top: 350px" action="<?php echo $_SERVER ['PHP_SELF']; ?>" method="post">
    <fieldset>
        <table>
            <tbody>
                <tr>
                    <td class="d-flex justify-content-start">
                        <label for="contraseña">Contraseña Actual:</label>
                    </td>
                    <td>                                                                                               
                        <input class="obligatorio d-flex justify-content-start" type="password" name="contraseña" value="<?php echo (isset($_REQUEST['contraseña']) ? $_REQUEST['contraseña'] : ''); ?>">
                    </td>
                    <td class="error">
                        <?php
                        if (!empty($aErrores['contraseña'])) {
                            echo $aErrores['contraseña'];
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td class="d-flex justify-content-start">
                        <label for="nuevaContraseña">Nueva Contraseña:</label>
                    </td>
                    <td>                                                                                               
                        <input class="obligatorio d-flex justify-content-start" type="password" name="nuevaContraseña" value="<?php echo (isset($_REQUEST['nuevaContraseña']) ? $_REQUEST['nuevaContraseña'] : ''); ?>">
                    </td>
                    <td class="error">
                        <?php
                        if (!empty($aErrores['nuevaContraseña'])) {
                            echo $aErrores['nuevaContraseña'];
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <!-- repetirNuevaContraseña Obligatorio -->
                    <td class="d-flex justify-content-start">
                        <label for="repetirNuevaContraseña">Repetir Nueva Contraseña:</label>
                    </td>
                    <td>                                                                                               
                        <input class="obligatorio d-flex justify-content-start" type="password" name="repetirNuevaContraseña" value="<?php echo (isset($_REQUEST['repetirNuevaContraseña']) ? $_REQUEST['repetirNuevaContraseña'] : ''); ?>">
                    </td>
                    <td class="error">
                        <?php
                        if (!empty($aErrores['repetirNuevaContraseña'])) {
                            echo $aErrores['repetirNuevaContraseña'];
                        }
                        ?>
                    </td>
                </tr>
            </tbody>
        </table>
            <input type="submit" name="guardarCambios" value="Guardar Cambios">
            <input type="submit" name="cancelar" value="Cancelar">
    </fieldset>
</form>
