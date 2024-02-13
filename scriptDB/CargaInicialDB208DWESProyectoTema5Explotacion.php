<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CargaInicialExplotacion</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="/208DWESProyectoTema3/webroot/css/style.css">
        <style>
            body {
                margin-top: 70px;
                margin-bottom: 100px;
                font-family: Arial, sans-serif;
            }

            .navbar {
                background-color: #007BFF;
            }

            .navbar-brand {
                color: #fff;
            }
        </style>
    </head>
    <body style="margin-top:70px; margin-bottom: 100px">
        <nav class="navbar navbar-expand-lg bg-primary fixed-top">
            <div class="container">
                <a class="navbar-brand text-white" href="/index.html">CargaInicialExplotacion</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
        <?php
        $dsn = 'mysql:host=db5014806782.hosting-data.io;dbname=dbs12302442';
        $username = 'dbu3996658';
        $password = 'daw2_Sauces';

        try {
            $conn = new PDO($dsn, $username, $password);

            $query = "INSERT INTO dbs12302442.T02_Departamento (T02_CodDepartamento, T02_DescDepartamento, T02_FechaCreacionDepartamento, T02_VolumenDeNegocio, T02_FechaBajaDepartamento) VALUES
    ('D01', 'Departamento 1', now(), 50000.00, NULL),
    ('D02', 'Departamento 2', now(), 75000.00, '2023-02-15 14:45:00'),
    ('D03', 'Departamento 3', now(), 30000.00, NULL),
    ('D04', 'Departamento 4', now(), 100000.00, '2023-03-10 18:30:00'),
    ('D05', 'Departamento 5', now(), 60000.00, NULL);";

            $query2 = "INSERT INTO dbs12302442.T01_Usuario (T01_CodUsuario, T01_Password, T01_DescUsuario,T01_Perfil) VALUES
  ('admin', SHA2(CONCAT('admin', 'paso'), 256), 'administrador', 'administrador'),
  ('alvaro', SHA2(CONCAT('alvaro', 'paso'), 256), 'Álvaro Cordero Miñambres', 'usuario'),
  ('carlos', SHA2(CONCAT('carlos', 'paso'), 256), 'Carlos García Cachón', 'usuario'),
  ('oscar', SHA2(CONCAT('oscar', 'paso'), 256), 'Oscar Pascual Ferrero', 'usuario'),
  ('borja', SHA2(CONCAT('borja', 'paso'), 256), 'Borja Nuñez Refoyo', 'usuario'),
  ('rebeca', SHA2(CONCAT('rebeca', 'paso'), 256), 'Rebeca Sánchez Pérez', 'usuario'),
  ('erika', SHA2(CONCAT('erika', 'paso'), 256), 'Erika Martínez Pérez', 'usuario'),
  ('ismael', SHA2(CONCAT('ismael', 'paso'), 256), 'Ismael Ferreras García', 'usuario'),
  ('heraclio', SHA2(CONCAT('heraclio', 'paso'), 256), 'Heraclio Borbujo Moran', 'administrador'),
  ('amor', SHA2(CONCAT('amor', 'paso'), 256), 'Amor Rodriguez Navarro', 'administrador');";

            $query3 = "INSERT INTO T10_Vehiculo (T10_Matricula, T10_Modelo, T10_FechaCompra, T10_NumPuertas, T10_Color, T10_Valor, T10_FechaBaja) VALUES
            ('ABC1234', 'Toyota Corolla', '2023-01-15 10:30:00', 4, 'Rojo', 15000.00, NULL),
            ('DEF5678', 'Honda Civic', '2022-11-20 14:45:00', 4, 'Azul', 18000.50, NULL),
            ('GHI9012', 'Ford Mustang', '2023-05-10 09:15:00', 2, 'Negro', 35000.75, NULL),
            ('JKL3456', 'Chevrolet Camaro', '2023-07-05 11:00:00', 2, 'Blanco', 32000.25, NULL),
            ('MNO7890', 'Volkswagen Golf', '2023-03-28 08:00:00', 4, 'Gris', 22000.00, NULL)";

            $conn->exec($query);
            $conn->exec($query2);
            $conn->exec($query3);
            echo 'Consulta ejecutada con éxito';
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
        ?>


        <footer class="bg-primary text-light py-4 fixed-bottom">
            <div class="container">
                <div class="row">
                    <div class="col text-center text-white">
                        <a href="/index.html">
                            <p class="text-white">&copy; 2023/24 Ismael Ferreras
                                García. Todos los derechos
                                reservados.</p>
                        </a>
                    </div>
                    <div class="col text-end">
                        <a href="../indexProyectoTema4.html">
                            <img src="/webroot/imagenes/casa-removebg-preview.png" alt="Home" width="35" height="35">
                        </a>
                        <a href="https://github.com/IsmaelFG" target="_blank">
                            <img src = "/webroot/imagenes/github-removebg-preview.png" alt = "GitHub" width = "35" height = "35">
                        </a>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>
