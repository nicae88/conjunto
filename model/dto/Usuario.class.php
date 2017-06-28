<?php
	/**
	 * Object represents table 'usuarios'
	 *
     	 * @author: http://phpdao.com
     	 * @date: 2017-06-28 02:23	 
	 */
	class Usuario{
		
		var $idUsuario;

		var $nombre;

		var $correo;

		var $estado;

                var $contrasena;    
                
                function __construct($idUsuario, $nombre, $correo, $estado, $contrasena) {
                    $this->idUsuario = $idUsuario;
                    $this->nombre = $nombre;
                    $this->correo = $correo;
                    $this->estado = $estado;
                    $this->contrasena = $contrasena;
                }
                
		function getIdUsuario() {
                    return $this->idUsuario;
                }

                function getNombre() {
                    return $this->nombre;
                }

                function getCorreo() {
                    return $this->correo;
                }

                function getEstado() {
                    return $this->estado;
                }

                function getContrasena() {
                    return $this->contrasena;
                }

                function setIdUsuario($idUsuario) {
                    $this->idUsuario = $idUsuario;
                }

                function setNombre($nombre) {
                    $this->nombre = $nombre;
                }

                function setCorreo($correo) {
                    $this->correo = $correo;
                }

                function setEstado($estado) {
                    $this->estado = $estado;
                }

                function setContrasena($contrasena) {
                    $this->contrasena = $contrasena;
                }

     }
?>