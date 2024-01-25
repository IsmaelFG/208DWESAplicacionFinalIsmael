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
<?php 
echo $avInicioPrivado['bienvenida'];
echo $avInicioPrivado['numConexiones'];
echo $avInicioPrivado['ultimaConexion'];
?>
<form method="post" action="">
    <input class="cerrar_sesion" type="submit" name="cerrar_sesion" value="Cerrar Sesión">
    <input class="detalle" type="submit" name="detalle" value="Detalle">
    <input class="rest" type="submit" name="rest" value="Rest">
</form>



