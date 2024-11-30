<?php
require 'ServerScripts.php';

$connection = mysqli_connect('localhost', 'root', 'password');
if ($connection) {
    consolelog("Connected To DataBase Server!");
}

/*
$createDB = "CREATE DATABASE IF NOT EXISTS `$dataBaseName`";
if(!mysqli_query($connection, $createDB)){
    consolelog("Failed To Create DB!");
}

$connection = mysqli_connect('localhost', 'root', 'password',$dataBaseName);
if ($connection) {
    consolelog("DB Connected!");
}


$createFiles = "CREATE TABLE IF NOT EXISTS `$dataBaseName`.`Files`( 
    `id` int(3) NOT NULL auto_increment,   
    `files`  varchar(255) NOT NULL,  
    `users_id` int(3) NOT NULL,
    `sended_at` DATETIME,
    PRIMARY KEY  (`id`))
";
if(!mysqli_query($connection, $createFiles)){
    consolelog("Failed To Create Table Containing Messages!");
}

$createTokens = "CREATE TABLE IF NOT EXISTS `$dataBaseName`.`TokenTable` (
    `id` int(3) NOT NULL auto_increment,
    `UserName` VARCHAR(20) NULL,
    `Token` VARCHAR(45) NULL,
    PRIMARY KEY (`id`));";
if(!mysqli_query($connection, $createTokens)){
    consolelog("Failed To Create Table Containing Messages!");
}
*/
?>