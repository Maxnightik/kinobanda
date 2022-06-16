<?php
if (isset($movie['movieId'])) {
	$id = $movie['movieId'];
} else if (isset($_COOKIE['movie_id'])) {
	$id = $_COOKIE['movie_id'];
}
include $_SERVER['DOCUMENT_ROOT'] . "/config/db.php";
$sqlComm = "SELECT comments.*, users.nickname AS nick FROM comments RIGHT JOIN users ON comments.userId = users.userId AND comments.movieId=" . $id;
$resultComm = $connect->query($sqlComm);

while ($row = $resultComm->fetch_assoc()) { ?>
	<div class="comments">
		<div class="name"><?php echo ($row['nick']); ?></div>
		<div class="text_comment">
			<p><?php echo ($row['text']); ?></p>
		</div>
	</div>
<?php
}

?>