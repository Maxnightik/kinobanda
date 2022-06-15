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

                        <!-- COMMENTS BLOCK DISPLAY -->
                        <div id="comment_list">

                            <?php include $_SERVER['DOCUMENT_ROOT'] . "/include/commentUpdate.php"; ?>

                        </div>


                        <div class="comment">

                            <form name="comment" action="comment.php" method="post">
                                <h3>Залишити коментар</h3>

                                <p>
                                    <textarea name="text_comment" cols="70" rows="20" id="comment-area"></textarea>
                                </p>
                                <p>
                                    <button type="submit" class="comment-btn">Вiдправити</button>
                                </p>
                            </form>
                            <div class="comments">
                                <div class="name">Max</div>
                                <div class="text_comment">
                                    <p>Классний фiльм!</p>
                                </div>
                            </div>
                            <div>
                                <div class="name">Max</div>
                                <div class="text_comment">
                                    <p>Классний фiльм!</p>
                                </div>
                            </div>
                            <div>
                                <div class="name">Max</div>
                                <div class="text_comment">
                                    <p>Классний фiльм!</p>
                                </div>
                            </div>
                            <div>
                                <div class="name">Max</div>
                                <div class="text_comment">
                                    <p>Классний фiльм!</p>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</main>
</body>

<script src="<?php echo ($siteName) ?>script/script.js"></script>

</html>