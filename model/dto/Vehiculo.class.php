<?php
	/**
	 * Object represents table 'vehiculos'
	 *
     	 * @author: http://phpdao.com
     	 * @date: 2017-06-28 02:23	 
	 */
	class Vehiculo{
		
		var $idvehiculos;

		var $marca;

		var $placa;

		var $tipo;

		var $usuariosId;
                
                function __construct($idvehiculos, $marca, $placa, $tipo, $usuariosId) {
                    $this->idvehiculos = $idvehiculos;
                    $this->marca = $marca;
                    $this->placa = $placa;
                    $this->tipo = $tipo;
                    $this->usuariosId = $usuariosId;
                }
                
                function getIdvehiculos() {
                    return $this->idvehiculos;
                }

                function getMarca() {
                    return $this->marca;
                }

                function getPlaca() {
                    return $this->placa;
                }

                function getTipo() {
                    return $this->tipo;
                }

                function getUsuariosId() {
                    return $this->usuariosId;
                }

                function setIdvehiculos($idvehiculos) {
                    $this->idvehiculos = $idvehiculos;
                }

                function setMarca($marca) {
                    $this->marca = $marca;
                }

                function setPlaca($placa) {
                    $this->placa = $placa;
                }

                function setTipo($tipo) {
                    $this->tipo = $tipo;
                }

                function setUsuariosId($usuariosId) {
                    $this->usuariosId = $usuariosId;
                }




		
	}
?>