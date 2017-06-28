<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2017-06-28 02:23
 */
interface ApartamentosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Apartamentos 
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
 	 * @param apartamento primary key
 	 */
	public function delete($idapartamentos);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Apartamentos apartamento
 	 */
	public function insert($apartamento);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Apartamentos apartamento
 	 */
	public function update($apartamento);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByResidenteId($value);

	public function queryByPropietarioId($value);

	public function queryByNumeroApto($value);

	public function queryByTorre($value);


	public function deleteByResidenteId($value);

	public function deleteByPropietarioId($value);

	public function deleteByNumeroApto($value);

	public function deleteByTorre($value);


}
?>