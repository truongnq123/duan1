<body style="background-image: url(https://scr.vn/wp-content/uploads/2020/07/background-tr%E1%BA%AFng-%C4%91%E1%BA%B9p-2020.jpg);">

    <form class="product-khach" action="index.php?act=billconfirm" method="post" enctype="multipart/form-data">
        <div class="top">
            <h1>THÔNG TIN GIỎ HÀNG</h1>
        </div>
        <div class="container">
            <div class="product-full1">
                <div class="product-full">
                    <?php
                    viewcard(0);
                    ?>
                </div>
                <!-- from để đổ php nha -->

                <?php
                if (isset($_SESSION['user'])) {
                    $name = $_SESSION['user']['name_user'];
                    $adress = $_SESSION['user']['address'];
                    $phone = $_SESSION['user']['phone'];
                    $email = $_SESSION['user']['email'];
                } else {
                    $name = "";
                    $adress = "";
                    $phone = "";
                    $email = "";
                }

                ?>
                <h3>Địa chỉ giao hàng</h3>

                <div>
                    <span>Họ tên</span>
                    <input type="text" name="name" id="name" placeholder="Họ và tên" value="<?= $name ?>">
                </div>
                <br>
                <div>
                    <span>Số điện thoại</span>
                    <input type="text" name="phone" id="phone" placeholder="Nhập số điện thoại" value="<?= $phone ?>">
                </div>
                <br>
                <div>
                    <span>Email</span>
                    <input type="email" name="email" id="email" placeholder="Nhập Email" value="<?= $email ?>">
                </div>
                <br>
                <div>
                    <span>Địa chỉ</span>
                    <input type="text" name="adress" id="adress" placeholder="Nhập số nhà/tên đường" value="<?= $adress ?>">
                </div>
                <div class="">

                    <td><input type="submit" name="tructiep" value="Trực tiếp" checked></td>

                </div>

            </div>
    </form>
    <?php
    $tong = 0;
    foreach ($_SESSION['MyCard'] as $card) {
        $ttien = $card[3] * $card[2];
        $tong += $ttien;
    };
    ?>
    <div class="momo">
        <form class="" method="POST" target="_blank" enctype="application/x-www-form-urlencoded" action="./control/thanhtoan/xulithanhtoan.php">
            <input type="hidden" name="tongtien" value="<?php echo $tong ?>">
            <div class="row">
                <!-- <button name="payUrl" >Thanh toan qua QR code</button> -->
                <input type="submit" value="Thanh toan qua QR code" name="payUrl">
            </div>
        </form>
        <form class="" method="POST" target="_blank" enctype="application/x-www-form-urlencoded" action="./control/thanhtoan/xulithanhtoan-atm.php">
            <input type="hidden" name="tongtien" value="<?php echo $tong ?>">
            <div class="row">
                <input type="submit" value="Thanh toan qua atm momo" name="payUrl">
            </div>
        </form>
    </div>
    </div>

</body>