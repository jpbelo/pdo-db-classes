<?php

class connectDB extends PDO {

    private static $instancia;

    public function connectDataBase($dsn, $username = "", $password = "") {
        parent::__construct($dsn, $username, $password);
    }

    public static function getInstance() {
        if(!isset( self::$instancia )){
            try {
                include_once "../config.php";
                self::$instancia = new PDO("mysql:host=$host;dbname=$dbname", "$user", "$pass",
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
                );
            } catch ( Exception $e ) {
                echo 'Erro ao conectar';
                exit();
            }
        }
        return self::$instancia;
    }
}
