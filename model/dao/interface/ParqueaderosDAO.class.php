<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2017-06-28 02:23
 */
interface ParqueaderosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Parqueaderos 
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
 	 * @param parqueadero primary key
 	 */
	public function delete($idparqueaderos);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Parqueaderos parqueadero
 	 */
	public function insert($parqueadero);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Parqueaderos parqueadero
 	 */
	public function update($parqueadero);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByEstado($value);

	public function queryByTipoParqueadero($value);


	public function deleteByEstado($value);

	public function deleteByTipoParqueadero($value);


}
?>