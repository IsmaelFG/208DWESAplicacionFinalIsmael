-- Crea la base de datos DB208DWESProyectoTema4
CREATE DATABASE IF NOT EXISTS DB208DWESProyectoTema5;

-- Selecciona la base de datos recién creada
USE DB208DWESProyectoTema5;


-- Crea la tabla Usuarios
CREATE TABLE IF NOT EXISTS T01_Usuario (
    T01_CodUsuario CHAR(8) NOT NULL CHECK(CHAR_LENGTH(T01_CodUsuario) BETWEEN 4 AND 8),
    T01_Password VARCHAR(255) NOT NULL,
    T01_DescUsuario VARCHAR(255) NOT NULL,
    T01_NumConexiones INT NOT NULL DEFAULT 0,
    T01_FechaHoraUltimaConexion DATETIME,
    T01_Perfil ENUM('usuario', 'administrador') NOT NULL DEFAULT 'usuario',
    T01_ImagenUsuario LONGBLOB,
    PRIMARY KEY (T01_CodUsuario));

-- Crea la tabla Departamento
CREATE TABLE IF NOT EXISTS T02_Departamento (
    T02_CodDepartamento CHAR(3) NOT NULL,
    T02_DescDepartamento VARCHAR(255) NOT NULL,
    T02_FechaCreacionDepartamento DATETIME NOT NULL,
    T02_VolumenDeNegocio FLOAT NOT NULL,
    T02_FechaBajaDepartamento DATETIME DEFAULT NULL,
    PRIMARY KEY (T02_CodDepartamento));


CREATE TABLE IF NOT EXISTS T10_Vehiculo (
    T10_Matricula VARCHAR(7) NOT NULL,
    T10_Modelo VARCHAR(50) NOT NULL,
    T10_FechaCompra DATETIME NOT NULL,
    T10_NumPuertas INT NOT NULL,
    T10_Color VARCHAR(50),
    T10_Valor DECIMAL(18,2),
    T10_FechaBaja DATETIME DEFAULT NULL,
    PRIMARY KEY (T10_Matricula));

-- Crear usuario y dar privilegios
CREATE USER 'user208DWESProyectoTema5'@'%' IDENTIFIED BY 'paso';
GRANT ALL PRIVILEGES ON DB208DWESProyectoTema5.* TO 'user208DWESProyectoTema5';
