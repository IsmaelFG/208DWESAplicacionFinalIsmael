<?php
/**
 * @author Ismael Ferreras García
 * @version 1.0
 * @since 25/01/2024
 */
?>

<a class="navbar-brand text-white">Editar Vehiculo</a>
</div>
</nav>
<div class="position-absolute top-0 start-50 translate-middle login" style="margin-top: 350px">
    <form method="post" action="">
        <table>
            <tbody>
                <tr>
                    <td class="d-flex justify-content-start">
                        <label for="matricula">Matricula:</label>
                    </td>
                    <td>
                        <input class="d-flex justify-content-start" type="text" name="matricula"
                               value="<?php echo ($_SESSION['vehiculoEditar']['matricula']); ?>" disabled>
                    </td>
                    <td class="error">
                    </td>
                </tr>
                <tr>
                    <td class="d-flex justify-content-start">
                            <label for="modelo">Modelo:</label>
                    </td>
                    <td>
                        <input class="d-flex justify-content-start" type="text" name="modelo"
                               value="<?php echo ($_SESSION['vehiculoEditar']['modelo']); ?>" disabled>
                    </td>
                    <td class="error">
                    </td>
                </tr>
                <tr>
                    <td class="d-flex justify-content-start">
                        <label for="color">Color:</label>
                    </td>
                    <td>                                                     
                        <input class="d-flex justify-content-start" type="text" name="color" 
                               value="<?php echo ($_SESSION['vehiculoEditar']['color']); ?>">
                    </td>
                </tr>
                <tr>
                    <td class="d-flex justify-content-start">
                        <label for="valor">Valor:</label>
                    </td>
                    <td>
                        <input class="d-flex justify-content-start" type="text" name="valor"
                               value="<?php echo ($_SESSION['vehiculoEditar']['valor']); ?>">
                    </td>
                    <td class="error">
                    </td>
                </tr>
            </tbody>
        </table>
        <input type="submit" name="guardarCambios" value="Guardar Cambios">
        <input type="submit" name="cancelar" value="Cancelar">
    </form>
</div>
