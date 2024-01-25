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
    <label for="provincia">Selecciona una provincia:</label>
    <select name="provincia" id="provincia">
        <?php
        // Genera las opciones de la lista desplegable
        foreach ($provincias as $codigo_aemet => $nombre_provincia) {
            echo "<option value=\"$codigo_aemet\">$nombre_provincia</option>";
        }
        ?>
    </select>
    <button class="volver" type="submit" name="prevision">Obtener Previsión</button>
</form>
<?php
//Muestra con formato los datos
echo "<pre>{$prevision}</pre>";
?>
<form name="formulario1" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" ">
    <fieldset class=" nasa">
        <legend>
            <h2>Foto del dia de la nasa</h2>
        </legend>
        <input type="date" name="fecha" max=<?php $hoy = date("Y-m-d");
echo $hoy; ?>>
        <input type="submit" value="Aceptar" name="nasa" >
        <p><b>Descripcion:</b> <?php echo $explicacion; ?></p>
        <p><b>Titulo de la Imagen:</b> <?php echo $title; ?></p>
        <img src="<?php echo $imagen; ?>" width="300px" height="300px" />
    </fieldset>
    <button class="volver" type="submit" name="volver">Volver</button>
</form>
