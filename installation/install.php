<?php

$connection = makeInitialConnection($credentials);


/*
$createUsers = "CREATE TABLE IF NOT EXISTS `$dataBaseName`.`Users`( 
    `id` int(3) NOT NULL auto_increment,   
    `username`  varchar(20) NOT NULL,  
    `password` varchar(60) NOT NULL,
    PRIMARY KEY  (`id`)
)";
if(!mysqli_query($connection, $createUsers)){
    consolelog("Failed To Create Users Table!");
}

$createMessages = "CREATE TABLE IF NOT EXISTS `$dataBaseName`.`Messages`( 
    `id` int(3) NOT NULL auto_increment,   
    `message`  varchar(255) NOT NULL,  
    `users_id` int(3) NOT NULL,
    `sended_at` DATETIME,
    PRIMARY KEY  (`id`)
)";
if(!mysqli_query($connection, $createMessages)){
    consolelog("Failed To Create Table Containing Messages!");
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