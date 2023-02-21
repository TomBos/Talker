<?php
require '../dbOperations/IninitalizeDB.php';


$selectMinDateTimeMessages = "SELECT MIN(`M`.`sended_at`) FROM `$dataBaseName`.`Messages`AS M";
$selectMinDateTimeFiles = "SELECT MIN(`F`.`sended_at`) FROM `$dataBaseName`.`Files` AS F";



try {
    $result = mysqli_query($connection, $selectMinDateTimeMessages);

    while ($row = mysqli_fetch_row($result)) {
        $messageDateTime   =  strtotime($row[0]);
    }
} catch (Exception $e) {
    consolelog("Failed To Select Min Date Time!");
}

try {
    $result = mysqli_query($connection, $selectMinDateTimeFiles);

    while ($row = mysqli_fetch_row($result)) {
        $fileDateTime   =  strtotime($row[0]);
    }
} catch (Exception $e) {
    consolelog("Failed To Select Min Date Time!");
}

if ($fileDateTime !== false && $messageDateTime !== false) {
    $dataBaseTime = min($fileDateTime, $messageDateTime);
} elseif ($fileDateTime !== false) {
    $dataBaseTime = $fileDateTime;
} elseif ($messageDateTime !== false) {
    $dataBaseTime = $messageDateTime;
}

if ($messageDateTime !== false) {
    $messageDateTime = $dataBaseTime;
}

$timeCheck = date("Y-m-d H:i:s", strtotime('-20 seconds', strtotime($currentDate)));

$timeCheck = strtotime($timeCheck);
$dataBaseTime = strtotime($dataBaseTime);


if ($timeCheck >= $dataBaseTime) {
    $dropTableMessages = "DROP TABLE `$dataBaseName`.`Messages`";
    $dropTableFiles = "DROP TABLE `$dataBaseName`.`Files`";

    $result = mysqli_query($connection, $dropTableMessages);
    if (!$result) {
        consolelog("Failed To Delete Messages!");
    }

    $fileSharePath = dirname(__FILE__) . '/../FileShare';
    if (file_exists($fileSharePath)) {
        $files = glob($fileSharePath . '/*');
        foreach ($files as $file) {
            if (is_file($file)) {
                unlink($file);
            }
        }
        rmdir($fileSharePath);
    }

    $result = mysqli_query($connection, $dropTableFiles);
    if (!$result) {
        consolelog("Failed To Delete Data Files!");
    }
}










?>
