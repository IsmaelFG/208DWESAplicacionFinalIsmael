<a class="navbar-brand text-white">Mantenimiento Departamento</a>
</div>
</nav>
<div class="formulario">
    <form name="formulario" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="form-check-inline">
        <div>
            <label for="DescDepartamento" style="margin-top: 5px;">Departamento: </label>
            <input type="text" id="DescDepartamento" name="DescDepartamento" value="<?php echo $_SESSION['criterioBusquedaDepartamentos']['descripcionBuscada'] ?? ''; ?>">
            <input type="submit" value="Buscar" name="buscarDepartamentoPorDesc">
            <?php echo ($aErrores['DescDepartamento'] != null ? "<span style='color:red'>" . $aErrores['DescDepartamento'] . "</span>" : null); ?>
            <div class="botonsMTO">
                <input type="submit" value="Cancelar" name="salirDepartamentos">
            </div>
        </div>
    </form>
</div>
<div class="tablas">
    <?php
    echo "<table class='table table-bordered'><thead><tr><th>Codigo</th><th>Descripcion</th><th>FechaCreacion</th><th>VolumenNegocio</th><th>FechaBaja</th></tr></thead><tbody>";
    foreach ($aDepartamentosVista as $aDepartamento) {
        echo "<tr>";
        echo ("<td>" . $aDepartamento['codDepartamento'] . "</td>");
        echo ("<td>" . $aDepartamento['descDepartamento'] . "</td>");
        echo ("<td>" . $aDepartamento['fechaCreacionDep'] . "</td>");
        echo ("<td>" . $aDepartamento['volumenDeNegocio'] . "</td>");
        echo ("<td>" . $aDepartamento['fechaBajaDep'] . "</td>");
        echo "</tr>";
    }
    echo "</tbody></table>";
    ?>
</div>