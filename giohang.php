<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/css/giohang.css">
    <title>Document</title>
</head>
<style>

</style>

<body style="background-image: url(https://scr.vn/wp-content/uploads/2020/07/background-tr%E1%BA%AFng-%C4%91%E1%BA%B9p-2020.jpg);">
    <?php
    include "./view/user/header.php";

    ?>
    <div class="top">
        <h1>Giỏ Hàng</h1>
    </div>
    <div class="container">
        <div class="product-full1">
            <div class="product-full">
                <div class="product-top">
                    <p>Sản phẩm</p>
                    <p>Đơn giá</p>
                    <p>Số lượng</p>
                    <p>Thành tiền</p>
                    <p>Xóa </p>
                </div>
                <!-- đổ php vô đây nha -->
                <div class="product-sp">
                    <div class="sp">
                        <img src="./src/img/ct1.jpg" alt="" width="80px">
                        <div>
                            <span class="text"> Laptop Dell Vostro 3510 (P112F002BBL) (i5 1135G7 8GBRAM/512GB SSD/MX350 2G/15.6 inch FHD/Win11/Office HS21/Đen1)
                            </span>
                            <p> Mã sp: <span class="ma">0001</span> </p>
                        </div>

                    </div>
                    <span class="price">₫18.290.000</span>
                    <input type="number" class="nb">
                    <span class="price-end">₫18.290.000</span>
                    <form action="" class="form">
                        <button><i class="fa-solid fa-trash"></i></button>
                    </form>
                </div>

            </div>
            <!-- from để đổ php nha -->
            <div class="product-khach">
                <h3>Địa chỉ giao hàng</h3>
                <form action="">
                    <div>
                        <span>Họ tên</span>
                        <input type="text" name="" id="" placeholder="Họ và tên">
                    </div>
                    <br>
                    <div>
                        <span>Số điện thoại</span>
                        <input type="text" name="" id="" placeholder="Nhập số điện thoại">
                    </div>
                    <br>
                    <div>
                        <span>Email</span>
                        <input type="email" name="" id="" placeholder="Nhập Email">
                    </div>
                    <br>
                    <div>
                        <span>Tỉnh/Thành phố</span>
                        <input type="text" name="" id="" placeholder="Nhập tỉnh thành phố">

                    </div>
                    <br>
                    <div>
                        <span>Quận/huyện</span>
                        <input type="text" name="" id="" placeholder="Nhập Quận/huyện">
                    </div>
                    <br>
                    <div>
                        <span>Phường/xã</span>
                        <input type="text" name="" id="" placeholder="Nhập Phường/xã">
                    </div>

                    <br>
                    <div>
                        <span>Địa chỉ</span>
                        <input type="text" name="" id="" placeholder="Nhập số nhà/tên đường">
                    </div>
                    <button>Đặt hàng</button>
                </form>
            </div>
        </div>
        <?php

include "./view/user/footer.php";

?>
    </div>
</body>

</html>