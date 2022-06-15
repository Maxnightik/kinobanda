<?php
include "header.php";
include $_SERVER['DOCUMENT_ROOT'] . "/config/db.php";

$email = NULL;
$pass = NULL;
if(isset($_POST["emailAuth"]) && isset($_POST["passAuth"]) ) {
	$email = $_POST["emailAuth"];
	$pass = $_POST["passAuth"];
}
else if (isset($_POST["email"]) && isset($_POST["password"]) ) {
	$email = $_POST["email"];
	$pass = $_POST["password"];
}

if(isset($email) && isset($pass) ) {
	$sql = "SELECT * FROM `users` WHERE `email` LIKE '" . $email . "' AND `password` LIKE '" . $pass . "'";
	$res = mysqli_query($connect, $sql);
	$userLoggedIn = mysqli_fetch_assoc($res);
	if(mysqli_num_rows($res) != 0) {
	if(setcookie("user__id", $userLoggedIn["userId"], time() + 3600, '/')) {
		setcookie("logError", '', time() - 100, '/');
		header("Location: " . $siteName . "index.php");
		} else {
			setcookie("logError", "COOKIE CREATE ERROR", time() + 3600, '/');
			header("Location: " . $siteName . "pages/login.php");
		}
	} else {
		setcookie("logError", "USER OR PASSWORD NOT FOUND", time() + 3600, '/');
		header("Location: " . $siteName . "pages/login.php");
	}
} else {
	setcookie("logError", "POST ERROR", time() + 3600, '/');
	header("Location: " . $siteName . "pages/login.php");
}

?>
