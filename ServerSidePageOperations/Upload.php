<?php 

$file = $_FILES["file"];


move_uploaded_file($file["tmp_name"],"../FileShare/" . $file["name"]);

header("Location: ../Pages/Files.php#FileBox");





 
?>