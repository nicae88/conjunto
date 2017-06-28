<?php
/**
 * Class that operate on table 'solicitudes'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2017-06-28 02:23
 */
class SolicitudesMySqlDAO implements SolicitudesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return SolicitudesMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM solicitudes WHERE idsolicitudes = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM solicitudes';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM solicitudes ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param solicitude primary key
 	 */
	public function delete($idsolicitudes){
		$sql = 'DELETE FROM solicitudes WHERE idsolicitudes = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($idsolicitudes);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param SolicitudesMySql solicitude
 	 */
	public function insert($solicitude){
		$sql = 'INSERT INTO solicitudes (vehiculos_id, parquederos_id, fecha_solicitud, estado) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($solicitude->vehiculosId);
		$sqlQuery->setNumber($solicitude->parquederosId);
		$sqlQuery->set($solicitude->fechaSolicitud);
		$sqlQuery->setNumber($solicitude->estado);

		$id = $this->executeInsert($sqlQuery);	
		$solicitude->idsolicitudes = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param SolicitudesMySql solicitude
 	 */
	public function update($solicitude){
		$sql = 'UPDATE solicitudes SET vehiculos_id = ?, parquederos_id = ?, fecha_solicitud = ?, estado = ? WHERE idsolicitudes = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($solicitude->vehiculosId);
		$sqlQuery->setNumber($solicitude->parquederosId);
		$sqlQuery->set($solicitude->fechaSolicitud);
		$sqlQuery->setNumber($solicitude->estado);

		$sqlQuery->set($solicitude->idsolicitudes);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM solicitudes';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByVehiculosId($value){
		$sql = 'SELECT * FROM solicitudes WHERE vehiculos_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByParquederosId($value){
		$sql = 'SELECT * FROM solicitudes WHERE parquederos_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFechaSolicitud($value){
		$sql = 'SELECT * FROM solicitudes WHERE fecha_solicitud = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEstado($value){
		$sql = 'SELECT * FROM solicitudes WHERE estado = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByVehiculosId($value){
		$sql = 'DELETE FROM solicitudes WHERE vehiculos_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByParquederosId($value){
		$sql = 'DELETE FROM solicitudes WHERE parquederos_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFechaSolicitud($value){
		$sql = 'DELETE FROM solicitudes WHERE fecha_solicitud = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEstado($value){
		$sql = 'DELETE FROM solicitudes WHERE estado = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return SolicitudesMySql 
	 */
	protected function readRow($row){
		$solicitude = new Solicitude();
		
		$solicitude->idsolicitudes = $row['idsolicitudes'];
		$solicitude->vehiculosId = $row['vehiculos_id'];
		$solicitude->parquederosId = $row['parquederos_id'];
		$solicitude->fechaSolicitud = $row['fecha_solicitud'];
		$solicitude->estado = $row['estado'];

		return $solicitude;
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
	 * @return SolicitudesMySql 
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