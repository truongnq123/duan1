<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../src/css/admin.css">
    <script src="https://kit.fontawesome.com/cc8faea6c4.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="top_bar">
                <div class="logo">
                    <a href="#"><img src="../src/img/logo.png" alt=""></a>
                </div>
                <form class="app-search" style="display: block;">
                    <input type="text" class="form-control" placeholder="Search">
                </form>
                <div class="search">
                    <i class="fa fa-search"></i>

                </div>
                <div class="log">
                    <img src="" alt="">
                    <?php
                    if (isset($_SESSION['user'])) {
                        extract($_SESSION['user']);
                    ?>
                        <h3>Chao mừng<?= $name_user ?></h3>
                        <a href="index.php?act=thoat">logout</a>
                    <?php } ?>
                </div>
            </div>
            <div class="banner">
                <img src="/src/img/banner_footer1.png" alt="">
            </div>
        </div>
        <nav>