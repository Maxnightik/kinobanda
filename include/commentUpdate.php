<?php
if (isset($movie['movieId'])) {
	$id = $movie['movieId'];
} else if (isset($_COOKIE['movie_id'])) {
	$id = $_COOKIE['movie_id'];
}
include $_SERVER['DOCUMENT_ROOT'] . "/config/db.php";
$sqlComm = "SELECT comments.*, users.nickname AS nick FROM comments INNER JOIN users ON comments.userId = users.userId AND comments.movieId=" . $id;
$resultComm = $connect->query($sqlComm);
$countComm = mysqli_num_rows($resultComm);


if ($countComm > 0) {
?>

	<h4 class="unselectable"> <?php echo $countComm; ?> коментарів</h4>
	<?php
	while ($row = $resultComm->fetch_assoc()) {
		if($row['text'] != NULL && $row['text'] != "") {?>
		<div class="comments">
			<div class="name unselectable"><?php echo ($row['nick']); ?></div>
			<div class="text_comment">
				<p><?php echo ($row['text']); ?></p>
			</div>
		</div>
	<?php
		}
	}
} else {
	?>
	<h4> 0 коментарів</h4>
	<p>Будьте першим хто залишить коментар</p>
<?php
}
?>