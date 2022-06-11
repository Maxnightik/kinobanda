<?php
include $_SERVER['DOCUMENT_ROOT'] . '/config/db.php';

if (isset($_POST) and $_SERVER["REQUEST_METHOD"] == "POST") {
    $filter = $_POST['filter'];
    $str = '';

    for ($i = 0; $i < count($filter); $i++) {
        $strLenght = strlen($str);

        if ($filter[$i]['name'] == 'type' && $filter[$i]['value'] != '') {
            if ($strLenght > 0) {
                $str .= " && ";
            }
            $str .= "characterId = " . $filter[$i]['value'];
        }

        if ($filter[$i]['name'] == 'year-from' && $filter[$i]['value'] != '') {
            if ($strLenght > 0) {
                $str .= " && ";
            }
            $str .= "year >= " . $filter[$i]['value'];
        }

        if ($filter[$i]['name'] == 'year-to' && $filter[$i]['value'] != '') {
            if ($strLenght > 0) {
                $str .= " && ";
            }
            $str .= "year <= " . $filter[$i]['value'];
        }

        if ($filter[$i]['categories']) {

            for ($j = 0; $j < count($filter[$i]['categories']); $j++) {
                if (count($filter[$i]['categories']) > 1) {
                    if ($j == 0) {
                        $str .= " && categoryId = " . $filter[$i]['categories'][$j];
                    } else {
                        $str .= " || categoryId = " . $filter[$i]['categories'][$j];
                    }
                } else {
                    if ($strLenght > 0) {
                        $str .= " && ";
                    }

                    $str .= " categoryId = " . $filter[$i]['categories'][$j];
                }
            }
        }
    }
}
?>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/include/header.php'; ?>
<!-- MAIN -->
<main>
    <div class="container">
        <div class="movies">

            <?php
            $sql = "SELECT * FROM movies WHERE " . $str;
            $result = $connect->query($sql);
            $count_movie = mysqli_num_rows($result);
            $n = 0;
            while ($n < $count_movie) {
                $movie = mysqli_fetch_assoc($result);
                $sqlCat = "SELECT * FROM category WHERE categoryId = " . $movie['categoryId'];
                $resultCat = $connect->query($sqlCat);
                $category = mysqli_fetch_assoc($resultCat);
            ?>

                <div class="movie">
                    <h2 class="movie-title">
                        <?php echo $movie['movieName']; ?>
                        (2022)
                    </h2>
                    <img src="image/poster.jpg" alt="постер" />
                    <div class="description">
                        <div class="genre"><?php echo $category['categoryName']; ?></div>
                        <p>2022</p>
                        <p>
                            <?php echo $movie['description']; ?>
                        </p>
                    </div>
                </div>

            <?php
                $n++;
            }
            ?>

        </div>
    </div>
</main>

<!-- END MAIN -->

<!-- FOOTER -->
<footer>
    <div class="footer-container">
        <div class="logo">
            <img src="image/logo.png" alt="logo" />
        </div>
    </div>
</footer>

<!-- END FOOTER -->