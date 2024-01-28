<?php
/**
 * @author Ismael Ferreras García
 * @version 1.0
 * @since 23/01/2024
 */
?>
<a class="navbar-brand text-white">Rest</a>
</div>
</nav>
<form method="post">
    <legend>
        <h2>Tiempo por provincia AEMET</h2>
    </legend>
    <label for="provincia">Selecciona una provincia:</label>
    <select name="provincia" id="provincia">
        <?php
        // Recorremos el array de provincias
        foreach ($provincias as $codigo_aemet => $nombre_provincia) {
            // Comprobamos si esta provincia fue seleccionada en la última solicitud
            if (isset($_SESSION['provinciaSeleccionada']) && $_SESSION['provinciaSeleccionada'] == $codigo_aemet) {
                 echo "<option value=\"$codigo_aemet\" selected>$nombre_provincia</option>";
            }
            echo "<option value=\"$codigo_aemet\">$nombre_provincia</option>";
        }
        ?>
    </select>
    <button class="volver" type="submit" name="prevision">Obtener Previsión</button>
</form>
<?php
//Muestra con formato los datos
if (isset($_SESSION['prevision'])) {
    echo "<pre>{$_SESSION['prevision']}</pre>";
}
?>
<form name="formulario1" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" ">
    <fieldset class=" nasa">
        <legend>
            <h2>Foto del dia de la nasa</h2>
        </legend>
        <input type="date" name="fecha" value="<?php echo isset($_SESSION['nasaFecha']) ? $_SESSION['nasaFecha'] : "" ?>" max=<?php
        $hoy = date("Y-m-d");
        echo $hoy;
        ?>>
        <input type="submit" value="Aceptar" name="nasa" >
        <?php if (isset($_SESSION['nasaExplicacion']) && isset($_SESSION['nasaImagen']) && isset($_SESSION['nasaTitulo'])) { ?>
            <p><b>Descripcion:</b> <?php echo $_SESSION['nasaExplicacion']; ?></p>
            <p><b>Titulo de la Imagen:</b> <?php echo $_SESSION['nasaTitulo']; ?></p>
            <img src="<?php echo $_SESSION['nasaImagen']; ?>" width="300px" height="300px" />
            <?php } ?>
    </fieldset>
    <button class="volver" type="submit" name="volver">Volver</button>
</form>
