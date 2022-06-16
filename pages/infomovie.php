<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/config/db.php';

if (isset($_GET) and $_SERVER["REQUEST_METHOD"] == "GET") {
    $sql = "SELECT * FROM movies WHERE movieId =" . $_GET['id'];
    $result = $connect->query($sql);
    $movie = mysqli_fetch_assoc($result);

    $sqlCat = "SELECT * FROM category WHERE categoryId =" . $movie['categoryId'];
    $resultCat = $connect->query($sqlCat);
    $category = mysqli_fetch_assoc($resultCat);

    setcookie("movie_id", $movie['movieId'], time() + 3600, '/');
}

?>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/include/header.php'; ?>
<main>

    <div class="container">
        <div class="info-movies">
            <div class="info-movie">
                <h2 class="movie-title">
                    <?php echo $movie['movieName']; ?>
                </h2>
                <img src="<?php echo $siteName . $movie['movieImg'] ?>" alt="постер" />
                <div class="description">
                    <div class="genre">Жанр: <?php echo $category['categoryName']; ?></div>
                    <p class="year">Рiк: <?php echo $movie['year']; ?></p>
                    <p>
                        <?php echo $movie['description']; ?>
                    </p>
                    <div class="screen">
                        <ul>
                            <?php
                            $movieFrame = array_diff(scandir($documentRoot . $movie['frame'], 1), array('..', '.'));

                            for ($i = 0; $i < count($movieFrame); $i++) {
                            ?>

                                <li><img class="image" src="<?php echo $siteName . $movie['frame'] . '/' . $movieFrame[$i]; ?>"></li>
                            <?php } ?>
                        </ul>
                        <a class="trailer" href="<?php echo $movie['trailer'] ?>" target="_blank">Дивитись
                            трейлер</a>
                    </div>

                    <!-- COMMENTS BLOCK  -->
                    <div class="comment">

                        <!-- COMMENTS BLOCK FORM  -->
												<h3>Залишити коментар</h3>
														<?php if(isset($_COOKIE['user__id'])) { ?>

                        <form name="comment" action="comment.php" method="POST" id="comments">
                            <p>
                                <textarea name="text_comment" cols="70" rows="6" id="comment-area"
                                    placeholder="Що Ви думаєте про цей фільм?"></textarea>
                                <input name="user_id" type="hidden" value="<?php echo ($_COOKIE['user__id']) ?>"
                                    id="user-id">
                                <input name="movie_id" type="hidden" value="<?php echo ($_GET['id']) ?>" id="movie-id">
                            </p>
                            <p>
                                <button type="submit" class="comment-btn" id="comment-btn">Вiдправити</button>
                            </p>
                        </form>

												<?php } else { ?>
													<p> Для того, щоб залишити коментар, увiйдiть у свій акаунт чи зареєструйтесь </p>
													<form name="comment" action="comment.php" method="POST" id="comments" style="pointer-events: none;">
                            <p>
                                <textarea name="text_comment" cols="70" rows="6" id="comment-area" placeholder="Що Ви думаєте про цей фільм?"></textarea>
                                <input name="user_id" type="hidden" value="<?php echo ($_COOKIE['user__id']) ?>" id="user-id">
                                <input name="movie_id" type="hidden" value="<?php echo ($_GET['id']) ?>" id="movie-id">
                            </p>
                            <p>
                                <button type="submit" class="comment-btn" id="comment-btn">Вiдправити</button>
                            </p>
                        </form>
													<?php } ?>



                        <!-- COMMENTS BLOCK DISPLAY -->
                        <div id="comment_list">

                            <?php include $_SERVER['DOCUMENT_ROOT'] . "/include/commentUpdate.php"; ?>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</main>
<!-- FOOTER -->
<footer>
    <div class="footer-container">
        <div class="logo">
            <img src="../image/logo.png" alt="logo" />
        </div>
    </div>
</footer>

<!-- END FOOTER -->
</body>

<script src="<?php echo ($siteName) ?>script/script.js"></script>

</html>