<?php 
// Данные для подключения к базе данных
$server = "localhost";
$username = "root";
$password = "";
$db_name = "film";


// Подключение к базе данных chat
$connect = mysqli_connect($server, $username, $password, $db_name);

// установим кодировку для корректного отображения кириллицы
mysqli_set_charset($connect, 'utf8');




?>
