<?php

class deleteDb {

	var $table;
	var $wherekey;
	var $wherevalue;
	var $sql;

	function __construct($table, $wherekey, $wherevalue) {
		$this->table = $table;
		$this->wherekey = $wherekey;
		$this->wherevalue = $wherevalue;

		$con_pdo = connectDB::getInstance();
		$this->sql = $con_pdo->prepare("DELETE FROM $this->table WHERE ( $this->wherekey ) IN ( $this->wherevalue )");
	}

	function doIt() {
		$thisSql = $this->sql;
		$thisSql->execute();
	}

}
