<?php
session_start();
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website bán laptop UpLee</title>
    <!--------------------Icon------------------->
    <link href="../src/css/fontawesome.css" rel="stylesheet">
    <link rel="stylesheet" href="./src/css/cssfont/fontawesome.css">
    <link rel="stylesheet" href="./src/css/cssfont/brands.css">
    <link rel="stylesheet" href="./src/css/cssfont/solid.css">
    <link rel="stylesheet" href="./src/css/cssfont/regular.css">
    <link rel="stylesheet" href="./src/css/cssfont/svg-with-js.css">
    <!--------------------Css index-------------->
    <link rel="stylesheet" href="./src/css/index2.css">
    <link rel="stylesheet" href="./src/css/giohang.css">
    <link rel="stylesheet" href="./src/css/style4.css">
    <link rel="stylesheet" href="./src/css/login.css">
    <link rel="stylesheet" href="../src/css/login1.css">

</head>


<body style="background-image: url(https://ap.poly.edu.vn/theme/student_v2/media//bg/bg-3.jpg);">
    <div class="container">
        <header>
            <div class="logo_search_order">
                <div class="logo">
                    <a href="./index.php"><img src="./src/img/logo.png" alt="" srcset=""></a>

                </div>
                <div class="search">
                    <form action="" method="post">
                        <input type="text" name="" id="" required placeholder="Search and enter">
                        <div class="icon_search"><label for="Mysubmit" style="font-size: 20px;"><i class="fa fa-search"></i></label></div>
                        <input type="submit" value="" id="Mysubmit" hidden>
                    </form>
                </div>
                <div class="login_cart">
                    <?php
                    if (isset($_SESSION['user'])) {
                        extract($_SESSION['user']);
                        // var_dump($_SESSION['user']);
                    ?>
                        <?php if ($role == 1) {  ?>
                            <div class="admin">

                                <a href="./control/index.php">
                                    <div class="icon_logo_admin"><i class="fa fa-user"></i></div>
                                    <p class="admin">đăng nhập trang Admin</p>
                                    <!-- <a href="../control/index.php">Đăng nhập trang admin</a> -->
                                </a>
                            </div>
                        <?php } ?>
                        <div class="icon_user">
                            <h1>hello: <?=$name_user ?></h1>
                            <a href="./index.php?act=out">
                                <div class="icon_logo"><i class="fa fa-user"></i></div>
                                <p class="sign"> log out</p>
                            </a>
                            <a href="./index.php?act=edit_taikhoan">cập nhật tài khoản</a>

                        </div>
                        <div class="icon_card">
                            <a href="" id="link">
                                <div class="oder_icon_card"><i class="fa fa-shopping-cart"></i></div>
                              <?php
                              $link = './index.php?act=oder_pd';
                                if (isset($_SESSION['user'])) {
                                    extract($_SESSION['user']);
                                    echo'
                                        <div class="quantity">
                                        <a href="'.$link.'"><span>My card</span></a>
                                        <div class="count">0</div>
                                        </div>'
                                    ;
                                }
                              ?>
                                
                            </a>
                        </div>
                    <?php } else { ?>
                        <div class="icon_user">
                            <a href="./index.php?act=dangnhap">
                                <div class="icon_logo"><i class="fa fa-user"></i></div>
                                <p class="sign"> Sign / resgister</p>
                            </a>

                        </div>
                        <div class="icon_card">
                            <a href="" id="link">
                                <div class="oder_icon_card"><i class="fa fa-shopping-cart"></i></div>

                                <div class="quantity">
                                    <span>My card</span>
                                    <div class="count">0</div>
                                </div>
                            </a>

                        </div>
                    <?php } ?>
                </div>

            </div>
            <nav>
                <ul>
                    <li><a href="./index.php">Trang Chủ</a></li>
                    <li><a href="">Giới Thiệu</a></li>
                    <li><a href="">Liên Hệ</a></li>
                    <li><a href="">Tin Tức</a></li>
                    
                </ul>
            </nav>
        </header>
        