<?php

/**
 * @author Ismael Ferreras García
 * @version 1.0
 * @since 12/02/2024
 */
class VehiculoPDO {

    public static function buscarModeloVehiculo($modelo, $orden) {
        // Preparamos y ejecutamos la consulta
        $consulta = "SELECT * FROM T10_Vehiculo WHERE T10_Modelo LIKE '%$modelo%' ORDER BY T10_Modelo $orden";
        $resultadoConsulta = DBPDO::ejecutaConsulta($consulta);
        //Comprueba que haya resultado de la consulta
        if ($resultadoConsulta) {
            //Recorre el resultado de la consulta guardandolo en el objeto vehiculo
            while ($oVehiculo = $resultadoConsulta->fetchObject()) {

                //Creamos un nuevo Vehiculo a partir de los datos que contiene $oVehiculo metiendolos en un array asociativo siendo la clave la matricula 
                $aVehiculos[$oVehiculo->T10_Matricula] = new Vehiculo(
                        $oVehiculo->T10_Matricula,
                        $oVehiculo->T10_Modelo,
                        $oVehiculo->T10_FechaCompra,
                        $oVehiculo->T10_NumPuertas,
                        $oVehiculo->T10_Color,
                        $oVehiculo->T10_Valor,
                        $oVehiculo->T10_FechaBaja);
            }

            //Devolvemos un array con los Vehiculos
            return $aVehiculos;

            //En el caso de que la consulta no se realice	
        } else {

            //Devolvemos false
            return false;
        }
    }

    public static function editarVehiculo($matricula, $color, $valor) {
        // Preparamos la consulta con marcadores de posición
       $consulta = "UPDATE T10_Vehiculo SET T10_Color = '$color', T10_Valor = '$valor' WHERE T10_Matricula = '$matricula'";
        return DBPDO::ejecutaConsulta($consulta);
    }
}

?>