<?php 


class Database {
	private $dbhost = Constant::DBHOST,
			$dbuser = Constant::DBUSER,
			$dbpass = Constant::DBPASS,
			$dbname = Constant::DBNAME;

	private $dbh,
			$stmt;

	public function __construct() {
		$dbs = "mysql:host={$this->dbhost};dbname={$this->dbname}";
		$options = [
			PDO::ATTR_PERSISTENT => true,
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		];

		try {
			$this->dbh = new PDO($dbs, $this->dbuser, $this->dbpass, $options);	
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}

	public function query($query) {
		$this->stmt = $this->dbh->prepare($query);
	}

	public function bind($bind, $param, $type = null) {
		if ($type == null) {
			switch (true) {
				case is_int($param):
					$type = PDO::PARAM_INT;
					break;
				case is_null($param):
					$type = PDO::PARAM_NULL;
					break;
				case is_bool($param):
					$type = PDO::PARAM_BOOL;
					break;
				default:
					$type = PDO::PARAM_STR;
					break;
			}
			$this->stmt->bindValue($bind, $param, $type);
		}
	}

	public function execute() {
		$this->stmt->execute();
	}

	public function single() {
		$this->execute();
		return $this->stmt->fetch(PDO::FETCH_ASSOC);
	}

	public function resultSet() {
		$this->execute();
		return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function rowCount() {
		return $this->stmt->rowCount();
	}

	public function beginTransaction() {
		return $this->dbh->beginTransaction();
	}
	public function commit() {
		$this->dbh->commit();
	}
	public function rollBack() {
		$this->dbh->rollBack();
	}
}