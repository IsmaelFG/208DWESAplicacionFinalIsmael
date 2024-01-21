<?php

/**
 * @author Carlos García Cachón
 * @version 1.0
 * @since 15/01/2024
 */
interface DB {

    //Ejecuta las sentencias SQL recibidas
    public static function ejecutaConsulta($sentenciaSQL, $parametros = null);
}
