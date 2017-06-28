<?php
/**
 * Class that operate on table 'vehiculos'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2017-06-28 02:23
 */
class VehiculosMySqlDAO implements VehiculosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return VehiculosMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM vehiculos WHERE idvehiculos = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM vehiculos';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM vehiculos ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param vehiculo primary key
 	 */
	public function delete($idvehiculos){
		$sql = 'DELETE FROM vehiculos WHERE idvehiculos = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idvehiculos);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param VehiculosMySql vehiculo
 	 */
	public function insert($vehiculo){
		$sql = 'INSERT INTO vehiculos (marca, placa, tipo, usuarios_id) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($vehiculo->marca);
		$sqlQuery->set($vehiculo->placa);
		$sqlQuery->set($vehiculo->tipo);
		$sqlQuery->setNumber($vehiculo->usuariosId);

		$id = $this->executeInsert($sqlQuery);	
		$vehiculo->idvehiculos = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param VehiculosMySql vehiculo
 	 */
	public function update($vehiculo){
		$sql = 'UPDATE vehiculos SET marca = ?, placa = ?, tipo = ?, usuarios_id = ? WHERE idvehiculos = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($vehiculo->marca);
		$sqlQuery->set($vehiculo->placa);
		$sqlQuery->set($vehiculo->tipo);
		$sqlQuery->setNumber($vehiculo->usuariosId);

		$sqlQuery->setNumber($vehiculo->idvehiculos);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM vehiculos';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByMarca($value){
		$sql = 'SELECT * FROM vehiculos WHERE marca = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPlaca($value){
		$sql = 'SELECT * FROM vehiculos WHERE placa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTipo($value){
		$sql = 'SELECT * FROM vehiculos WHERE tipo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUsuariosId($value){
		$sql = 'SELECT * FROM vehiculos WHERE usuarios_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByMarca($value){
		$sql = 'DELETE FROM vehiculos WHERE marca = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPlaca($value){
		$sql = 'DELETE FROM vehiculos WHERE placa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTipo($value){
		$sql = 'DELETE FROM vehiculos WHERE tipo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUsuariosId($value){
		$sql = 'DELETE FROM vehiculos WHERE usuarios_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return VehiculosMySql 
	 */
	protected function readRow($row){
		$vehiculo = new Vehiculo();
		
		$vehiculo->idvehiculos = $row['idvehiculos'];
		$vehiculo->marca = $row['marca'];
		$vehiculo->placa = $row['placa'];
		$vehiculo->tipo = $row['tipo'];
		$vehiculo->usuariosId = $row['usuarios_id'];

		return $vehiculo;
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
	 * @return VehiculosMySql 
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