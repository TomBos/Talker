<?php
require 'Connect.php';

$dataBaseName = '20ic01';

 

$createDB = "CREATE DATABASE IF NOT EXISTS `$dataBaseName`";
if(!mysqli_query($connection, $createDB)){
    consolelog("Failed To Create DB!");
}


$createUsers = "CREATE TABLE IF NOT EXISTS `$dataBaseName`.`Users`( 
    `id` int(11) NOT NULL auto_increment,   
    `username`  varchar(100) NOT NULL,  
    `password` varchar(100) NOT NULL,
    PRIMARY KEY  (`id`)
)";
if(!mysqli_query($connection, $createUsers)){
    consolelog("Failed To Create Users Table!");
}

$createMessages = "CREATE TABLE IF NOT EXISTS `$dataBaseName`.`Messages`( 
    `id` int(11) NOT NULL auto_increment,   
    `message`  varchar(255) NOT NULL,  
    `users_id` int(11) NOT NULL,
    `sended_at` DATETIME,
    PRIMARY KEY  (`id`)
)";
if(!mysqli_query($connection, $createMessages)){
    consolelog("Failed To Create Table Containing Messages!");
}


$createFiles = "CREATE TABLE IF NOT EXISTS `$dataBaseName`.`Files`( 
    `id` int(11) NOT NULL auto_increment,   
    `files`  varchar(255) NOT NULL,  
    `users_id` int(11) NOT NULL,
    `sended_at` DATETIME,
    PRIMARY KEY  (`id`))
";
if(!mysqli_query($connection, $createFiles)){
    consolelog("Failed To Create Table Containing Messages!");
}





?>