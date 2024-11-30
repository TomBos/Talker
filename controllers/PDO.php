<?php
$host = '127.0.0.1'; // The IP address of the MySQL server
$port = '3006'; // The port your MySQL service is running on (from Docker)
$db = 'talker'; // The database name
$username = 'root'; // MySQL username
$password = '12345678'; // MySQL password

try {
    // Create a new PDO instance with the port included
    $dsn = "mysql:host=$host;port=$port;dbname=$db;charset=utf8";
    $pdo = new PDO($dsn, $username, $password);

    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Connected successfully!";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
