<?php
/**
 * Class that operate on table 'usuarios'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2017-06-28 02:23
 */
require_once '/../../../config/db/Database.class.php';
require_once '/../interface/UsuariosDAO.class.php';
class UsuariosMySqlDAO implements UsuariosDAO{

    private $conn;
    
    function __construct() {
        $this->conn = Database::connect();
    }
	
     public function insertar($usuario) {
         echo'llego';
        $query = "INSERT INTO usuarios (idUsuario,nombre,correo,estado,contrasena) VALUES(?,?,?,?,?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindparam(1, $usuario->getIdUsuario());
        $stmt->bindparam(2, $usuario->getNombre());
        $stmt->bindparam(3, $usuario->getCorreo());
        $stmt->bindparam(4, $usuario->getEstado());
        $stmt->bindparam(5, $usuario->getContrasena());
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