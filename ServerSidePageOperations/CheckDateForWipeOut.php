<?php
require '../dbOperations/IninitalizeDB.php';

$getFileCreationTime = "SELECT MIN(`sended_at`) FROM `$dataBaseName`.`Files`";
$getMessageTime = "SELECT MIN(`sended_at`) FROM `$dataBaseName`.`Messages`";
$fileDateTimeResult = mysqli_query($connection, $getFileCreationTime);
$messageDateTimeResult = mysqli_query($connection, $getMessageTime);
$fileDateTime = strtotime(mysqli_fetch_array($fileDateTimeResult)[0]);
$messageDateTime = strtotime(mysqli_fetch_array($messageDateTimeResult)[0]);
$dataBaseTime = false;

if ($fileDateTime != false) {
    if ($messageDateTime != false) {
        if ($messageDateTime < $fileDateTime) {
            $dataBaseTime = $messageDateTime;
        } else {
            $dataBaseTime = $fileDateTime;
        }
    } else {
        $dataBaseTime = $fileDateTime;
    }
} else {
    $dataBaseTime = $messageDateTime;
}

$timeChecker = time();
$timeDiffirence = $timeChecker - $dataBaseTime;

consolelog($timeDiffirence);

if ($timeDiffirence >= 3 * 60 * 60) {
    $dropFilesTable = "DROP TABLE IF EXISTS `$dataBaseName`.`Files`";
    $dropMessagesTable = "DROP TABLE IF EXISTS `$dataBaseName`.`Messages`";

    $result = mysqli_query($connection, $dropFilesTable);
    $result = mysqli_query($connection, $dropMessagesTable);


    $fileSharePath = "../FileShare";
    $files = glob($fileSharePath . "/*");
    foreach ($files as $file) {
        if (is_file($file)) {
            unlink($file);
        } else if (is_dir($file)) {
            deleteDirectory($file);
        }
    }
    rmdir($fileSharePath);
}


?>