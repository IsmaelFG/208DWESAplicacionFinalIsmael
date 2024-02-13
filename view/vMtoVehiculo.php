<?php
/**
 * @author Ismael Ferreras García
 * @version 1.0
 * @since 12/02/2024
 */
?>
<a class="navbar-brand text-white">Mantenimiento Vehiculo</a>
</div>
</nav>
<div class="formulario">
    <form name="formulario" method="post">
        <div>
            <label for="DescDepartamento" style="margin-top: 5px;">Modelo: </label>
            <input type="text" id="modeloVehiculo" name="modeloVehiculo" value="<?php echo isset($_SESSION['busqueda']) ? $_SESSION['busqueda'] : ''; ?>">
            <input type="submit" value="Buscar" name="buscarModeloVehiculo">
            <?php echo ($aErrores['modeloVehiculo'] != null ? "<span style='color:red'>" . $aErrores['modeloVehiculo'] . "</span>" : null); ?>
            <div class="botonsMTO">
                <input type="submit" value="Volver" name="volver">
            </div>
        </div>
    </form>
</div>
<div class="tablas">
    <?php
    echo "<table class='table table-bordered'><thead><tr><th>Matricula</th><th>Modelo</th><th>Fecha Compra</th><th>Numero de Puertas</th><th>Color</th><th>Valor</th><th>Fecha Baja</th></tr></thead><tbody>";
    foreach ($aVehiculosVista as $aVehiculo) {
        echo "<tr>";
        echo ("<td>" . $aVehiculo['matricula'] . "</td>");
        echo ("<td>" . $aVehiculo['modelo'] . "</td>");
        echo ("<td>" . $aVehiculo['fechaCompra'] . "</td>");
        echo ("<td>" . $aVehiculo['numPuertas'] . "</td>");
        echo ("<td>" . $aVehiculo['color'] . "</td>"); 
        echo ("<td>" . $aVehiculo['valor'] . "</td>");
        echo ("<td>" . $aVehiculo['fechaBaja'] . "</td>");
        echo "</tr>";
    }
    echo "</tbody></table>";
    ?>
</div>