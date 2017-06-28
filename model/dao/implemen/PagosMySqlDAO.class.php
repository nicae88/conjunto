<?php
/**
 * Class that operate on table 'pagos'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2017-06-28 02:23
 */
class PagosMySqlDAO implements PagosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return PagosMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM pagos WHERE idPagos = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM pagos';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM pagos ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param pago primary key
 	 */
	public function delete($idPagos){
		$sql = 'DELETE FROM pagos WHERE idPagos = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idPagos);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PagosMySql pago
 	 */
	public function insert($pago){
		$sql = 'INSERT INTO pagos (referencia, valor, fecha, apartamentos_id, estado, tipo_pago, url_documento) VALUES (?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($pago->referencia);
		$sqlQuery->set($pago->valor);
		$sqlQuery->set($pago->fecha);
		$sqlQuery->setNumber($pago->apartamentosId);
		$sqlQuery->setNumber($pago->estado);
		$sqlQuery->set($pago->tipoPago);
		$sqlQuery->set($pago->urlDocumento);

		$id = $this->executeInsert($sqlQuery);	
		$pago->idPagos = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param PagosMySql pago
 	 */
	public function update($pago){
		$sql = 'UPDATE pagos SET referencia = ?, valor = ?, fecha = ?, apartamentos_id = ?, estado = ?, tipo_pago = ?, url_documento = ? WHERE idPagos = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($pago->referencia);
		$sqlQuery->set($pago->valor);
		$sqlQuery->set($pago->fecha);
		$sqlQuery->setNumber($pago->apartamentosId);
		$sqlQuery->setNumber($pago->estado);
		$sqlQuery->set($pago->tipoPago);
		$sqlQuery->set($pago->urlDocumento);

		$sqlQuery->setNumber($pago->idPagos);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM pagos';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByReferencia($value){
		$sql = 'SELECT * FROM pagos WHERE referencia = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByValor($value){
		$sql = 'SELECT * FROM pagos WHERE valor = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFecha($value){
		$sql = 'SELECT * FROM pagos WHERE fecha = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByApartamentosId($value){
		$sql = 'SELECT * FROM pagos WHERE apartamentos_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEstado($value){
		$sql = 'SELECT * FROM pagos WHERE estado = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTipoPago($value){
		$sql = 'SELECT * FROM pagos WHERE tipo_pago = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUrlDocumento($value){
		$sql = 'SELECT * FROM pagos WHERE url_documento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByReferencia($value){
		$sql = 'DELETE FROM pagos WHERE referencia = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByValor($value){
		$sql = 'DELETE FROM pagos WHERE valor = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFecha($value){
		$sql = 'DELETE FROM pagos WHERE fecha = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByApartamentosId($value){
		$sql = 'DELETE FROM pagos WHERE apartamentos_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEstado($value){
		$sql = 'DELETE FROM pagos WHERE estado = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTipoPago($value){
		$sql = 'DELETE FROM pagos WHERE tipo_pago = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUrlDocumento($value){
		$sql = 'DELETE FROM pagos WHERE url_documento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return PagosMySql 
	 */
	protected function readRow($row){
		$pago = new Pago();
		
		$pago->idPagos = $row['idPagos'];
		$pago->referencia = $row['referencia'];
		$pago->valor = $row['valor'];
		$pago->fecha = $row['fecha'];
		$pago->apartamentosId = $row['apartamentos_id'];
		$pago->estado = $row['estado'];
		$pago->tipoPago = $row['tipo_pago'];
		$pago->urlDocumento = $row['url_documento'];

		return $pago;
	}
	
	protected function getList($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		$ret = array();
		for($i=0;$i<count($tab);$i++){
			$ret[$i] = $this->readRow($tab[$i]);
		}
		return $ret;
	}
	
	/**
	 * Get row
	 *
	 * @return PagosMySql 
	 */
	protected function getRow($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		if(count($tab)==0){
			return null;
		}
		return $this->readRow($tab[0]);		
	}
	
	/**
	 * Execute sql query
	 */
	protected function execute($sqlQuery){
		return QueryExecutor::execute($sqlQuery);
	}
	
		
	/**
	 * Execute sql query
	 */
	protected function executeUpdate($sqlQuery){
		return QueryExecutor::executeUpdate($sqlQuery);
	}

	/**
	 * Query for one row and one column
	 */
	protected function querySingleResult($sqlQuery){
		return QueryExecutor::queryForString($sqlQuery);
	}

	/**
	 * Insert row to table
	 */
	protected function executeInsert($sqlQuery){
		return QueryExecutor::executeInsert($sqlQuery);
	}
}
?>