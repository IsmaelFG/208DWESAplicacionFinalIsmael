<a class="navbar-brand text-white">Error</a>
</div>
</nav>

<div class="container mt-3">
    <div class="row mb-5">
        <div class="col text-center">
            <table>
                <thead>
                    <tr>
                        <th class="rounded-top" colspan="2"><legend>ERROR</legend></th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Código:</td>
                        <td><?php echo $sCodError ?></td>
                    </tr>
                    <tr>
                        <td>Descripción:</td>
                        <td><?php echo $sDescError ?></td>
                    </tr>
                    <tr>
                        <td>Archivo:</td>
                        <td><?php echo $sArchivoError ?></td>
                    </tr>
                    <tr>
                        <td>Línea:</td>
                        <td><?php echo $iLineaError ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <form action="" method="post">
        <input class="volver" type="submit" name="volver" value="Volver">
    </form>
</div>