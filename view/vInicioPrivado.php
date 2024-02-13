<?php
/**
 * @author Ismael Ferreras García
 * @version 1.0
 * @since 15/01/2024
 */
?>
<a class="navbar-brand text-white">Inicio Privado</a>
</div>
</nav>
<div class="position-absolute top-0 start-50 translate-middle" style="margin-top: 350px">
    <?php
    echo $avInicioPrivado['bienvenida'];
    echo $avInicioPrivado['numConexiones'];
    echo $avInicioPrivado['ultimaConexion'];
    ?>
    <form method="post" action="">
        <input type="submit" name="cerrar_sesion" value="Cerrar Sesión">
        <input type="submit" name="detalle" value="Detalle">
        <input type="submit" name="editarPerfil" value="Editar Perfil">
        <input type="submit" name="rest" value="Rest">
        <input type="submit" name="mtoDepartamento" value="Mto Departamentos">
         <input type="submit" name="mtoVehiculo" value="Mto Vehiculos">
    </form>
</div>



