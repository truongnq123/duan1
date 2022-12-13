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
    <link rel="stylesheet" href="./src/css/index.css">
    <link rel="stylesheet" href="./src/css/giohang.css">
    <link rel="stylesheet" href="./src/css/style.css">
    <link rel="stylesheet" href="./src/css/login.css">
    <link rel="stylesheet" href="./src/css/cmt.css">
    <link rel="stylesheet" href="./src/css/pro-full.css">
    <!---------------------- js index-------------->
    s

</head>


<body style="background-image: url(https://ap.poly.edu.vn/theme/student_v2/media//bg/bg-3.jpg);">
    <div class="container">
        <header class="header">
            <div class="logo_search_order">
                <div class="logo">
                    <a href="./index.php"><img src="./src/img/logo.png" alt="" srcset=""></a>

                </div>
                <div class="search">
                    <form action="index.php?act=timkiem" method="POST" enctype="multipart/form-data">
                        <input type="text" name="timkiem" id="" required placeholder="Search and enter">
                        <div class="icon_search"><label for="Mysubmit" style="font-size: 20px;"><i class="fa fa-search"></i></label></div>
                        <input type="submit" value="GO" name="searchpd" id="Mysubmit" hidden>
                    </form>
                </div>
                <div class="login_cart_full">
                    
                
                    <div class="login_cart">
                        <?php
                        if (isset($_SESSION['user'])) {
                            extract($_SESSION['user']);

                        ?>
                            
                            <div class="icon_user">
                            <a href="./control/index.php"><p class="dn_admin">Đăng nhập admin</p></a>
                            <p class="name_user">Xin chào: <?= $name_user ?></p>
                           
                                <a href="./index.php?act=out">
                                    <div class="icon_logo"><i class="fa fa-user"></i></div>
                                    <p class="sign"> Log out</p>
                                </a>
                                <div class="update_tk">
                                    <a href="./index.php?act=edit_taikhoan">Cập nhật tài khoản</a>
                                </div>
                            </div>
                            
                            <div class="icon_card">
                                <a href="./index.php?act=giohang" id="link">
                                    <div class="oder_icon_card"><i class="fa fa-shopping-cart"></i>
                                    </div>

                                    <?php
                                    $link = './index.php?act=giohang';
                                    if (isset($_SESSION['user'])) {
                                        extract($_SESSION['user']);
                                        echo '
                                    <div class="quantity">
                                    <span>My card</span>
                                    <div class="count">0</div>
                                    </div>';
                                    }
                                    ?>


                                </a>
                                <div class="update_tk">
                                    <a href="./index.php?act=mybill">Đơn Hàng Của Tôi</a>

                                </div>
                            </div>
                        <?php } else { ?>
                            <div class="login_cart">
                                <div class="icon_user1">
                                    <a href="./index.php?act=dangnhap">
                                        <div class="icon_logo"><i class="fa fa-user"></i></div>
                                        <p class="sign"> Sign / resgister</p>
                                    </a>

                                </div>
                                <div class="icon_card1">
                                    <a href="./index.php?act=timkiem" id="link">
                                        <div class="oder_icon_card"><i class="fa fa-shopping-cart"></i>

                                        </div>
                                        <div class="quantity">
                                            <span>My card</span>
                                            <div class="count">0</div>
                                        </div>

                                    </a>

                                </div>
                            <?php } ?>
                            </div>


                    </div>
                </div>
            </div>
            <nav>
                <ul>
                    <li><a href="./index.php">Trang Chủ</a></li>
                    <li><a href="">Giới Thiệu</a></li>
                    <li><a href="./menu/lienhe.php">Liên Hệ</a></li>
                    <li><a href="./menu/tintuc.php">Tin Tức</a></li>

                </ul>
            </nav>
        </header>
    </div>

</body>