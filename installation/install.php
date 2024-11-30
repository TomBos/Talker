<?php
$parameters = require $_SERVER['DOCUMENT_ROOT'] . '/app/config/appParameters.php';
$credentials = $_SERVER['DOCUMENT_ROOT'] . '/app/config/credentials.php';

$controller_dir = $parameters['controller_dir'];

require $_SERVER['DOCUMENT_ROOT'] . $controller_dir . '/PDO.php';


$db = new Database($credentials);

if ($db->connectToServer()) {
    echo "Successfully connected to Server !";
    echo "<br>";
}

// ID Param is always same as well as Primary Key
$id = $db->defineAttribute('id', 'int', 11, false, true);
$primaryKey = $db->definePrimaryKey('id');


// ======================== USER TABLE ================================================================= //
$username = $db->defineAttribute('username', 'varchar', 18);
$password = $db->defineAttribute('password', 'varchar', 60);

$db->createTable("users", [$id,$username, $password, $primaryKey]);


// ======================== MESSAGES TABLE ================================================================= //
$message = $db->defineAttribute('message', 'varchar', 255);
$users_id = $db->defineAttribute('users_id', 'int', 11);
$dateTime = $db->defineAttribute('date_time', 'DATETIME');

$db->createTable("messages", [$id, $message,$users_id,$dateTime, $primaryKey]);



/*

$createFiles = "CREATE TABLE IF NOT EXISTS `$dataBaseName`.`Files`( 
    `id` int(3) NOT NULL auto_increment,   
    `files`  varchar(255) NOT NULL,  
    `users_id` int(3) NOT NULL,
    `sended_at` DATETIME,
    PRIMARY KEY  (`id`))
";
if(!mysqli_query($connection, $createFiles)){
    consolelog("Failed To Create Table Containing Messages!");
}

$createTokens = "CREATE TABLE IF NOT EXISTS `$dataBaseName`.`TokenTable` (
    `id` int(3) NOT NULL auto_increment,
    `UserName` VARCHAR(20) NULL,
    `Token` VARCHAR(45) NULL,
    PRIMARY KEY (`id`));";
if(!mysqli_query($connection, $createTokens)){
    consolelog("Failed To Create Table Containing Messages!");
}
*/

?>