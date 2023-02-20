<?php 
require '../dbOperations/IninitalizeDB.php';

$curentDate = date_create()->format('Y-m-d H:i:s');
$usersIdentification = $_SESSION['userID'];
$dataBaseName = '20ic01';

if(isset($_FILES['file'])) {
    $maxsize  = 512000;
    $file = $_FILES["file"];

    if(!($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]["size"] == 0)) {
        move_uploaded_file($file["tmp_name"],"../FileShare/" . $file["name"]);
        
        
        $insertFilesQuery = "INSERT INTO `$dataBaseName`.`Files` (`files`,`users_id`,`sended_at`) VALUE ('" . $file["name"] ."','$usersIdentification','$curentDate')";
        $result = mysqli_query($connection, $insertFilesQuery);


        header("Location: ../Pages/Files.php#FileBox");
    }

    else{
        header("Location: ../Pages/Files.php#FileBox");
    }
}




