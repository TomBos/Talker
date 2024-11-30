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

    public function connectToDatabase() {
        try {
            $dsn = "mysql:host=$this->host;port=$this->port;dbname=$this->dbname;charset=utf8";
            $this->pdo = new PDO($dsn, $this->username, $this->password);

            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->pdo;
        } catch (PDOException $e) {
            return null;
        }
    }

    public function connectToServer()
    {
        try {
            $dsn = "mysql:host=$this->host;port=$this->port;charset=utf8";
            $this->pdo = new PDO($dsn, $this->username, $this->password);

            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->pdo;
        } catch (PDOException $e) {
            return null;
        }
    }

    public function createTable($tableName, $attributes){
        $attributeRow = "";
        $attributesLength = count($attributes);

        for ($i = 0; $i < $attributesLength; $i++) {
            $attributeRow .= $i != $attributesLength - 1 ? $attributes[$i] . ", " : $attributes[$i];
        }

        $pdo = $this->connectToDatabase();
        $pdo->exec("CREATE TABLE IF NOT EXISTS `$this->dbname`.`$tableName` ($attributeRow)");
        echo "Table $tableName created successfully!";
        echo "<br>";
    }

    public function defineAttribute($attributeName, $dataType, $dataLimit = '', $isNull = false, $autoIncrement = false)
    {
        $nullStatus = $isNull ? 'NULL' : 'NOT NULL';
        $autoInc = $autoIncrement ? 'AUTO_INCREMENT' : '';

        $validAttributeName = trim($attributeName) ? $attributeName : null;
        $validDataType = trim($dataType) ? $dataType : null;

        if ($validDataType == 'DATETIME' && $validAttributeName && $validDataType) {
            return "`$validAttributeName` $validDataType $nullStatus $autoInc";
        }

        $validDataLimit = ($dataLimit != 0) ? $dataLimit : null;

        if ($validAttributeName && $validDataType && $validDataLimit) {
            return "`$validAttributeName` $validDataType($validDataLimit) $nullStatus $autoInc";
        }

        return null;
    }

    public function definePrimaryKey($attributeName)
    {
        $validPrimaryKey = trim($attributeName) ? $attributeName : null;
        return "PRIMARY KEY  (`" . $validPrimaryKey . "`)";
    }

}

?>
