<a class="navbar-brand text-white">Detalle</a>
</div>
</nav>
<form action="" method="post">
    <input class="volver" type="submit" name="volver" value="Volver">
</form>
<?php
/**
 * @author Ismael Ferreras García
 * @version 1.0
 * @since 21/11/2023
 */
if (isset($_SESSION)) {
    echo '<br><br><h2>Variable <b>$_SESSION</b></h2>';
    foreach ($_SESSION as $key => $value) {
        if ($key === 'user208DWESLoginLogout') {
            echo '<b>user208DWESLoginLogout: </b>'; print_r($_SESSION['user208DWESLoginLogout']);
        } else if ($key === 'nasa') {
            echo '<b>nasa: </b>'; print_r($_SESSION['nasa']);
        } else {
            echo "<b>$key</b>: $value<br>";
        }
    }
} else {
    echo '<h2>La variable <b>$_SESSION</b> no está definida</h2>';
}

echo '<br><br><h2>Variable <b>$_COOKIE</b></h2>';
foreach ($_COOKIE as $key => $value) {
    echo "<b>$key</b>: $value<br>";
}
echo '<br><br><h2>Variable <b>$_SERVER</b></h2>';
foreach ($_SERVER as $key => $value) {
    echo "<b>$key</b>: $value<br>";
}

echo '<br><br><h2>Variable <b>$_GET</b></h2>';
foreach ($_GET as $key => $value) {
    echo "<b>$key</b>: $value<br>";
}

echo '<br><br><h2>Variable <b>$_POST</b></h2>';
foreach ($_POST as $key => $value) {
    echo "$key: $value<br>";
}

echo '<br><br><h2>Variable <b>$_FILES</b></h2>';
foreach ($_FILES as $key => $value) {
    echo "<b>$key</b>: $value<br>";
}

echo '<br><br><h2>Variable <b>$_REQUEST</b></h2>';
foreach ($_REQUEST as $key => $value) {
    echo "<b>$key</b>: $value<br>";
}

echo '<br><br><h2>Variable <b>$_ENV</b></h2>';
foreach ($_ENV as $key => $value) {
    echo "<b>$key</b>: $value<br>";
}

echo '<br><br><h2>Variable <b>$GLOBALS</b></h2>';
echo '<pre>';
print_r($GLOBALS);
echo '</pre>';
phpinfo();
?>