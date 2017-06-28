<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2017-06-28 02:23
 */
interface SolicitudesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Solicitudes 
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
 	 * @param solicitude primary key
 	 */
	public function delete($idsolicitudes);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Solicitudes solicitude
 	 */
	public function insert($solicitude);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Solicitudes solicitude
 	 */
	public function update($solicitude);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByVehiculosId($value);

	public function queryByParquederosId($value);

	public function queryByFechaSolicitud($value);

	public function queryByEstado($value);


	public function deleteByVehiculosId($value);

	public function deleteByParquederosId($value);

	public function deleteByFechaSolicitud($value);

	public function deleteByEstado($value);


}
?>