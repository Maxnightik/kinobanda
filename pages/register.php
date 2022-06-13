<?php 

 include $_SERVER['DOCUMENT_ROOT'] . '/include/db.php';

if(
isset($_POST["nickname"]) && isset($_POST["email"]) && isset($_POST["userName"]) && isset($_POST["surname"]) &&
isset($_POST["password"])
&& $_POST["nickname"] != "" && $_POST["email"] != "" && $_POST["userName"] != "" && $_POST["surname"] != "" &&
$_POST["password"] !=""
) {

$sql = "INSERT INTO users (nickname, email, userName, surname, password) VALUES
('"
. $_POST["nickname"] . "', '"
. $_POST["email"] . "', '"
. $_POST["userName"] . "', '"
. $_POST["surname"] . "', '"
. $_POST["password"] . "')";


if(mysqli_query($connect,$sql)) {
echo "<h2>Користувача додано</h2>";
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
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/include/header.php'; ?>
    <main class="main-filter">
        <div class="filter-top">
            <h1>Реєстрація користувача</h1>
        </div>

        <div class="filter-bottom">
            <form action="register.php" method="POST">
                <div class="reg">
                    </br>
                    <input type="text" name="nickname" placeholder="Введіть свiй логiн ">
                    </br>
                    </br>

                    <input type="email" name="email" placeholder="Введіть свій email">
                    </br>
                    </br>

                    <input type="text" name="userName" placeholder="Введіть своє ім'я">
                    </br>
                    </br>

                    <input type="text" name="surname" placeholder="Введіть своє призвище">
                    </br>
                    </br>

                    <input type="password" name="password" placeholder="Введіть свій пароль">

                    <button type="submit" class="filter-btn">Зареєструватись</button>
            </form>
        </div>
        </div>
        </div>

    </main>
</body>

</html>