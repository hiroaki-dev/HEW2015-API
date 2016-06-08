<?php

/**
 * Created by PhpStorm.
 * User: hiroaki
 * Date: 2016/01/06
 * Time: 13:53
 */

class PdoWrapper {
	private $pdo;
	private $table;
	private $columns;
	private $order;
	private $limit;

	function __construct($host, $dbname, $user, $password) {
		try{
			// MySQLサーバへ接続
			$this->pdo = new PDO(
				"mysql:host={$host}; dbname={$dbname}",
				$user,
				$password
			);
			// 実行時エラーを出力する
			 $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch(PDOException $e){
			var_dump($e->getMessage());
		}

	}

	public function begin() {
		$this->pdo->beginTransaction();
	}

	public function commit() {
		$this->pdo->commit();
	}

	public function rollback() {
		$this->pdo->rollback();
	}

	public function lastInsertId() {
		return $this->pdo->lastInsertId();
	}

	public function setTable($name) {
		$this->table = $name;
	}

	public function clearColumns() {
		$this->columns = array();
	}

	public function setOrder($column, $desc = null) {
		$this->order = " ORDER BY {$column} " . (!$desc ? "ASC" : "DESC");
	}

	public function setLimit($offset = null, $limit) {
		if (empty($offset)) {
			$this->limit = " LIMIT {$limit} ";
		} else {
			$this->limit = " LIMIT {$offset}, {$limit} ";
		}
	}

	/**
	 * setData
	 *
	 * @param array $params
	 **/
	public function setColumns($params) {
		foreach ($params as $key => $param) {
			$this->columns[$key] = $param;
		}

	}

	/**
	 * insert
	 *
	 * @return bool
	 **/
	public function insert() {
		$sql = "INSERT INTO {$this->table}";
		$keys = "(" . implode(array_keys($this->columns), ", ") . ")";
		$values = "VALUES(:" . implode(array_keys($this->columns), ", :") . ")";
		$sql .= "{$keys} {$values};";
		$stmt = $this->pdo->prepare($sql);
		return $stmt->execute($this->columns);
	}

	public function update($condition) {
		$sql = "UPDATE '{$this->table}' SET ";
		$elements = array();
		foreach ($this->columns as $key => $value) {
			$elements[] = "{$key} = :{$key}";
		}
		$sql .= implode($elements, ",") . " WHERE {$condition}";
		$stmt = $this->pdo->prepare($sql);
		return $stmt->execute($this->columns);
	}

	// TODO: バインド
	public function countUp($count_up_column, $where) {
		$sql = "UPDATE {$this->table} SET ";
		$sql .= $count_up_column."=".$count_up_column."+1 WHERE {$where}";
		$stmt = $this->pdo->prepare($sql);
		return $stmt->execute();
	}

	// TODO: バインド
	public function countDown($count_up_column, $where) {
		$sql = "UPDATE {$this->table} SET ";
		$sql .= $count_up_column."=".$count_up_column."-1 WHERE {$where}";
		$stmt = $this->pdo->prepare($sql);
		return $stmt->execute();
	}

	public function delete($condition, $params) {
		$sql = "DELETE FROM {$this->table} WHERE {$condition}";
		$stmt = $this->pdo->prepare($sql);

		$stmt->execute($params);

		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getTargetList($condition = null, $params = '*', $group = null) {
		if (empty($condition)) {
			$sql = "SELECT {$params} FROM {$this->table}";
		} else {
			$sql = "SELECT {$params} FROM {$this->table} WHERE {$condition}";
		}

		if (!empty($group)) {
			$sql .= " GROUP BY $group";
		}

		if ($this->order) {
			$sql .= $this->order;
			$this->order = "";
		}

		if ($this->limit) {
			$sql .= $this->limit;
			$this->limit = "";
		}
//		var_dump($sql);

		$stmt = $this->pdo->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function isExistMatchColumn($condition, $params = null) {
		$result = $this->getTargetList($condition, $params);
		return empty($result);
	}

	public function getMax($sql) {
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}


}