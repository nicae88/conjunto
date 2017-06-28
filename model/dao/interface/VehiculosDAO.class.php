<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2017-06-28 02:23
 */
interface VehiculosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Vehiculos 
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
 	 * @param vehiculo primary key
 	 */
	public function delete($idvehiculos);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Vehiculos vehiculo
 	 */
	public function insert($vehiculo);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Vehiculos vehiculo
 	 */
	public function update($vehiculo);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByMarca($value);

	public function queryByPlaca($value);

	public function queryByTipo($value);

	public function queryByUsuariosId($value);


	public function deleteByMarca($value);

	public function deleteByPlaca($value);

	public function deleteByTipo($value);

	public function deleteByUsuariosId($value);


}
?>