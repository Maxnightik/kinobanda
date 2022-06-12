<?php
include $_SERVER['DOCUMENT_ROOT'] . '/config/db.php';
include $_SERVER['DOCUMENT_ROOT'] . '/include/header.php';
?>

<main class="main-filter">
    <div class="filter-top">
        <img src="<?php echo $site_url . "image/filter/popcorn1.svg" ?>" alt="" class="filter-img">
        <h1>KINOBANDA</h1>
        <p>Знайди фільм на свій смак</p>
    </div>

    <div class="filter-bottom">
        <form id="filter-form" method="POST">
            <div class="filter-type">
                <p>Характеристика фільму</p>
                <?php
                $sql = "SELECT * FROM characteristic";
                $result = $connect->query($sql);
                $count_type = mysqli_num_rows($result);
                $i = 0;
                while ($i < $count_type) {
                    $type = mysqli_fetch_assoc($result);

                ?>
                    <input type="radio" name="type" id="<?php echo "type" . $type['characterId'] ?>" class="filter-radio" value="<?php echo $type['characterId'] ?>">
                    <label for="<?php echo "type" . $type['characterId'] ?>"><?php echo $type['characterName'] ?></label>

                <?php
                    $i++;
                } ?>
            </div>
            <div class="filter-data">
                <p>Період</p>
                <input type="text" name="year-from" id="yearFrom" placeholder="1975">
                <input type="text" name="year-to" id="yearTo" placeholder="2022">
            </div>
            <div class="filter-category">
                <p>Категорія</p>
                <?php
                $sql2 = "SELECT * FROM category";
                $result2 = $connect->query($sql2);
                $count_category = mysqli_num_rows($result2);
                $j = 0;
                while ($j < $count_category) {
                    $category = mysqli_fetch_assoc($result2);
                ?>
                    <div class="filter-category__item" data-category=" <?php echo $category['categoryId']; ?>">
                        <?php echo $category['categoryName']; ?>
                    </div>
                <?php
                    $j++;
                } ?>
            </div>
            <button class="filter-btn">Знайти</button>
        </form>
    </div>

</main>

<script src="script/script.js"></script>
</body>

</html>