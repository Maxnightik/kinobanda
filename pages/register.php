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


                    <label for="nickname">Введіть своє ім'я</label>
                    </br>
                    <input type="text" name="nickname" placeholder="Введіть своє ім'я">
                    </br>

                    <label for="email">Введіть свій email</label>
                    </br>
                    <input type="email" name="email" placeholder="Введіть свій email">
                    </br>

                    <label for="userName">Введіть свій логiн</label>
                    </br>
                    <input type="text" name="userName" placeholder="Введіть свій логiн">
                    </br>

                    <label for="surname">Введіть своє призвище</label>
                    </br>
                    <input type="text" name="surname" placeholder="Введіть своє призвище">
                    </br>

                    <label for="password">Введіть свій пароль</label>
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
