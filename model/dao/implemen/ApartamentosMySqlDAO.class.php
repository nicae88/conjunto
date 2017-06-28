<?php
/**
 * Class that operate on table 'apartamentos'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2017-06-28 02:23
 */
class ApartamentosMySqlDAO implements ApartamentosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ApartamentosMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM apartamentos WHERE idapartamentos = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM apartamentos';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM apartamentos ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param apartamento primary key
 	 */
	public function delete($idapartamentos){
		$sql = 'DELETE FROM apartamentos WHERE idapartamentos = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idapartamentos);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ApartamentosMySql apartamento
 	 */
	public function insert($apartamento){
		$sql = 'INSERT INTO apartamentos (residente_id, propietario_id, numero_apto, torre) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($apartamento->residenteId);
		$sqlQuery->setNumber($apartamento->propietarioId);
		$sqlQuery->setNumber($apartamento->numeroApto);
		$sqlQuery->set($apartamento->torre);

		$id = $this->executeInsert($sqlQuery);	
		$apartamento->idapartamentos = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ApartamentosMySql apartamento
 	 */
	public function update($apartamento){
		$sql = 'UPDATE apartamentos SET residente_id = ?, propietario_id = ?, numero_apto = ?, torre = ? WHERE idapartamentos = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($apartamento->residenteId);
		$sqlQuery->setNumber($apartamento->propietarioId);
		$sqlQuery->setNumber($apartamento->numeroApto);
		$sqlQuery->set($apartamento->torre);

		$sqlQuery->setNumber($apartamento->idapartamentos);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM apartamentos';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByResidenteId($value){
		$sql = 'SELECT * FROM apartamentos WHERE residente_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPropietarioId($value){
		$sql = 'SELECT * FROM apartamentos WHERE propietario_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNumeroApto($value){
		$sql = 'SELECT * FROM apartamentos WHERE numero_apto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTorre($value){
		$sql = 'SELECT * FROM apartamentos WHERE torre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByResidenteId($value){
		$sql = 'DELETE FROM apartamentos WHERE residente_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPropietarioId($value){
		$sql = 'DELETE FROM apartamentos WHERE propietario_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNumeroApto($value){
		$sql = 'DELETE FROM apartamentos WHERE numero_apto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTorre($value){
		$sql = 'DELETE FROM apartamentos WHERE torre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ApartamentosMySql 
	 */
	protected function readRow($row){
		$apartamento = new Apartamento();
		
		$apartamento->idapartamentos = $row['idapartamentos'];
		$apartamento->residenteId = $row['residente_id'];
		$apartamento->propietarioId = $row['propietario_id'];
		$apartamento->numeroApto = $row['numero_apto'];
		$apartamento->torre = $row['torre'];

		return $apartamento;
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
	 * @return ApartamentosMySql 
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