<?php
include $_SERVER['DOCUMENT_ROOT'] . '/include/header.php';
if (!isset($_COOKIE["logError"])) setcookie("logError", '', time() + 3600, '/');
?>


<main class="main-filter">
    <div class="filter-top">
        <img src="<?php $documentRoot ?>/image/filter/popcorn1.svg" alt="" class="filter-img">
        <h1>KINOBANDA</h1>
        <p>Знайди фільм на свій смак</p>
    </div>

    <div class="filter-bottom" id="login-area">
        <form action="<?php $documentRoot ?>/include/loginProcess.php" id="login-form" method="POST">
            <div class="filter-data">
                <input type="text" name="emailAuth" placeholder="Адрес электронной почты">
                <input type="password" name="passAuth" placeholder="Пароль">
            </div>
            <button type="submit" class="filter-btn" id="login-button">Увійти</button>
        </form>
        <p>
            <?php echo ($_COOKIE["logError"]); ?>
        </p>
    </div>

</main>

<script src=""></script>
</body>

</html>