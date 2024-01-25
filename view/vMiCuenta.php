<?php
/**
 * @author Ismael Ferreras García
 * @version 1.0
 * @since 25/01/2024
 */
?>

<a class="navbar-brand text-white">Mi Cuenta</a>
</div>
</nav>
<div class="position-absolute top-0 start-50 translate-middle login" style="margin-top: 350px">
    <form method="post" action="">
        <table>
            <tbody>
                <tr>
                    <td class="d-flex justify-content-start">
                        <label for="usuario">Usuario:</label>
                    </td>
                    <td>
                        <input class="bloqueado d-flex justify-content-start" type="text" name="usuario"
                               value="<?php echo ($aUsuario['codUsuario']); ?>" disabled>
                    </td>
                    <td class="error">
                    </td>
                </tr>
                <tr>
                    <td class="d-flex justify-content-start">
                        <label for="password">Contraseña:</label>
                    </td>
                    <td>
                        <input class="bloqueado d-flex justify-content-start" type="password" name="password"
                               value="<?php echo ($aUsuario['contraseña']); ?>" disabled>
                    </td>
                    <td class="error">
                    </td>
                </tr>
                <tr>
                    <td class="d-flex justify-content-start">
                        <label for="descUsuario">Descripción:</label>
                    </td>
                    <td>                                                     
                        <input class="d-flex justify-content-start" type="text" name="descUsuario" 
                               value="<?php echo (isset($_REQUEST['descUsuario']) ? $_REQUEST['descUsuario'] : $aUsuario['descUsuario']); ?>">
                    </td>
                    <td class="error">
                        <?php
                        if (!empty($aErrores['descUsuario'])) {
                            echo $aErrores['descUsuario'];
                        }
                        ?> 
                    </td>
                </tr>
                <tr>
                    <td class="d-flex justify-content-start">
                        <label for="nConexionesUsuarioAEditar">Número de Conexiones:</label>
                    </td>
                    <td>
                        <input class="bloqueado d-flex justify-content-start" type="text" name="nConexionesUsuarioAEditar"
                               value="<?php echo ($aUsuario['nConexiones']); ?>" disabled>
                    </td>
                    <td class="error">
                    </td>
                </tr>

                <tr>
                    <td class=\"d-flex justify-content-start\">
                        <label for="fechaHoraUltimaConexionAnterior">Última Conexión:</label>
                    </td>
                    <td>
                        <input class="d-flex justify-content-start" type="text" name="fechaHoraUltimaConexionAnterior"
                               value="<?php echo ($aUsuario['fechaHoraUltimaConexionAnterior'] > 1 ? $aUsuario['fechaHoraUltimaConexionAnterior'] : ""); ?>" disabled>
                    </td>
                    <td>
                    </td>
                </tr>
            </tbody>
        </table>
        <input type="submit" name="guardarCambios" value="Guardar Cambios">
        <input type="submit" name="cancelar" value="Cancelar">
        <input type="submit" name="cambiarContraseña" value="Cambiar Contraseña">
        <input type="submit" name="eliminarCuenta" value="Eliminar Cuenta" style="background-color: red">
    </form>
</div>
