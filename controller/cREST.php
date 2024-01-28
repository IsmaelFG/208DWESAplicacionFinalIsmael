<?php

/**
 * @author Ismael Ferreras García
 * @version 1.0
 * @since 23/01/2024
 */
// Array asociativo con códigos INE y nombres de provincias
$provincias = array(
    '01' => 'Araba/Álava',
    '02' => 'Albacete',
    '03' => 'Alacant/Alicante',
    '04' => 'Almería',
    '33' => 'Asturias',
    '05' => 'Ávila',
    '06' => 'Badajoz',
    '08' => 'Barcelona',
    '48' => 'Bizkaia',
    '09' => 'Burgos',
    '10' => 'Cáceres',
    '11' => 'Cádiz',
    '39' => 'Cantabria',
    '12' => 'Castelló/Castellón',
    '51' => 'Ceuta',
    '13' => 'Ciudad Real',
    '14' => 'Córdoba',
    '15' => 'A Coruña',
    '16' => 'Cuenca',
    '17' => 'Girona',
    '18' => 'Granada',
    '19' => 'Guadalajara',
    '20' => 'Gipuzkoa',
    '21' => 'Huelva',
    '22' => 'Huesca',
    '23' => 'Jaén',
    '24' => 'León',
    '25' => 'Lleida',
    '27' => 'Lugo',
    '28' => 'Madrid',
    '29' => 'Málaga',
    '52' => 'Melilla',
    '30' => 'Murcia',
    '31' => 'Navarra',
    '32' => 'Ourense',
    '34' => 'Palencia',
    '36' => 'Pontevedra',
    '26' => 'La Rioja',
    '37' => 'Salamanca',
    '40' => 'Segovia',
    '41' => 'Sevilla',
    '42' => 'Soria',
    '43' => 'Tarragona',
    '44' => 'Teruel',
    '45' => 'Toledo',
    '46' => 'València/Valencia',
    '47' => 'Valladolid',
    '49' => 'Zamora',
    '50' => 'Zaragoza',
);

if (empty($_SESSION['user208DWESLoginLogout'])) {
    // Redirige a la página de inicio
    $_SESSION['paginaActiva'] = 'inicioPublico';
    header('Location: index.php');
    exit();
}

if (isset($_REQUEST['volver'])) {
    // Redirige a la página principal del programa
    $_SESSION['paginaActiva'] = 'inicioPrivado';
    header('Location: index.php');
    exit();
}


if (isset($_REQUEST['prevision'])) {
    $_SESSION['provinciaSeleccionada'] = $_REQUEST['provincia'];
    $_SESSION['prevision'] = REST::tiempoProvincia($_REQUEST['provincia']);
}


/**
 * @author CristinaMLSauces , mejorado por Ismael Ferreras García.
 * @version 1.0
 * @since 21/01/2024
 */
if (isset($_REQUEST['nasa'])) {

    //Guardamos la informacion de la api en una variable
    $Nasa = REST::pedirFotoNasa($_REQUEST['fecha']);

    //Guardamos el texto en una variable
    $_SESSION['nasaExplicacion'] = $Nasa['explanation'];

    //Guardamos la url de la imagen en una variable
    $_SESSION['nasaImagen'] = $Nasa['hdurl'];

    //Gurdamos el titulo en una variable
    $_SESSION['nasaTitulo'] = $Nasa['title'];
    
    $_SESSION['nasaFecha']=$_REQUEST['fecha'];
}
require_once $view['layout'];
?>