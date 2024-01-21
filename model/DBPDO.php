<?php

/**
 * @author Ismael Ferreras García
 * @version 1.0
 * @since 15/01/2024
 */
class DBPDO implements DB {

    public static function ejecutaConsulta($sentenciaSQL, $parametros = null) {
        try {
            // Instanciamos un objeto PDO y establecemos la conexión
            $miDB = new PDO(DSN, USERNAME, PASSWORD);
            // Prepara la consulta
            $resultadoConsulta = $miDB->prepare($sentenciaSQL);
            // Ejecuta la consulta
            $resultadoConsulta->execute($parametros);
            // Devuelvo el resultado de la consulta
            return $resultadoConsulta;
            // Código que se ejecuta si hay algún error
        } catch (PDOException $excepcion) {
            $_SESSION['paginaActiva'] = 'error';
            $_SESSION['error'] = new ErrorApp($excepcion->getCode(), $excepcion->getMessage(), $excepcion->getFile(), $excepcion->getLine());
            header('Location:index.php');
            exit;
        } finally {
            // Cierra la conexión con la BD
            unset($miDB);
        }
    }
}