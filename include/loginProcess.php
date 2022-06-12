<?php
include "header.php";

if(isset($_POST["emailAuth"]) && isset($_POST["passAuth"]) && !isset($_COOKIE["user__id"])) {
	// $sql = "SELECT * FROM `users` WHERE `email` LIKE '" . $_POST["emailAuth"] . "' AND `password` LIKE '" . $_POST["passAuth"] . "'";
	// $res = mysqli_query($connection, $sql);
	// $userLoggedIn = mysqli_fetch_assoc($res);
	if(/*mysqli_num_rows($res) != 0*/ TRUE) {
	if(setcookie("user__id", "1" /*$userLoggedIn["id"]*/, time() + 3600)) {
			header("Location: " . $siteName . "/index.php");
		} else {
			header("Location: " . $siteName . "/pages/login.php?logErr=01");
		}
	} else {
		header("Location: " . $siteName . "/pages/login.php?logErr=02");
	}
} else {
	header("Location: " . $siteName . "/pages/login.php?logErr=03");
}

?>