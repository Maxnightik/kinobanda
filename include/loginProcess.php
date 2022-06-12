<?php
include "header.php";
include "../include/db.php";

if(isset($_POST["emailAuth"]) && isset($_POST["passAuth"]) ) {
	$sql = "SELECT * FROM `users` WHERE `email` LIKE '" . $_POST["emailAuth"] . "' AND `password` LIKE '" . $_POST["passAuth"] . "'";
	$res = mysqli_query($connection, $sql);
	$userLoggedIn = mysqli_fetch_assoc($res);
	if(mysqli_num_rows($res) != 0) {
	if(setcookie("user__id", $userLoggedIn["userId"], time() + 3600, '/')) {
		setcookie("logError", '', time() - 100, '/');
		header("Location: " . $siteName . "/index.php");
		} else {
			setcookie("logError", "COOKIE CREATE ERROR", time() + 3600, '/');
			header("Location: " . $siteName . "/pages/login.php");
		}
	} else {
		setcookie("logError", "USER OR PASSWORD NOT FOUND", time() + 3600, '/');
		header("Location: " . $siteName . "/pages/login.php");
	}
} else {
	setcookie("logError", "POST ERROR", time() + 3600, '/');
	header("Location: " . $siteName . "/pages/login.php");
}

?>