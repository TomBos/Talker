<?php

class Database {
    private $pdo;
    private $host;
    private $port;
    private $dbname;
    private $username;
    private $password;

    public function __construct($configFile) {
        $credentials = require $configFile;

        $this->host = $credentials['host'];
        $this->port = $credentials['port'];
        $this->dbname = $credentials['db'];
        $this->username = $credentials['username'];
        $this->password = $credentials['password'];
    }

    public function connect() {
        try {
            $dsn = "mysql:host=$this->host;port=$this->port;dbname=$this->dbname;charset=utf8";
            $this->pdo = new PDO($dsn, $this->username, $this->password);

            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $this->pdo;
        } catch (PDOException $e) {
            return null;
        }
    }
}

?>
