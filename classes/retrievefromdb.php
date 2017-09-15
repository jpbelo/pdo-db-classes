<?php

class retrieveFromDb {

	var $sqlSelectRow;
	var $sqlFrom;
	var $sql;

	function __construct($sqlSelectRow, $sqlFrom) {
		$this->sqlSelectRow = $sqlSelectRow;
		$this->sqlFrom = $sqlFrom;
		$con_pdo = connectDB::getInstance();
		$this->sql = $con_pdo->prepare("SELECT $this->sqlSelectRow FROM $this->sqlFrom");
	}

	function retrieveSingleValue() {
		$thisSql = $this->sql;
		$thisSql->execute();
		$obj = $thisSql->fetch(PDO::FETCH_OBJ);
		$whatRow = $this->sqlSelectRow;
		if(is_object($obj)){
			return $obj->$whatRow;
		} else {
			return null;
		}
	}

	function retrieveLine() {
		$thisSql = $this->sql;
		$thisSql->execute();
		$array = $thisSql->fetch();
		if(isset($array)){
			return $array;
		} else {
			return null;
		}
	}

	function retrieveAllFromRow() {
		$thisSql = $this->sql;
		$thisSql->execute();
		while($obj = $thisSql->fetch(PDO::FETCH_OBJ)) {
			$whatRow = $this->sqlSelectRow;
			$var = $obj->$whatRow;
			$array[] = $var;
		}

		if(isset($array)){
			return $array;
		} else {
			return null;
		}
	}

	function retrieveAll() {
		$thisSql = $this->sql;
		$thisSql->execute();
		$array = $thisSql->fetchAll();
		if(isset($array)){
			return $array;
		} else {
			return null;
		}
	}

}
