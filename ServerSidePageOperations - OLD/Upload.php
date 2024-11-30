<?php 
require '../dbOperations - OLD/IninitalizeDB.php';

$usersIdentification = $_SESSION['userID'];

if(isset($_FILES['file'])) {
    $maxsize  = 512000;
    $file = $_FILES["file"];

    if(!($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]["size"] == 0)) {
        move_uploaded_file($file["tmp_name"],"../FileShare/" . $file["name"]);
        
        
        $insertFilesQuery = "INSERT INTO `$dataBaseName`.`Files` (`files`,`users_id`,`sended_at`) VALUE ('" . $file["name"] ."','$usersIdentification','$currentDate')";
        $result = mysqli_query($connection, $insertFilesQuery);
        header("Location: ../Pages/Files.php#FileBox");
    }
    else{
        header("Location: ../Pages/Files.php#FileBox");
    }
}
header("Location: ../Pages/Files.php#FileBox");
?>