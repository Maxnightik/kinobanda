<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;800&display=swap" rel="stylesheet" />
</head>

<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/include/header.php'; ?>
    <main>

        <div class="container">
            <div class="info-movies">
                <div class="info-movie">
                    <h2 class="movie-title">
                        Обі-Ван Кенобі /
                        Obi-Wan Kenobi
                    </h2>
                    <img src="../image/poster.jpg" alt="постер" />
                    <div class="description">
                        <div class="genre">Жанр: Фантастика, Бойовик, пригоди</div>
                        <p class="year">Рiк: 2022</p>
                        <p>
                            Спін-офф із франшизи «Зоряних війн», присвяченої майстру-джедаю
                            Обі-Вану Кенобі. Події розгорнуться через десять років після
                            того, що сталося в «Помсті сітхів», коли Обі-Ван Кенобі доставив
                            немовля Люка Скайуокера на Татуїн.
                        </p>
                        <div class="screen">
                            <ul>
                                <li><img class="image" src="../image/screen.jpg"></li>
                                <li><img class="image" src="../image/screen2.jpg"></li>
                                <li><img class="image" src="../image/screen3.jpg"></li>
                                <li><img class="image" src="../image/screen4.jpg"></li>
                            </ul>
                            <a class="trailer" href="https://www.youtube.com/watch?v=ycvTGepXzpU"
                                target="_blank">Дивитись
                                трейлер</a>
                        </div>
                        <div class="comment">
                            <form name="comment" action="comment.php" method="post">
                                <h3>Залишити коментар</h3>
                                <p>
                                    <label for="name">Им'я:</label>
                                    <input type="text" name="name" />
                                </p>
                                <p>
                                    <label for="text_comment">Коментар:</label>
                                    <br />
                                    <textarea name="text_comment" cols="70" rows="20"></textarea>
                                </p>
                                <p>
                                    <button type="submit" class="comment-btn">Вiдправити</button>
                                </p>
                            </form>
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

</html>
