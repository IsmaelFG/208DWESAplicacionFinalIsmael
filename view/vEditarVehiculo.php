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
<div class="position-absolute top-0 start-50 translate-middle login" style="margin-top: 350px; width: 700px;">
    <form method="post" action="">
        <table>
            <tbody>
                <tr>
                    <td class="d-flex justify-content-start">
                        <label for="matricula">Matricula:</label>
                    </td>
                    <td>
                        <input class="d-flex justify-content-start" type="text" name="matricula"
                               value="<?php echo ($matricula); ?>" disabled>
                    </td>
                </tr>
                <tr>
                    <td class="d-flex justify-content-start">
                        <label for="modelo">Modelo:</label>
                    </td>
                    <td>
                        <input class="d-flex justify-content-start" type="text" name="modelo"
                               value="<?php echo ($modelo); ?>">
                    </td>
                    <td class="error">
                        <?php
                        if (!empty($aErrores['modelo'])) {
                            echo $aErrores['modelo'];
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td class="d-flex justify-content-start">
                        <label for="fechaCompra">Fecha Compra:</label>
                    </td>
                    <td>
                        <input class="d-flex justify-content-start" type="text" name="fechaCompra"
                               value="<?php echo ($fechaCompra); ?>" disabled>
                    </td>
                </tr>
                <tr>
                    <td class="d-flex justify-content-start">
                        <label for="numPuertas">Numero de Puertas:</label>
                    </td>
                    <td>
                        <input class="d-flex justify-content-start" type="text" name="numPuertas"
                               value="<?php echo ($numPuertas); ?>">
                    </td>
                    <td class="error">
                        <?php
                        if (!empty($aErrores['numPuertas'])) {
                            echo $aErrores['numPuertas'];
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td class="d-flex justify-content-start">
                        <label for="color">Color:</label>
                    </td>
                    <td>                                                     
                        <input class="d-flex justify-content-start" type="text" name="color" 
                               value="<?php echo ($color); ?>">
                    </td>
                    <td class="error">
                        <?php
                        if (!empty($aErrores['color'])) {
                            echo $aErrores['color'];
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td class="d-flex justify-content-start">
                        <label for="valor">Valor:</label>
                    </td>
                    <td>
                        <input class="d-flex justify-content-start" type="text" name="valor"
                               value="<?php echo ($valor); ?>">
                    </td>
                    <td class="error">
                        <?php
                        if (!empty($aErrores['valor'])) {
                            echo $aErrores['valor'];
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td class="d-flex justify-content-start">
                        <label for="fechaBaja">Fecha Baja:</label>
                    </td>
                    <td>
                        <input class="d-flex justify-content-start" type="text" name="fechaBaja"
                               value="<?php echo ($fechaBaja); ?>" disabled>
                    </td>
                </tr>
            </tbody>
        </table>
        <input type="submit" name="guardarCambios" value="Guardar Cambios">
        <input type="submit" name="cancelar" value="Cancelar">
    </form>
</div>
