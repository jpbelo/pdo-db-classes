<?php

class insertDb {

	var $table;
	var $fields;
	var $values;
	var $newid;

	function __construct($table, $fields, $values) {

		$this->table = $table;
		$this->fields = $fields;
		$this->values = $values;

	}

	function doIt() {

		$thisFields = implode(",", $this->fields);
		$thisFields = $thisFields . ", logtime";
		$count = count($this->fields);

		while ($count > 0){
			$fieldsToFill[] = '?';
			$count = $count-1;
		}
		$fieldsToFill = implode(",", $fieldsToFill);
		$fieldsToFill = $fieldsToFill . ", ?";

		$con_pdo = connectDB::getInstance();
		$sql = $con_pdo->prepare("INSERT INTO $this->table ($thisFields) values ($fieldsToFill)");

		$thisValues = $this->values;
		$thisValues[] = date('Y-m-d H:i:s');

		$sql->execute($thisValues);

		$this->newid = $con_pdo->lastInsertId('id');
	}

	function newId() {
		return $this->newid;
	}

}
