<?php
/**
 * Class that operate on table 'roles_usuarios'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2017-06-28 02:23
 */
class RolesUsuariosMySqlDAO implements RolesUsuariosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return RolesUsuariosMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM roles_usuarios WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM roles_usuarios';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM roles_usuarios ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param rolesUsuario primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM roles_usuarios WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RolesUsuariosMySql rolesUsuario
 	 */
	public function insert($rolesUsuario){
		$sql = 'INSERT INTO roles_usuarios (roles_id, usuarios_id) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($rolesUsuario->rolesId);
		$sqlQuery->setNumber($rolesUsuario->usuariosId);

		$id = $this->executeInsert($sqlQuery);	
		$rolesUsuario->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param RolesUsuariosMySql rolesUsuario
 	 */
	public function update($rolesUsuario){
		$sql = 'UPDATE roles_usuarios SET roles_id = ?, usuarios_id = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($rolesUsuario->rolesId);
		$sqlQuery->setNumber($rolesUsuario->usuariosId);

		$sqlQuery->set($rolesUsuario->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM roles_usuarios';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByRolesId($value){
		$sql = 'SELECT * FROM roles_usuarios WHERE roles_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUsuariosId($value){
		$sql = 'SELECT * FROM roles_usuarios WHERE usuarios_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByRolesId($value){
		$sql = 'DELETE FROM roles_usuarios WHERE roles_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUsuariosId($value){
		$sql = 'DELETE FROM roles_usuarios WHERE usuarios_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return RolesUsuariosMySql 
	 */
	protected function readRow($row){
		$rolesUsuario = new RolesUsuario();
		
		$rolesUsuario->id = $row['id'];
		$rolesUsuario->rolesId = $row['roles_id'];
		$rolesUsuario->usuariosId = $row['usuarios_id'];

		return $rolesUsuario;
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
	 * @return RolesUsuariosMySql 
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