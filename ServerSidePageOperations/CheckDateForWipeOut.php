<?php
require '../dbOperations/IninitalizeDB.php';

$timeCheck = time() - 10800; 
$getFileCreationTime = "SELECT MAX(file_creation_time) FROM `Files`";
$getMessageTime = "SELECT MAX(sended_at) FROM `Messages`";
$fileDateTimeResult = mysqli_query($connection, $getFileCreationTime);
$messageDateTimeResult = mysqli_query($connection, $getMessageTime);
$fileDateTime = mysqli_fetch_array($fileDateTimeResult)[0];
$messageDateTime = mysqli_fetch_array($messageDateTimeResult)[0];
$dataBaseTime = false;

if ($fileDateTime != false) {
    if($messageDateTime != false){
        if($messageDateTime < $fileDateTime){
            $dataBaseTime = $messageDateTime;
        }
        else{
            $dataBaseTime = $fileDateTime;
        }
    }
}

if ($timeCheck >= $dataBaseTime) {
    $dropTableMessages = "DROP TABLE `$dataBaseName`.`Messages`";
    $dropTableFiles = "DROP TABLE `$dataBaseName`.`Files`";

    $result = mysqli_query($connection, $dropTableMessages);
    if (!$result) {
        consolelog("Failed To Delete Messages!");
    }

    rmdir('../FileShare');

    $result = mysqli_query($connection, $dropTableFiles);
    if (!$result) {
        consolelog("Failed To Delete Data Files!");
    }
}





?>
