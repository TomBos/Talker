<?php
include '../dbOperations/IninitalizeDB.php';

$usersIdentification = $_SESSION['userID'];


$getMessages = "SELECT `M`.`message`, `U`.`username`, `M`.`sended_at`,`U`.`id` FROM `$dataBaseName`.`Messages` AS M
    INNER JOIN `$dataBaseName`.`Users` As U 
    ON `M`.`users_id` = `U`.`id`
    ORDER BY `M`.`sended_at`";


    $result = mysqli_query($connection, $getMessages);
    if (!$result) {
        consolelog("Failed To Get Data From Table Containing Messages!");
    }

    while ($row = mysqli_fetch_row($result)) {
        $messageFromSender   =  $row[0];
        $sendersName =  $row[1];
        $sendersId = $row[3];


        if ($usersIdentification == $sendersId) {
            $messageType = "Messages__self";
        } else {
            $messageType = "Messages__other";
        }


        print("
            <div class='$messageType'>
                <a class='button__special button--flex'>
                    " . ucwords($sendersName) . ":  " . $messageFromSender . "
                </a>
            </div>
        ");
    }

?>