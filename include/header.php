<?php

$documentRoot = "C:/xampp2/htdocs/kinobanda";
$siteName = "http://kinobanda/";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kinobanda</title>
    <link rel="stylesheet" href="<?php $documentRoot ?>/css/style.css">
    <link rel="stylesheet" href="<?php $documentRoot ?>/css/login.css">
    <link rel="stylesheet" href="<?php $documentRoot ?>/css/register.css">
    <link rel="stylesheet" href="<?php $documentRoot ?>/css/media.css">
    <link rel="stylesheet" href="<?php $documentRoot ?>/css/mediamovie.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;800&display=swap" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <header>
        <div class="header-top">
            <div class="container">

                <div class="logo"><a href="../index.php"><img src="<?php $documentRoot ?>/image/logo.png"
                            alt="logo" /></a>
                </div>
                <a class="sign" href="/pages/login.php">Увiйти</a>
                <a class="rega" href="/pages/register.php">Реєстрація</a>
                <div class="search"><input type="text" name="search" placeholder="Шукати"><img
                        src="<?php $documentRoot ?>/image/search.svg" alt="search" /></div>

            </div>
        </div>
    </header>
