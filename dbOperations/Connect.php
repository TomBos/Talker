<?php
require 'ServerScripts.php';

$connection = mysqli_connect('localhost', 'root', 'password');

if ($connection) {
    consolelog("DB Connected!");
}
