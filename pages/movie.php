<?php
// Пiдключення бази даних
include_once $_SERVER['DOCUMENT_ROOT'] . '/config/db.php';

if (isset($_POST) and $_SERVER["REQUEST_METHOD"] == "POST") {
    $str = '';

    if (isset($_POST['search__text']) && $_POST['search__text'] != "") {
        $str .= "movieName LIKE '%" . $_POST['search__text'] . "%'";
    }

    if (isset($_POST['filter'])) {
        $filter = $_POST['filter'];
        for ($i = 0; $i < count($filter); $i++) {
            $strLenght = strlen($str);
            if ($filter[$i]['name'] == 'type' && $filter[$i]['value'] != '') {
                if ($strLenght > 0) {
                    $str .= " AND ";
                }
                $str .= "characterId = " . $filter[$i]['value'];
            }

            if ($filter[$i]['name'] == 'year-from' && $filter[$i]['value'] != '') {
                if (is_numeric($filter[$i]['value'])) {
                    if ($strLenght > 0) {
                        $str .= " AND ";
                    }
                    $str .= "(year >= " . $filter[$i]['value'] . ")";
                }
            }

            if ($filter[$i]['name'] == 'year-to' && $filter[$i]['value'] != '') {
                if (is_numeric($filter[$i]['value'])) {
                    if ($strLenght > 0) {
                        $str .= " AND ";
                    }
                    $str .= "(year <= " . $filter[$i]['value'] . ")";
                }
            }

            if ($filter[$i]['categories']) {

                for ($j = 0; $j < count($filter[$i]['categories']); $j++) {
                    if (count($filter[$i]['categories']) > 1) {
                        if ($j == 0) {
                            $str .= " AND (categoryId = " . $filter[$i]['categories'][$j];
                        } else {
                            $str .= " OR categoryId = " . $filter[$i]['categories'][$j];
                        }
                        if ($j == count($filter[$i]['categories']) - 1) {
                            $str .= ")";
                        }
                    } else {
                        if ($strLenght > 0) {
                            $str .= " AND ";
                        }

                        $str .= " categoryId = " . $filter[$i]['categories'][$j];
                    }
                }
            }
        }
    }
}
?>
<!-- пiдключення шапки сайту -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/include/header.php';
?>
<!-- MAIN -->
<main>
    <div class="container">
        <div class="movies">
            <!-- Вивiд списку фiльмiв -->
            <?php
            $sql = "SELECT * FROM movies WHERE " . $str;
            $result = $connect->query($sql);
            $count_movie = mysqli_num_rows($result);
            $n = 0;
            if ($count_movie > 0) {
                while ($n < $count_movie) {
                    $movie = mysqli_fetch_assoc($result);
                    $sqlCat = "SELECT * FROM category WHERE categoryId = " . $movie['categoryId'];
                    $resultCat = $connect->query($sqlCat);
                    $category = mysqli_fetch_assoc($resultCat);
            ?>

            <div class="movie">
                <h2 class="movie-title">
                    <a href="<?php echo $siteName . "pages/infomovie.php?id=" . $movie['movieId'] ?>" target="_blank">
                        <?php echo $movie['movieName']; ?>
                        (<?php echo $movie['year']; ?>) </a>
                </h2>
                <img src="<?php echo $siteName . $movie['movieImg']; ?>" alt="постер" />
                <div class="description">
                    <div class="genre"><?php echo $category['categoryName']; ?></div>
                    <p>
                        <?php echo $movie['description']; ?>
                    </p>
                </div>
            </div>

            <?php
                    $n++;
                }
            } else {
                ?>
                <h2 class="error">На жаль фільм не знайдено, спробуйте знову</h2>
                <div><a href="<?php echo $siteName; ?>" class="back"><span></span> Повернутись назад</a></div>
            <?php

            }
            ?>

        </div>
    </div>
</main>
<!-- END MAIN -->
