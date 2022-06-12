<?php include $_SERVER['DOCUMENT_ROOT'] . '/include/header.php'; ?>

<main class="main-filter">
    <div class="filter-top">
        <img src="<?php $documentRoot ?>/image/filter/popcorn1.svg" alt="" class="filter-img">
        <h1>KINOBANDA</h1>
        <p>Знайди фільм на свій смак</p>
    </div>

    <div class="filter-bottom" id="login-area">
        <form action="<?php $documentRoot ?>/include/loginProcess.php" id="login-form" method="POST">
            <div class="filter-data">
                <input type="text" id="emailAuth" placeholder="Адрес электронной почты" autocomplete="email">
                <input type="password" id="passAuth" placeholder="Пароль">
            </div>
            <button type="submit" class="filter-btn" id="login-button">Увійти</button>
        </form>
				<p> 
					<?php if(isset($_GET['logErr']))
									{
										if($_GET['logErr'] == "01") echo("COOKIE ERROR");
										if($_GET['logErr'] == "02") echo("USER NOT FOUND ERROR");
										if($_GET['logErr'] == "03") echo("POST ERROR");
									} ?> 
				</p>
    </div>

</main>

<script src=""></script>
</body>

</html>