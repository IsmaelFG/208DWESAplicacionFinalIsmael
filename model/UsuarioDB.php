<?php

/**
 * Interfaz para la clase UsuarioPDO
 * @author Ismael Ferreras García
 * @version 1.0
 * @since 15/01/2024
 */
interface UsuarioDB {

    // Validar las credenciales del usuario
    public static function validarUsuario($codUsuario, $password);
}
