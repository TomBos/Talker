<?php
require '../dbOperations/IninitalizeDB.php';

$getFiles = "SELECT `F`.`files`, `U`.`username`, `F`.`sended_at`,`U`.`id` 
    FROM `$dataBaseName`.`Files` AS F
    INNER JOIN `$dataBaseName`.`Users` As U 
    ON `F`.`users_id` = `U`.`id`
ORDER BY `F`.`sended_at`";

$queryResult = mysqli_query($connection, $getFiles);
if (!$queryResult) {
    consolelog("Failed To Get Data From Table Containing Files!");
}

$sendersNames = array();
while ($row = mysqli_fetch_row($queryResult)) {
    array_push($sendersNames, $row[1]);
}


$result = [];
foreach (glob('../FileShare/*.*') as $file) {
    $result[] = [filemtime($file), basename($file)];
}

sort($result);

for ($i = 0; $i < count($result); $i++) {
    $fileName = $result[$i][1];


    print("

        <a download='' href='../FileShare/" . $fileName . "' class='skills__header'>
            <i class='uil uil-file-share-alt skills__icon'></i>
            <div>
                <h1 class='skills__title'>" . $fileName . "</h1>
                <span class='skills__subtitle'> Uploaded By: " . ucwords($sendersNames[$i]) . "</span>
            </div>
        </a>

    ");
}
?>