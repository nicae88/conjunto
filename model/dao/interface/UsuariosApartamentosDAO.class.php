<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2017-06-28 02:23
 */
interface UsuariosApartamentosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return UsuariosApartamentos 
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
 	 * @param usuariosApartamento primary key
 	 */
	public function delete($idUsuApa);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param UsuariosApartamentos usuariosApartamento
 	 */
	public function insert($usuariosApartamento);
	
	/**
 	 * Update record in table
 	 *
 	 * @param UsuariosApartamentos usuariosApartamento
 	 */
	public function update($usuariosApartamento);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByUsuariosId($value);

	public function queryByApartamentoId($value);


	public function deleteByUsuariosId($value);

	public function deleteByApartamentoId($value);


}
?>