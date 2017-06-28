<?php

/**
 * DAOFactory
 * @author: http://phpdao.com
 * @date: ${date}
 */
class DAOFactory{
	
	/**
	 * @return ApartamentosDAO
	 */
	public static function getApartamentosDAO(){
		return new ApartamentosMySqlExtDAO();
	}

	/**
	 * @return PagosDAO
	 */
	public static function getPagosDAO(){
		return new PagosMySqlExtDAO();
	}

	/**
	 * @return ParqueaderosDAO
	 */
	public static function getParqueaderosDAO(){
		return new ParqueaderosMySqlExtDAO();
	}

	/**
	 * @return RolesDAO
	 */
	public static function getRolesDAO(){
		return new RolesMySqlExtDAO();
	}

	/**
	 * @return RolesUsuariosDAO
	 */
	public static function getRolesUsuariosDAO(){
		return new RolesUsuariosMySqlExtDAO();
	}

	/**
	 * @return SolicitudesDAO
	 */
	public static function getSolicitudesDAO(){
		return new SolicitudesMySqlExtDAO();
	}

	/**
	 * @return UsuariosDAO
	 */
	public static function getUsuariosDAO(){
		return new UsuariosMySqlExtDAO();
	}

	/**
	 * @return UsuariosApartamentosDAO
	 */
	public static function getUsuariosApartamentosDAO(){
		return new UsuariosApartamentosMySqlExtDAO();
	}

	/**
	 * @return VehiculosDAO
	 */
	public static function getVehiculosDAO(){
		return new VehiculosMySqlExtDAO();
	}


}
?>