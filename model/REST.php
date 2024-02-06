<?php

/**
 * @author Ismael Ferreras
 * @version 1.0
 * @since 23/01/2024
 */
class REST {

    const apikeyAEMET = 'eyJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJtaWx1Lm1hc2NvdEBnbWFpbC5jb20iLCJqdGkiOiJhNjM3MTIyOS04OGI4LTQ4MGMtYmNlZC02N2NiNzVjYmRmNTIiLCJpc3MiOiJBRU1FVCIsImlhdCI6MTcwNTk1MjE4MSwidXNlcklkIjoiYTYzNzEyMjktODhiOC00ODBjLWJjZWQtNjdjYjc1Y2JkZjUyIiwicm9sZSI6IiJ9.mGZuRsDqW5jlQXy1ZKuMyTBUHJ0VIN2oBdITtk3S7Nc';
    const apikeyNASA = 'rAIYGgvhzNQg1Lxtpe90waf8orEmQPTrZrfdra14';

    public static function tiempoProvincia($provincia) {
        try {
            // obtenemos el resultado del servidor del api rest
            $respuesta = file_get_contents("https://opendata.aemet.es/opendata/api/prediccion/provincia/hoy/{$provincia}/?api_key=" . self::apikeyAEMET);
            //decodifica el archivo json
            //Devuelve los datos de la web convertidos a utf-8
            return json_decode($respuesta, true);
        } catch (Exception $excepcion) {
            // devolvemos el mensaje de error
            return $excepcion->getMessage();
        }
    }

    /**
     * @author CristinaMLSauces , mejorado por Alvaro Cordero.
     * @version 1.0
     * @since 21/01/2024
     */
    public static function pedirFotoNasa($fecha) {
        try {
            // obtenemos el resultado del servidor del api rest
            $resultado = file_get_contents("https://api.nasa.gov/planetary/apod?api_key=" . self::apikeyNASA . "&date=$fecha");

            // Devolvemos el array devuelto por json_decode
            return json_decode($resultado, true);
        } catch (Exception $excepcion) {
            // devolvemos el mensaje de error
            return $excepcion->getMessage();
        }
    }
}
