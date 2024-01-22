<?php
/**
 * @author Ismael Ferreras García
 * @version 1.0
 * @since 10/01/2024
 */
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ismael Ferreras García</title>
        <link rel="stylesheet" href="webroot/css/bootstrap.css">
        <link rel="stylesheet" href="webroot/css/style.css">
        <script src="webroot/js/bootstrap.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg bg-primary">
            <div class="container">
                <a class="navbar-brand text-white">LoginLogoff</a>
                <?php require_once $view[$_SESSION['paginaActiva']]; ?>
                <footer class="bg-primary text-light py-4 fixed-bottom">
                    <div class="container">
                        <div class="row">
                            <div class="col text-center text-white">
                                <a href="/index.html">
                                    <p class="text-white">&copy; 2023/24 Ismael Ferreras García. Todos los derechos reservados.</p>
                                </a>
                            </div>
                            <div class="col text-end">
                                <a href="https://github.com/IsmaelFG/208DWESAplicacionFinalIsmael" target="_blank">
                                    <img src="/webroot/imagenes/github-removebg-preview.png" alt="GitHub" width="35" height="35">
                                </a>
                            </div>
                        </div>
                    </div>
                </footer>
                </body>
                </html>