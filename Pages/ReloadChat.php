<?php
include '../dbOperations/IninitalizeDB.php';

$usersIdentification = $_SESSION['userID'];


$getMessages = "SELECT `M`.`message`, `U`.`username`, `M`.`sended_at`,`U`.`id` FROM `$dataBaseName`.`messages` AS M
    INNER JOIN `$dataBaseName`.`users2` As U 
    ON `M`.`users_id` = `U`.`id`
    ORDER BY `M`.`sended_at`";


    $result = mysqli_query($connection, $getMessages);
    if (!$result) {
        consolelog("Failed To Get Data From Table Containing Messages!");
    }

    $htmlString = "";
    while ($row = mysqli_fetch_row($result)) {
        $messageFromSender   =  $row[0];
        $sendersName =  $row[1];
        $sendersId = $row[3];


        if ($usersIdentification == $sendersId) {
            $messageType = "messages__self";
        } else {
            $messageType = "messages__other";
        }


        print("
            <div class='$messageType'>
                <a class='button__special button--flex'>
                    " . ucfirst($sendersName) . ":  " . $messageFromSender . "
                </a>
            </div>
        ");
    }

?>