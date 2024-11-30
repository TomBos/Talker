<?php
$parameters = require $_SERVER['DOCUMENT_ROOT'] . '/app/config/appParameters.php';
$credentials = $_SERVER['DOCUMENT_ROOT'] . '/app/config/credentials.php';

$controller_dir = $parameters['controller_dir'];

require $_SERVER['DOCUMENT_ROOT'] . $controller_dir . '/Tools.php';
require $_SERVER['DOCUMENT_ROOT'] . $controller_dir . '/PDO.php';


$Tools = new Tools();
$db = new Database($credentials);
$pdo = $db->connectToDatabase();

if ($pdo) {
    echo "Connected successfully!";
}


$Tools->Redirect('/');


?>


<!--
<script>
    CheckDateForWipeOut();
</script>


if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$_SESSION['userName'] = "";
$_SESSION['userID'] = "";

// require 'dbOperations/IninitalizeDB.php';



if (isset($_POST['user'])) {
    $userSubmittedName = strtolower(trim($_POST['name']));
    $verifyPassword = strtolower(trim($_POST['password']));
    $verifyPassword = crypt($verifyPassword, "salt");


    $selectUserQuery = "SELECT `id`,`username`,`password` FROM `$dataBaseName`.`Users`";
    $result = mysqli_query($connection, $selectUserQuery);
    if (!$result) {
        consolelog("Failed To Get Data From Users Table!");
    }
    while ($row = mysqli_fetch_row($result)) {
        $databaseUserId = $row[0];
        $databaseUsername =  $row[1];
        $databasePassword =  $row[2];

        if ($databaseUsername != $userSubmittedName || $verifyPassword != $databasePassword) {
            consolelog("Wrong Password Or Username!");
        } else {
            $_SESSION['userName'] = $databaseUsername;
            $_SESSION['userID'] = $databaseUserId;
            header("location: Pages/Chat.php");
        }
    }
}

-->