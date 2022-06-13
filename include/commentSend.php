<?php 


if(isset($_POST['comment_value']) && isset($_POST['user_id']) && isset($_POST['movie_id'])) {
	include $_SERVER['DOCUMENT_ROOT'] . '/config/db.php';
	$sql = "INSERT INTO comments (`userId`, `movieId`, `text`) VALUES ('" . $_POST['user_id'] . "','" . $_POST['movie_id'] . "','" . $_POST['comment_value'] . "')";
	$connect->query($sql);
}

?>