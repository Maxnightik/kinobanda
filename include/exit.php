<?php
include $_SERVER['DOCUMENT_ROOT'] . '/config/setting.php';
setcookie("user__id", "", 0, "/");
header("Location: " . $siteName . "index.php");

