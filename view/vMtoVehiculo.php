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
<div style="margin: 20px;" class="login">
    <form name="formulario" method="post">
        <label for="modeloVehiculo" style="margin-top: 5px; display: inline-block;">Modelo:</label>
        <input type="text" id="modeloVehiculo" name="modeloVehiculo" value="<?php echo isset($_SESSION['busqueda']) ? $_SESSION['busqueda'] : ''; ?>">
        <input type="submit" value="Buscar" name="buscarModeloVehiculo">
        <?php echo ($aErrores['modeloVehiculo'] != null ? "<span style='color:red'>" . $aErrores['modeloVehiculo'] . "</span>" : null); ?>
    </form>
</div>
<div style="margin: 20px;">
    <?php
    echo "<table class='table table-bordered'><thead><tr><th>Matricula</th><th>Modelo <form method='post' style='display: inline;'><button type='submit' name='ordenAscendente'>&#x25B2;</button>
<button type='submit' name='ordenDescendente'>&#x25BC;</button></form></th><th>Fecha Compra</th><th>Numero de Puertas</th><th>Color</th><th>Valor</th><th>Fecha Baja</th><th>Acciones</th></tr></thead><tbody>";
    foreach ($aVehiculosVista as $aVehiculo) {
        echo "<tr>";
        echo ("<td>" . $aVehiculo['matricula'] . "</td>");
        echo ("<td>" . $aVehiculo['modelo'] . "</td>");
        echo ("<td>" . $aVehiculo['fechaCompra'] . "</td>");
        echo ("<td>" . $aVehiculo['numPuertas'] . "</td>");
        echo ("<td>" . $aVehiculo['color'] . "</td>");
        echo ("<td>" . $aVehiculo['valor'] . "</td>");
        echo ("<td>" . $aVehiculo['fechaBaja'] . "</td>");
        //json_encode codificamos el array para poder enviarlo como value 
        echo ("<td>
  <form method='POST'>
    <button type='submit' name='editar' value='" . $aVehiculo['matricula'] . "'>
      <img style='width:20px;' src='webroot/imagenes/lapiz.png'>
    </button>
    <button type='submit' name='mostrar' value='" . $aVehiculo['matricula'] . "'>
      <img style='width:20px;' src='webroot/imagenes/ojo-removebg-preview.png'>
    </button>
    <button type='submit' name='eliminar' value='" . $aVehiculo['matricula'] . "'>
      <img style='width:20px;' src='webroot/imagenes/papelera.png'>
    </button>
  </form>
</td>");
        echo "</tr>";
    }
    echo "</tbody></table>";
    ?>
    <form>
        <input type="submit" name="volver" value="Volver">
        <input type="submit" name="altaVehiculo" value="Añadir Vehiculo">
    </form>
</div>