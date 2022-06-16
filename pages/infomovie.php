<?php
// Пiдключення бази даних
include_once $_SERVER['DOCUMENT_ROOT'] . '/config/db.php';

//check if a request has been sent
if (isset($_GET) and $_SERVER["REQUEST_METHOD"] == "GET") {
    //find the movie the user clicked on
    $sql = "SELECT * FROM movies WHERE movieId =" . $_GET['id'];
    $result = $connect->query($sql);
    //get the found movie
    $movie = mysqli_fetch_assoc($result);
    //find the category of the found movie
    $sqlCat = "SELECT * FROM category WHERE categoryId =" . $movie['categoryId'];
    $resultCat = $connect->query($sqlCat);
    //get an array of category
    $category = mysqli_fetch_assoc($resultCat);

    setcookie("movie_id", $movie['movieId'], time() + 3600, '/');
}

?>
<!-- пiдключення шапки сайту -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/include/header.php'; ?>
<main class="info">
    <!-- Вивiд повної  iнформацiї  про фiльм -->
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
                            //create an array with the names of all the pictures in the movie
                            $movieFrame = array_diff(scandir($documentRoot . $movie['frame'], 1), array('..', '.'));
                            //take turns displaying each picture
                            for ($i = 0; $i < count($movieFrame); $i++) {
                            ?>

                                <li><img class="image" src="<?php echo $siteName . $movie['frame'] . '/' . $movieFrame[$i]; ?>"></li>
                            <?php } ?>
                        </ul>
                        <a class="trailer" href="<?php echo $movie['trailer'] ?>" target="_blank">Дивитись
                            трейлер</a>
                    </div>

                    <!-- Комментарi  -->
                    <div class="comment">

                        <!-- Форма комментарiв  -->
                        <h3 class="unselectable">Залишити коментар</h3>
                        <?php if (isset($_COOKIE['user__id'])) { ?>

                            <form name="comment" action="comment.php" method="POST" id="comments">
                                <p>
                                    <textarea name="text_comment" cols="70" rows="6" id="comment-area" placeholder="Що Ви думаєте про цей фільм?"></textarea>
                                    <input name="user_id" type="hidden" value="<?php echo ($_COOKIE['user__id']) ?>" id="user-id">
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

                        <!-- Кiнец форми комментарiв  -->
                        <div id="comment_list">

                            <?php include $_SERVER['DOCUMENT_ROOT'] . "/include/commentUpdate.php";
                            ?>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>
</body>

<script src="<?php echo($siteName); ?>script/script.js"></script>

</html>