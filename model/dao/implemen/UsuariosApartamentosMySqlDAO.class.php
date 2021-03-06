<?php
/**
 * Class that operate on table 'usuarios_apartamentos'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2017-06-28 02:23
 */
class UsuariosApartamentosMySqlDAO implements UsuariosApartamentosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return UsuariosApartamentosMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM usuarios_apartamentos WHERE idUsuApa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM usuarios_apartamentos';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM usuarios_apartamentos ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param usuariosApartamento primary key
 	 */
	public function delete($idUsuApa){
		$sql = 'DELETE FROM usuarios_apartamentos WHERE idUsuApa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idUsuApa);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param UsuariosApartamentosMySql usuariosApartamento
 	 */
	public function insert($usuariosApartamento){
		$sql = 'INSERT INTO usuarios_apartamentos (usuarios_id, apartamento_id) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($usuariosApartamento->usuariosId);
		$sqlQuery->setNumber($usuariosApartamento->apartamentoId);

		$id = $this->executeInsert($sqlQuery);	
		$usuariosApartamento->idUsuApa = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param UsuariosApartamentosMySql usuariosApartamento
 	 */
	public function update($usuariosApartamento){
		$sql = 'UPDATE usuarios_apartamentos SET usuarios_id = ?, apartamento_id = ? WHERE idUsuApa = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($usuariosApartamento->usuariosId);
		$sqlQuery->setNumber($usuariosApartamento->apartamentoId);

		$sqlQuery->setNumber($usuariosApartamento->idUsuApa);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM usuarios_apartamentos';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByUsuariosId($value){
		$sql = 'SELECT * FROM usuarios_apartamentos WHERE usuarios_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByApartamentoId($value){
		$sql = 'SELECT * FROM usuarios_apartamentos WHERE apartamento_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByUsuariosId($value){
		$sql = 'DELETE FROM usuarios_apartamentos WHERE usuarios_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByApartamentoId($value){
		$sql = 'DELETE FROM usuarios_apartamentos WHERE apartamento_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return UsuariosApartamentosMySql 
	 */
	protected function readRow($row){
		$usuariosApartamento = new UsuariosApartamento();
		
		$usuariosApartamento->idUsuApa = $row['idUsuApa'];
		$usuariosApartamento->usuariosId = $row['usuarios_id'];
		$usuariosApartamento->apartamentoId = $row['apartamento_id'];

		return $usuariosApartamento;
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
	 * @return UsuariosApartamentosMySql 
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