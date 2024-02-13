<?php

/**
 * @author Ismael Ferreras García
 * @version 1.0
 * @since 12/02/2024
 */
class Vehiculo {

    private $matricula;
    private $modelo;
    private $fechaCompra;
    private $numPuertas;
    private $color;
    private $valor;
    private $fechaBaja;

    public function __construct($matricula, $modelo, $fechaCompra, $numPuertas, $color, $valor, $fechaBaja=null) {
        $this->matricula = $matricula;
        $this->modelo = $modelo;
        $this->fechaCompra = $fechaCompra;
        $this->numPuertas = $numPuertas;
        $this->color = $color;
        $this->valor = $valor;
        $this->fechaBaja = $fechaBaja;
    }

    public function getMatricula() {
        return $this->matricula;
    }

    public function getModelo() {
        return $this->modelo;
    }

    public function getFechaCompra() {
        return $this->fechaCompra;
    }

    public function getNumPuertas() {
        return $this->numPuertas;
    }

    public function getColor() {
        return $this->color;
    }

    public function getValor() {
        return $this->valor;
    }

    public function getFechaBaja() {
        return $this->fechaBaja;
    }

    public function setMatricula($matricula): void {
        $this->matricula = $matricula;
    }

    public function setModelo($modelo): void {
        $this->modelo = $modelo;
    }

    public function setFechaCompra($fechaCompra): void {
        $this->fechaCompra = $fechaCompra;
    }

    public function setNumPuertas($numPuertas): void {
        $this->numPuertas = $numPuertas;
    }

    public function setColor($color): void {
        $this->color = $color;
    }

    public function setValor($valor): void {
        $this->valor = $valor;
    }

    public function setFechaBaja($fechaBaja): void {
        $this->fechaBaja = $fechaBaja;
    }
}

?>