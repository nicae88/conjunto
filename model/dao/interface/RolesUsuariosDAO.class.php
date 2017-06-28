<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2017-06-28 02:23
 */
interface RolesUsuariosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return RolesUsuarios 
	 */
	public function load($id);

	/**
	 * Get all records from table
	 */
	public function queryAll();
	
	/**
	 * Get all records from table ordered by field
	 * @Param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn);
	
	/**
 	 * Delete record from table
 	 * @param rolesUsuario primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RolesUsuarios rolesUsuario
 	 */
	public function insert($rolesUsuario);
	
	/**
 	 * Update record in table
 	 *
 	 * @param RolesUsuarios rolesUsuario
 	 */
	public function update($rolesUsuario);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByRolesId($value);

	public function queryByUsuariosId($value);


	public function deleteByRolesId($value);

	public function deleteByUsuariosId($value);


}
?>