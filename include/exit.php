<?php
// пiдключеняя файлу з налаштунками сайту
include $_SERVER['DOCUMENT_ROOT'] . '/config/setting.php';
// видалення куки
setcookie("user__id", "", 0, "/");
// перехiд на голвну сторiнку
header("Location: " . $siteName . "index.php");
