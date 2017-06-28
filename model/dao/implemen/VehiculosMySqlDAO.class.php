<?php

/**
 * Class that operate on table 'vehiculos'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2017-06-28 02:23
 */
require_once '/../../../config/db/Database.class.php';
require_once '/../interface/VehiculosDAO.class.php';
class VehiculosMySqlDAO implements VehiculosDAO {

    private $conn;
    
    function __construct() {
        $this->conn = Database::connect();
    }
    /**
     * Insert record to table
     *
     * @param VehiculosMySql vehiculo
     */
    public function insert($vehiculo) {
        $query = 'INSERT INTO vehiculos (idVehiculos,marca, placa, tipo, usuarios_id) VALUES (?, ?, ?, ?, ?)';
        $stmt = $this->conn->prepare($query);
        $stmt->bindparam(1, $vehiculo->getIdvehiculos());
        $stmt->bindparam(2, $vehiculo->getMarca());
        $stmt->bindparam(3, $vehiculo->getPlaca());
        $stmt->bindparam(4, $vehiculo->getTipo());
        $stmt->bindparam(5, $vehiculo->getUsuariosId());
        return $stmt->execute();
    }
    
    function getConn() {
        return $this->conn;
    }

    function setConn($conn) {
        $this->conn = $conn;
    }

}
?>