<?php
// Файл с данными для подключения к бд

// Данные для подключения к бд
$server = "localhost";
$user = "root";
$password = "";
$dbname = "films";

// Переменная подключения к бд
$connection = new mysqli($server, $user, $password, $dbname);
$connection->set_charset("utf8");
if($connection->connect_error) {
	die("Connection failed " . $connection->connect_error);
}


?>