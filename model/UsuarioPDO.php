<?php

/**
 * @author Ismael Ferreras García
 * @version 1.0
 * @since 15/01/2024
 */
class UsuarioPDO implements UsuarioDB {

    public static function validarUsuario($codUsuario, $password) {
        $oUsuario = null;
        $consulta = <<<CONSULTA
            SELECT * FROM T01_Usuario 
            WHERE T01_CodUsuario = '{$codUsuario}' 
            AND T01_Password = SHA2('{$codUsuario}{$password}', 256);
        CONSULTA;
        // Ejecuta la consulta
        $resultado = DBPDO::ejecutaConsulta($consulta);
        // Si el resultado de la consulta tiene valor guarda el resultado en el objeto oUsuario
        if ($resultado->rowCount() > 0) {
            $oResultado = $resultado->fetchObject();
            // Instancia un nuevo objeto Usuario con todas sus propiedades
            if ($oResultado) {
                $oUsuario = new Usuario(
                        $oResultado->T01_CodUsuario,
                        $oResultado->T01_Password,
                        $oResultado->T01_DescUsuario,
                        $oResultado->T01_NumConexiones,
                        $oResultado->T01_FechaHoraUltimaConexion,
                        $oResultado->T01_FechaHoraUltimaConexionAnterior = null,
                        $oResultado->T01_Perfil
                );
            }
        }
        //Devuelve el objeto usuario
        return $oUsuario;
    }

    public static function registrarUltimaConexion($oUsuario) {

        $oUsuario->setnumAcceso($oUsuario->getnumAcceso() + 1);
        $oUsuario->setfechaHoraUltimaConexionAnterior($oUsuario->getfechaHoraUltimaConexion());

        //Realizamos un uptade
        $consultaActualizacionFechaUltimaConexion = <<<CONSULTA
            UPDATE T01_Usuario 
            SET T01_NumConexiones=T01_NumConexiones+1, T01_FechaHoraUltimaConexion=now() 
            WHERE T01_CodUsuario='{$oUsuario->getCodUsuario()}';
        CONSULTA;
        DBPDO::ejecutaConsulta($consultaActualizacionFechaUltimaConexion);
        return $oUsuario;
    }

    public static function altaUsuario($codUsuario, $password, $descUsuario) {
        // Ejecuta la consulta
        $consultaCrearUsuario = <<<CONSULTA
            INSERT INTO T01_Usuario(T01_CodUsuario, T01_Password, T01_DescUsuario, T01_NumConexiones, T01_FechaHoraUltimaConexion) 
            VALUES ("{$codUsuario}", SHA2("{$codUsuario}{$password}", 256), "{$descUsuario}", 1, now());
        CONSULTA;

        if (DBPDO::ejecutaConsulta($consultaCrearUsuario)) {
            //Devuelve nuevo usuario
            return new Usuario($codUsuario, $password, $descUsuario, 1, date('Y-m-d H:i:s'), null, 'usuario');
        } else {
            //Si no se ejecuta devuelve false
            return false;
        }
    }

    public static function comprobarCodUSuario($codUsuario) {
        $consultaCodUsuario = <<<CONSULTA
            SELECT * FROM T01_Usuario 
            WHERE T01_CodUsuario = '{$codUsuario}' ;
        CONSULTA;
        $resultado = DBPDO::ejecutaConsulta($consultaCodUsuario);
        if ($resultado->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
