<?php
// Пiдключення бази даних
include_once $_SERVER['DOCUMENT_ROOT'] . '/config/db.php';

//check if a request has been sent
if (isset($_POST) and $_SERVER["REQUEST_METHOD"] == "POST") {
    //variable to form the filtration condition
    $str = '';
    //check if a search has been performed
    if (isset($_POST['search__text']) && $_POST['search__text'] != "") {
        //search condition
        $str .= "movieName LIKE '%" . $_POST['search__text'] . "%'";
    }

    //check if a filter has been selected
    if (isset($_POST['filter'])) {
        //get the entered data
        $filter = $_POST['filter'];

        for ($i = 0; $i < count($filter); $i++) {
            //number of characters
            $strLenght = strlen($str);

            //check whether the character of the film has been selected
            if ($filter[$i]['name'] == 'type' && $filter[$i]['value'] != '') {
                // check if the string was not empty
                if ($strLenght > 0) {
                    //add operator and
                    $str .= " AND ";
                }
                //add a condition for filtering by the character of the movie
                $str .= "characterId = " . $filter[$i]['value'];
            }

            //check if the starting year is entered
            if ($filter[$i]['name'] == 'year-from' && $filter[$i]['value'] != '') {
                //check if this number
                if (is_numeric($filter[$i]['value'])) {
                    // check if the string was not empty
                    if ($strLenght > 0) {
                        //add operator and
                        $str .= " AND ";
                    }
                    //add a search condition by year
                    $str .= "(year >= " . $filter[$i]['value'] . ")";
                }
            }

            //check whether the maximum year has been entered
            if ($filter[$i]['name'] == 'year-to' && $filter[$i]['value'] != '') {
                //check if this number
                if (is_numeric($filter[$i]['value'])) {
                    // check if the string was not empty
                    if ($strLenght > 0) {
                        //add operator and
                        $str .= " AND ";
                    }
                    //add a search condition by year
                    $str .= "(year <= " . $filter[$i]['value'] . ")";
                }
            }
            //check whether a category has been selected
            if ($filter[$i]['categories']) {

                for ($j = 0; $j < count($filter[$i]['categories']); $j++) {
                    //check if multiple categories have been selected
                    if (count($filter[$i]['categories']) > 1) {
                        //if this is the first category
                        if ($j == 0) {
                            //add a condition to search for a category
                            $str .= " AND (categoryId = " . $filter[$i]['categories'][$j];
                        } else {
                            //add a condition to search for a category
                            $str .= " OR categoryId = " . $filter[$i]['categories'][$j];
                        }

                        //if this is the last category
                        if ($j == count($filter[$i]['categories']) - 1) {
                            $str .= ")";
                        }
                        //when only one category is selected
                    } else {
                        // check if the string was not empty
                        if ($strLenght > 0) {
                            //add operator and
                            $str .= " AND ";
                        }
                        //add a condition to search for a category
                        $str .= " categoryId = " . $filter[$i]['categories'][$j];
                    }
                }
            }
        }
    }
}
?>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/config/setting.php';
?>
<!-- MAIN -->
<main>
    <div class="container">
        <div class="movies">
            <!-- Вивiд списку фiльмiв -->
            <?php
            //find a movie by selected filters
            $sql = "SELECT * FROM movies WHERE " . $str;
            //perform a query to the database
            $result = $connect->query($sql);
            //count the number of values
            $count_movie = mysqli_num_rows($result);
            $n = 0;
            //when the movie is found
            if ($count_movie > 0) {
                while ($n < $count_movie) {
                    //get an array of values
                    $movie = mysqli_fetch_assoc($result);
                    //get the category of the found film
                    $sqlCat = "SELECT * FROM category WHERE categoryId = " . $movie['categoryId'];
                    //perform a query to the database
                    $resultCat = $connect->query($sqlCat);
                    //get a category
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