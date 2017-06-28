<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2017-06-28 02:23
 */
interface PagosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Pagos 
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
 	 * @param pago primary key
 	 */
	public function delete($idPagos);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Pagos pago
 	 */
	public function insert($pago);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Pagos pago
 	 */
	public function update($pago);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByReferencia($value);

	public function queryByValor($value);

	public function queryByFecha($value);

	public function queryByApartamentosId($value);

	public function queryByEstado($value);

	public function queryByTipoPago($value);

	public function queryByUrlDocumento($value);


	public function deleteByReferencia($value);

	public function deleteByValor($value);

	public function deleteByFecha($value);

	public function deleteByApartamentosId($value);

	public function deleteByEstado($value);

	public function deleteByTipoPago($value);

	public function deleteByUrlDocumento($value);


}
?>