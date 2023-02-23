<?php 
require 'IninitalizeDB.php';


// For security reasons, once you are done creating tokens un-comment this code

# header("location: ../index.php"); 

// For security reasons, once you are done creating tokens un-comment this code


$userNameArray = [/*  PLACE YOUR NAMES HERE   */];


$userNameArrayLenght = count($userNameArray);
for ($i = 0; $i < $userNameArrayLenght; $i++){
    $token = rand(100000,9999999);
    $insertToken = "INSERT INTO `$dataBaseName`.`TokenTable` (`UserName`,`Token`) VALUES ('" . $userNameArray[$i]  ."','". $token . "')";
    if(mysqli_query($connection, $insertToken)){
        $x++;
    }
}

print("Inserted " . $x ." users with tokens into Token Table!");
?>