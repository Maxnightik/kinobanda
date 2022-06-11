<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kino</title>
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;800&display=swap" rel="stylesheet" />
</head>

<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/include/header.php'; ?>
    <main class="main-filter">
        <div class="filter-top">
            <img src="/image/filter/popcorn1.svg" alt="" class="filter-img">
            <h1>KINOBANDA</h1>
            <p>Знайди фільм на свій смак</p>
        </div>

        <div class="filter-bottom">
            <form action="">
                <div class="filter-type">
                    <p>Характеристика фільму</p>
                    <input type="radio" name="type" id="typeLight" class="filter-radio">
                    <label for="typeLight">Легкий</label>

                    <input type="radio" name="type" id="typeInteresting" class="filter-radio">
                    <label for="typeInteresting">Цікавий</label>

                    <input type="radio" name="type" id="typeHard" class="filter-radio">
                    <label for="typeHard">Напружений</label>

                    <input type="radio" name="type" id="typeDrama" class="filter-radio">
                    <label for="typeDrama">Драма</label>
                </div>
                <div class="filter-data">
                    <p>Період</p>
                    <input type="text" id="yearFrom" placeholder="1975">
                    <input type="text" id="yearTo" placeholder="2022">
                </div>
                <div class="filter-category">
                    <p>Категорія</p>
                    <div class="filter-category__item selected ">
                        Сімейний
                    </div>
                    <div class="filter-category__item">
                        Сімейний
                    </div>
                    <div class="filter-category__item">
                        Історичний
                    </div>
                    <div class="filter-category__item">
                        Сімейний
                    </div>
                    <div class="filter-category__item">
                        Військовий
                    </div>
                </div>
                <button type="submit" class="filter-btn">Знайти</button>
            </form>
        </div>

    </main>
</body>

</html>
