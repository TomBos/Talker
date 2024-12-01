<?php
$parameters = require $_SERVER['DOCUMENT_ROOT'] . '/app/config/appParameters.php';
$credentials = $_SERVER['DOCUMENT_ROOT'] . '/app/config/credentials.php';

$controller_dir = $parameters['controller_dir'];

require $_SERVER['DOCUMENT_ROOT'] . $controller_dir . '/PDO.php';


$db = new Database($credentials);

if ($db->connectToServer()) {
    echo "Successfully connected to Server !";
    echo "<br>";
} else {
    die("Unable to connect to MySQL server.");
}

// Define Reusable Parameters
$id = $db->defineAttribute('id', 'int', 11, false, true);
$users_id = $db->defineAttribute('users_id', 'int', 11);
$primaryKey = $db->definePrimaryKey('id');
$dateTime = $db->defineAttribute('date_time', 'DATETIME');

// ======================== USER TABLE =================================================== //
$username = $db->defineAttribute('username', 'varchar', 18);
$password = $db->defineAttribute('password', 'varchar', 60);
$db->createTable("users", [$id,$username, $password, $primaryKey]);

// ======================== MESSAGES TABLE ============================================== //
$message = $db->defineAttribute('message', 'varchar', 255);
$db->createTable("messages", [$id, $message,$users_id,$dateTime, $primaryKey]);

// ======================== FILES TABLE ================================================================= //
$files = $db->defineAttribute('files', 'varchar', 255);
$db->createTable("files", [$id, $files,$users_id,$dateTime, $primaryKey]);

// ======================== TOKEN TABLE ================================================================= //
$token = $db->defineAttribute('token', 'varchar', 45);
$db->createTable("tokens", [$id, $token,$users_id, $primaryKey]);