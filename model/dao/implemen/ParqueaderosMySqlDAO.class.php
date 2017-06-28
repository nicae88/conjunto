<?php
/**
 * Class that operate on table 'parqueaderos'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2017-06-28 02:23
 */
class ParqueaderosMySqlDAO implements ParqueaderosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ParqueaderosMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM parqueaderos WHERE idparqueaderos = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM parqueaderos';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM parqueaderos ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param parqueadero primary key
 	 */
	public function delete($idparqueaderos){
		$sql = 'DELETE FROM parqueaderos WHERE idparqueaderos = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idparqueaderos);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ParqueaderosMySql parqueadero
 	 */
	public function insert($parqueadero){
		$sql = 'INSERT INTO parqueaderos (estado, tipoParqueadero) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($parqueadero->estado);
		$sqlQuery->set($parqueadero->tipoParqueadero);

		$id = $this->executeInsert($sqlQuery);	
		$parqueadero->idparqueaderos = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ParqueaderosMySql parqueadero
 	 */
	public function update($parqueadero){
		$sql = 'UPDATE parqueaderos SET estado = ?, tipoParqueadero = ? WHERE idparqueaderos = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($parqueadero->estado);
		$sqlQuery->set($parqueadero->tipoParqueadero);

		$sqlQuery->setNumber($parqueadero->idparqueaderos);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM parqueaderos';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByEstado($value){
		$sql = 'SELECT * FROM parqueaderos WHERE estado = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTipoParqueadero($value){
		$sql = 'SELECT * FROM parqueaderos WHERE tipoParqueadero = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByEstado($value){
		$sql = 'DELETE FROM parqueaderos WHERE estado = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTipoParqueadero($value){
		$sql = 'DELETE FROM parqueaderos WHERE tipoParqueadero = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ParqueaderosMySql 
	 */
	protected function readRow($row){
		$parqueadero = new Parqueadero();
		
		$parqueadero->idparqueaderos = $row['idparqueaderos'];
		$parqueadero->estado = $row['estado'];
		$parqueadero->tipoParqueadero = $row['tipoParqueadero'];

		return $parqueadero;
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
	 * @return ParqueaderosMySql 
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