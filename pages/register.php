<?php
// Пiдключення бази даних
include $_SERVER['DOCUMENT_ROOT'] . '/config/db.php';

if (
    // Перевiрка чи icнують поля i вони не пустi
    isset($_POST["nickname"]) && isset($_POST["email"]) && isset($_POST["userName"]) && isset($_POST["surname"]) &&
    isset($_POST["password"])
    && $_POST["nickname"] != "" && $_POST["email"] != "" && $_POST["userName"] != "" && $_POST["surname"] != "" &&
    $_POST["password"] != ""
) 
{
    // Вставити в таблицю users такi поля
    $sql = "INSERT INTO users (nickname, email, userName, surname, password) VALUES
('"

. $_POST["nickname"] . "', '"
. $_POST["email"] . "', '"
. $_POST["userName"] . "', '"
. $_POST["surname"] . "', '"
. $_POST["password"] . "')";


if(mysqli_query($connect,$sql)) {
    //  Пiдключення авторизованого користувача 
    include $_SERVER['DOCUMENT_ROOT'] . '/include/loginProcess.php';
    } else {
    echo "<h2>Помилка</h2>" . mysqli_error($connect);
    }
    }
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Реєстрація</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;800&display=swap" rel="stylesheet" />
</head>

<body>
    <!-- Пiдключення шапки сайту -->
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/include/header.php'; ?>
    <main class="main-filter">
        <div class="filter-top">
            <img src="<?php $documentRoot ?>/image/filter/popcorn1.svg" alt="" class="filter-img">
            <h1>Реєстрація користувача</h1>
            <p>Знайди фільм на свій смак</p>
        </div>
        <!-- Форма реєстрації -->
        <div class="filter-bottom" id="register-area">
            <form action="register.php" id="register-form" method="POST">
                <div class="filter-data">
                    </br>
                    <input type="text" name="nickname" maxlength="20" placeholder="Введіть свiй логiн " required>
                    </br>
                    </br>

                    <input type="email" name="email" maxlength="35" placeholder="Введіть свій email" required>
                    </br>
                    </br>

                    <input type="text" name="userName" maxlength="20" placeholder="Введіть своє ім'я" required>
                    </br>
                    </br>

                    <input type="text" name="surname" maxlength="20" placeholder="Введіть своє призвище" required>
                    </br>
                    </br>

                    <input type="password" name="password" min="8" max="20" placeholder="Введіть свій пароль" required>

                    <button type="submit" class="filter-btn" id="register-button">Зареєструватись</button>
            </form>
        </div>
        </div>
        </div>

    </main>
</body>

</html>
