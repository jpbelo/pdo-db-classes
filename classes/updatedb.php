<?php

class updateDb {

	var $table;
	var $fields;
	var $values;
	var $where;
	var $sql;

	function __construct($table, $fields, $values, $where) {
		$this->table = $table;
		$this->fields = $fields;
		$this->where = $where;
		$thisFields = implode(" = ?,", $this->fields);
		$thisFields = $thisFields . " = ?, logtime = ?";

		$values[] = date('Y-m-d H:i:s');
		$this->values = $values;
		$con_pdo = connectDB::getInstance();
		$this->sql = $con_pdo->prepare("UPDATE $this->table SET $thisFields WHERE $this->where");
	}

	function doIt() {
		$thisSql = $this->sql;
		$thisSql->execute($this->values);
		// print_r($thisSql->errorInfo());
	}

}
